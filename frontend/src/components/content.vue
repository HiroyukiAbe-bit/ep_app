<template>
  <v-container>
    <v-row class="text-center">
      <v-col cols="12">
        <v-carousel
          :show-arrows="false"
          cycle
          height="400"
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

      <v-col cols="12">
        <h1 class="display-2 font-weight-bold mb-3">
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
          
          <h2>Web招待状</h2>
          <br>
          <p>謹啓 〇〇の候（時候の挨拶）</p>
          <p>皆様にはますます</p>
          <p>ご清祥のこととお慶び申し上げます</p>

          <p>この度 私たちは結婚式を挙げることになりました</p>
          <p>つきましては 日ごろお世話になっている皆様に</p>
          <p>お集まりいただき</p>
          <p>ささやかな披露宴を催したいと存じます</p>

          <p>ご多用中 誠に恐縮ではございますが</p>
          <p>ご来臨の栄を賜りたく 謹んでご案内申し上げます</p>
          <p>敬白</p>

          <p>20●●年●月吉日</p>
          <p>新郎名 阿部弘幸</p>
          <p>新婦名 阿部悠香</p>

        </v-sheet>
      </v-col>
      <v-col cols="12">
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
        >
          リモート参加予約
        </v-btn>
      </v-col>
    </v-row>  
  </v-container>
</template>

<script>
  import { getVer } from '@/api/Route'
  export default {
    name: 'contentMain',
    components: {
    },
    async created() {
      const response = await getVer()
      console.log(response)
    },
    mounted () {
      this.$refs.calendar.checkChange()
    },
    data: () => ({
      colors: [
        'indigo',
        'warning',
        'pink darken-2',
        'red lighten-1',
        'deep-purple accent-4',
      ],
      images: [
        {
          src: 'assets/image1.jpg',
        },
        {
          src: 'assets/image4.png',
        },
        {
          src: 'assets/image5.jpeg',
        },
        {
          src: 'assets/image3.jpeg',
        },
      ],
      focus: '',
      events: [],
      colors2: ['blue', 'indigo', 'deep-purple', 'cyan', 'green', 'orange', 'grey darken-1'],
      names: ['Meeting', 'Holiday', 'PTO', 'Travel', 'Event', 'Birthday', 'Conference', 'Party'],
      categories: ['John Smith', 'Tori Walker'],
    }),
    methods: {
      getEventColor (event) {
        return event.color
      },
      setToday () {
        this.focus = ''
      },
      prev () {
        this.$refs.calendar.prev()
      },
      next () {
        this.$refs.calendar.next()
      },
      fetchEvents ({ start, end }) {
        const events = []

        const min = new Date(`${start.date}T00:00:00`)
        const max = new Date(`${end.date}T23:59:59`)
        const days = (max.getTime() - min.getTime()) / 86400000
        const eventCount = this.rnd(days, days + 20)

        for (let i = 0; i < eventCount; i++) {
          const allDay = this.rnd(0, 3) === 0
          const firstTimestamp = this.rnd(min.getTime(), max.getTime())
          const first = new Date(firstTimestamp - (firstTimestamp % 900000))
          const secondTimestamp = this.rnd(2, allDay ? 288 : 8) * 900000
          const second = new Date(first.getTime() + secondTimestamp)

          events.push({
            name: this.names[this.rnd(0, this.names.length - 1)],
            start: first,
            end: second,
            color: this.colors2[this.rnd(0, this.colors2.length - 1)],
            timed: !allDay,
            category: this.categories[this.rnd(0, this.categories.length - 1)],
          })
        }

        this.events = events
      },
      rnd (a, b) {
        return Math.floor((b - a + 1) * Math.random()) + a
      },
    }
  }
</script>
