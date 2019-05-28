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
    .form_item_small>div>input{width:95% !important;}
    .item_input{height:40px;padding-left:10px;outline: none;width: 90%;border-radius: 8px;}
    .studentEditBtn{width:50px;height: 50px;position: absolute;right: 5px;top: 5px;}
    .studentEditBtn:hover{cursor:pointer;}
    .studentEditBtn>img{width:50px;height: 50px;}
    .act{background-color: #ffde01;}

    .editBox{width: 760px;min-height:240px;background-color: #fff;border-radius: 15px;font-size: 16px;}
    .editBoxContent{width:90%;margin-left: 5%;margin-top:20px;flex-flow:row wrap;justify-content: center;align-items: center;}
    .editBoxTitle{width:100%;height:50px;text-align: center;line-height: 50px;font-size: 18px;}
    .issureStu{width:100%;height:50px;margin-top: 20px;margin-bottom: 20px;}
    .issureBtn{width:60%;height:50px;margin-left: 20%;background-color: #ffde01;font-size: 16px;border-radius: 8px;border: none;outline: none;}
    .twoBtn{width:40%;margin-left:5%;margin-right:5%;float:left;height:50px;font-size: 16px;border-radius: 8px;outline: none;}
    .cancel{background-color:#fff;border:1px solid #ccc;}
    .van-dialog{width:50%;}
    .err{color:red;float: right;font-size: 14px;display: block;overflow: hidden;max-width: 150px;}
    .simulateShade{width:90%;height: 44px;border-width: 2px;border-style: solid;border-top-color: #999;border-left-color: #999;border-right-color: #eee;border-bottom-color: #eee;border-radius: 8px;}
</style>

<template>
    <div class="students disflex">
        <div class="studentsList disflex">
            <div class="students_left">
                <ul style="padding: 0;margin:0;">
                    <li>
                        <div class="left_title disflex">
                            <span>團員信息</span>
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
                            <div class="item_title">用戶ID</div>
                            <div><input class="item_input" type="text" placeholder="填寫用戶ID" disabled="disabled" :value="students[actIndex].user.id"></div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">團員密碼</div>
                            <div><input class="item_input" type="text" placeholder="填寫團員密碼" disabled="disabled" :value="students[actIndex].user.original_password"></div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">團員中文名</div>
                            <div><input class="item_input" type="text" placeholder="填寫團員中文名" disabled="disabled" :value="students[actIndex].user.name"></div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">團員英文名</div>
                            <div><input class="item_input" type="text" placeholder="填寫團員英文名" disabled="disabled" :value="students[actIndex].user.en_name"></div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">電話區號</div>
                            <div><input class="item_input" type="text" placeholder="填寫電話區號" disabled="disabled" :value="students[actIndex].user.code"></div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">聯繫電話</div>
                            <div><input class="item_input" type="text" placeholder="填寫聯繫電話" disabled="disabled" :value="students[actIndex].user.phone"></div>
                        </div>
                        <!-- 紧急联系人 -->
                        <div class="form_item_student">
                            <div class="item_title">區號A</div>
                            <div><input class="item_input" type="text" placeholder="填寫區號A" disabled="disabled" :value="students[actIndex].user.code_one"></div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">緊急電話A</div>
                            <div><input class="item_input" type="text" placeholder="填寫緊急電話A" disabled="disabled" :value="students[actIndex].user.emergency_phone_one"></div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">區號B</div>
                            <div><input class="item_input" type="text" placeholder="填寫區號B" disabled="disabled" :value="students[actIndex].user.code_two"></div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">緊急電話B</div>
                            <div><input class="item_input" type="text" placeholder="填寫緊急電話B" disabled="disabled" :value="students[actIndex].user.emergency_phone_two"></div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">緊急郵箱A</div>
                            <div><input class="item_input" type="text" placeholder="填寫緊急郵箱A" disabled="disabled" :value="students[actIndex].user.emergency_email_one"></div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">緊急郵箱B</div>
                            <div><input class="item_input" type="text" placeholder="填寫緊急郵箱B" disabled="disabled" :value="students[actIndex].user.emergency_email_two"></div>
                        </div>
                        <!-- 分组信息 -->
                        <div class="form_item_small">
                            <div class="item_title">團員學號</div>
                            <div><input class="item_input" type="text" placeholder="填寫團員學號" disabled="disabled" :value="students[actIndex].student_number"></div>
                        </div>
                        <div class="form_item_small">
                            <div class="item_title">團員班級</div>
                            <div><input class="item_input" type="text"  placeholder="填寫團員班級" disabled="disabled" :value="students[actIndex].class"></div>
                        </div>
                        <div class="form_item_small">
                            <div class="item_title">團員分組號</div>
                            <div><input class="item_input" type="text"  placeholder="填寫團員分組號" disabled="disabled" :value="students[actIndex].group"></div>
                        </div>
                        <div class="form_item_small">
                            <div class="item_title">團員職責</div>
                            <div><input class="item_input" type="text"  placeholder="填寫團員職責" disabled="disabled" :value="students[actIndex].duty"></div>
                        </div>
                        <!-- 撑高度 -->
                        <div class="form_item_small"></div>
                    </div>
                    <div class="studentEditBtn" @click="editStudentShow()">
                        <img src="/etravel/public/images/editAll.png">
                    </div>
                    <van-popup v-model="isEditStudentShow" :overlay="true">
                        <div class="editBox" >
                            <div class="editBoxContent disflex">
                                <div class="form_item_student">
                                    <div class="item_title">用戶ID(不可编辑)</div>
                                    <div><input class="item_input" type="text" placeholder="填寫用戶ID" disabled="disabled" v-model="edStudent.user_id"></div>
                                </div>
                                <div class="form_item_student">
                                    <div class="item_title">團員密碼(不可编辑)</div>
                                    <div><input class="item_input" type="text" placeholder="填寫團員密碼" disabled="disabled" v-model="edStudent.original_password"></div>
                                </div>
                                <div class="form_item_student">
                                    <div class="item_title">團員中文名(不可编辑)<span class="err" v-if="errors.name" v-text="errors.name[0]"></span></div>
                                    <div><input class="item_input" type="text" placeholder="填寫團員中文名" disabled="disabled" v-model="edStudent.name"></div>
                                </div>
                                <div class="form_item_student">
                                    <div class="item_title">團員英文名(不可编辑)<span class="err" v-if="errors.en_name" v-text="errors.en_name[0]"></span></div>
                                    <div><input class="item_input" type="text" placeholder="填寫團員英文名" disabled="disabled" v-model="edStudent.en_name"></div>
                                </div>
                                <div class="form_item_student">
                                    <div class="item_title">電話區號(不可编辑)<span class="err" v-if="errors.code" v-text="errors.code[0]"></span></div>
                                    <div><input class="item_input" type="text" placeholder="填寫電話區號" disabled="disabled" v-model="edStudent.code"></div>
                                </div>
                                <div class="form_item_student">
                                    <div class="item_title">聯繫電話(不可编辑)<span class="err" v-if="errors.phone" v-text="errors.phone[0]"></span></div>
                                    <div><input class="item_input" type="text" placeholder="填寫聯繫電話" disabled="disabled" v-model="edStudent.phone"></div>
                                </div>
                                <!-- 紧急联系人 -->
                                <div class="form_item_student">
                                    <div class="item_title">區號A</div>
                                    <div>
                                        <div class="simulateShade">
                                            <AreaCodeSelector @selectedAreaCode='selectedAreaCodeOne' :areaCode='edStudent.code_one'></AreaCodeSelector>
                                        </div>
                                        <!-- <input class="item_input" type="text" placeholder="填寫區號A" v-model="edStudent.code_one"> -->
                                    </div>
                                </div>
                                <div class="form_item_student">
                                    <div class="item_title">緊急電話A</div>
                                    <div><input class="item_input" type="text" placeholder="填寫緊急電話A" v-model="edStudent.emergency_phone_one"></div>
                                </div>
                                <div class="form_item_student">
                                    <div class="item_title">區號B</div>
                                    <div>
                                        <div class="simulateShade">
                                            <AreaCodeSelector @selectedAreaCode='selectedAreaCodeTwo' :areaCode='edStudent.code_two'></AreaCodeSelector>
                                        </div>
                                        <!-- <input class="item_input" type="text" placeholder="填寫區號B" v-model="edStudent.code_two"> -->
                                    </div>
                                </div>
                                <div class="form_item_student">
                                    <div class="item_title">緊急電話B</div>
                                    <div><input class="item_input" type="text" placeholder="填寫緊急電話B" v-model="edStudent.emergency_phone_two"></div>
                                </div>
                                <div class="form_item_student">
                                    <div class="item_title">緊急郵箱A</div>
                                    <div><input class="item_input" type="text" placeholder="填寫緊急郵箱A" v-model="edStudent.emergency_email_one"></div>
                                </div>
                                <div class="form_item_student">
                                    <div class="item_title">緊急郵箱B</div>
                                    <div><input class="item_input" type="text" placeholder="填寫緊急郵箱B" v-model="edStudent.emergency_email_two"></div>
                                </div>
                                <!-- 分组信息 -->
                                <div class="form_item_small">
                                    <div class="item_title">團員學號<span class="err" v-if="errors.student_number" v-text="errors.student_number[0]"></span></div>
                                    <div><input class="item_input" type="text" placeholder="填寫團員學號" v-model="edStudent.student_number"></div>
                                </div>
                                <div class="form_item_small">
                                    <div class="item_title">團員班級<span class="err" v-if="errors.class" v-text="errors.class[0]"></span></div>
                                    <div><input class="item_input" type="text"  placeholder="填寫團員班級" v-model="edStudent.class"></div>
                                </div>
                                <div class="form_item_small">
                                    <div class="item_title">團員分組號<span class="err" v-if="errors.group" v-text="errors.group[0]"></span></div>
                                    <div><input class="item_input" type="text"  placeholder="填寫團員分組號" v-model="edStudent.group"></div>
                                </div>
                                <div class="form_item_small">
                                    <div class="item_title">團員職責<span class="err" v-if="errors.duty" v-text="errors.duty[0]"></span></div>
                                    <div><input class="item_input" type="text"  placeholder="填寫團員職責" v-model="edStudent.duty"></div>
                                </div>
                                <div class="issureStu">
                                    <button class="issureBtn" @click="editStudent()">修改</button>
                                </div>
                            </div>
                        </div>
                    </van-popup>
                </div>
            </div>
            <van-popup v-model="isSearchStudentShow" :overlay="true">
                <div class="editBox" >
                    <div class="editBoxContent disflex">
                        <div class="form_item_student">
                            <div class="item_title">用戶ID(不可编辑)</div>
                            <div><input class="item_input" type="text" placeholder="填寫用戶ID" disabled="disabled" :value="searchStudent.id"></div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">團員密碼(不可编辑)</div>
                            <div><input class="item_input" type="text" placeholder="填寫團員密碼" disabled="disabled" :value="searchStudent.original_password"></div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">團員中文名(不可编辑)</div>
                            <div><input class="item_input" type="text" placeholder="填寫團員中文名" disabled="disabled" :value="searchStudent.name"></div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">團員英文名(不可编辑)</div>
                            <div><input class="item_input" type="text" placeholder="填寫團員英文名" disabled="disabled" :value="searchStudent.en_name"></div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">電話區號(不可编辑)</div>
                            <div><input class="item_input" type="text" placeholder="填寫電話區號" disabled="disabled" v-model="searchStudent.code"></div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">聯繫電話(不可编辑)</div>
                            <div><input class="item_input" type="text" placeholder="填寫聯繫電話" disabled="disabled" v-model="searchStudent.phone"></div>
                        </div>
                        <!-- 紧急联系人 -->
                        <div class="form_item_student">
                            <div class="item_title">區號A</div>
                            <div>
                                <div class="simulateShade">
                                    <AreaCodeSelector @selectedAreaCode='selectedAreaCodeOne' :areaCode='searchStudent.code_one'></AreaCodeSelector>
                                </div>
                                <!-- <input class="item_input" type="text" placeholder="填寫區號A" v-model="searchStudent.code_one"> -->
                            </div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">緊急電話A</div>
                            <div><input class="item_input" type="text" placeholder="填寫緊急電話A" v-model="searchStudent.emergency_phone_one"></div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">區號B</div>
                            <div>
                                <div class="simulateShade">
                                    <AreaCodeSelector @selectedAreaCode='selectedAreaCodeTwo' :areaCode='searchStudent.code_two'></AreaCodeSelector>
                                </div>
                                <!-- <input class="item_input" type="text" placeholder="填寫區號B" v-model="searchStudent.code_two"> -->
                            </div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">緊急電話B</div>
                            <div><input class="item_input" type="text" placeholder="填寫緊急電話B" v-model="searchStudent.emergency_phone_two"></div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">緊急郵箱A</div>
                            <div><input class="item_input" type="text" placeholder="填寫緊急郵箱A" v-model="searchStudent.emergency_email_one"></div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">緊急郵箱B</div>
                            <div><input class="item_input" type="text" placeholder="填寫緊急郵箱B" v-model="searchStudent.emergency_email_two"></div>
                        </div>

                        <!-- 分组信息 -->
                        <div class="form_item_small">
                            <div class="item_title">團員學號<span class="err" v-if="errors.student_number" v-text="errors.student_number[0]"></span></div>
                            <div><input class="item_input" type="text" placeholder="填寫團員學號" v-model="searchStudent.student_number"></div>
                        </div>
                        <div class="form_item_small">
                            <div class="item_title">團員班級<span class="err" v-if="errors.class" v-text="errors.class[0]"></span></div>
                            <div><input class="item_input" type="text"  placeholder="填寫團員班級" v-model="searchStudent.class"></div>
                        </div>
                        <div class="form_item_small">
                            <div class="item_title">團員分組號<span class="err" v-if="errors.group" v-text="errors.group[0]"></span></div>
                            <div><input class="item_input" type="text"  placeholder="填寫團員分組號" v-model="searchStudent.group"></div>
                        </div>
                        <div class="form_item_small">
                            <div class="item_title">團員職責<span class="err" v-if="errors.duty" v-text="errors.duty[0]"></span></div>
                            <div><input class="item_input" type="text"  placeholder="填寫團員職責" v-model="searchStudent.duty"></div>
                        </div>
                        <div class="issureStu">
                            <button class="twoBtn cancel" @click="cancelAdd()">取消</button>
                            <button class="twoBtn" style="background-color:#ffde01;border:none;" @click="addOldStudent()">添加學員</button>
                        </div>
                    </div>
                </div>
            </van-popup>
            <van-popup v-model="isNewStudentShow" :overlay="true">
                <div class="editBox" >
                    <div class="editBoxContent disflex">
                        <div class="form_item_small">
                            <div class="item_title">團員密碼(必填)</div>
                            <div><input class="item_input" type="text" placeholder="填寫團員密碼" v-model="newStudent.original_password"></div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">團員中文名(必填)<span class="err" v-if="errors.name" v-text="errors.name[0]"></span></div>
                            <div><input class="item_input" type="text" placeholder="填寫團員中文名" v-model="newStudent.name"></div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">團員英文名(必填)<span class="err" v-if="errors.en_name" v-text="errors.en_name[0]"></span></div>
                            <div><input class="item_input" type="text" placeholder="填寫團員英文名" v-model="newStudent.en_name"></div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">電話區號(必填)<span class="err" v-if="errors.code" v-text="errors.code[0]"></span></div>
                            <div>
                                <div class="simulateShade">
                                    <AreaCodeSelector @selectedAreaCode='selectedAreaCode' :areaCode='newStudent.code'></AreaCodeSelector>
                                </div>
                                <!-- <input class="item_input" type="text" placeholder="填寫電話區號" v-model="newStudent.code"> -->
                            </div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">聯繫電話(必填)</div>
                            <div><input class="item_input" type="text" placeholder="填寫聯繫電話" v-model="newStudent.phone"></div>
                        </div>

                        <!-- 紧急联系人 -->
                        <div class="form_item_student">
                            <div class="item_title">區號A</div>
                            <div>
                                <div class="simulateShade">
                                    <AreaCodeSelector @selectedAreaCode='selectedAreaCodeOne' :areaCode='newStudent.code_one'></AreaCodeSelector>
                                </div>
                                <!-- <input class="item_input" type="text" placeholder="填寫區號A" v-model="newStudent.code_one"> -->
                            </div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">緊急電話A</div>
                            <div><input class="item_input" type="text" placeholder="填寫緊急電話A" v-model="newStudent.emergency_phone_one"></div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">區號B</div>
                            <div>
                                <div class="simulateShade">
                                    <AreaCodeSelector @selectedAreaCode='selectedAreaCodeTwo' :areaCode='newStudent.code_two'></AreaCodeSelector>
                                </div>
                                <!-- <input class="item_input" type="text" placeholder="填寫區號B" v-model="newStudent.code_two"> -->
                            </div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">緊急電話B</div>
                            <div><input class="item_input" type="text" placeholder="填寫緊急電話B" v-model="newStudent.emergency_phone_two"></div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">緊急郵箱A</div>
                            <div><input class="item_input" type="text" placeholder="填寫緊急郵箱A" v-model="newStudent.emergency_email_one"></div>
                        </div>
                        <div class="form_item_student">
                            <div class="item_title">緊急郵箱B</div>
                            <div><input class="item_input" type="text" placeholder="填寫緊急郵箱B" v-model="newStudent.emergency_email_two"></div>
                        </div>
                        <!-- 分组信息 -->
                        <div class="form_item_small">
                            <div class="item_title">團員學號<span class="err" v-if="errors.student_number" v-text="errors.student_number[0]"></span></div>
                            <div><input class="item_input" type="text" placeholder="填寫團員學號" v-model="newStudent.student_number"></div>
                        </div>
                        <div class="form_item_small">
                            <div class="item_title">團員班級<span class="err" v-if="errors.class" v-text="errors.class[0]"></span></div>
                            <div><input class="item_input" type="text"  placeholder="填寫團員班級" v-model="newStudent.class"></div>
                        </div>
                        <div class="form_item_small">
                            <div class="item_title">團員分組號<span class="err" v-if="errors.group" v-text="errors.group[0]"></span></div>
                            <div><input class="item_input" type="text"  placeholder="填寫團員分組號" v-model="newStudent.group"></div>
                        </div>
                        <div class="form_item_small">
                            <div class="item_title">團員職責<span class="err" v-if="errors.duty" v-text="errors.duty[0]"></span></div>
                            <div><input class="item_input" type="text"  placeholder="填寫團員職責" v-model="newStudent.duty"></div>
                        </div>
                        <div class="issureStu">
                            <button class="issureBtn" @click="addNewStudent()">添加</button>
                        </div>
                    </div>
                </div>
            </van-popup>
        </div>
    </div>
</template>
<script>
    import AreaCodeSelector from '../components/AreaCodeSelector.vue';

    export default {
        components: {
            AreaCodeSelector,
        },
        data() {
            return {
                students:[],
                newStudent:{
                    name:'',
                    en_name:'',
                    code:'',
                    phone:'',
                    code_one:'',
                    code_two:'',
                    emergency_phone_one:'',
                    emergency_phone_two:'',
                    emergency_email_one:'',
                    emergency_email_two:'',
                    original_password:'',
                    add_by:sessionStorage.userId,
                    travel_id:sessionStorage.actTravelId,
                    student_number:'',
                    class:'',
                    duty:'',
                    group:'',
                },
                edStudent:{
                    id:'',
                    name:'',
                    en_name:'',
                    code:'',
                    phone:'',
                    code_one:'',
                    code_two:'',
                    emergency_phone_one:'',
                    emergency_phone_two:'',
                    emergency_email_one:'',
                    emergency_email_two:'',
                    original_password:'',
                    original_password:'',
                    add_by:sessionStorage.userId,
                    travel_id:sessionStorage.actTravelId,
                    student_number:'',
                    class:'',
                    duty:'',
                    group:'',
                    user_id:'',
                },
                searchStudent:{
                    id:'',
                    user_id:'',
                    name:'',
                    en_name:'',
                    code:'',
                    phone:'',
                    code_one:'',
                    code_two:'',
                    emergency_phone_one:'',
                    emergency_phone_two:'',
                    emergency_email_one:'',
                    emergency_email_two:'',
                    original_password:'',
                    original_password:'',
                    student_number:'',
                    class:'',
                    duty:'',
                    group:'', 
                },
                isNewStudentShow:false,
                isEditStudentShow:false,
                isSearchStudentShow:false,
                actIndex:0,
                searchId:'',
                errors:{},
                selectStatus:'new',
            }
        },
        mounted:function(){
            this.getStudents();
            this.$store.state.links=[{link:'/home',linkName:'項目'},{link:'/projectDetail/'+sessionStorage.actTravelId,linkName:'項目詳情'}];
        },
        methods:{
            getStudents(){
                // 获取團員資訊/api/travels/1/groups?include=user.student.school
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
                this.selectStatus='new';
            },
            addNewStudent(){
                // 新增團員資訊/api/userGroup
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
                    this.newStudent.code='';
                    this.newStudent.phone='';
                    this.newStudent.original_password='';
                    this.newStudent.student_number='';
                    this.newStudent.duty='';
                    this.newStudent.group='';
                    this.newStudent.class='';

                    this.newStudent.code_one='';
                    this.newStudent.code_two='';
                    this.newStudent.emergency_phone_one='';
                    this.newStudent.emergency_phone_two='';
                    this.newStudent.emergency_email_one='';
                    this.newStudent.emergency_email_two='';

                }).catch(err => {
                    this.$toast('添加失败');
                    if(err.response.data.errors){
                        for(var key in err.response.data.errors){
                            this.$toast(err.response.data.errors[key][0]);
                        }
                    }else{
                        this.$toast(err.response.data.message);
                    }
                    // this.errors=err.response.data.errors;
                    console.log(err.response.data);
                });
            },
            editStudentShow(){
                this.edStudent.id=this.students[this.actIndex].id;
                this.edStudent.original_password=this.students[this.actIndex].user.original_password;
                this.edStudent.name=this.students[this.actIndex].user.name;
                this.edStudent.en_name=this.students[this.actIndex].user.en_name;
                this.edStudent.code=this.students[this.actIndex].user.code;
                this.edStudent.phone=this.students[this.actIndex].user.phone;
                this.edStudent.student_number=this.students[this.actIndex].student_number;
                this.edStudent.class=this.students[this.actIndex].class;
                this.edStudent.duty=this.students[this.actIndex].duty;
                this.edStudent.group=this.students[this.actIndex].group;
                this.edStudent.user_id=this.students[this.actIndex].user_id;

                this.edStudent.code_one=this.students[this.actIndex].user.code_one;
                this.edStudent.code_two=this.students[this.actIndex].user.code_two;
                this.edStudent.emergency_phone_one=this.students[this.actIndex].user.emergency_phone_one;
                this.edStudent.emergency_phone_two=this.students[this.actIndex].user.emergency_phone_two;
                this.edStudent.emergency_email_one=this.students[this.actIndex].user.emergency_email_one;
                this.edStudent.emergency_email_two=this.students[this.actIndex].user.emergency_email_two;
                this.errors={};
                this.isEditStudentShow=true;

                this.selectStatus='edit';
            },
            editStudent(){
                // 修改團員資訊信息/api/users/:user/groups/:group/information
                this.$ajax({
                    method: 'PATCH',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    data:{
                        original_password:this.edStudent.original_password, 
                        name:this.edStudent.name, 
                        en_name:this.edStudent.en_name, 
                        code:this.edStudent.code, 
                        phone:this.edStudent.phone, 
                        student_number:this.edStudent.student_number, 
                        class:this.edStudent.class, 
                        duty:this.edStudent.duty, 
                        group:this.edStudent.group,
                        user_id:this.edStudent.user_id,  
                        code_one:this.edStudent.code_one, 
                        code_two:this.edStudent.code_two, 
                        emergency_phone_one:this.edStudent.emergency_phone_one, 
                        emergency_phone_two:this.edStudent.emergency_phone_two, 
                        emergency_email_one:this.edStudent.emergency_email_one,
                        emergency_email_two:this.edStudent.emergency_email_two,  
                    },
                    url: this.$config+'/api/users/'+this.edStudent.user_id+'/groups/'+this.edStudent.id+'/information',
                }).then(res => {
                    if(res.status==200){
                        this.students[this.actIndex].user.original_password=this.edStudent.original_password;
                        this.students[this.actIndex].user.name=this.edStudent.name;
                        this.students[this.actIndex].user.en_name=this.edStudent.en_name;
                        this.students[this.actIndex].user.code=this.edStudent.code;
                        this.students[this.actIndex].user.phone=this.edStudent.phone;
                        this.students[this.actIndex].student_number=this.edStudent.student_number;
                        this.students[this.actIndex].class=this.edStudent.class;
                        this.students[this.actIndex].duty=this.edStudent.duty;
                        this.students[this.actIndex].group=this.edStudent.group;

                        this.students[this.actIndex].user.code_one=this.edStudent.code_one;
                        this.students[this.actIndex].user.code_two=this.edStudent.code_two;
                        this.students[this.actIndex].user.emergency_phone_one=this.edStudent.emergency_phone_one;
                        this.students[this.actIndex].user.emergency_phone_two=this.edStudent.emergency_phone_two;
                        this.students[this.actIndex].user.emergency_email_one=this.edStudent.emergency_email_one;
                        this.students[this.actIndex].user.emergency_email_two=this.edStudent.emergency_email_two;
                        this.$toast('修改成功');
                        this.isEditStudentShow=false;    
                    }else{
                        this.$toast('修改失败');
                    }
                }).catch(err => {
                    this.$toast('修改失败');
                    if(err.response.data.errors){
                        for(var key in err.response.data.errors){
                            this.$toast(err.response.data.errors[key][0]);
                        }
                    }else{
                        this.$toast(err.response.data.message);
                    }
                    // this.errors=err.response.data.errors;

                });
            },
            delStudent(){
                // 删除團員資訊/api/users/:user/travels/:travel/groups/:group
                this.$dialog.confirm({
                    title: '删除團員資訊',
                    message: '是否删除该團員資訊',
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
                this.selectStatus='search';
            },
            toSearchStudent(){
                // 搜索学员
                if(this.searchId!=''){
                    this.$ajax({
                        method: 'post',
                        headers: {
                            "Authorization": 'Bearer '+sessionStorage.token,
                        },
                        data:{
                            travel_id:sessionStorage.actTravelId,  
                        },
                        url: this.$config+'/api/users/'+this.searchId+'/userInfo',
                    }).then(res => {
                        if(res.status==202){
                            this.$toast(res.data.message);
                        }else{
                            // console.log(res.data);
                            this.searchStudent.id=res.data.id;
                            this.searchStudent.name=res.data.name;
                            this.searchStudent.en_name=res.data.en_name;
                            this.searchStudent.code=res.data.code;
                            this.searchStudent.phone=res.data.phone;
                            this.searchStudent.original_password=res.data.original_password;

                            this.searchStudent.code_one=res.data.code_one;
                            this.searchStudent.code_two=res.data.code_two;
                            this.searchStudent.emergency_phone_one=res.data.emergency_phone_one;
                            this.searchStudent.emergency_phone_two=res.data.emergency_phone_two;
                            this.searchStudent.emergency_email_one=res.data.emergency_email_one;
                            this.searchStudent.emergency_email_two=res.data.emergency_email_two;
                            this.searchStudentShow();
                        }
                    }).catch(err => {
                        this.$toast('請輸入正確的用戶ID');
                        // console.log(err);
                    });
                }else{
                    this.$toast('請輸入用戶ID');
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
                    code:this.searchStudent.code,
                    phone:this.searchStudent.phone,
                    student_number: this.searchStudent.student_number,
                    class: this.searchStudent.class,
                    duty: this.searchStudent.duty,
                    group: this.searchStudent.group,
                    code_one:this.searchStudent.code_one,
                    code_two:this.searchStudent.code_two,
                    emergency_phone_one: this.searchStudent.emergency_phone_one,
                    emergency_phone_two: this.searchStudent.emergency_phone_two,
                    emergency_email_one: this.searchStudent.emergency_email_one,
                    emergency_email_two: this.searchStudent.emergency_email_two,
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
                    if(err.response.data.errors){
                        for(var key in err.response.data.errors){
                            this.$toast(err.response.data.errors[key][0]);
                        }
                    }else{
                        this.$toast(err.response.data.message);
                    }
                    // this.errors=err.response.data.errors;
                    // if(err.response.data.errors.duty){
                    //     this.$toast(err.response.data.errors.duty[0]);
                    // }
                    // if(err.response.data.errors.group){
                    //     this.$toast(err.response.data.errors.group[0]);
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
            //接收區號组件返回的值
            selectedAreaCode(value){
                this.newStudent.code=value;
            },
            selectedAreaCodeOne(value){
                if(this.selectStatus=="search"){
                    this.searchStudent.code_one=value;
                }else if(this.selectStatus=="edit"){
                    this.edStudent.code_one=value;
                }else if(this.selectStatus=="new"){
                    this.newStudent.code_one=value;
                }
            },
            selectedAreaCodeTwo(value){
                if(this.selectStatus=="search"){
                    this.searchStudent.code_two=value;
                }else if(this.selectStatus=="edit"){
                    this.edStudent.code_two=value;
                }else if(this.selectStatus=="new"){
                    this.newStudent.code_two=value;
                }
            },
        },
    }
</script>