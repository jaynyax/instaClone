<template>
<div>
     <button class="btn btn-primary ml-4" v-on:click="followUser" v-text="buttonText"></button>
</div>

</template>

<style>
</style>


<script>
export default {

data(){
     return {
          status :this.follows,
     }
},
     props:["userId",'follows'],
    
 methods:{

      followUser:function(){
           axios.post("/follow/"+this.userId).then(
                response=>{
                     console.log(response.data);
                     this.status = !this.status;
                }
           ).catch($errors =>{
                
                if($errors.response.status = 401){
                     window.location = '/login';
                }
           }
           );
      }
 },

 computed:{

      buttonText(){

           return this.status ? "Unfollow":"Follow";
      }
 }
}
</script>

