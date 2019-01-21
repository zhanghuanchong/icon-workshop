<template>
  <q-dialog class="upload-dialog"
    v-model="visible"
    prevent-close
    @cancel="onCancel"
  >
    <span slot="title">上传文件</span>
    <span slot="message">
      <template v-if="file">上传中，请稍候...</template>
      <template v-else>
        <q-btn flat @click="choose">选择文件...</q-btn>
      </template>
    </span>
    <div slot="body">
      <input type="file" class="hide"
             :accept="accept"
             ref="file" @change="upload">
      <q-progress
        v-if="file"
        :percentage="progress"
        strip
        animate
        height="4px"
      />
    </div>

    <template slot="buttons" slot-scope="props">
      <q-btn flat label="取消" :disabled="progress >= 100" @click="props.cancel" />
    </template>
  </q-dialog>
</template>

<script>
import Singleton from '../mixins/Singleton'
import { request } from '../common'
import { CancelToken } from 'axios'

export default {
  name: 'upload-dialog',
  mixins: [
    Singleton
  ],
  data () {
    return {
      file: null,
      cancel: null,
      progress: 0,
      maps: {
        image: '.jpg, .png, .gif, .jpeg',
        audio: '.mp3',
        video: '.mp4'
      }
    }
  },
  computed: {
    accept () {
      if (!this.origin || !this.origin.type) {
        return this.maps.image
      }
      return this.maps[this.origin.type]
    }
  },
  methods: {
    show () {
      this.file = null
      setTimeout(() => {
        this.choose()
      }, 50)
    },
    choose () {
      this.$refs.file.click()
    },
    async upload () {
      const fs = this.$refs.file.files
      if (fs.length <= 0) {
        this.visible = false
        return
      }
      this.file = fs[0]

      const data = new FormData()
      data.append('file', this.file)

      const resp = await request('/api/file/upload', 'post', data, {
        cancelToken: new CancelToken(c => (this.cancel = c)),
        onUploadProgress: e => {
          this.progress = Math.round(e.loaded * 100 / e.total)
        }
      })
      if (!resp.e && this.visible) {
        if (this.origin && this.origin._cb) {
          this.origin._cb(resp.d)
        }

        this._hide()
      }
    },
    hide () {
      // Reset the file input
      this.$refs.file.type = 'text'
      this.$refs.file.type = 'file'
    },
    onCancel () {
      if (this.cancel) {
        this.cancel()
      }
      this._hide()
    }
  }
}
</script>

<style lang="scss">
</style>
