<style scoped>
    .dataBank_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;}
    .dataBank_input_form>table{margin-top: 20px;width: 96%;}

    .dataBank_input_form table th{border:1px solid #d6d6d6;height:40px;line-height:40px;padding:0px;margin: 0px;text-align: center;}
    .dataBank_input_form table td{border:1px solid #d6d6d6;height:40px;line-height:40px;padding:0px;margin: 0px;text-align: center;}

    .dataBank_input_form thead{background-color: #ffde01;}
    .dataBank_input_form thead th{text-align: center;}
    .dataBank_input_form td>input{padding:0px;margin: 0px;border: none;padding-left: 5px;}

    .form_item_group{width: 100%;min-height:100px;}
    .form_item_group>div{height: 45px;line-height: 45px;}
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
                        <th>編號</th>
                        <th>班級</th>
                        <th>學生姓名</th>
                        <th>房號</th>
                        <th>職責</th>
                        <th>編輯</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <tr>
                        <td>編號</td>
                        <td>班級</td>
                        <td>名字</td>
                        <td>房號</td>
                        <td>職責</td>
                        <td width="100px">
                            <div class="editIcon"><img src="/etravel/public/images/edit.png"></div>
                            <div class="editIcon"><img src="/etravel/public/images/appointAdd.png"></div>
                            <div class="editIcon"><img src="/etravel/public/images/dele.png"></div>
                        </td>
                    </tr> -->
                    <tr v-for="(group,index) in groups">
                        <td>{{index+1}}</td>
                        <td>{{group.class}}</td>
                        <td>{{group.user.name}}</td>
                        <td>{{group.room}}</td>
                        <td>{{group.duty}}</td>
                        <td width="100px">
                            <div class="editIcon" name="編輯"><img src="/etravel/public/images/edit.png" @click="editGroupShow(index);"></div>
                           <!--  <div class="editIcon"><img src="/etravel/public/images/appointAdd.png" @click="addGroupShow();"></div> -->
                            <div class="editIcon" name="删除"><img src="/etravel/public/images/dele.png" @click="delGroup(group.user_id,group.id);"></div>
                        </td>
                    </tr>
                </tbody>
            </table>   
        </div>
        <!-- <van-popup v-model="isNewGroupShow" :overlay="true">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_group">
                        <div class="item_title">班級</div>
                        <div>
                            <input class="item_input" placeholder="班級" type="text"  v-model="newGroup.group_class">
                        </div>
                    </div>
                    <div class="form_item_group">
                        <div class="item_title">學生姓名</div>
                        <div>
                            <input class="item_input" placeholder="學生姓名" type="text"  v-model="newGroup.group_name">
                        </div>
                    </div>
                    <div class="form_item_group">
                        <div class="item_title">房號</div>
                        <div>
                            <input class="item_input" placeholder="房號" type="text"  v-model="newGroup.group_room">
                        </div>
                    </div>
                    <div class="form_item_group">
                        <div class="item_title">職責</div>
                        <div>
                            <input class="item_input" placeholder="職責" type="text"  v-model="newGroup.group_duty">
                        </div>
                    </div>
                    <div class="issure">
                        <button @click="addGroup()">添加</button>
                    </div>
                </div>
            </div>
        </van-popup> -->
        <van-popup v-model="isEditGroupShow" :overlay="true">
            <div class="editBox" >
                <div class="editBoxContent disflex">
                    <div class="form_item_group">
                        <div class="item_title">班級</div>
                        <div>
                            <input class="item_input" placeholder="班級" type="text" disabled="disabled"  v-model="edGroup.group_class">
                        </div>
                    </div>
                    <div class="form_item_group">
                        <div class="item_title">學生姓名</div>
                        <div>
                            <input class="item_input" placeholder="學生姓名" type="text" disabled="disabled"  v-model="edGroup.group_name">
                        </div>
                    </div>
                    <div class="form_item_group">
                        <div class="item_title">房號</div>
                        <div>
                            <input class="item_input" placeholder="房號" type="text"  v-model="edGroup.group_room">
                        </div>
                    </div>
                    <div class="form_item_group">
                        <div class="item_title">職責</div>
                        <div>
                            <input class="item_input" placeholder="職責" type="text"  v-model="edGroup.group_duty">
                        </div>
                    </div>
                    <div class="issure">
                        <button @click="editGroup()">修改</button>
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
                groups:'',
                // newGroup:{
                //     group_room:'',
                //     group_class:'',
                //     group_name:'',
                //     group_duty:'',
                // },
                edGroup:{
                    group_room:'',
                    group_class:'',
                    group_name:'',
                    group_duty:'',
                    id:'',
                    user_id:'',
                    index:'',
                },
                isNewGroupShow:false,
                isEditGroupShow:false,
            }
        },
        mounted:function(){
            this.getGroups();
        },
        methods:{
            getGroups(){
                // 获取分组詳情
                this.$get(this.$config+'/api/travels/'+sessionStorage.actTravelId+'/groups?include=user.student',
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.groups=res.data.data;
                }).catch(err => {
                    this.$toast('獲取失敗');
                    console.log(err);
                });
            },
            // addGroupShow(){
            //     this.isNewGroupShow=true;
            // },
            // addGroup(){
            //     //新增房間api/users/:user/travels/:travel/groups
            //      this.$post(this.$config+'/ap/users'+sessionStorage.user_id+'/travels/'+sessionStorage.actTravelId+'/groups',this.newGroup,
            //     {
            //         headers: {
            //             "Authorization": 'Bearer '+sessionStorage.token,
            //         }
            //     }).then(res => {
            //         // console.log(res.data);
            //         this.$toast('添加成功');
            //         this.getGroups();
            //         this.isNewGroupShow=false;
            //         this.newGroup.group_room='';
            //         this.newGroup.group_class='';
            //         this.newGroup.group_name='';
            //         this.newGroup.group_duty='';
            //     }).catch(err => {
            //         this.$toast('添加失败');
            //         console.log(err)
            //     });
            // },
            editGroupShow(index){
                this.edGroup.id=this.groups[index].id;
                this.edGroup.group_name=this.groups[index].user.name;
                this.edGroup.group_class=this.groups[index].class;
                this.edGroup.group_room=this.groups[index].room;
                this.edGroup.group_duty=this.groups[index].duty;
                 this.edGroup.user_id=this.groups[index].user_id;
                this.edGroup.index=index;
                this.isEditGroupShow=true;
            },
            editGroup(){
                // 修改信息
                this.$ajax({
                    method: 'PATCH',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    data:{
                        room:this.edGroup.group_room,
                        // class:this.edGroup.group_class,
                        // name:this.edGroup.group_name,
                        duty:this.edGroup.group_duty,
                    },
                    // /api/users/:user/travels/:travel/groups/:group
                    url: this.$config+'/api/users/'+this.edGroup.user_id+'/travels/'+sessionStorage.actTravelId+'/groups/'+this.edGroup.id,
                }).then(res => {
                    if(res.status==200){
                        this.groups[this.edGroup.index].user.name=this.edGroup.group_name;
                        this.groups[this.edGroup.index].class=this.edGroup.group_class;
                        this.groups[this.edGroup.index].room=this.edGroup.group_room;
                        this.groups[this.edGroup.index].duty=this.edGroup.group_duty;
                        this.$toast('修改成功');
                        this.isEditGroupShow=false;    
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
            delGroup(userId,groupId){
                // 删除分房信息
                this.$dialog.confirm({
                    title: '删除分组信息',
                    message: '是否删除該分组',
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
                        url: this.$config+'/api/users/'+userId+'/travels/'+sessionStorage.actTravelId+'/groups/'+groupId,
                    }).then(res => {
                        // console.log(res);
                        if(res.status==204){
                            this.getGroups();
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