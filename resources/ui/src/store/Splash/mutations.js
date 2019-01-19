import _ from 'lodash'

export function update (state, o) {
  _.assignIn(state, o)
}
