<template>
  <v-container>
    <v-row>
      <v-col
        cols="12"
      >
        <v-row
          class="primary"
        >
          <v-col
            class="d-flex align-center" 
            style="height: 100px;"
            align-content="center"
            cols="10"
          >
            <h1
              class="white--text"
            >
            参加者一覧
            </h1>
          </v-col>
          <v-col
            style="height: 100px;"
            class="d-flex align-center flex-row-reverse"
            cols="2"
            >
            <v-btn
              depressed
              color="secondary"
              @click="logout()"
            >
              ログアウト
            </v-btn>
          </v-col>
        </v-row>
      </v-col>
    </v-row>
    <v-row>
      <v-col
        cols="12"
      >
        <v-data-table
          :headers="headers"
          :items="list"
          :items-per-page="10"
          class="elevation-1"
        ></v-data-table>
      </v-col>
    </v-row>  
  </v-container>
</template>

<script>
import { getParticipants, logout } from '@/api/Route'
export default {
  name: 'AdminIndex',
  beforeCreate() {
    if(localStorage.token === '') {
      this.$router.push('/admin')
    }
  },
  async created() {
    const response = await getParticipants()
    this.list = response
  },
  data: () => ({
    list: [],
    headers: [
      { text: '苗字', value: 'last_name' },
      { text: '名前', value: 'first_name' },
      { text: '都道府県', value: 'prefecture' },
      { text: '住所', value: 'address' },
      { text: '電話番号', value: 'tel' },
      { text: 'アレルギー', value: 'allergy' },
      { text: 'その他アレルギー', value: 'other_allergy' },
      { text: 'ゲスト側', value: 'guest_type' },
      { text: '出欠席', value: 'attendance' },
    ],
  }),
  methods: {
    async logout() {
      localStorage.token = ''
      await logout()
      this.$router.push('/admin')
    }
  }
}
</script>

<style>

</style>