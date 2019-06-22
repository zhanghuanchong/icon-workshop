export default {
  data () {
    return {
      key: +new Date()
    }
  },
  methods: {
    keyed () {
      this.key = +new Date()
    }
  }
}
