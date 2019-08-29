<style>
	.sel{width: 100%;height:36px;border:none;outline: none;background: #fff;border-radius: 8px;padding-left:3px;font-size: 16px;}
    .sel>option{width:100%;height: 40px;line-height: 40px;}
</style>

<template>
		<div style="height:40px;width: 100%;border-radius: 8px;">
	    	<select class="sel" v-model="idd_code" @change="changed();">
	            <option value="">{{$t('areacode.sel')}}</option>
                <template v-if="$i18n.locale=='en'">
	               <option v-for="item in optList" :value="item.acnumber">{{ item.acname_en }}({{item.acnumber}})</option>
                </template>
                 <template v-else>
                   <option v-for="item in optList" :value="item.acnumber">{{ item.acname_cn }}({{item.acnumber}})</option>
                </template>
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
                    acnumber:'86',
                    acname_cn:'中國大陸'
                },{
                    acnumber:'852',
                    acname_cn:'中國香港'
                },
                {
                    acnumber:'886',
                    acname_cn:'中國臺灣'
                },
                {
                    acnumber:'853',
                    acname_cn:'中國澳門'
                },
                {
                    acnumber:'1473',
                    acname_cn:'United Kingdom'
                }, 
                {
                    acnumber:'82',
                    acname_cn:'South Korea'
                },
                {
                    acnumber:'81',
                    acname_cn:'Japan'
                },
                {
                    acnumber:'49',
                    acname_cn:'Germany'
                },
                {
                    acnumber:'673',
                    acname_cn:'Brunei'
                }],
            }
        },
        created(){
            this.getAreacode();
        },
        beforeMounte(){
        },
        mounted() {
            this.idd_code=this.areaCode;
            console.log(this.areaCode);
        },
        beforeDestroy(){
            
        },
        methods: {
            getAreacode(){
                // 获取區號列表
                this.$get(this.$config+'/api/areacode',
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.optList=res.data.data;
                }).catch(err => {
                    // this.$toast('获取失败');
                    console.log(err);

                });
            },
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
