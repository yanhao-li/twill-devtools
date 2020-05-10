<template>
  <div id="twill-devtools" :class="{active: active}">
    <h1>Twill Devtools</h1>
    <Knob
      @click="handleKnobClick"
      :devtools-active="active"
    />
  </div>
</template>

<script>
  import Knob from './components/Knob';
  export default {
    components: {
      Knob
    },
    data() {
      return {
        active: false
      }
    },
    methods: {
      handleKnobClick() {
        this.active = !this.active;
      }
    }
  }
</script>

<style lang="scss" scoped>
  #twill-devtools {
    position: absolute;
    transition: 0.2s;
    top: 0;
    left: 100%;
    width: 100%;
    height: 100%;
    background-color: #FFF;
    padding: 20px;
    z-index: 999;
  }

  #twill-devtools.active {
    left: 0;
  }
</style>