<style>
	.breadlink{width: 90%;height:80px;font-size: 18px;line-height: 80px;}
    .breadlink a{color: #000;}
</style>

<template>
	<div class="breadlink">
    	<a href="javascript:void(0);" v-for="(link,index) in $store.state.links" @click="$router.push(link.link)"><span><</span>{{link.linkName}}</a>
    </div>
</template>

<script>
  	export default {
  		data(){
  			return{
  				// links:'',
  			}
  		},
  		mounted(){
        	// this.links=this.$store.state.links;

        	// this.links=JSON.parse(sessionStorage.getItem("links"));
        	// console.log(this.links);
      	}
  	}
</script>