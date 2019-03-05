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
          editorContent: ''
        }
      },
      methods: {
        getContent: function () {
            alert(this.editorContent)
        }
      },
      mounted() {
        var editor = new E(this.$refs.editor)
        editor.customConfig.onchange = (html) => {
          this.editorContent = html
        }
        var url=this.config+'/api/images';
        console.log(url);
        editor.customConfig.uploadImgServer=url;// 上传图片到服务器地址
        editor.create()
      }
    }
</script>

<style scoped>
</style>
