<style type="text/css">
    .students{width: 100%;min-height: 700px;justify-content: flex-start;align-items:center;flex-direction: column;}
    .studentsList{width: 100%;height: auto;justify-content: flex-start;flex-direction: row;}
    .students_left{width: 18%;min-height:100%;border-right: 3px solid #d6d6d6;}
    .students_left>ul{width: 100%;height: auto;}
    .students_left>ul>li{width: 100%;height:50px;line-height: 50px;font-size: 18px;}
    .students_left>ul>li>div{width: 90%;height:50px;line-height: 50px;margin-left: 5%;overflow: hidden;}
    .left_title{justify-content: space-between;align-items:center;}
    .left_title img{width: 40px;height: 40px;}
    .left_title img:hover{cursor: pointer;}
    .left_title_icon{width: auto;height: auto; }
    .left_title_icon>div{width: 40px;height: 40px;line-height: 40px;float: left;text-align: center;}
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
    .item_input{height:40px;padding-left:10px;outline: none;width: 90%;border-radius: 8px;}
    .item_checkbox>div{width:30%;height:40px;line-height: 40px;float: left;}
    .item_checkbox>div>input{width:35px;height: 35px;border-radius: 5px;background-color: #ccc;}
    .studentEditBtn{width:50px;height: 50px;position: absolute;right: 5px;top: 5px;}
    .studentEditBtn:hover{cursor:pointer;}
    .studentEditBtn>img{width:50px;height: 50px;}
    .studentComfirm{width:100%;height: 50px;font-size: 16px;align-items: center;justify-content: center;}
    .btnItem{width:160px;height: 50px;}
    .btnItem>button{width:80%;height: 40px;line-height: 40px;border-radius: 8px;}
    .act{background-color: #ffde01;}
    .cancel{background-color: #fff;border:1px solid #ffde01;}
    .ensure{background-color: #ffde01;}
</style>

<template>
    <div class="students disflex">
        <div class="studentsList disflex">
            <div class="students_left">
                <ul style="padding: 0;margin:0;">
                    <li>
                        <div class="left_title disflex">
                            <span>填写信息</span>
                            <div class="left_title_icon">
                                <div>
                                    <img src="/etravel/public/images/del_y.png" alt="">
                                </div>
                                <div>
                                    <img src="/etravel/public/images/add_y.png" alt="">
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
                        <input type="text" name="studentSearch">
                        <div class="search_icon">
                            <img src="/etravel/public/images/search.png">
                        </div>
                    </div>
                </div>
                <div class="students_input_form disflex">
                    <div class="form_content_student disflex" v-if="students!=''">
                        <div class="form_item_student">
                            <div class="item_title">学生ID</div>
                            <div><input class="item_input" type="text" placeholder="填写学生ID" :value="students[actIndex].user.id"></div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">学生密码</div>
                            <div><input class="item_input" type="text" placeholder="填写学生密码" :value="students[actIndex].user.original_password"></div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">学生姓名</div>
                            <div><input class="item_input" type="text" placeholder="填写学生姓名" :value="students[actIndex].user.name"></div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">学生年级</div>
                            <div><input class="item_input" type="text" placeholder="填写学生年级" :value="students[actIndex].user.student.grade"></div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">学生班级</div>
                            <div><input class="item_input" type="text"  placeholder="填写学生班级":value="students[actIndex].user.student.class"></div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">学生学号</div>
                            <div><input class="item_input" type="text" placeholder="填写学生学号" :value="students[actIndex].user.student.student_number"></div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">电话</div>
                            <div><input class="item_input" type="text" placeholder="填写电话" :value="students[actIndex].user.phone"></div>
                        </div>
                    </div>
                    <div class="studentEditBtn">
                        <img src="/etravel/public/images/editAll.png">
                    </div>
                </div>
                <!-- <div class="studentComfirm disflex">
                    <div class="btnItem"><button class="cancel">取消</button></div>
                    <div class="btnItem"><button class="ensure">确定</button></div>
                </div> -->
                
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                students:[],
                newStudent:{
                    title:'',
                    content:'',
                    sites:'',
                },
                edStudent:{
                    id:'',
                    title:'',
                    content:'',
                    sites:'',
                    index:'',
                },
                actIndex:0,
                isNewStudentShow:false,
                isEditStudentShow:false,
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
            // addNewStudentShow(){
            //     this.isNewStudentShow=true;
            // },
            // addNewStudent(){
            //     // 新增学员信息/api/route/21/food
            //     this.$post(this.$config+'/api/travels/'+sessionStorage.actTravelId+'/Students',this.newStudent,
            //     {
            //         headers: {
            //             "Authorization": 'Bearer '+sessionStorage.token,
            //         }
            //     }).then(res => {
            //         // console.log(res.data);
            //         this.$toast('添加成功');
            //         this.getStudents();
            //         this.isNewStudentShow=false;
            //         this.newStudent.title='';
            //         this.newStudent.content='';
            //         this.newStudent.sites='';
            //     }).catch(err => {
            //         this.$toast('添加失败');
            //         console.log(err)
            //     });
            // },
            // editStudentShow(index){
            //     this.edStudent.id=this.Students[index].id;
            //     this.edStudent.title=this.Students[index].title;
            //     this.edStudent.content=this.Students[index].content;
            //     this.edStudent.sites=this.Students[index].sites;
            //     this.edStudent.index=index;
            //     this.isEditStudentShow=true;
            // },
            // editStudent(){
            //     // 修改学员信息信息/api/travels/1/Students/22
            //     this.$ajax({
            //         method: 'PATCH',
            //         headers: {
            //             "Authorization": 'Bearer '+sessionStorage.token,
            //         },
            //         data:{
            //             title:this.edStudent.title,
            //             content:this.edStudent.content,
            //             sites:this.edStudent.sites,
            //         },
            //         url: this.$config+'/api/travels/'+sessionStorage.actTravelId+'/Students/'+this.edStudent.id,
            //     }).then(res => {
            //         if(res.status==200){
            //             this.students[this.edStudent.index].title=this.edStudent.title;
            //             this.students[this.edStudent.index].content=this.edStudent.content;
            //             this.students[this.edStudent.index].sites=this.edStudent.sites;
            //             this.$toast('修改成功');
            //             this.isEditStudentShow=false;    
            //         }else{
            //             this.$toast('修改失败');
            //         }
            //     }).catch(err => {
            //         this.$toast('修改失败');
            //         console.log(err)
            //     });
            // },
            // delStudent(StudentId){
            //     // 删除学员信息
            //     this.$dialog.confirm({
            //         title: '删除学员信息',
            //         message: '是否删除该学员信息'
            //     }).then(() => {
            //         this.$ajax({
            //             method: 'DELETE',
            //             headers: {
            //                 "Authorization": 'Bearer '+sessionStorage.token,
            //             },
            //             url: this.$config+'/api/travels/'+sessionStorage.actTravelId+'/Students/'+StudentId,
            //         }).then(res => {
            //             // console.log(res);
            //             if(res.status==204){
            //                 this.getStudents();
            //                 this.$toast('删除成功');
            //             }else{
            //                 this.$toast('删除失败');
            //             }
            //         }).catch(err => {
            //             this.$toast('删除失败');
            //             console.log(err)
            //         });
            //     }).catch(err => {

            //     });
            // },
            changeActIndex(index){
                this.actIndex=index;
            },
            leftTabAct(index){
                return {
                    act: index==this.actIndex? true:false,
                }
            }
        },
    }
</script>