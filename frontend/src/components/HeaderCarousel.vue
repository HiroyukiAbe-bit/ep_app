<template>
  <v-col
    cols="12"
    offset-lg="2"
    lg="8"
  >
    <v-carousel
      :show-arrows="false"
      cycle
      height="300"
      hide-delimiter-background
      show-arrows-on-hover
    >
      <v-carousel-item
        v-for="(item,i) in images"
        :key="i"
        :src="item.src"
      >
      </v-carousel-item>
    </v-carousel>
  </v-col>
</template>

<script>
  export default {
    name: 'HeaderCarousel',
    components: {
    },
    data: () => ({
      images: [
        { src: 'assets/image1.jpg' },
        { src: 'assets/image4.png' },
        { src: 'assets/image5.jpeg' },
        { src: 'assets/image3.jpg' },
      ]
    })
  }
</script>
