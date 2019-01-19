import _ from 'lodash'
import BaseObject from './BaseObject'

/**
 * @extends BaseObject
 */
export default class Layer extends BaseObject {
  /**
   * @param {object} options
   * @constructor
   */
  constructor (options = {}) {
    super(options)
    _.assignIn(this, {
      proto: 'Layer'
    }, options)
  }

  get description () {
    return '图层'
  }
}
