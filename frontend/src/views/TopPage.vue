<template>
  <v-container>
    <v-row class="text-center content">
      <HeaderCarousel />
      <v-col 
        cols="12"
        offset-lg="3"
        lg="6"
      >
        <h2 class="heading03"><div class="title">御挨拶</div></h2>
        <br>
        <v-sheet
          color="white"
          elevation="15"
          height="550"
          width="auto"
        >
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
        col="12"
        offset-lg="3"
        lg="6"
      >
        <div class="map_container">
          <h2 class="map_head"><span>会場</span></h2>
          <v-card
            class="mx-auto my-12"
          >
            <template slot="progress">
              <v-progress-linear
                height="10"
                indeterminate
              ></v-progress-linear>
            </template>
            <v-card-title></v-card-title>
            <v-card-text>
              <v-row
                align="center"
                class="mx-0"
              >
                <GmapMap
                  :center="{ lat:33.58852908047567, lng:130.39839768421834 }"
                  :zoom="16"
                  :options="{streetViewControl: false}"
                  map-type-id="terrain"
                  style="width: 100%; height: 300px"
                >
                  <GmapMarker
                    :key="index"
                    v-for="(m, index) in markers"
                    :position="m.position"
                    :clickable="true"
                    @click="center=m.position"
                  />
                </GmapMap>
              </v-row>
              <br>
              <br>
              <p class="text-body-3 text-md-body-1 font-color">
                結婚式会場:リストランテkubotsu<br>
                〒810-0001 福岡県福岡市中央区天神2丁目5-55 4F</p>
            </v-card-text>
          </v-card>
        </div>
      </v-col>
      <v-col 
        cols="12"
        offset-lg="3"
        lg="6"
      >
        <h2 class="schedule_head"><span>開催日時</span></h2>
        <b class="sample">7月23日 土曜日</b>
      </v-col>
      <v-col 
        cols="12"
        offset-lg="3"
        lg="6"
      >
        <br>
        <h2 class="schedule_head"><span>当日のタイムスケジュール</span></h2>
        <v-card
          class="mx-auto"
          outlined
        >
          <table>
            <tr>
              <th class="table_head">時刻</th>
              <td class="table_head">イベント</td>
            </tr>
            <tr>
              <th class="content_head">10:30</th>
              <td class="table_content">受付開始</td>
            </tr>
            <tr>
              <th class="content_head">11:00</th>
              <td class="table_content">人前式</td>
            </tr>
            <tr>
              <th class="content_head">11:30</th>
              <td class="table_content">披露宴</td>
            </tr>
            <tr>
              <th class="content_head">14:00</th>
              <td>閉宴</td>
            </tr>
          </table>
        </v-card>
        
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
          ご出席登録はこちら
        </v-btn>
      </v-col>
    </v-row> 
  </v-container>
</template>

<script>
  import HeaderCarousel from '@/components/HeaderCarousel'
  export default {
    name: 'TopPage',
    components: {
      HeaderCarousel
    },
    data: () => ({
      markers: [{ position: { lat:33.58852908047567, lng:130.39839768421834 } }],
      colors: [
        'indigo',
        'warning',
        'pink darken-2',
        'red lighten-1',
        'deep-purple accent-4',
      ],
      focus: '',
      events: [
        {
          name: '会議',
          start: new Date('2022-07-23T01:00:00'),
          end: new Date('2022-07-23T02:00:00'),
          color: 'blue',
          timed: true,
        },
     ],
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
  .title {
    min-width: 250px;
    font-weight: bold;
  }

  .greeting_head span {
    display: flex;
    align-items: center;
    color: black;
    font-size: 18px;
    text-transform: uppercase;
    position:  relative;        /* 要素の配置方法を指定 */
    bottom: 15px;                  /* 上からの位置指定 */
  }

  .greeting_head span::before  {
    content: '';
    display: inline-block;
    margin-right: 20px;
    width: 40px;
    height: 1px;
    background-color: black;
  }

  .schedule_head span{
    display: flex;
    align-items: center;
    color: black;
    font-size: 18px;
    text-transform: uppercase;
    position:  relative;        /* 要素の配置方法を指定 */
    bottom: 20px;                  /* 上からの位置指定 */
  }

  .schedule_head span::before {
    content: '';
    display: inline-block;
    margin-right: 20px;
    width: 40px;
    height: 1px;
    background-color: black;
  }

  .map_head span {
    display: flex;
    align-items: center;
    color: black;
    font-size: 18px;
    text-transform: uppercase;
    position:  relative;        /* 要素の配置方法を指定 */
    top: 30px;                  /* 上からの位置指定 */
  }

  .map_head span::before {
    content: '';
    display: inline-block;
    margin-right: 20px;
    width: 40px;
    height: 1px;
    background-color: #696969;
  }

  .heading03 {
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
  }

  .heading03::before,.heading03::after {
    content: '';
    width: 100%;
    height: 1px;
    background-color: #696969;
  }

  .table_head {
    background-color: #696969;
    color: white;
  }

  table {
    width: 100%;
    border-collapse: collapse;
  }

  table tr th, table tr .table_head {
    border-bottom: solid 2px white;
  }

  table tr:last-child {
    border-bottom: none;
  }

  .content_head {
    position: relative;
    text-align: left;
    width: 30%;
    background-color: #F06292;
    color: white;
    text-align: center;
    padding: 10px 0;
  }
 
  .content_head:after {
    display: block;
    content: "";
    width: 0px;
    height: 0px;
    position: absolute;
    top:calc(50% - 10px);
    right:-10px;
    border-left: 10px solid #F06292;
    border-top: 10px solid transparent;
    border-bottom: 10px solid transparent;
  }

  table td  {
    text-align: left;
    width: 70%;
    text-align: center;
    background-color: white;
    padding: 10px 0;
  }

  .table_content {
    border-bottom: dotted 1px #d3d3d3;
  }

  .font-color {
    color: black;
  }

  .sample {
    font-size:2em;
    text-align:center;
    line-height:0.95em; 
    font-weight:bold;
    color: #FFF;
    text-shadow: 
      0 0 0.05em #F06292,
      0 0 0.10em #F06292,
      0 0 0.15em #F06292,
      0 0 0.30em #F06292;
    filter: saturate(80%);
  }

</style>
