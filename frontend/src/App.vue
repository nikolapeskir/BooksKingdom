<template>
  <v-app app id="app">
    <router-view></router-view>
    <confirm-dialog ref="confirm" />
  </v-app>
</template>

<script>
export default {}
</script>

<style lang="stylus">
  @import "./assets/stylus/main.styl";
</style>
