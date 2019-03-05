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
                editorContent: '',
            }
        },
        methods: {
                  
        },
        mounted() {
            var editor = new E(this.$refs.editor)
            editor.customConfig.onchange = (html) => {
                this.editorContent = html
            }
            editor.customConfig.menus = [
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
            editor.customConfig.uploadImgServer=this.$config+'/api/images';// 上传图片到服务器地址
            editor.customConfig.uploadFileName = 'image'//自定义filename
            editor.customConfig.uploadImgParams = {
                type: 'travel'
            };//上传图片传参
            editor.customConfig.uploadImgHeaders = {
              "Authorization": 'Bearer '+sessionStorage.token,
            };//自定义header
            editor.create();
        }
    }
</script>

<style scoped>
</style>
