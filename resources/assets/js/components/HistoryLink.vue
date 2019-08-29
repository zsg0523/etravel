<style>
    .breadlink{width: 90%;height:80px;font-size: 18px;line-height: 80px;}
    .breadlink a{color: #000;}
    .dropdown-item__content{position: absolute;max-height: 200px;}
    .van-dropdown-item .van-overlay{display: none;}
</style>
<template>
	<div class="breadlink">
    	<a href="javascript:void(0);" v-for="(link,index) in $store.state.links" @click="$router.push(link.link)"><span><</span>{{link.linkName}}</a>
      <div style="display: inline-block;float: right;">
        <select style="font-size: 14px;width: 100px;height: 40px;border: none;background: rgb(231, 231, 231);outline: none;" v-model="value1" @change="changLang()">
            <template v-for="(option,index) in option1">
              <option :value="option.value">{{option.text}}</option>
            </template>
        </select>
      </div>
      
    </div>
</template>

<script>
  	export default {
  		data(){
  			return{
  				value1: 'cn',
          option1: [
            { text: '中文(简体)', value: 'cn' },
            { text: '中文(繁体)', value: 'hk' },
            { text: 'English', value: 'en' }
          ],
  			}
  		},
  		mounted(){
        	this.value1=this.$i18n.locale;
      },
      methods:{
        changLang(){
          console.log(this.value1);
          this.$i18n.locale=this.value1;
          if(this.$store.state.links[0]){  
            this.$store.state.links[0].linkName=this.$t('links.project');
          }
          if(this.$store.state.links[1]){  
            this.$store.state.links[1].linkName=this.$t('links.projectDetail');
          }
        },
      }
  	}
</script>