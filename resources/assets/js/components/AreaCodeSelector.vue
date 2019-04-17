<style>
	.sel{width: 100%;height:40px;border:none;outline: none;background: #fff;border-radius: 8px;padding-left:3px;font-size: 16px;}
    .sel>option{width:100%;height: 40px;line-height: 40px;}
</style>

<template>
		<div style="height:40px;width: 100%;border-radius: 8px;">
	    	<select class="sel" v-model="idd_code" @change="changed();">
	            <option value="">请选择区号</option>
	            <option v-for="item in optList" :value="item.value">{{ item.name }}</option>
	        </select>
	    </div>
    
</template>

<script>
    export default {
    	props:['areaCode'],    //接收父组件的方法
        data () {
            return {
            	idd_code:'',
	    		optList:[{
                    value:'86',
                    name:'中国大陆(+86)'
                },{
                    value:'852',
                    name:'中国香港(+852)'
                },
                {
                    value:'886',
                    name:'中国台湾(+886)'
                },
                {
                    value:'853',
                    name:'中国澳门(+853)'
                },
                {
                    value:'1473',
                    name:'United Kingdom(+1473)'
                }, 
                {
                    value:'82',
                    name:'South Korea(+82)'
                },
                {
                    value:'81',
                    name:'Japan(+81)'
                },
                {
                    value:'49',
                    name:'Germany(+49)'
                },
                {
                    value:'673',
                    name:'Brunei(+673)'
                }],
            }
        },
        mounted() {
            this.idd_code=this.areaCode;
            console.log(this.areaCode);
        },
        beforeDestroy(){
            
        },
        methods: {
 			changed(){
 				this.$emit('selectedAreaCode',this.idd_code);
 			},
        },
        watch:{
            areaCode(){
                this.idd_code=this.areaCode;
            }
        },
    }
</script>
