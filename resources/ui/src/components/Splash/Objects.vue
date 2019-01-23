<template>
  <q-list no-border highlight separator striped class="objects-list">
    <q-item v-for="o in objects" :key="o.id">
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
    }
  }
}
</script>

<style lang="scss">
.objects-list {
  .q-item {
    padding: 8px 0;
    cursor: pointer;

    .q-item-side {
      width: 50px;
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
