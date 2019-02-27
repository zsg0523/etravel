<style type="text/css">
    .students{width: 100%;min-height: 700px;justify-content: flex-start;align-items:center;flex-direction: column;}
    .studentsList{width: 100%;height: 100%;justify-content: flex-start;flex-direction: row;}
    .students_left{width: 18%;min-height:100%;border-right: 3px solid #d6d6d6;}
    .students_left>ul{width: 100%;height: auto;}
    .students_left>ul>li{width: 100%;height:50px;line-height: 50px;font-size: 18px;}
    .students_left>ul>li>div{width: 90%;height:50px;line-height: 50px;margin-left: 5%;overflow: hidden;}
    .left_title{justify-content: space-between;align-items:center;}
    .left_title_icon{width: auto;height: auto; }
    .left_title_icon>div{width: 40px;height: 40px;line-height: 40px;float: left;text-align: center;margin-right: 5px;}
    .left_title_icon>div:hover{cursor: pointer;}
    .left_title_icon>div>img{width:30px;height:30px;}
    .students_right{width: 82%;min-height:100%;justify-content: flex-start;align-items:center;flex-direction: column;}
    .students_right_title{width: 100%;height: 50px;line-height: 50px;border-bottom: 1px solid #ccc;}
    .search_input{width: 100%;height: 50px;justify-content: center;align-items:center;font-size: 18px;}
    .search_input>input{width: 30%;height: 40px;border-radius: 8px;outline: none;padding-left:10px;}
    .search_icon{width: 50px;height: 50px;}
    .search_icon>img{width:40px;height: 40px}
    .search_icon>img:hover{cursor: pointer;}

    .students_input_form{width: 100%;min-height:600px;justify-content: center;align-items:flex-start;font-size: 18px;position: relative;}
    .form_content_student{width: 70%;min-height: 600px;align-content:flex-start;flex-direction: row;flex-wrap: wrap;}
    .form_item_student{width: 50%;height:100px;}
    .form_item_student>div{width: 94%;margin-left: 3%;height: 45px;line-height: 45px;}
    .form_item{width: 100%;height:100px;}
    .form_item>div{width: 97%;margin-left: 1.5%;height: 45px;line-height: 45px;}
    .form_item_small{width: 100%;height:80px;}
    .form_item_small>div{width: 97%;margin-left: 1.5%;height: 40px;line-height: 40px;}
    .item_input{height:40px;padding-left:10px;outline: none;width: 90%;border-radius: 8px;}
    .studentEditBtn{width:50px;height: 50px;position: absolute;right: 5px;top: 5px;}
    .studentEditBtn:hover{cursor:pointer;}
    .studentEditBtn>img{width:50px;height: 50px;}
    .act{background-color: #ffde01;}

    .editBox{width: 600px;min-height:240px;background-color: #fff;border-radius: 15px;font-size: 16px;}
    .editBoxContent{width:90%;margin-left: 5%;margin-top:20px;flex-flow:row wrap;justify-content: center;align-items: center;}
    .editBoxTitle{width:100%;height:50px;text-align: center;line-height: 50px;font-size: 18px;}
    .issureStu{width:100%;height:50px;margin-top: 20px;margin-bottom: 20px;}
    .issureBtn{width:60%;height:50px;margin-left: 20%;background-color: #ffde01;font-size: 16px;border-radius: 8px;border: none;outline: none;}
    .twoBtn{width:40%;margin-left:5%;margin-right:5%;float:left;height:50px;font-size: 16px;border-radius: 8px;outline: none;}
    .cancel{background-color:#fff;border:1px solid #ccc;}
    .van-dialog{width:50%;}
    .err{color:red;float: right;font-size: 14px;}

</style>

<template>
    <div class="students disflex">
        <div class="studentsList disflex">
            <div class="students_left">
                <ul style="padding: 0;margin:0;">
                    <li>
                        <div class="left_title disflex">
                            <span>学员信息</span>
                            <div class="left_title_icon">
                                <div @click="delStudent()"> 
                                    <img src="/etravel/public/images/dele-inf.png" alt="">
                                </div>
                                <div @click="addNewStudentShow()">
                                    <img src="/etravel/public/images/add-inf.png" alt="">
                                </div>
                            </div>
                        </div> 
                    </li>
                    <li v-for="(student,index) in students" :class="leftTabAct(index)" @click="changeActIndex(index)"><div>{{student.user.name}}</div></li>
                </ul>
            </div>
            <div class="students_right disflex">
                <div class="students_right_title">
                    <div class="search_input disflex">
                        <input type="text" placeholder="请输入想查找的ID" v-model="searchId">
                        <div class="search_icon" @click="toSearchStudent()">
                            <img src="/etravel/public/images/search.png">
                        </div>
                    </div>
                </div>
                <div class="students_input_form disflex" v-if="students!=''">
                    <div class="form_content_student disflex"> 
                        <div class="form_item_student">
                            <div class="item_title">用户ID</div>
                            <div><input class="item_input" type="text" placeholder="填写用户ID" disabled="disabled" :value="students[actIndex].user.id"></div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">学生密码</div>
                            <div><input class="item_input" type="text" placeholder="填写学生密码" disabled="disabled" :value="students[actIndex].user.original_password"></div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">学生中文名</div>
                            <div><input class="item_input" type="text" placeholder="填写学生中文名" disabled="disabled" :value="students[actIndex].user.name"></div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">学生英文名</div>
                            <div><input class="item_input" type="text" placeholder="填写学生英文名" disabled="disabled" :value="students[actIndex].user.en_name"></div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">联系电话</div>
                            <div><input class="item_input" type="text" placeholder="填写联系电话" disabled="disabled" :value="students[actIndex].user.phone"></div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">学生学号</div>
                            <div><input class="item_input" type="text" placeholder="填写学生学号" disabled="disabled" :value="students[actIndex].student_number"></div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">学生班级</div>
                            <div><input class="item_input" type="text"  placeholder="填写学生班级" disabled="disabled" :value="students[actIndex].class"></div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">学生房间号</div>
                            <div><input class="item_input" type="text"  placeholder="填写学生房间号" disabled="disabled" :value="students[actIndex].room"></div>
                        </div>
                        <div class="form_item">
                            <div class="item_title">学生职责</div>
                            <div><input class="item_input" type="text"  placeholder="填写学生职责" disabled="disabled" :value="students[actIndex].duty"></div>
                        </div>
                    </div>
                    <div class="studentEditBtn" @click="editStudentShow()">
                        <img src="/etravel/public/images/editAll.png">
                    </div>
                    <van-popup v-model="isEditStudentShow" :overlay="true" style="border-radius: 15px;">
                        <div class="editBox" >
                            <div class="editBoxContent disflex">
                                <div class="form_item_small">
                                    <div class="item_title">用户ID</div>
                                    <div><input class="item_input" type="text" placeholder="填写用户ID" disabled="disabled" v-model="edStudent.id"></div>
                                </div>
                                <div class="form_item_small">
                                    <div class="item_title">学生密码</div>
                                    <div><input class="item_input" type="text" placeholder="填写学生密码" v-model="edStudent.original_password"></div>
                                </div>
                                <div class="form_item_small">
                                    <div class="item_title">学生中文名<span class="err" v-if="errors.name" v-text="errors.name[0]"></span></div>
                                    <div><input class="item_input" type="text" placeholder="填写学生中文名" v-model="edStudent.name"></div>
                                </div>
                                <div class="form_item_small">
                                    <div class="item_title">学生英文名<span class="err" v-if="errors.en_name" v-text="errors.en_name[0]"></span></div>
                                    <div><input class="item_input" type="text" placeholder="填写学生英文名" v-model="edStudent.en_name"></div>
                                </div>
                                <div class="form_item_small">
                                    <div class="item_title">联系电话<span class="err" v-if="errors.phone" v-text="errors.phone[0]"></span></div>
                                    <div><input class="item_input" type="text" placeholder="填写联系电话" v-model="edStudent.phone"></div>
                                </div>
                                <div class="form_item_small">
                                    <div class="item_title">学生学号<span class="err" v-if="errors.student_number" v-text="errors.student_number[0]"></span></div>
                                    <div><input class="item_input" type="text" placeholder="填写学生学号" v-model="edStudent.student_number"></div>
                                </div>
                                <div class="form_item_small">
                                    <div class="item_title">学生班级<span class="err" v-if="errors.class" v-text="errors.class[0]"></span></div>
                                    <div><input class="item_input" type="text"  placeholder="填写学生班级" v-model="edStudent.class"></div>
                                </div>
                                <div class="form_item_small">
                                    <div class="item_title">学生房间号<span class="err" v-if="errors.room" v-text="errors.room[0]"></span></div>
                                    <div><input class="item_input" type="text"  placeholder="填写学生房间号" v-model="edStudent.room"></div>
                                </div>
                                <div class="form_item_small">
                                    <div class="item_title">学生职责<span class="err" v-if="errors.duty" v-text="errors.duty[0]"></span></div>
                                    <div><input class="item_input" type="text"  placeholder="填写学生职责" v-model="edStudent.duty"></div>
                                </div>
                                <div class="issureStu">
                                    <button class="issureBtn" @click="editStudent()">修改</button>
                                </div>
                            </div>
                        </div>
                    </van-popup>
                </div>
            </div>
            <van-popup v-model="isNewStudentShow" :overlay="true" style="border-radius: 15px;">
                <div class="editBox" >
                    <div class="editBoxContent disflex">
                        <div class="form_item">
                            <div class="item_title">学生密码</div>
                            <div><input class="item_input" type="text" placeholder="填写学生密码" v-model="newStudent.original_password"></div>
                        </div>
                        <div class="form_item">
                            <div class="item_title">学生中文名<span class="err" v-if="errors.name" v-text="errors.name[0]"></span></div>
                            <div><input class="item_input" type="text" placeholder="填写学生中文名" v-model="newStudent.name"></div>
                        </div>
                        <div class="form_item">
                            <div class="item_title">学生英文名<span class="err" v-if="errors.en_name" v-text="errors.en_name[0]"></span></div>
                            <div><input class="item_input" type="text" placeholder="填写学生英文名" v-model="newStudent.en_name"></div>
                        </div>
                        <div class="form_item">
                            <div class="item_title">联系电话<span class="err" v-if="errors.phone" v-text="errors.phone[0]"></span></div>
                            <div><input class="item_input" type="text" placeholder="填写联系电话" v-model="newStudent.phone"></div>
                        </div>
                        <div class="form_item">
                            <div class="item_title">学生学号<span class="err" v-if="errors.student_number" v-text="errors.student_number[0]"></span></div>
                            <div><input class="item_input" type="text" placeholder="填写学生学号" v-model="newStudent.student_number"></div>
                        </div>
                        <div class="form_item">
                            <div class="item_title">学生班级<span class="err" v-if="errors.class" v-text="errors.class[0]"></span></div>
                            <div><input class="item_input" type="text"  placeholder="填写学生班级" v-model="newStudent.class"></div>
                        </div>
                        <div class="form_item">
                            <div class="item_title">学生房间号<span class="err" v-if="errors.room" v-text="errors.room[0]"></span></div>
                            <div><input class="item_input" type="text"  placeholder="填写学生房间号" v-model="newStudent.room"></div>
                        </div>
                        <div class="form_item">
                            <div class="item_title">学生职责<span class="err" v-if="errors.duty" v-text="errors.duty[0]"></span></div>
                            <div><input class="item_input" type="text"  placeholder="填写学生职责" v-model="newStudent.duty"></div>
                        </div>
                        <div class="issureStu">
                            <button class="issureBtn" @click="addNewStudent()">添加</button>
                        </div>
                    </div>
                </div>
            </van-popup>
            <van-popup v-model="isSearchStudentShow" :overlay="true" style="border-radius: 15px;">
                <div class="editBox" >
                    <div class="editBoxContent disflex">
                        <div class="form_item_small">
                            <div class="item_title">用户ID</div>
                            <div><input class="item_input" type="text" placeholder="填写用户ID" disabled="disabled" :value="searchStudent.id"></div>
                        </div>
                        <div class="form_item_small">
                            <div class="item_title">学生密码</div>
                            <div><input class="item_input" type="text" placeholder="填写学生密码" disabled="disabled" :value="searchStudent.original_password"></div>
                        </div>
                        <div class="form_item_small">
                            <div class="item_title">学生中文名</div>
                            <div><input class="item_input" type="text" placeholder="填写学生中文名" disabled="disabled" :value="searchStudent.name"></div>
                        </div>
                        <div class="form_item_small">
                            <div class="item_title">学生英文名</div>
                            <div><input class="item_input" type="text" placeholder="填写学生英文名" disabled="disabled" :value="searchStudent.en_name"></div>
                        </div>
                        <div class="form_item_small">
                            <div class="item_title">联系电话</div>
                            <div><input class="item_input" type="text" placeholder="填写联系电话" disabled="disabled" v-model="searchStudent.phone"></div>
                        </div>
                        <div class="form_item_small">
                            <div class="item_title">学生学号<span class="err" v-if="errors.student_number" v-text="errors.student_number[0]"></span></div>
                            <div><input class="item_input" type="text" placeholder="填写学生学号" v-model="searchStudent.student_number"></div>
                        </div>
                        <div class="form_item_small">
                            <div class="item_title">学生班级<span class="err" v-if="errors.class" v-text="errors.class[0]"></span></div>
                            <div><input class="item_input" type="text"  placeholder="填写学生班级" v-model="searchStudent.class"></div>
                        </div>
                        <div class="form_item_small">
                            <div class="item_title">学生房间号<span class="err" v-if="errors.room" v-text="errors.room[0]"></span></div>
                            <div><input class="item_input" type="text"  placeholder="填写学生房间号" v-model="searchStudent.room"></div>
                        </div>
                        <div class="form_item_small">
                            <div class="item_title">学生职责<span class="err" v-if="errors.duty" v-text="errors.duty[0]"></span></div>
                            <div><input class="item_input" type="text"  placeholder="填写学生职责" v-model="searchStudent.duty"></div>
                        </div>
                        <div class="issureStu">
                            <button class="twoBtn cancel" @click="cancelAdd()">取消</button>
                            <button class="twoBtn" style="background-color:#ffde01;border:none;" @click="addOldStudent()">添加学员</button>
                        </div>
                    </div>
                </div>
            </van-popup>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                students:[],
                newStudent:{
                    name:'',
                    en_name:'',
                    phone:'',
                    original_password:'',
                    add_by:sessionStorage.userId,
                    travel_id:sessionStorage.actTravelId,
                    student_number:'',
                    class:'',
                    duty:'',
                    room:'',
                },
                edStudent:{
                    id:'',
                    name:'',
                    en_name:'',
                    phone:'',
                    original_password:'',
                    add_by:sessionStorage.userId,
                    travel_id:sessionStorage.actTravelId,
                    student_number:'',
                    class:'',
                    duty:'',
                    room:'',
                    user_id:'',
                },
                searchStudent:{
                    id:'',
                    name:'',
                    en_name:'',
                    phone:'',
                    original_password:'',
                    student_number:'',
                    class:'',
                    duty:'',
                    room:'', 
                },
                isNewStudentShow:false,
                isEditStudentShow:false,
                isSearchStudentShow:false,
                actIndex:0,
                searchId:'',
                errors:{},
            }
        },
        mounted:function(){
            this.getStudents();
        },
        methods:{
            getStudents(){
                // 获取学员信息/api/travels/1/groups?include=user.student.school
                this.$ajax({
                    method: 'GET',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    url: this.$config+'/api/travels/'+sessionStorage.actTravelId+'/groups?include=user.student.school',
                }).then(res => {
                    // console.log(res.data);
                    this.students=res.data.data;
                }).catch(err => {
                    this.$toast('获取失败');
                    console.log(err);
                });
            },
            addNewStudentShow(){
                this.errors={};
                this.isNewStudentShow=true;
            },
            addNewStudent(){
                // 新增学员信息/api/userGroup
                this.$post(this.$config+'/api/userGroup',this.newStudent,
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res.data);
                    this.$toast('添加成功');
                    this.getStudents();
                    this.isNewStudentShow=false;
                    this.newStudent.name='';
                    this.newStudent.en_name='';
                    this.newStudent.phone='';
                    this.newStudent.original_password='';
                    this.newStudent.student_number='';
                    this.newStudent.duty='';
                    this.newStudent.room='';
                    this.newStudent.class='';

                }).catch(err => {
                    this.$toast('添加失败');
                    this.errors=err.response.data.errors;
                    console.log(err.response.data);
                });
            },
            editStudentShow(){
                this.edStudent.id=this.students[this.actIndex].user.id;
                this.edStudent.original_password=this.students[this.actIndex].user.original_password;
                this.edStudent.name=this.students[this.actIndex].user.name;
                this.edStudent.en_name=this.students[this.actIndex].user.en_name;
                this.edStudent.phone=this.students[this.actIndex].user.phone;
                this.edStudent.student_number=this.students[this.actIndex].student_number;
                this.edStudent.class=this.students[this.actIndex].class;
                this.edStudent.duty=this.students[this.actIndex].duty;
                this.edStudent.room=this.students[this.actIndex].room;
                this.edStudent.user_id=this.students[this.actIndex].user_id;
                this.errors={};
                this.isEditStudentShow=true;

            },
            editStudent(){
                // 修改学员信息信息/api/users/:user/groups/:group/information
                this.$ajax({
                    method: 'PATCH',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    data:{
                        original_password:this.edStudent.original_password, 
                        name:this.edStudent.name, 
                        en_name:this.edStudent.en_name, 
                        phone:this.edStudent.phone, 
                        student_number:this.edStudent.student_number, 
                        class:this.edStudent.class, 
                        duty:this.edStudent.duty, 
                        room:this.edStudent.room,
                        user_id:this.edStudent.user_id,  
                    },
                    url: this.$config+'/api/users/'+this.edStudent.user_id+'/groups/'+this.edStudent.id+'/information',
                }).then(res => {
                    if(res.status==200){
                        this.students[this.actIndex].user.original_password=this.edStudent.original_password;
                        this.students[this.actIndex].user.name=this.edStudent.name;
                        this.students[this.actIndex].user.en_name=this.edStudent.en_name;
                        this.students[this.actIndex].user.phone=this.edStudent.phone;
                        this.students[this.actIndex].student_number=this.edStudent.student_number;
                        this.students[this.actIndex].class=this.edStudent.class;
                        this.students[this.actIndex].duty=this.edStudent.duty;
                        this.students[this.actIndex].room=this.edStudent.room;
                        this.$toast('修改成功');
                        this.isEditStudentShow=false;    
                    }else{
                        this.$toast('修改失败');
                    }
                }).catch(err => {
                    this.$toast('修改失败');
                    this.errors=err.response.data.errors;

                });
            },
            delStudent(){
                // 删除学员信息/api/users/:user/travels/:travel/groups/:group
                this.$dialog.confirm({
                    title: '删除学员信息',
                    message: '是否删除该学员信息'
                }).then(() => {
                    this.$ajax({
                        method: 'DELETE',
                        headers: {
                            "Authorization": 'Bearer '+sessionStorage.token,
                        },
                        url: this.$config+'/api/users/'+this.students[this.actIndex].user_id+'/travels/'+sessionStorage.actTravelId+'/groups/'+this.students[this.actIndex].id,
                    }).then(res => {
                        // console.log(res);
                        if(res.status==204){
                            this.actIndex=0;
                            this.getStudents();
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
            searchStudentShow(){
                this.errors={};
                this.isSearchStudentShow=true;
            },
            toSearchStudent(){
                // 搜索学员
                if(this.searchId!=''){
                    this.$ajax({
                        method: 'GET',
                        headers: {
                            "Authorization": 'Bearer '+sessionStorage.token,
                        },
                        url: this.$config+'/api/users/'+this.searchId+'/userInfo',
                    }).then(res => {
                        // console.log(res.data);
                        this.searchStudent.id=res.data.id;
                        this.searchStudent.name=res.data.name;
                        this.searchStudent.en_name=res.data.en_name;
                        this.searchStudent.phone=res.data.phone;
                        this.searchStudent.original_password=res.data.original_password;
                        this.searchStudentShow();
                    }).catch(err => {
                        this.$toast('请输入正确的用户ID');
                        // console.log(err);
                    });
                }else{
                    this.$toast('请输入用户ID');
                }  
            },
            cancelAdd(){
                this.searchId='';
                this.searchStudent={};
                this.isSearchStudentShow=false;
            },
            addOldStudent(){
                // 添加已有用户到旅游/api/users/:user/travels/:travel/groups
                this.$post(this.$config+'/api/users/'+this.searchStudent.id+'/travels/'+sessionStorage.actTravelId+'/groups',
                {
                    phone:this.searchStudent.phone,
                    student_number: this.searchStudent.student_number,
                    class: this.searchStudent.class,
                    duty: this.searchStudent.duty,
                    room: this.searchStudent.room,
                },
                {
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    }
                }).then(res => {
                    // console.log(res);
                    this.$toast('添加成功');
                    this.getStudents();
                    this.searchId='';
                    this.searchStudent={}; 
                    this.isSearchStudentShow=false;

                }).catch(err => {
                    console.log(err.response);
                    this.$toast('添加失败');
                    this.errors=err.response.data.errors;
                    // if(err.response.data.errors.duty){
                    //     this.$toast(err.response.data.errors.duty[0]);
                    // }
                    // if(err.response.data.errors.room){
                    //     this.$toast(err.response.data.errors.room[0]);
                    // }
                });
            },
            changeActIndex(index){
                this.actIndex=index;
            },
            leftTabAct(index){
                return {
                    act: index==this.actIndex? true:false,
                }
            },
        },
    }
</script>