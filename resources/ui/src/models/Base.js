import _ from 'lodash'
import guid from 'uuid/v4'

/**
 * @class Base
 * @property {string} id guid
 * @property {string} proto
 * @property {boolean} hidden
 */
export default class Base {
  /**
   * @param {object} options
   * @constructor
   */
  constructor (options = {}) {
    _.assignIn(this, {
      id: guid(),
      proto: 'Base',
      hidden: false
    }, options)
  }

  clone () {
    const n = _.clone(this)
    n.id = guid()
    return n
  }

  get description () {
    return this.proto
  }
}
