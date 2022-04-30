<template>
  <v-card width="400px" class="mx-auto mt-5">
    <v-card-title>
      <h1 class="display-1">ログイン</h1>
    </v-card-title>
    <v-card-text>
      <v-form>
        <v-text-field v-model="login_form.name" prepend-icon="mdi-account-circle" label="ユーザ名" />
        <v-text-field 
          v-model="login_form.password"
          v-bind:type="showPassword ? 'text' : 'password'"
          @click:append="showPassword = !showPassword"
          prepend-icon="mdi-lock"
          v-bind:append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
          label="パスワード" />
        <v-card-actions>
         <v-btn class="primary" @click="LoginSubmit()">ログイン</v-btn>
         <v-col class="d-flex align-center flex-row-reverse">
           <v-btn
            depressed
            color="secondary"
            @click="pageBack()"
          >
            戻る
          </v-btn>
         </v-col>
        </v-card-actions>
      </v-form>
    </v-card-text>
    <v-alert v-if="faildLogin" type="error">
      ユーザ名、パスワードが正しくありません。
    </v-alert>
  </v-card>
</template>

<script>
import { login } from '@/api/Route'
export default {
  name: 'App',
  data: () => ({
    faildLogin: false,
    showPassword: false,
    login_form: {
      name: '',
      password: ''
    }
  }),
  methods :{
  async LoginSubmit() {
      const response = await login(this.login_form)
      if (response.status == 401) {
        this.faildLogin = true
      } else {
        localStorage.token = response.access_token
        this.$router.push('/admin/index')
      }
    },
    pageBack() {
      this.$router.push('/index')
    }
  }
}
</script>

<style>

</style>