import moment from 'moment'
import _ from 'lodash'

const time = moment.unix()
const name = `singleton-component-${time}`

export default {
  name,
  data () {
    return {
      visible: false,
      origin: null,
      entity: null
    }
  },
  methods: {
    show () {},
    _preShow () {},
    _show (arg = {}) {
      this._preShow(arg)
      this.visible = true
      this.origin = arg
      if (!('_cb' in arg)) {
        this.entity = _.cloneDeep(arg)
      } else {
        this.entity = null
      }
      this.show(arg)
    },
    hide () {},
    _preHide () {},
    _hide (arg = {}) {
      this._preHide(arg)
      this.visible = false
      this.entity = null
      this.hide(arg)
    }
  },
  mounted () {
    this.$root.$on(`show-${this.$options.name}`, this._show)
    this.$root.$on(`hide-${this.$options.name}`, this._hide)
  },
  beforeDestroy () {
    this.$root.$off(`show-${this.$options.name}`, this._show)
    this.$root.$off(`hide-${this.$options.name}`, this._hide)
  }
}
