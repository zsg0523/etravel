<style>
	.dataBank_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;}
    .dataBank_input_form>table{margin-top: 20px;width: 90%;}

    .dataBank_input_form table th{border:1px solid #d6d6d6;height:40px;line-height:40px;padding:0px;margin: 0px;text-align: center;}
    .dataBank_input_form table td{border:1px solid #d6d6d6;height:40px;line-height:40px;padding:0px;margin: 0px;text-align: center;}
    .dataBank_input_form thead{background-color: #ffde01;}
    .dataBank_input_form td>input{padding:0px;margin: 0px;border: none;padding-left: 5px;}
    .form_item{width: 100%;min-height:100px;}
    .form_item>div{height: 45px;line-height: 45px;}
    .item_input{height:40px;padding-left:10px;outline: none;width: 90%;border-radius: 8px;}
    .editIcon{width:40px;height:40px;line-height: 40px;float: left;margin-left: 5px;}
    .editIcon:hover{cursor: pointer;}
    .editIcon>img{width:25px;height:25px;}

    .active{font-size: 18px;}

    .dataBankAddBtn{width:50px;height: 50px;position: absolute;right: 5px;top: 5px;}
    .dataBankAddBtn:hover{cursor:pointer;}
    .dataBankAddBtn>img{width:50px;height: 50px;}
    
    .editBox{width: 600px;min-height:240px;background-color: #fff;border-radius: 15px;}
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
                        <th>房间编号</th>
                        <th>班级</th>
                        <th>学生姓名</th>
                        <th>编辑</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(house,index) in houses">
                        <td>{{house.room}}</td>
                        <td>{{house.user.student.class}}</td>
                        <td>{{house.user.name}}</td>
                        <td>
                            <div class="editIcon"><img src="../../images/edit.png" @click="editHouseShow(index);"></div>
                            <div class="editIcon"><img src="../../images/appointAdd.png" @click="addNewHouseShow();"></div>
                            <div class="editIcon"><img src="../../images/dele.png" @click="delHouse(house.id);"></div>
                        </td>
                    </tr>
                   
                </tbody>
            </table>   
        </div>
        <van-popup v-model="isNewHouseShow" :overlay="true" style="border-radius: 15px;">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item">
                        <div class="item_title">房间</div>
                        <div>
                            <input class="item_input" placeholder="房间编号" type="text"  v-model="newHouse.house_room">
                        </div>
                    </div>
                    <div class="form_item">
                        <div class="item_title">班级</div>
                        <div>
                            <input class="item_input" placeholder="班级" type="text"  v-model="newHouse.house_class">
                        </div>
                    </div>
                    <div class="form_item">
                        <div class="item_title">学生姓名</div>
                        <div>
                            <input class="item_input" placeholder="学生姓名" type="text"  v-model="newHouse.house_name">
                        </div>
                    </div>
                    <div class="issure">
                        <button @click="addNewHouse()">添加</button>
                    </div>
                </div>
            </div>
        </van-popup>
        <van-popup v-model="isEditHouseShow" :overlay="true" style="border-radius: 15px;">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item">
                        <div class="item_title">房间</div>
                        <div>
                            <input class="item_input" placeholder="房间编号" type="text"  v-model="edHouse.house_room">
                        </div>
                    </div>
                    <div class="form_item">
                        <div class="item_title">班级</div>
                        <div>
                            <input class="item_input" placeholder="班级" type="text"  v-model="edHouse.house_class">
                        </div>
                    </div>
                    <div class="form_item">
                        <div class="item_title">学生姓名</div>
                        <div>
                            <input class="item_input" placeholder="学生姓名" type="text"  v-model="edHouse.house_name">
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
                newHouse:{
                    house_number:'',
                    house_class:'',
                    house_name:'',
                },
                edHouse:{
                    edHouse_room:'',
                    edHouse_class:'',
                    edHouse_name:'',
                    id:'',
                    user_id:'',
                    index:'',
                },
                isNewHouseShow:false,
                isEditHouseShow:false,
            }
        },
        mounted:function(){
            this.getHouses();
        },
        methods:{
            getHouses(){
                // 获取分房表信息
                this.$ajax({
                    method: 'GET',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    url: '/api/travels/'+sessionStorage.actTravelId+'/groups?include=user.student',
                }).then(res => {
                    // console.log(res.data);
                    this.houses=res.data.data;
                }).catch(err => {
                    this.$toast('获取失败');
                    console.log(err);
                });
            },
            addNewHouseShow(){
                 this.isNewHouseShow=true;
            },
            addNewHouse(){
                //新增房间
                 this.$post('/api/travels/'+sessionStorage.actTravelId+'/categories',this.newHouse,
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.$toast('添加成功');
                    this.getPromises();
                    this.isNewHouseShow=false;
                    this.newHouse.house_number='';
                }).catch(err => {
                    this.$toast('添加失败');
                    console.log(err)
                });
            },
            editHouseShow(index){
                this.edHouse.id=this.houses[index].id;
                this.edHouse.user_id=this.houses[index].user_id;
                this.edHouse.house_room=this.houses[index].room;
                this.edHouse.house_class=this.houses[index].user.student.class;
                this.edHouse.house_name=this.houses[index].user.name;
                this.edHouse.index=index;
                this.isEditHouseShow=true;
            },
            editHouse(){
                // 修改房间表信息
                this.$ajax({
                    method: 'PATCH',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    data:{
                        room:this.edHouse.house_room,
                        class:this.edHouse.house_class,
                        name:this.edHouse.house_name,
                    },
                    // /api/users/:user/travels/:travel/groups/:group
                    url: '/api/users/'+this.edHouse.user_id+'/travels/'+sessionStorage.actTravelId+'/groups/'+this.edHouse.id,
                }).then(res => {
                    if(res.status==200){
                        this.houses[this.edHouse.index].room=this.edHouse.house_room;
                        this.houses[this.edHouse.index].user.student.class=this.edHouse.house_class;
                        this.houses[this.edHouse.index].user.name=this.edHouse.house_name;
                        this.$toast('修改成功');
                        this.isEditHouseShow=false;    
                    }else{
                        this.$toast('修改失败');
                    }
                }).catch(err => {
                    this.$toast('修改失败');
                    console.log(err)
                });
            },
            delHouse(houseId){
                // 删除分房信息
                this.$dialog.confirm({
                    title: '删除分房表信息',
                    message: '是否删除该分房'
                }).then(() => {
                    this.$ajax({
                        method: 'DELETE',
                        headers: {
                            "Authorization": 'Bearer '+sessionStorage.token,
                        },
                        url: '/api/users/'+this.edHouse.user_id+'/travels/'+sessionStorage.actTravelId+'/groups/'+this.edHouse.id,
                    }).then(res => {
                        // console.log(res);
                        if(res.status==204){
                            this.getHouses();
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
            }
        }
    }
</script>