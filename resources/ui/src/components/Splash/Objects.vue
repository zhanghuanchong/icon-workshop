<template>
  <q-list no-border highlight separator class="objects-list">
    <q-item v-for="o in objects" :key="o.id"
            :class="{selected: isSelected(o)}"
            @click.native="toggle(o)">
      <q-item-side>
        <img :src="o.url" alt="">
      </q-item-side>
      <q-item-main>{{ o.description }}</q-item-main>
    </q-item>
  </q-list>
</template>

<script>
export default {
  name: 'Objects',
  computed: {
    objects () {
      return this.$store.state.Splash.scene.objects
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

    .q-item-side {
      width: 64px;
      justify-content: center;
      align-items: center;
      display: flex;

      > img {
        max-width: 50px;
        max-height: 33px;
      }
    }

    .q-item-main {
      margin-left: 8px;
    }
  }
}
</style>
