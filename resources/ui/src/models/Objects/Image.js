import _ from 'lodash'
import BaseObject from './BaseObject'

/**
 * @extends BaseObject
 * @property {string} url - Image url
 */
export default class Image extends BaseObject {
  /**
   * @param {object} options
   * @constructor
   */
  constructor (options = {}) {
    super(options)
    _.assignIn(this, {
      proto: 'Image',
      url: null
    }, options)

    if (this.url && (this.width === undefined || this.height === undefined)) {
      const img = new window.Image()
      const self = this
      img.onload = function () {
        self.width = this.width
        self.height = this.height
      }
      img.src = this.url
    }
  }

  get description () {
    return '图片'
  }
}
