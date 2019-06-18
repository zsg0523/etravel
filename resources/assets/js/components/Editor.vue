<style type="text/css">
    .w-e-toolbar {
        flex-wrap: wrap;
        -webkit-box-lines: multiple;
    }

    .w-e-toolbar .w-e-menu:hover{
        z-index: 10002!important;
    }

    .w-e-menu span{
        text-decoration: none;
    }

    .fullscreen-editor {
        position: fixed !important;
        width: 100% !important;
        height: 100% !important;
        left: 0px !important;
        top: 0px !important;
        background-color: white;
        z-index: 9999;
    }

    .fullscreen-editor .w-e-text-container {
        width: 100% !important;
        height: 95% !important;
    }
    .previewBox{
        width: 760px;
        height:100%;
        background-color: #fff;
        position:fixed;
        right:0px;
        top:0px;
        z-index: 10005;
    }
    .closePreviewBox{
        width:30px;
        height: 30px;
        position: fixed;
        top: 15px;
        right: 15px;
    }
    .showContent{
        width:640px;
        min-height: 400px;
        border:2px solid #ccc;
        margin: 15px 60px 15px 60px;
    }
</style>
<template>
    <div style="width: 100%;line-height:auto;">
        <div ref="editor" style="text-align:left;width:100%;">
            
        </div>
        <!-- <van-popup v-model="isPreviewShow" position="right" style="width:100% !important;position:fixed;right:0px;top:0px;" :overlay="true">
            <div class="previewBox">
                <button @click="isPreviewShow=false" class="closePreviewBox">关闭</button>
                <div class="showContent" v-html="editorContent"></div>
            </div>
        </van-popup> -->
        <div class="previewBox" :style="{display:isPreviewShow}">
            <div class="showContent" v-html="editorContent"></div>
            <div @click="isPreviewShow='none'" class="closePreviewBox"><img src="/etravel/public/images/delete.png" alt="關閉"></div>
        </div>
        <div class="w-e-menu" ref="preview" style="display: none;">
            <span class="_wangEditor_btn_fullscreen" @click="toPreview()">預覽</span>
        </div>
    </div>
</template>
<script>
    import E from 'wangeditor'

    export default {
        name: 'editor',
        data () {
            return {
                editorContent: '',
                editor:'',
                isPreviewShow:'none',
            }
        },
        props:['childData'],//接收父组件的方法
        created(){
            this.isPreviewShow='none';
        },  
        mounted() {
            this.createEditor();
            var preview=this.$refs.preview;
            // console.log(preview);
            preview.setAttribute('style','z-index:10001;display:block;');
            this.$refs.editor.firstChild.appendChild(preview);
        },
        beforeDestroy(){
            this.destroyEditor();
        },
        methods: {
            createEditor(){
                this.editor = new E(this.$refs.editor);            
                this.editor.customConfig.onchangeTimeout = 1000;
                this.editor.customConfig.onchange = (html) => {
                    this.editorContent =this.removeWordXml(html);
                    this.$emit('catchData',this.editorContent);
                };
                this.editor.customConfig.onblur = (html) => {
                    this.$emit('catchData',this.editorContent);
                };
                this.editor.customConfig.menus = [
                    'head',  // 标题
                    'bold',  // 粗体
                    'fontSize',  // 字号
                    'fontName',  // 字体
                    'italic',  // 斜体
                    'underline',  // 下划线
                    'strikeThrough',  // 删除线 
                    // 'foreColor',  // 文字颜色
                    'backColor',  // 背景颜色
                    // 'link',  // 插入链接
                    // 'list',  // 列表
                    'justify',  // 对齐方式
                    // 'quote',  // 引用
                    // 'emoticon',  // 表情
                    'image',  // 插入图片
                    // 'table',  // 表格
                    // 'video',  // 插入视频
                    // 'code',  // 插入代码
                    // 'undo',  // 撤销
                    // 'redo'  // 重复
                ];//配置菜单
                this.editor.customConfig.pasteFilterStyle=true;
                this.editor.customConfig.uploadImgServer=this.$config+'/api/images';// 上传图片到服务器地址
                this.editor.customConfig.uploadFileName = 'image'//自定义filename
                this.editor.customConfig.uploadImgTimeout =20000;//自定义s上传时间
                this.editor.customConfig.uploadImgParams = {
                    type: 'travel',
                    platform:1,
                };//上传图片传参
                this.editor.customConfig.uploadImgHeaders = {
                  "Authorization": 'Bearer '+sessionStorage.token,
                };//自定义header
                this.editor.create();
                this.editor.txt.html(this.childData);
            },
            destroyEditor(){  // 销毁編輯器，
                // this.editor.destroy();  // 这个没有完全销毁实例，只是作了隐藏
                // $('#account--editor').remove();  // 不报错的话，这一步可以省略
                this.editor = null;
                // WangEditor.numberOfLocation--;  // 手动清除地图的重复引用。否则单页面来回切换时，地图报错重复引用
            },
            toPreview(){
                this.editorContent=this.editor.txt.html()
                this.isPreviewShow='block';
            },
            removeWordXml(text){
                var html = text;
                html = html.replace(/<\/?SPANYES[^>]*>/gi, "");//  Remove  all  SPAN  tags
                // html = html.replace(/<(\w[^>]*)  class=([^|>]*)([^>]*)/gi, "<$1$3");  //  Remove  Class  attributes
                // html = html.replace(/<(\w[^>]*)  style="([^"]*)"([^>]*)/gi, "<$1$3");  //  Remove  Style  attributes
                html = html.replace(/<(\w[^>]*)  lang=([^|>]*)([^>]*)/gi, "<$1$3");//  Remove  Lang  attributes
                html = html.replace(/<\\?\?xml[^>]*>/gi, "");//  Remove  XML  elements  and  declarations
                html = html.replace(/<\/?\w+:[^>]*>/gi, "");//  Remove  Tags  with  XML  namespace  declarations:  <o:p></o:p>
                html = html.replace(/&nbsp;/, "");//  Replace  the  &nbsp;
                html = html.replace(/\n(\n)*( )*(\n)*\n/gi, '\n');
                //  Transform  <P>  to  <DIV>
                // var  re  =  new  RegExp("(<P)([^>]*>.*?)(<//P>)","gi")  ;            //  Different  because  of  a  IE  5.0  error
                //        html = html.replace(re, "<div$2</div>");
                return html;
            },

        },
        watch:{
            childData(){
                // console.log(this.childData);
                this.editor.txt.html(this.childData);
            }
        },
    }
</script>

<style scoped>
</style>
