<template>
  <q-list no-border highlight separator class="objects-list">
    <draggable v-model="objects">
      <transition-group name="flip-list">
        <q-item v-for="o in objects" :key="o.id"
                :class="{selected: isSelected(o)}"
                @click.native="toggle(o)">
          <q-item-side>
            <img :src="o.url" alt="">
          </q-item-side>
          <q-item-main>{{ o.description }}</q-item-main>
          <q-item-side right>
            <q-btn round icon="mdi-close"
                   @click.stop="remove(o)"
                   flat size="xs"></q-btn>
          </q-item-side>
        </q-item>
      </transition-group>
    </draggable>
    <q-item class="tip">
      <q-item-main>
        <q-item-tile label>拖动可改变顺序</q-item-tile>
      </q-item-main>
    </q-item>
  </q-list>
</template>

<script>
import draggable from 'vuedraggable'

export default {
  name: 'ObjectList',
  components: {
    draggable
  },
  computed: {
    objects: {
      get () {
        return this.$store.state.Splash.scene.objects
      },
      set (objects) {
        this.$store.commit('Splash/updateObjects', objects)
      }
    },
    current: {
      get () {
        return this.$store.state.Splash.object
      },
      set (object) {
        this.$store.commit('Splash/setCurrentObject', object)
      }
    }
  },
  methods: {
    isSelected (object) {
      return this.current && this.current.id === object.id
    },
    toggle (object) {
      if (this.isSelected(object)) {
        this.current = null
      } else {
        this.current = object
      }
    },
    remove (object) {
      this.$store.commit('Splash/removeObject', object)
    }
  }
}
</script>

<style lang="scss">
.objects-list {
  .q-item {
    padding: 8px 0;
    cursor: pointer;

    &.selected {
      background: rgba(150, 150, 150, 0.4);
    }

    &.tip {
      font-size: 12px;
      color: silver;
      text-align: center;
      cursor: default;
      background: white;
    }

    .q-item-side {
      margin-left: 8px;
      width: 40px;
      justify-content: center;
      align-items: center;
      display: flex;

      > img {
        max-width: 40px;
        max-height: 31px;
      }

      &.q-item-side-right {
        width: auto;
        min-width: 27px;
        margin-left: 3px;
        margin-right: 4px;
      }
    }

    .q-item-main {
      margin-left: 6px;
    }
  }

  .flip-list-move {
    transition: transform 0.3s;
  }
}
</style>
