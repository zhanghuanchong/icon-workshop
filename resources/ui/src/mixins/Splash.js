export default {
  computed: {
    splash () {
      return this.$store.state.Splash
    },
    scene () {
      return this.$store.state.Splash.scene
    },
    baseScale () {
      const width = this.splash.width
      const height = this.splash.height
      const short = Math.min(width, height)
      let baseScale = short / 375

      const rate = width / height
      if (rate >= 1) {
        baseScale *= 0.625
      } else if (rate >= 0.75) {
        baseScale *= 0.75
      } else if (rate >= 0.66) {
        baseScale *= 0.875
      }

      return baseScale
    }
  }
}
