<template>
  <q-layout-header class="splash-layout-header">
    <VuePerfectScrollbar>
      <q-toolbar color="white" text-color="dark">
        <q-field label="背景：">
          <q-color v-model="backgroundColor"></q-color>
        </q-field>

        <q-field label="平台：" class="ml-15">
          <q-checkbox v-model="platforms"
                      checked-icon="mdi-apple"
                      unchecked-icon="mdi-apple mdi-inactive"
                      val="ios">
            <q-tooltip>iOS</q-tooltip>
          </q-checkbox>
          <q-checkbox v-model="platforms"
                      checked-icon="mdi-android"
                      unchecked-icon="mdi-android mdi-inactive"
                      val="android"
                      class="ml-10">
            <q-tooltip>Android</q-tooltip>
          </q-checkbox>
        </q-field>

        <q-field label="方向：" class="ml-15">
          <q-checkbox v-model="orientations"
                      checked-icon="mdi-cellphone-iphone"
                      unchecked-icon="mdi-cellphone-iphone mdi-inactive"
                      val="portrait">
            <q-tooltip>竖屏</q-tooltip>
          </q-checkbox>
          <q-checkbox v-model="orientations"
                      checked-icon="mdi-cellphone-iphone mdi-rotate-90"
                      unchecked-icon="mdi-cellphone-iphone mdi-inactive mdi-rotate-90"
                      val="landscape"
                      class="ml-10">
            <q-tooltip>横屏</q-tooltip>
          </q-checkbox>
        </q-field>

        <q-btn flat
               round
               class="ml-auto"
               :icon="fullscreen ? 'mdi-fullscreen-exit' : 'mdi-fullscreen'"
               @click="resize"></q-btn>

        <q-btn flat
               class="ml-10"
               icon="mdi-broom"
               @click="clean"
               label="清空"></q-btn>

        <q-btn color="positive"
               push
               @click="generate"
               :disable="$v.$invalid"
               class="ml-10"
               icon="mdi-auto-fix"
               icon-right="mdi-chevron-right"
               label="生成"></q-btn>
      </q-toolbar>
    </VuePerfectScrollbar>

    <LoadingModal v-if="generating"
                  :visible="loadingModal"
                  message="生成中，请稍候..."
                  @cancel="cancel(true)"
                  :cancellable="true"></LoadingModal>
  </q-layout-header>
</template>

<script>
import { bindStateChild, request, redirectRoot, cancelSource } from '../../common'
import VuePerfectScrollbar from 'vue-perfect-scrollbar'
import _ from 'lodash'
import screenfull from 'screenfull'
import LoadingModal from '../../components/LoadingModal'

export default {
  name: 'SplashLayoutHeader',
  components: {
    VuePerfectScrollbar,
    LoadingModal
  },
  data: () => ({
    generating: false,
    loadingModal: false,
    cancelSource: null,
    fullscreen: false
  }),
  computed: {
    ...bindStateChild('Splash', 'scene')
  },
  validations: {
    platforms: {
      has: arr => arr.length > 0
    },
    orientations: {
      has: arr => arr.length > 0
    }
  },
  methods: {
    async generate () {
      this.generating = true
      this.loadingModal = true
      this.cancelSource = cancelSource()
      const resp = await request(`/api/splash/generate`, 'post', {
        scene: this.$store.state.Splash.scene
      }, {
        cancelToken: this.cancelSource.token
      })
      this.cancel()
      if (resp.success) {
        this.$q.notify({
          type: 'positive',
          message: '生成成功！即将开始下载...',
          position: 'top',
          icon: 'mdi-download'
        })
        if (location.hostname !== 'localhost') {
          redirectRoot(`/splash/download/${resp.data}`)
        }
      }
    },
    cancel (cancelMessage = false) {
      this.loadingModal = false
      setTimeout(() => {
        this.generating = false
      }, 1000)

      if (cancelMessage && this.cancelSource) {
        this.cancelSource.cancel(_.isString(cancelMessage) ? cancelMessage : undefined)
        this.cancelSource = null
      }
    },
    clean () {
      this.$q.dialog({
        title: '提示',
        message: '确定要清空设置和图片，重新开始？',
        cancel: true
      }).then(() => {
        this.$store.dispatch('Splash/init')
      }).catch(() => {})
    },
    resize () {
      if (screenfull.enabled) {
        if (screenfull.isFullscreen) {
          screenfull.exit()
          this.fullscreen = false
        } else {
          screenfull.request()
          this.fullscreen = true
        }
      }
    }
  }
}
</script>

<style lang="scss">
.splash-layout-header {
  overflow-x: auto;

  .q-toolbar {
    min-width: 680px;
  }

  .q-field-label {
    width: auto;
    padding-right: 0;
  }

  .q-field-content {
    width: auto;
  }

  .q-option-label {
    margin-left: 4px;
  }
}
</style>
