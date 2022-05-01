<template>
  <v-container>
    <v-row class="text-center">
      <HeaderCarousel />
      <v-col 
        cols="12"
        offset-lg="3"
        lg="6"
      >
        <h1 class="text-sm-h3 text-md-h2">
          Happy Wedding
        </h1>
        <br>
        <v-sheet
          color="white"
          elevation="15"
          height="620"
          width="auto"
        >
          <br>
          <h2 class="text-sm-h4 text-md-h3">Web招待状</h2>
          <br>
          <p class="text-body-2 text-md-body-1">謹啓 〇〇の候（時候の挨拶）</p>
          <p class="text-body-2 text-md-body-1">皆様にはますます</p>
          <p class="text-body-2 text-md-body-1">ご清祥のこととお慶び申し上げます</p>

          <p class="text-body-2 text-md-body-1">この度 私たちは結婚式を挙げることになりました</p>
          <p class="text-body-2 text-md-body-1">つきましては 日ごろお世話になっている皆様に</p>
          <p class="text-body-2 text-md-body-1">お集まりいただき</p>
          <p class="text-body-2 text-md-body-1">ささやかな披露宴を催したいと存じます</p>

          <p class="text-body-2 text-md-body-1">ご多用中 誠に恐縮ではございますが</p>
          <p class="text-body-2 text-md-body-1">ご来臨の栄を賜りたく 謹んでご案内申し上げます</p>
          <p class="text-body-2 text-md-body-1">敬白</p>

          <p class="text-body-2 text-md-body-1">20●●年●月吉日</p>
          <p class="text-body-2 text-md-body-1">新郎名 阿部弘幸</p>
          <p class="text-body-2 text-md-body-1">新婦名 阿部悠香</p>

        </v-sheet>
      </v-col>
      <v-col 
        cols="12"
        offset-lg="3"
        lg="6"
      >
        <br>
        <br>
        <h2>Schedule</h2>
        <v-sheet height="400">
          <v-calendar
            color="primary"
            type="day"
          >
            <template v-slot:day-header="{ present }">
              <div
                v-if="present"
                class="text-center"
              >
                2022年7月23日
              </div>
            </template>

            <template v-slot:interval="{ hour }">
              <div
                class="text-center"
              >
                {{ hour }} o'clock
              </div>
            </template>
          </v-calendar>
        </v-sheet>
      </v-col>
      <v-col
        cols="12"
      >
        <v-btn
          x-large
          color="primary"
          dark
          @click="InputFormPage"
        >
          リモート参加予約
        </v-btn>
      </v-col>
    </v-row>  
  </v-container>
</template>

<script>
  // import { getVer } from '@/api/Route'
  import HeaderCarousel from '@/components/HeaderCarousel'
  export default {
    name: 'TopPage',
    components: {
      HeaderCarousel
    },
    // beforeCreate() {
    //   this.$router.push('/')
    // },
    // async created() {
    //   const response = await getVer()
    //   console.log(response)
    // },
    data: () => ({
      colors: [
        'indigo',
        'warning',
        'pink darken-2',
        'red lighten-1',
        'deep-purple accent-4',
      ],
      focus: '',
      events: [],
      colors2: ['blue', 'indigo', 'deep-purple', 'cyan', 'green', 'orange', 'grey darken-1'],
      names: ['Meeting', 'Holiday', 'PTO', 'Travel', 'Event', 'Birthday', 'Conference', 'Party'],
      categories: ['John Smith', 'Tori Walker'],
    }),
    methods: {
      InputFormPage() {
        this.$router.push({ name: 'InputForm'})
      }
    }
  }
</script>
<style scoped>

</style>
