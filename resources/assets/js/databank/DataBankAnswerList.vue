<style>
	.dataBank_input_answer{width: 100%;min-height:650px;align-items:center;flex-direction: column; font-size: 16px;}
    .dataBank_input_answer>table{width: 90%;}

    .dataBank_input_answer table th{border:1px solid #d6d6d6;height:40px;line-height:40px;padding:0px;margin: 0px;text-align: center;}
    .dataBank_input_answer table td{border:1px solid #d6d6d6;height:40px;line-height:40px;padding:0px;margin: 0px;text-align: center;}
    .dataBank_input_answer td>input{padding:0px;margin: 0px;border: none;padding-left: 5px;}
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
    
    .listTitle{width:90%;height:45px;line-height:45px;text-align:center;background-color:#ffde01;font-size:18px;margin-top:20px;border-radius-top-left: 15px;border-radius-top-right: 15px;}
    .van-dialog{width:50%;}    
</style>

<template>
    <div style="width:100%;">
        <div class="dataBank_input_answer disflex"> 
            <div class="listTitle">學生名單</div>
            <table>
                <thead>
                    <tr>
                        <th>分組</th>
                        <th>學生學號</th>
                        <th>學生班級</th>
                        <th>中文名</th>
                        <th>英文名</th>
                        <th>學生職責</th>
                        <th>查看答題紙</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(group,index) in groups">
                        <td>{{group.group}}</td>
                        <td>{{group.student_number}}</td>
                        <td>{{group.class}}</td>
                        <td>{{group.user.name}}</td>
                        <td>{{group.user.en_name}}</td>
                        <td>{{group.duty}}</td>
                        <td class="cursorPoint" @click="$router.push('/answer/dataBankAnswerInfo/'+group.user_id)">查看答題紙></td>
                    </tr>
                   
                </tbody>
            </table>   
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                groups:[],
            }
        },
        mounted:function(){
            this.getGroups();
        },
        methods:{
            getGroups(){
                // 获取学生列表信息
                this.$ajax({
                    method: 'GET',
                    headers: {
                        "Authorization": 'Bearer '+sessionStorage.token,
                    },
                    url: this.$config+'/api/travels/'+sessionStorage.actTravelId+'/groups?include=user.student',
                }).then(res => {
                    // console.log(res.data);
                    this.groups=res.data.data;
                }).catch(err => {
                    this.$toast('獲取失敗');
                    console.log(err);
                });
            },
        }
    }
</script>