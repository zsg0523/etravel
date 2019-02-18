<style>
    .dataBank_input_form{width: 100%;min-height:650px;justify-content: center;align-items:flex-start;font-size: 16px;}
    .dataBank_input_form>table{margin-top: 20px;width: 96%;}

    .dataBank_input_form table th{border:1px solid #d6d6d6;height:40px;line-height:40px;padding:0px;margin: 0px;}
    .dataBank_input_form table td{border:1px solid #d6d6d6;height:40px;line-height:40px;padding:0px;margin: 0px;text-align: center;width: 120px;}
    .dataBank_input_form thead{background-color: #ffde01;}
    .dataBank_input_form thead th{text-align: center;}
    .dataBank_input_form td>input{padding:0px;margin: 0px;border: none;padding-left: 5px;}
    .editIcon{width:40px;height:40px;line-height: 40px;float: left;margin-left: 5px;}
    .editIcon:hover{cursor: pointer;}
    .editIcon>img{width:25px;height:25px;}

    .active{font-size: 18px;}  
</style>

<template>
	<div class="dataBank_input_form disflex"> 
        <table>
            <thead>
                <tr>
                    <th>编号</th>
                    <th>班级</th>
                    <th>学生姓名</th>
                    <th>房号</th>
                    <th>职责</th>
                    <th>编辑</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>编号</td>
                    <td>班级</td>
                    <td>学生姓名</td>
                    <td>房号</td>
                    <td>职责</td>
                    <td>
                        <div class="editIcon"><img src="/etravel/public/images/edit.png"></div>
                        <div class="editIcon"><img src="/etravel/public/images/appointAdd.png"></div>
                        <div class="editIcon"><img src="/etravel/public/images/dele.png"></div>
                    </td>
                </tr>
            </tbody>
        </table>   
    </div>
</template>

<script>
    export default {

    }
</script>