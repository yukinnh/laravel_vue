<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Log;


class CategoryController extends Controller
{
    
    // カテゴリー 一覧
    public function index(Category $category)
    {
        Log::debug($category);
        return view('categories.index')->with(['categories' => $category->getPaginateByLimit()]);
    }
    
    // カテゴリーIDに紐づく投稿一覧
    public function postsIndex(Category $category)
    {
        Log::debug($category);
        return view('categories.postsIndex')->with(['posts' => $category->getByCategory()]);
    }
    
     // 作成画面 遷移
    public function create()
    {
        return view('categories/create');
    }
    
    // 投稿作成
    public function store(CategoryRequest $request, Category $category)
    {
        Log::debug($request);
        $input = $request['category'];
        $category->fill($input)->save();
        return redirect('/categories/');
    }
}
