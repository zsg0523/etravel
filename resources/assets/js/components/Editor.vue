<template>
    <div style="width: 100%;">
        <div ref="editor" style="text-align:left;width:100%;"></div>
    </div>
</template>

<script>
    import E from 'wangeditor'

    export default {
        name: 'editor',
        data () {
            return {
                editorContent: '请编辑内容',
                editor:'',
            }
        },
        props:['childData'],    //接收父组件的方法
        mounted() {
            this.createEditor();
        },
        beforeDestroy(){
            this.destroyEditor();
        },
        methods: {
            createEditor(){
                this.editor = new E(this.$refs.editor);            
                this.editor.customConfig.onchange = (html) => {
                    this.editorContent = html;
                    this.$emit('catchData',this.editorContent);
                }
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
                    'list',  // 列表
                    'justify',  // 对齐方式
                    // 'quote',  // 引用
                    // 'emoticon',  // 表情
                    'image',  // 插入图片
                    'table',  // 表格
                    // 'video',  // 插入视频
                    // 'code',  // 插入代码
                    'undo',  // 撤销
                    'redo'  // 重复
                ];//配置菜单
                this.editor.customConfig.uploadImgServer=this.$config+'/api/images';// 上传图片到服务器地址
                this.editor.customConfig.uploadFileName = 'image'//自定义filename
                this.editor.customConfig.uploadImgParams = {
                    type: 'travel',
                    platform:1,
                };//上传图片传参
                this.editor.customConfig.uploadImgHeaders = {
                  "Authorization": 'Bearer '+sessionStorage.token,
                };//自定义header
                this.editor.create();
                // console.log(this.childData); 
                this.editor.txt.html(this.childData);
            },
            destroyEditor(){  // 销毁编辑器，
                // this.editor.destroy();  // 这个没有完全销毁实例，只是作了隐藏
                // $('#account--editor').remove();  // 不报错的话，这一步可以省略
                this.editor = null;
                // WangEditor.numberOfLocation--;  // 手动清除地图的重复引用。否则单页面来回切换时，地图报错重复引用
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
