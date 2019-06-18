<style scoped>
	.dataBank_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;}
    .dataBank_input_form>table{margin-top: 20px;width: 90%;}

    .dataBank_input_form table th{border:1px solid #d6d6d6;height:40px;line-height:40px;padding:0px;margin: 0px;text-align: center;}
    .dataBank_input_form table td{border:1px solid #d6d6d6;height:40px;line-height:40px;padding:0px;margin: 0px;text-align: center;}
    .dataBank_input_form thead{background-color: #ffde01;}
    .dataBank_input_form td>input{padding:0px;margin: 0px;border: none;padding-left: 5px;}
    .form_item_house{width: 100%;min-height:100px;}
    .form_item_house>div{height: 45px;line-height: 45px;}
    .item_input{height:40px;padding-left:10px;outline: none;width: 90%;border-radius: 8px;}
    .editIcon{width:40px;height:40px;line-height: 40px;float: left;margin-left: 5px;}
    .editIcon:hover{cursor: pointer;}
    .editIcon>img{width:25px;height:25px;}

    .active{font-size: 18px;}

    .dataBankAddBtn{width:50px;height: 50px;position: absolute;right: 5px;top: 5px;}
    .dataBankAddBtn:hover{cursor:pointer;}
    .dataBankAddBtn>img{width:50px;height: 50px;}
    
    .editBox{width: 760px;min-height:240px;background-color: #fff;border-radius: 15px;}
    .editBoxContent{width:90%;margin-left: 5%;margin-top:20px;flex-flow:row wrap;justify-content: center;align-items: center;}
    .issure{width:100%;height:50px;margin-top: 20px;margin-bottom: 20px;}
    .issure>button{width:60%;height:50px;margin-left: 20%;background-color: #ffde01;font-size: 16px;border-radius: 8px;border: none;outline: none;}

    .editBtnGroup_rules{width:80%;height:50px;line-height: 50px;}
    .editBtnGroup_rules>img{width:40px;height: 40px;margin-left: 25px;float: right;}
   
    .van-dialog{width:50%;}    
</style>

<template>
    <div style="width:100%;">
        <div class="dataBank_input_form disflex"> 
            <table>
                <thead>
                    <tr>
                        <th>分組編號</th>
                        <th>房間編號</th>
                        <th>班級</th>
                        <th>中文名</th>
                        <th>英文名</th>
                        <th>職責</th>
                        <th>編輯</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(house,index) in houses">
                        <td>{{house.group}}</td>
                        <td>{{house.room}}</td>
                        <td>{{house.class}}</td>
                        <td>{{house.user.name}}</td>
                        <td>{{house.user.en_name}}</td>
                        <td>{{house.duty}}</td>
                        <td width="100px">
                            <div class="editIcon"><img src="/etravel/public/images/edit.png" @click="editHouseShow(index);"></div>
                            <!-- <div class="editIcon"><img src="/etravel/public/images/appointAdd.png" @click="addNewHouseShow();"></div> -->
                            <div class="editIcon"><img src="/etravel/public/images/dele.png" @click="delHouse(house.user_id,house.id);"></div>
                        </td>
                    </tr>
                   
                </tbody>
            </table>   
        </div>
       <!--  <van-popup v-model="isNewHouseShow" :overlay="true">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_house">
                        <div class="item_title">房間</div>
                        <div>
                            <input class="item_input" placeholder="房間編號" type="text"  v-model="newHouse.house_room">
                        </div>
                    </div>
                    <div class="form_item_house">
                        <div class="item_title">班級</div>
                        <div>
                            <input class="item_input" placeholder="班級" type="text"  v-model="newHouse.house_class">
                        </div>
                    </div>
                    <div class="form_item_house">
                        <div class="item_title">学生姓名</div>
                        <div>
                            <input class="item_input" placeholder="学生姓名" type="text"  v-model="newHouse.name">
                        </div>
                    </div>
                    <div class="issure">
                        <button @click="addNewHouse()">添加</button>
                    </div>
                </div>
            </div>
        </van-popup> -->
        <van-popup v-model="isEditHouseShow" :overlay="true">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_house">
                        <div class="item_title">分組編號</div>
                        <div>
                            <input class="item_input" placeholder="填寫分組編號" type="text"  v-model="edHouse.house_group">
                        </div>
                    </div>
                    <div class="form_item_house">
                        <div class="item_title">房間編號</div>
                        <div>
                            <input class="item_input" placeholder="填寫房間編號" type="text"  v-model="edHouse.house_room">
                        </div>
                    </div>
                    <div class="form_item_house">
                        <div class="item_title">班級</div>
                        <div>
                            <input class="item_input" placeholder="填寫班級" type="text"  v-model="edHouse.house_class">
                        </div>
                    </div>
                    <!-- <div class="form_item_house">
                        <div class="item_title">中文名</div>
                        <div>
                            <input class="item_input" placeholder="填寫中文名" type="text"  v-model="edHouse.name">
                        </div>
                    </div>
                    <div class="form_item_house">
                        <div class="item_title">英文名</div>
                        <div>
                            <input class="item_input" placeholder="填寫英文名" type="text"  v-model="edHouse.en_name">
                        </div>
                    </div> -->
                    <div class="form_item_house">
                        <div class="item_title">職責</div>
                        <div>
                            <input class="item_input" placeholder="填寫職責" type="text"  v-model="edHouse.house_duty">
                        </div>
                    </div>
                    <div class="issure">
                        <button @click="editHouse()">修改</button>
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
                houses:[],
                // newHouse:{
                //     house_number:'',
                //     house_class:'',
                //     house_name:'',
                // },
                edHouse:{
                    house_room:'',
                    house_class:'',
                    // name:'',
                    // en_name:'',
                    house_group:'',
                    house_duty:'',
                    id:'',
                    user_id:'',
                    index:'',
                },
                // isNewHouseShow:false,
                isEditHouseShow:false,
            }
        },
        mounted:function(){
            this.getHouses();
        },
        methods:{
            getHouses(){
                // 获取分组分房表信息
                this.$ajax({
                    method: 'GET',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    url: this.$config+'/api/travels/'+sessionStorage.actTravelId+'/groups?include=user.student',
                }).then(res => {
                    // console.log(res.data);
                    this.houses=res.data.data;
                }).catch(err => {
                    this.$toast('獲取失敗');
                    console.log(err);
                });
            },
            // addNewHouseShow(){
            //      this.isNewHouseShow=true;
            // },
            // addNewHouse(){
            //     //新增房間
            //      this.$post(this.$config+'/api/travels/'+sessionStorage.actTravelId+'/categories',this.newHouse,
            //     {
            //         headers: {
            //             "Authorization": 'Bearer '+sessionStorage.token,
            //         }
            //     }).then(res => {
            //         // console.log(res.data);
            //         this.$toast('添加成功');
            //         this.getHouses();
            //         this.isNewHouseShow=false;
            //         this.newHouse.house_number='';
            //         this.newHouse.house_class='';
            //         this.newHouse.house_name='';
            //     }).catch(err => {
            //         this.$toast('添加失敗');
            //         console.log(err)
            //     });
            // },
            editHouseShow(index){
                this.edHouse.id=this.houses[index].id;
                this.edHouse.user_id=this.houses[index].user_id;
                this.edHouse.house_room=this.houses[index].room;
                this.edHouse.house_class=this.houses[index].class;
                // this.edHouse.name=this.houses[index].user.name;
                // this.edHouse.en_name=this.houses[index].user.en_name;
                this.edHouse.house_group=this.houses[index].group;
                this.edHouse.house_duty=this.houses[index].duty;
                this.edHouse.index=index;
                this.isEditHouseShow=true;
            },
            editHouse(){
                // 修改房間表信息
                this.$ajax({
                    method: 'PATCH',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    data:{
                        room:this.edHouse.house_room,
                        class:this.edHouse.house_class,
                        // name:this.edHouse.name,
                        // en_name:this.edHouse.en_name,
                        group:this.edHouse.house_group,
                        duty:this.edHouse.house_duty,
                    },
                    // /api/users/:user/travels/:travel/groups/:group
                    url: this.$config+'/api/users/'+this.edHouse.user_id+'/travels/'+sessionStorage.actTravelId+'/groups/'+this.edHouse.id,
                }).then(res => {
                    if(res.status==200){
                        this.houses[this.edHouse.index].room=this.edHouse.house_room;
                        this.houses[this.edHouse.index].class=this.edHouse.house_class;
                        // this.houses[this.edHouse.index].user.name=this.edHouse.name;
                        // this.houses[this.edHouse.index].user.en_name=this.edHouse.en_name;
                        this.houses[this.edHouse.index].group=this.edHouse.house_group;
                        this.houses[this.edHouse.index].duty=this.edHouse.house_duty;
                        this.$toast('修改成功');
                        this.isEditHouseShow=false;    
                    }else{
                        this.$toast('修改失敗');
                    }
                }).catch(err => {
                    this.$toast('修改失敗');
                    if(err.response.data.errors){
                        for(var key in err.response.data.errors){
                            this.$toast(err.response.data.errors[key][0]);
                        }
                    }else{
                        this.$toast(err.response.data.message);
                    }
                    console.log(err)
                });
            },
            delHouse(userId,houseId){
                // 删除分房信息
                this.$dialog.confirm({
                    title: '删除分組分房表資訊',
                    message: '是否删除該條分組分房表資訊和該團員資訊',
                    cancelButtonText:'取消',
                    cancelButtonColor:'#ccc',
                    confirmButtonText:'確定',
                    confirmButtonColor:'#000',
                }).then(() => {
                    this.$ajax({
                        method: 'DELETE',
                        headers: {
                            "Authorization": 'Bearer '+sessionStorage.token,
                        },
                        url: this.$config+'/api/users/'+userId+'/travels/'+sessionStorage.actTravelId+'/groups/'+houseId,
                    }).then(res => {
                        // console.log(res);
                        if(res.status==204){
                            this.getHouses(); 
                            this.$toast('删除成功');
                        }else{
                            this.$toast('删除失敗');
                        }
                    }).catch(err => {
                        this.$toast('删除失敗');
                        console.log(err)
                    });
                }).catch(err => {

                });
            }
        }
    }
</script>