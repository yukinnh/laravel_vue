<template>
 <div class="">
   <h5 class="mb-3">コメント一覧</h5>
  
 </div>
</template>

<script>
export default {
 props: ['post', 'login_user_id', 'comments'],
 data() {
   return {
     edit_time: false,
     edit_comment: {}
   }
 },
 computed:{
      get(){
        return this.comments
      },
      set(newVal){
        this.$emit("changeComments", newVal)
      }
  },
 created() {
   this.getComments()
 },
 methods: {
   getComments() {
     const path = "/posts/" + this.post.id + "/get_comments";
     axios.get(path).then(res => {
       this.comments = res.data;
       console.log(this.comments, 'コメント一覧');
     }).catch(function(err) {
       console.log(err)
     })
   },
   edit(comment) {
     this.edit_time = true
     this.edit_comment = comment
     this.edit_comment.old_text = comment.text
   },
   update(comment) {
     const update_comment = {
       text: comment.text
     }
     const id = this.post_id
     const array = ["/posts/",id,"/comments/", comment.id];
     const path = array.join('')
     axios.put(path, update_comment).then(res => {
       this.edit_time = false
       this.edit_comment = {}
       this.getComments()
     }).catch(function(err) {
       console.log(err)
     })
   },
   destroy(comment_id) {
     const id = this.post_id
     const array = ["/posts/",id,"/comments/", comment_id];
     const path = array.join('')
     axios.delete(path).then(res => {
       this.getComments()
     }).catch(function(err) {
       console.log(err)
     })
   },
   back(comment) {
     comment.text = comment.old_text
     this.edit_time = false
     this.edit_comment = {}
   }
 }
}
</script>

<style scoped>
.btn{
 height: 2rem;
}
</style>