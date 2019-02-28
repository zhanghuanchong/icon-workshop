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
                      label="iOS"
                      val="ios"></q-checkbox>
          <q-checkbox v-model="platforms"
                      checked-icon="mdi-android"
                      unchecked-icon="mdi-android mdi-inactive"
                      label="Android"
                      val="android"
                      class="ml-10"></q-checkbox>
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
               class="ml-auto"
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
                  @cancel="cancel"
                  :cancellable="true"></LoadingModal>
  </q-layout-header>
</template>

<script>
import { bindStateChild, request, redirectRoot } from '../../common'
import VuePerfectScrollbar from 'vue-perfect-scrollbar'
import LoadingModal from '../../components/LoadingModal'

export default {
  name: 'SplashLayoutHeader',
  components: {
    VuePerfectScrollbar,
    LoadingModal
  },
  data: () => ({
    generating: false,
    loadingModal: false
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
      const resp = await request(`/api/splash/generate`, 'post', {
        scene: this.$store.state.Splash.scene
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
    cancel () {
      this.loadingModal = false
      setTimeout(() => {
        this.generating = false
      }, 1000)
    },
    clean () {
      this.$q.dialog({
        title: '提示',
        message: '确定要清空设置和图片，重新开始？',
        cancel: true
      }).then(() => {
        this.$store.dispatch('Splash/init')
      }).catch(() => {})
    }
  }
}
</script>

<style lang="scss">
.splash-layout-header {
  overflow-x: auto;

  .q-toolbar {
    min-width: 660px;
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
