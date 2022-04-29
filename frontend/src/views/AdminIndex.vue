<template>
  <v-container>
    <v-row 
      class="primary" 
      style="height: 100px;"
      align-content="center"
    >
      <v-col cols="8">
        <h1
          class="white--text"
        >
        参加者一覧
        </h1>
      </v-col>
      <v-col
        class="d-flex align-center flex-row-reverse"
        cols="4"
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
    <v-row>
      <v-col cols="12">
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
      { text: 'E-mail', value: 'email' },
      { text: 'line-ID', value: 'line_id' },
      { text: '参加方法', value: 'how_to_watch.name' },
    ],
  }),
  methods: {
    async logout() {
      localStorage.token = ''
      const response = await logout()
      console.log(response)
      this.$router.push('/admin')
    }
  }
}
</script>

<style>

</style>