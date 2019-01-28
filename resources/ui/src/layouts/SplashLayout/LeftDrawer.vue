<template>
  <q-layout-drawer
    class="splash-layout-left-drawer"
    behavior="desktop"
    :width="160"
    v-model="visible"
  >
    <q-tabs align="justify" class="rd-0">
      <q-tab slot="title" name="preview"
             class="horizontal"
             icon="mdi-tablet-cellphone"
             label="预览" default />

      <q-tab-pane name="preview" class="p-0">
        <VuePerfectScrollbar>
          <q-field label="缩放视图" label-width="12">
            <span class="right-label">{{ scale }}倍</span>
            <q-slider v-model="scale"
                      :min="0" :max="3"
                      :step="0.01"></q-slider>
          </q-field>

          <q-field label="屏幕尺寸（px）" class="mt-10" label-width="12">
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
            <q-list no-border highlight separator link class="devices">
              <q-item v-for="d in devices" :key="d.name" @click.native="preview(d)">
                <q-item-side :image="d.image"></q-item-side>
                <q-item-main>
                  <q-item-tile label>{{ d.name }}</q-item-tile>
                  <q-item-tile sublabel>{{ d.width }} x {{ d.height }}</q-item-tile>
                </q-item-main>
              </q-item>
            </q-list>
          </q-field>
        </VuePerfectScrollbar>
      </q-tab-pane>
    </q-tabs>
  </q-layout-drawer>
</template>

<script>
import { bindState } from '../../common'
import VuePerfectScrollbar from 'vue-perfect-scrollbar'

export default {
  name: 'SplashLayoutLeftDrawer',
  components: {
    VuePerfectScrollbar
  },
  data () {
    return {
      visible: true,
      devices: [
        {
          name: 'iPhone X/Xs/XR',
          image: 'statics/devices/iPhoneX.png',
          width: 375,
          height: 812
        },
        {
          name: 'iPhone 6/7/8 Plus',
          image: 'statics/devices/iPhone8Plus.png',
          width: 414,
          height: 736
        },
        {
          name: 'iPhone 6/7/8',
          image: 'statics/devices/iPhone8.png',
          width: 375,
          height: 667
        },
        {
          name: 'iPhone 5s/SE',
          image: 'statics/devices/iPhoneSE.png',
          width: 320,
          height: 568
        },
        {
          name: 'iPad',
          image: 'statics/devices/iPad.png',
          width: 768,
          height: 1024
        }
      ]
    }
  },
  computed: {
    ...bindState('Splash', 'scale'),
    ...bindState('Splash', 'width'),
    ...bindState('Splash', 'height')
  },
  methods: {
    swap () {
      const a = this.width
      this.width = this.height
      this.height = a
    },
    preview (device) {
      this.width = device.width
      this.height = device.height
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
.splash-layout-left-drawer {
  .q-field {
    position: relative;

    .right-label {
      position: absolute;
      top: 0;
      right: 0;
      line-height: 28px;
      font-weight: bold;
      color: var(--q-color-primary);
    }
  }

  .q-list.devices {
    padding: 0;
    margin-left: -10px;
    margin-right: -10px;

    .q-item {
      padding: 8px 10px 5px;
    }

    .q-item-image {
      width: 40px;
      min-width: 40px;
    }
  }

  .ps-container {
    padding: 10px;
    height: calc(100vh - 52px);
  }
}
</style>
