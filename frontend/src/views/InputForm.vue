<template>
  <v-container>
    <v-row class="text-center">
      <HeaderCarousel />
      <v-col cols="12">
        <h1 class="display-2 font-weight-bold mb-3">
          Form
        </h1>
      </v-col>
      <v-col 
        cols="12"
      >
        <v-form 
          v-model="valid"
        >
          <v-row>
            <v-col
              cols="12"
              offset-md="1"
              md="5"
            >
              <v-text-field
                v-model="formData.firstName"
                :counter="10"
                label="First name"
                required
              ></v-text-field>
            </v-col>

            <v-col
              cols="12"
              md="5"
            >
              <v-text-field
                v-model="formData.lastName"
                :counter="10"
                label="Last name"
                required
              ></v-text-field>
            </v-col>
            <v-col
              cols="12"
              md="10"
              offset-md="1"
            >
              <v-text-field
                v-model="formData.email"
                label="E-mail"
                required
              ></v-text-field>
            </v-col>
            <v-col
              cols="12"
              md="10"
              offset-md="1"
            >
              <v-text-field
                v-model="formData.lineId"
                label="Line-ID"
                required
              ></v-text-field>
            </v-col>
            <v-col
              cols="12"
              md="5"
              offset-md="1"
            >
              <v-select
                item-text="text"
                :items="items"
                label="当日の参加方法"
                solo
                v-model="formData.wayToParticipate"
              ></v-select>
            </v-col>
            <v-col
              cols="12"
            >
              <v-btn
                x-large
                color="primary"
                dark
                @click="submitForm()"
              >
                以上の内容で予約する
              </v-btn>
            </v-col>
          </v-row>
        </v-form>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import HeaderCarousel from '@/components/HeaderCarousel'
import { storeParticipant } from '@/api/Route'
export default {
  name: 'InputForm',
  components: {
    HeaderCarousel
  },
  data: () => ({
    valid: false,
    formData: {
      firstName: '',
      lastName: '',
      email: '',
      lineId: '',
      wayToParticipate: '',
      particiNumber: null
    },
    items: [
      {id:1, text: 'パソコン'},
      {id:2, text: 'スマートフォン'},
      {id:3, text: 'タブレット'}
    ],
    nameRules: [
      v => !!v || '名前は必ず入力してください',
      v => v.length <= 10 || '名前は10文字以内で入力してください',
    ],
    emailRules: [
      // lineId => !lineId || 'emailかLineIDはどちらかの入力が必須です',
      v => /.+@.+/.test(v) || 'email形式で入力してください',
    ],
    lineIdRules: [
      email => !email || 'emailかLineIDはどちらかの入力が必須です'
    ],
  }),
  methods: {
    async submitForm() {
      const response = await storeParticipant(this.formData)
      console.log(response)


      console.log(this.wayToParticipate)
      // console.log(this.$refs.form.validate())
    }
  }
}
</script>

<style>
  .content-center {
    display: flex;
    align-items: center;
  }
</style>
