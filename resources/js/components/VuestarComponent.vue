<template>
  <div> 
    <button @click="like()" class='btn' v-if="status === false">
      <span><i class="fa fa-solid fa-thumbs-up" style="color:black;"></i>{{count}}</span>
    </button>
    <button @click="like()" class='btn' v-else>
      <span><i class="fa fa-solid fa-thumbs-up faa-wrench animated" style="color:blue;"></i>{{count}}</span>
    </button>
  </div>
</template>

<script>
export default {
 props: ['post'],      
 data() {
   return {
     status: false,
   }
 },
 created() {
   this.likeCheck()
 },
 methods: {
   likeCheck() {
     const path = "/posts/" + this.post.id + "/check";
     axios.get(path).then(res => {
      const checkResult = res.data.result;
       if(checkResult) {
         this.status = true
       } else {
         this.status = false
       }
     }).catch(function(err) {
       console.log(err)
     })
   },
   like() {
     const path = "/posts/" + this.post.id + "/likes";
     axios.post(path).then(res => {
       this.likeCheck()
     }).catch(function(err) {
       console.log(err)
     })
   }
 }
}
</script>
