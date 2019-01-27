<template>
  <div class="marvel-device"
       :class="deviceClass">
    <template v-if="name === 'iphone-x'">
      <div class="notch">
        <div class="camera"></div>
        <div class="speaker"></div>
      </div>
      <div class="top-bar"></div>
      <div class="sleep"></div>
      <div class="bottom-bar"></div>
      <div class="volume"></div>
      <div class="overflow">
        <div class="shadow shadow--tr"></div>
        <div class="shadow shadow--tl"></div>
        <div class="shadow shadow--br"></div>
        <div class="shadow shadow--bl"></div>
      </div>
      <div class="inner-shadow"></div>
      <div class="screen">
        <slot></slot>
      </div>
    </template>
    <template v-else-if="name === 'note8'">
      <div class="inner"></div>
      <div class="overflow">
        <div class="shadow"></div>
      </div>
      <div class="speaker"></div>
      <div class="sensors"></div>
      <div class="more-sensors"></div>
      <div class="sleep"></div>
      <div class="volume"></div>
      <div class="camera"></div>
      <div class="screen">
        <slot></slot>
      </div>
    </template>
    <template v-else-if="['iphone8', 'iphone8plus', 'iphone5s', 'iphone5c', 'iphone4s'].includes(name)">
      <div class="top-bar"></div>
      <div class="sleep"></div>
      <div class="volume"></div>
      <div class="camera"></div>
      <div class="sensor"></div>
      <div class="speaker"></div>
      <div class="screen">
        <slot></slot>
      </div>
      <div class="home"></div>
      <div class="bottom-bar"></div>
    </template>
    <template v-else-if="name === 'ipad'">
      <div class="camera"></div>
      <div class="screen">
        <slot></slot>
      </div>
      <div class="home"></div>
    </template>
    <template v-else-if="name === 'nexus5'">
      <div class="top-bar"></div>
      <div class="sleep"></div>
      <div class="volume"></div>
      <div class="camera"></div>
      <div class="screen">
        <slot></slot>
      </div>
    </template>
    <template v-else-if="name === 'lumia920'">
      <div class="top-bar"></div>
      <div class="volume"></div>
      <div class="camera"></div>
      <div class="speaker"></div>
      <div class="screen">
        <slot></slot>
      </div>
    </template>
    <template v-else-if="name === 's5'">
      <div class="top-bar"></div>
      <div class="sleep"></div>
      <div class="camera"></div>
      <div class="sensor"></div>
      <div class="speaker"></div>
      <div class="screen">
        <slot></slot>
      </div>
      <div class="home"></div>
    </template>
    <template v-else-if="name === 'htc-one'">
      <div class="top-bar"></div>
      <div class="camera"></div>
      <div class="sensor"></div>
      <div class="speaker"></div>
      <div class="screen">
        <slot></slot>
      </div>
    </template>
    <template v-else-if="name === 'macbook'">
      <div class="top-bar"></div>
      <div class="camera"></div>
      <div class="screen">
        <slot></slot>
      </div>
      <div class="bottom-bar"></div>
    </template>
  </div>
</template>

<script>
export default {
  name: 'Device',
  props: {
    name: {
      type: String,
      default: 'iphone-x',
      validator (value) {
        return [
          'iphone-x', 'iphone-8', 'iphone-8plus',
          'iphone-5s', 'iphone-5c', 'iphone-4s',
          'ipad-mini', 'nexus-5', 'htc-one',
          'galaxy-s5', 'galaxy-note8', 'macbook-pro'
        ].indexOf(value) !== -1
      }
    },
    color: {
      type: String,
      default () {
        if (['iphone8', 'iphone8plus', 'ipad'].includes(this.name)) {
          return 'silver'
        } else if (['iphone5s', 'iphone4s'].includes(this.name)) {
          return 'black'
        } else if (['iphone5c'].includes(this.name)) {
          return 'green'
        } else if (['lumia920'].includes(this.name)) {
          return 'yellow'
        } else if (['s5'].includes(this.name)) {
          return 'white'
        }
        return ''
      },
      validator (value) {
        return [
          'white', 'red', 'yellow',
          'black', 'blue', 'gold',
          'silver', '', null, undefined
        ].indexOf(value) !== -1
      }
    },
    portrait: {
      type: Boolean,
      default: true
    },
    landscape: {
      type: Boolean,
      default: false
    }
  },
  computed: {
    deviceClass () {
      return [
        this.name,
        this.class || '',
        (this.landscape || !this.portrait) ? 'landscape' : ''
      ]
    }
  }
}
</script>

<style lang="scss">
  .marvel-device {
    transform: scale(0.15);
  }
</style>
