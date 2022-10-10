import Vue from 'vue'
import Vuex from 'vuex'
 
Vue.use(Vuex)

const Comment = {
 namespaced: true,
 state: {
   comments: []
 },
 mutations: {
   comments(state, id) {
     const path = "/items/" + id + "/get_comments";
     axios.get(path).then(res => {
       state.comments = res.data
     }).catch(function(err) {
       console.log(err)
     })
   }
 },
 actions: {
   get_comments({commit}, id) {
     commit('comments', id)
   }
 }
}

export default new Vuex.Store({
 modules: {
   comment: Comment,
 }
})