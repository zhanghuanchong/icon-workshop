import _ from 'lodash'
import Base from './Base'

/**
 * @extends Base
 * @property {string} backgroundColor '#ffffff'
 * @property {array} objects Object
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
