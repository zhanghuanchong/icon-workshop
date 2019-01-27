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
        <q-field label="屏幕尺寸（px）" label-width="12">
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

        <q-btn color="primary"
               class="full-width mt-10"
               label="切换横竖屏"
               @click="swap"
               icon="mdi-swap-horizontal"></q-btn>

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

export default {
  name: 'SplashLayoutLeftDrawer',
  data () {
    return {
      visible: true
    }
  },
  computed: {
    ...bindState('Splash', 'width'),
    ...bindState('Splash', 'height')
  },
  methods: {
    swap () {
      const a = this.width
      this.width = this.height
      this.height = a
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
