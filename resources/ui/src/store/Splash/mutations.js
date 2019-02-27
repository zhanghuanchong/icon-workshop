import _ from 'lodash'
import { DEFAULT_STATE } from './state'

export function update (state, o) {
  _.assignIn(state, o)
}

export function updateChild (state, o) {
  _.assignIn(state[o.key], o.value)
}

export function addObject (state, o) {
  state.scene.objects.push(o)
  state.object = o
}

export function updateObject (state, o) {
  const old = _.find(state.scene.objects, {id: o.id})
  if (old) {
    _.assignIn(old, o)
  }
}

export function removeObject (state, o) {
  const index = _.findIndex(state.scene.objects, { id: o.id })
  if (index >= 0) {
    state.scene.objects.splice(index, 1)
  }
  if (state.object && state.object.id === o.id) {
    setCurrentObject(state, null)
  }
}

export function setCurrentObject (state, o) {
  state.object = o
}

export function init (state) {
  _.assignIn(state, DEFAULT_STATE)
}
