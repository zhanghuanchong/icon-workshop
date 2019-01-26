import _ from 'lodash'

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

export function setCurrentObject (state, o) {
  state.object = o
}
