import _ from 'lodash'
import Base from './Base'
import Scene from './Scene'
import Objects from './Objects'

const classes = {
  Base,
  Scene,
  ...Objects
}

function deserialize (object) {
  if (!object || !object.proto) {
    return object
  }
  const proto = object.proto
  if (!classes[proto]) {
    return object
  }
  const inst = new classes[proto](object)
  _.forEach(inst, v => {
    if (_.isArray(v)) {
      _.forEach(v, (_v, _k) => {
        v[_k] = deserialize(_v)
      })
    }
  })
  return inst
}

export {
  deserialize
}
