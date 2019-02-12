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

        <q-btn color="positive"
               push
               @click="generate"
               :disable="$v.$invalid"
               class="ml-auto"
               icon="mdi-auto-fix"
               icon-right="mdi-chevron-right"
               label="生成"></q-btn>
      </q-toolbar>
    </VuePerfectScrollbar>
  </q-layout-header>
</template>

<script>
import { bindStateChild, request, redirectRoot } from '../../common'
import VuePerfectScrollbar from 'vue-perfect-scrollbar'

export default {
  name: 'SplashLayoutHeader',
  components: {
    VuePerfectScrollbar
  },
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
      this.$q.loading.show()
      const resp = await request(`/api/splash/generate`, 'post', {
        scene: this.$store.state.Splash.scene
      })
      this.$q.loading.hide()
      if (resp.success) {
        this.$q.notify({
          type: 'positive',
          message: '生成成功！即将开始下载...',
          position: 'top',
          icon: 'mdi-download'
        })
        redirectRoot(`/splash/download/${resp.data}`)
      }
    }
  }
}
</script>

<style lang="scss">
.splash-layout-header {
  overflow-x: auto;

  .q-toolbar {
    min-width: 600px;
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
