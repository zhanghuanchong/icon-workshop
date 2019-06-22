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
    }

    get description () {
        return '图片'
    }
}
