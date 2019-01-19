import _ from 'lodash'
import Base from '../Base'

/**
 * @extends Base
 * @property {float} left
 * @property {float} top
 * @property {float} width
 * @property {float} height
 * @property {float} scale
 * @property {number} version
 */
export default class BaseObject extends Base {
  /**
   * @param {object} options
   * @constructor
   */
  constructor (options = {}) {
    super(options)
    _.assignIn(this, {
      proto: 'BaseObject',
      left: 0,
      top: 0,
      width: undefined,
      height: undefined,
      scale: 1,
      version: 0
    }, options)
  }

  position () {
    return {
      left: this.left,
      top: this.top
    }
  }

  size () {
    return {
      width: this.width,
      height: this.height
    }
  }

  get description () {
    return '对象'
  }
}
