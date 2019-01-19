import _ from 'lodash'

export function update (state, o) {
  _.assignIn(state, o)
}

export function updateChild (state, o) {
  _.assignIn(state[o.key], o.value)
}
