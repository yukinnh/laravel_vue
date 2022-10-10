const button = document.getElementById("test");
const id = document.getElementById('form_delete');

// ボタンを押下したとき
if (id) {
  button.addEventListener('click', function(){
     // 削除処理
     if (confirm('消すの？')) {
       id.submit();
       location.href('/');
     }
 });
}

 
