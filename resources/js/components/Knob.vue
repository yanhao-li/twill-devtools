<template>
  <div
    id="twill-devtools-handle"
    :class="{collapsed: collapsed, 'devtools-active': devtoolsActive}"
    @mouseover="collapsed=false"
    @mouseleave="collapsed=true"
    @click="handleClick"
  >
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20pt" height="9pt" viewBox="0 0 20 9" version="1.1" v-if="!collapsed">
      <g id="surface1">
        <path style=" stroke:none;fill-rule:nonzero;fill:#FFF;fill-opacity:1;" d="M 15.273438 0.75 L 17.089844 0.75 L 17.089844 8.625 L 15.273438 8.625 Z M 17.816406 0.75 L 19.636719 0.75 L 19.636719 8.625 L 17.816406 8.625 Z M 9.738281 6.21875 L 8.449219 3.375 L 6.960938 3.375 L 5.734375 6.042969 L 4.558594 3.375 L 2.910156 3.375 L 2.910156 1.875 L 1.089844 1.875 L 1.089844 3.375 L 0.363281 3.375 L 0.363281 4.875 L 1.089844 4.875 L 1.089844 8.625 L 2.910156 8.625 L 2.910156 4.875 L 3.394531 4.875 L 5.285156 8.625 L 6.539062 8.625 L 7.785156 5.714844 L 9.089844 8.625 L 10.324219 8.625 L 12.253906 4.875 L 12.726562 4.875 L 12.726562 8.625 L 14.546875 8.625 L 14.546875 3.375 L 11.03125 3.375 Z M 9.738281 6.21875 "/>
        <path style=" stroke:none;fill-rule:nonzero;fill:#FFF;fill-opacity:1;" d="M 14.683594 1.6875 C 14.683594 2.28125 14.214844 2.765625 13.636719 2.765625 C 13.058594 2.765625 12.589844 2.28125 12.589844 1.6875 C 12.589844 1.09375 13.058594 0.609375 13.636719 0.609375 C 14.214844 0.609375 14.683594 1.09375 14.683594 1.6875 Z M 14.683594 1.6875 "/>
      </g>
    </svg>
  </div>
</template>

<script>
export default {
  data() {
    return {
      collapsed: true,
    }
  },
  props: {
    devtoolsActive: {
      type: Boolean,
      default: false
    }
  },
  methods: {
    handleClick() {
      this.$emit('click')
    }
  }
}
</script>

<style lang="scss" scoped>
  #twill-devtools-handle {
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    right: 100%;
    top: 50%;
    width: 50px;
    height: 50px;
    background-color: #793CB8;
    cursor: pointer;
    .twill-logo {
      display: block;
      position: absolute;
      background-size: 10px 20px;
    }
  }

  #twill-devtools-handle.devtools-active {
    left: 0;
  }

  #twill-devtools-handle.collapsed {
    transition: 0.1s;
    width: 10px;
  }
</style>