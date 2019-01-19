import _ from 'lodash'
import Base from './Base'

/**
 * @extends Base
 * @property {string} backgroundColor '#ffffff'
 * @property {array} platforms ['ios', 'android']
 * @property {array} orientations ['portrait', 'landscape']
 */
export default class Scene extends Base {
  /**
   * @param {object} options
   * @constructor
   */
  constructor (options = {}) {
    super(options)
    _.assignIn(this, {
      proto: 'Scene',
      backgroundColor: '#ffffff',
      platforms: ['ios', 'android'],
      orientations: ['portrait', 'landscape'],
      hidden: false,
      objects: []
    }, options)
  }

  clone () {
    const n = super.clone()
    n.objects = this.objects.map(v => v.clone())
    return n
  }
}
