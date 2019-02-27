import Scene from '../../models/Scene'

export function init (context) {
  const scene = new Scene()
  context.commit('init')
  context.commit('update', {
    scene
  })
}
