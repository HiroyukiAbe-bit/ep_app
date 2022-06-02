<template>
  <v-app>
    <img class="bg_f" src='assets/bg.jpg'>
    <v-main class="bg">
      <transition mode="out-in">
        <router-view/>
      </transition>
    </v-main>
  </v-app>
</template>

<script>

export default {
  name: 'App',

  data: () => ({
  }),
};
</script>
<style scoped>
  .v-enter {
    transform: translate(-100px, 0);
    opacity: 0;
  }
  .v-enter-to {
    opacity: 1;
  }
  .v-enter-active {
    transition: all 1s 0s ease;
  }
  .v-leave {
    transform: translate(0, 0);
    opacity: 1;
  }
  .v-leave-to {
    transform: translate(100px, 0);
    opacity: 0;
  }
  .v-leave-active {
    transition: all .5s 0s ease;
  }
  .bg_f {
    position: fixed; /* 要素の位置を固定する */
    bottom: 0; /* 基準の位置を画面の一番下に指定する */
    right: 0; /* 基準の位置を画面の一番右に指定する */
    width: 400px; /* 幅を指定する */
  }

</style>
