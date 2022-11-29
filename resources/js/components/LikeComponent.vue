<template>
  <div class="box"> 
    <button v-if="status === false" class='btn like-button' @click="like()" >
      <i class="fa fa-thin fa-thumbs-up" style="font-size: 30px;"><span style="font-size: 15px;">{{count}}</span></i>
    </button>
    <button v-else class='btn liked-button' @click="like()" >
      <i class="fa fa-solid fa-thumbs-up" style="font-size: 30px; color:#0099FF;"><span style="font-size: 15px;">{{count}}</span></i>
    </button>
  </div>
</template>

<script>
export default {
 props: ['post'],      
 data() {
   return {
     status: false,
     count:0,
   }
 },
 created() {
   this.likeCheck();
   this.counts();
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
       this.likeCheck();
       this.counts();
     }).catch(function(err) {
       console.log(err)
     })
   },
   counts() {
    const path = "/posts/" + this.post.id + "/counts";
    axios.get(path).then(res => {
       this.count = res.data.result;
    }).catch(function(err) {
       console.log(err)
    })
   }
 }
}
</script>
