<template>
  <q-layout-drawer
    class="splash-layout-right-drawer"
    :class="{selected: object}"
    side="right"
    :width="160"
    behavior="desktop"
    v-model="visible"
  >
    <q-tabs align="justify" class="rd-0 tabs-layers">
      <q-tab default slot="title"
             class="horizontal"
             name="layers"
             icon="mdi-layers" label="图层" />

      <q-tab-pane name="layers" class="p-0">
        <VuePerfectScrollbar>
          <div class="column ph-8 pt-6">
            <q-btn color="secondary" icon="mdi-plus"
                   @click="chooseImage"
                   label="图片">
              <q-tooltip>支持 jpg/png/gif</q-tooltip>
            </q-btn>
            <q-btn color="secondary" icon="mdi-plus"
                   class="mt-8"
                   v-if="false"
                   label="文字"></q-btn>
          </div>

          <ObjectList></ObjectList>
        </VuePerfectScrollbar>
      </q-tab-pane>
    </q-tabs>

    <ObjectSetting v-if="object"></ObjectSetting>
  </q-layout-drawer>
</template>

<script>
import Image from '../../models/Objects/Image'
import ObjectList from '../../components/Splash/ObjectList'
import ObjectSetting from '../../components/Splash/ObjectSetting'
import VuePerfectScrollbar from 'vue-perfect-scrollbar'

export default {
  name: 'SplashLayoutRightDrawer',
  components: {
    ObjectList,
    ObjectSetting,
    VuePerfectScrollbar
  },
  data () {
    return {
      visible: true
    }
  },
  computed: {
    object () {
      return this.$store.state.Splash.object
    }
  },
  methods: {
    chooseImage () {
      this.$root.$emit('show-upload-dialog', {
        type: 'image',
        _cb: file => {
          this.$store.commit('Splash/addObject', new Image({
            url: file
          }))
        }
      })
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
.splash-layout-right-drawer {
  .q-layout-drawer {
    display: flex;
    flex-direction: column;
  }

  .tabs-layers {
    .ps-container {
      height: calc(100vh - 67px);
      overflow: auto;
    }
  }

  &.selected {
    .tabs-layers {
      .ps-container {
        height: calc(100vh - 367px);
      }
    }
  }
}
</style>
