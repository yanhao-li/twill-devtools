<template>
  <p>{{ greeting }}</p>
</template>

<script>
  export default {
    data: function () {
      greeting: 'Hello, this is Twill Devtools'
    }, 
    mounted() {
      console.log('Twill devtools mounted.')
    }
  }
</script>