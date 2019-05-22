<style>
    .dataBank_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;position: relative;}
    .pane_content{width:70%;height:auto;margin-bottom: 30px;font-size: 16px;margin-top:20px;}
    
    .right_title{width:100%;height:50px;line-height: 50px;position: relative;text-align: center;font-size: 20px;border-bottom: 1px solid #d6d6d6;}
    .title_icon{width:35px;height:35px;position: absolute;left: 8px;top:8px;line-height: 35px;}
    .title_icon>img{width:28px;height: 28px;}

    .form_content{width: 94%;min-height: 210px;align-content:flex-start;flex-direction: row;flex-wrap: wrap;margin-left: 3%;margin-top: 10px;}

    .form_item_journeyInfo{width: 100%;min-height:80px;}
    .form_item_journeyInfo>div{width: 96%;min-height: 45px;line-height: 45px;}
    .item_input_journeyInfo{height:40px;padding-left:10px;outline: none;width: 97%;border-radius: 8px;}
    .item_area{width:97%;min-height:80px;border-radius: 8px;resize:none;line-height:25px;font-size: 14px;outline: none;overflow: hidden;}

    .active{font-size: 18px;}     

	.dataBankAddBtn_journeyInfo{width:50px;height: 50px;position: absolute;right: 5px;top: 5px;}
    .dataBankAddBtn_journeyInfo:hover{cursor:pointer;}
    .dataBankAddBtn_journeyInfo>img{width:50px;height: 50px;}
	
    .editBox{width: 760px;min-height:240px;background-color: #fff;border-radius: 15px;}
    .editBoxContent{width:90%;margin-left: 5%;margin-top:20px;flex-flow:row wrap;justify-content: center;align-items: center;}
    .issure{width:100%;height:50px;margin-top: 20px;margin-bottom: 20px;}
    .issure>button{width:60%;height:50px;margin-left: 20%;background-color: #ffde01;font-size: 16px;border-radius: 8px;border: none;outline: none;}

    .editBtnGroup_journeyInfo{width:94%;height:50px;line-height: 50px;}
    .editBtnGroup_journeyInfo>img{width:40px;height: 40px;margin-left: 25px;float: right;}

    .van-dialog{width:50%;}
</style>

<template>
	<div style="width:100%;">
		<div class="right_title">
            <div class="title_icon" @click="$router.push('/journey/dataBankJourney')">
                <img src="/etravel/public/images/back.png">
            </div>
            {{journey.day}}
        </div>
        <div class="dataBank_input_form disflex">
            <div class="pane_content">
                <div class="form_content disflex" v-for="(meal,index) in meals">
                    <div class="form_item_journeyInfo">
		                <div class="item_title">早/中/晚餐(必填)</div>
		                <div><input class="item_input_journeyInfo" placeholder="早/中/晚餐" type="text" disabled="disabled"  :value="meal.title"></div>
		            </div>
		            <div class="form_item_journeyInfo">
		                <div class="item_title">膳食内容(必填)</div>
		                <div><input class="item_input_journeyInfo" placeholder="膳食内容" type="text" disabled="disabled"  :value="meal.content"></div>
		            </div>
                    <div class="form_item_journeyInfo">
                        <div class="item_title">膳食介紹(必填)</div>
                        <div>
                            <textarea class="item_area" disabled="disabled" placeholder="膳食介紹" :value="meal.description"></textarea>
                        </div>
                    </div>
                    <div class="editBtnGroup_journeyInfo">
		                <img @click="delMeal(meal.id)" src="/etravel/public/images/rush-icon.png">
		                <img @click="editMealShow(index)" src="/etravel/public/images/edit-all.png">
		            </div>
                </div>
            </div> 
            <div class="dataBankAddBtn_journeyInfo" @click="addNewMealShow()">
	            <img src="/etravel/public/images/add_y.png">
	        </div>   
        </div>
        <van-popup v-model="isNewMealShow" :overlay="true">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_journeyInfo">
		                <div class="item_title">早/中/晚餐(必填)</div>
		                <div><input class="item_input_journeyInfo" placeholder="早/中/晚餐" type="text" v-model="newMeal.title"></div>
		            </div>
		            <div class="form_item_journeyInfo">
		                <div class="item_title">膳食内容(必填)</div>
		                <div><input class="item_input_journeyInfo" placeholder="膳食内容" type="text" v-model="newMeal.content"></div>
		            </div>
                    <div class="form_item_journeyInfo">
                        <div class="item_title">膳食介紹(必填)</div>
                        <div>
                            <textarea class="item_area" placeholder="膳食介紹" v-model="newMeal.description"></textarea>
                        </div>
                    </div>
                    <div class="issure">
                        <button @click="addNewMeal()">添加</button>
                    </div>
                </div>
            </div>
        </van-popup>
        <van-popup v-model="isEditMealShow" :overlay="true">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_journeyInfo">
		                <div class="item_title">早/中/晚餐</div>
		                <div><input class="item_input_journeyInfo" placeholder="早/中/晚餐" type="text"  v-model="edMeal.title"></div>
		            </div>
		            <div class="form_item_journeyInfo">
		                <div class="item_title">膳食内容</div>
		                <div><input class="item_input_journeyInfo" placeholder="膳食内容" type="text" v-model="edMeal.content" ></div>
		            </div>
                    <div class="form_item_journeyInfo">
                        <div class="item_title">膳食介紹</div>
                        <div>
                            <textarea class="item_area"  placeholder="膳食介紹" v-model="edMeal.description"></textarea>
                        </div>
                    </div>
                    <div class="issure">
                        <button @click="editMeal()">修改</button>
                    </div>
                </div>
            </div>
        </van-popup>  
	</div>
</template>

<script>
  	export default {
  		data() {
            return {
            	journey:'',
	        	meals:[],
	        	newMeal:{
	        		title:'',
	        		content:'',
	        		description:'',
	        	},
	        	edMeal:{
	        		id:'',
	        		title:'',
	        		content:'',
	        		description:'',
	        		index:'',
	        	},
	        	isNewMealShow:false,
	        	isEditMealShow:false,
            }
        },
        mounted:function(){
        	this.getMeals();
        },
        methods:{
            getMeals(){
                // 获取膳食
                this.$ajax({
                    method: 'GET',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    url: this.$config+'/api/travel/'+sessionStorage.actTravelId+'/route/'+this.$route.params.id+'?include=foods',
                }).then(res => {
                    // console.log(res.data.sceneries.data);
                    this.journey=res.data;
                    this.meals=res.data.foods.data;
                }).catch(err => {
                    this.$toast('獲取失敗');
                    console.log(err);
                });
            },
            addNewMealShow(){
                this.isNewMealShow=true;
            },
            addNewMeal(){
                // 新增膳食/api/route/21/food
                this.$post(this.$config+'/api/route/'+this.$route.params.id+'/food',this.newMeal,
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.$toast('添加成功');
                    this.getMeals();
                    this.isNewMealShow=false;
                    this.newMeal.title='';
                    this.newMeal.content='';
                    this.newMeal.description='';
                }).catch(err => {
                    this.$toast('添加失败');
                    if(err.response.data.errors){
                        for(var key in err.response.data.errors){
                            this.$toast(err.response.data.errors[key][0]);
                        }
                    }
                    console.log(err)
                });
            },
            editMealShow(index){
                this.edMeal.id=this.meals[index].id;
                this.edMeal.title=this.meals[index].title;
                this.edMeal.content=this.meals[index].content;
                this.edMeal.description=this.meals[index].description;
                this.edMeal.index=index;
                this.isEditMealShow=true;
            },
            editMeal(){
                // 修改膳食信息/api/route/2/food/101
                this.$ajax({
                    method: 'PATCH',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    data:{
                        title:this.edMeal.title,
                        content:this.edMeal.content,
                        description:this.edMeal.description,
                    },
                    url: this.$config+'/api/route/'+this.$route.params.id+'/food/'+this.edMeal.id,
                }).then(res => {
                    if(res.status==200){
                        this.meals[this.edMeal.index].title=this.edMeal.title;
                        this.meals[this.edMeal.index].content=this.edMeal.content;
                        this.meals[this.edMeal.index].description=this.edMeal.description;
                        this.$toast('修改成功');
                        this.isEditMealShow=false;    
                    }else{
                        this.$toast('修改失败');
                    }
                }).catch(err => {
                    this.$toast('修改失败');
                    if(err.response.data.errors){
                        for(var key in err.response.data.errors){
                            this.$toast(err.response.data.errors[key][0]);
                        }
                    }
                    console.log(err)
                });
            },
            delMeal(mealId){
                // 删除膳食
                this.$dialog.confirm({
                    title: '删除膳食',
                    message: '是否删除该膳食'
                }).then(() => {
                    this.$ajax({
                        method: 'DELETE',
                        headers: {
                            "Authorization": 'Bearer '+sessionStorage.token,
                        },
                        url: this.$config+'/api/route/'+this.$route.params.id+'/food/'+mealId,
                    }).then(res => {
                        // console.log(res);
                        if(res.status==204){
                            this.getMeals();
                            this.$toast('删除成功');
                        }else{
                            this.$toast('删除失败');
                        }
                    }).catch(err => {
                        this.$toast('删除失败');
                        console.log(err)
                    });
                }).catch(err => {

                });
            },

        },
  	}
</script>