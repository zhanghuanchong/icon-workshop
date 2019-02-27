import _ from 'lodash'

const DEFAULT_STATE = {
  object: null,
  orientation: 'portrait',
  device: 'iphone6',
  width: 375,
  height: 667,
  scale: 1,
  autoScale: true
}

export {
  DEFAULT_STATE
}

export default _.defaults({
  scene: null
}, DEFAULT_STATE)
