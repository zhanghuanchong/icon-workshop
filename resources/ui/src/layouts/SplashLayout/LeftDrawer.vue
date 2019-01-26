<template>
  <q-layout-drawer
    behavior="desktop"
    :width="160"
    v-model="visible"
  >
    <q-tabs align="justify" class="rd-0">
      <q-tab slot="title" name="preview"
             class="horizontal"
             icon="mdi-tablet-cellphone"
             label="预览" default />

      <q-tab-pane name="preview">
        <q-field label="设备方向" label-width="12" class="field-content-center">
          <q-btn-toggle v-model="orientation"
                        :options="orientations"></q-btn-toggle>
        </q-field>
        <q-field label="屏幕尺寸（px）" label-width="12" class="mt-15">
          <div class="row mt-5">
            <q-input type="number" v-model="width"
                     class="col-5" align="center"
                     min="320" max="5000"></q-input>
            <span class="text-center col-2 pt-3">x</span>
            <q-input type="number" v-model="height"
                     class="col-5" align="center"
                     min="320" max="5000"></q-input>
          </div>
        </q-field>
        <q-field label="常用设备" label-width="12" class="mt-15">
          <div class="row mt-5">
          </div>
        </q-field>
      </q-tab-pane>
    </q-tabs>
  </q-layout-drawer>
</template>

<script>
import { bindState } from '../../common'
import _ from 'lodash'

export default {
  name: 'SplashLayoutLeftDrawer',
  data () {
    return {
      visible: true,
      orientations: []
    }
  },
  computed: {
    ...bindState('Splash', 'orientation'),
    ...bindState('Splash', 'width'),
    ...bindState('Splash', 'height'),

    targetOrientations () {
      return this.$store.state.Splash.scene.orientations
    }
  },
  watch: {
    targetOrientations: {
      immediate: true,
      handler () {
        this.updateOrientations()
      }
    }
  },
  methods: {
    updateOrientations () {
      const result = []
      if (_.includes(this.targetOrientations, 'portrait')) {
        result.push({
          value: 'portrait',
          icon: 'mdi-cellphone-iphone'
        })
      }
      if (_.includes(this.targetOrientations, 'landscape')) {
        result.push({
          value: 'landscape',
          icon: 'mdi-cellphone-iphone mdi-rotate-90'
        })
      }
      if (!_.find(result, { value: this.orientation })) {
        let reset = null
        if (result.length) {
          reset = result[0].value
        }
        this.orientation = reset
      }
      this.orientations = result
    }
  },
  mounted () {
    this.$nextTick(() => {
      this.visible = true
    })
  }
}
</script>

<style lang="scss">

</style>
