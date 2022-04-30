<template>
  <v-container>
    <v-row class="text-center">
      <HeaderCarousel />
      <v-col cols="12">
        <h1 class="display-2 font-weight-bold mb-3">
          リモート参加予約
        </h1>
      </v-col>
      <v-col 
        cols="12"
        offset-lg="2"
        lg="8"
      >
        <v-form>
          <v-row>
            <v-col
              cols="12"
              offset-md="1"
              md="5"
            >
              <v-text-field
                :disabled="input_status"
                :loading="loading"
                v-model="form_data.first_name"
                :counter="10"
                :error="errors.first_name"
                :error-messages="messages.first_name"
                @keydown="clearError('first_name')"
                label="First name"
                required
              ></v-text-field>
            </v-col>

            <v-col
              cols="12"
              md="5"
            >
              <v-text-field
                :disabled="input_status"
                :loading="loading"
                v-model="form_data.last_name"
                :counter="10"
                :error="errors.last_name"
                :error-messages="messages.last_name"
                @keydown="clearError('last_name')"
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
                :disabled="input_status"
                :loading="loading"
                v-model="form_data.email"
                :error="errors.email"
                :error-messages="messages.email"
                @keydown="clearError('email')"
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
                :disabled="input_status"
                :loading="loading"
                v-model="form_data.line_id"
                :error="errors.line_id"
                :error-messages="messages.line_id"
                @keydown="clearError('line_id')"
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
                :disabled="input_status"
                :loading="loading"
                item-text="text"
                :error="errors.how_to_watch_id"
                :error-messages="messages.how_to_watch_id"
                @keydown="clearError('how_to_watch_id')"
                :items="items"
                label="当日の参加方法"
                solo
                v-model="way_to_participate"
              ></v-select>
            </v-col>
            <v-col
              offset="2"
              cols="8"
              offset-md="2"
              md="8"
            > 
              <v-alert
                type="success"
                transition="scale-transition"
                :value="alertBox"
                align-content="center"
              >
              予約完了しました
              </v-alert>
            </v-col>
            <v-col v-if="form_data.input_status"
              cols="12"
            >
              <v-btn
                x-large
                color="primary"
                dark
                @click="backTopPage()"
              >
                戻る
              </v-btn>
            </v-col>
            <v-col v-else
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
const PC = 'パソコン'
const SMART_PHONE = 'スマートフォン'
const TABLET = 'タブレット'
export default {
  
  name: 'InputForm',
  components: {
    HeaderCarousel
  },
  data: () => ({
    loading: false,
    input_status: false,
    alertBox: false,
    app: {},
    form_data: {
      first_name: '',
      last_name: '',
      email: '',
      line_id: '',
      how_to_watch_id: null
    },
    way_to_participate: '',
    items: [
      {id:1, text: PC },
      {id:2, text: SMART_PHONE },
      {id:3, text: TABLET }
    ],
    // エラー情報初期化
    errors: {
      first_name: false,
      last_name: false,
      email: false,
      line_id: false,
      how_to_watch_id: false,
    },
    messages: {
      first_name: null,
      last_name: null,
      email: null,
      line_id: null,
      how_to_watch_id: null,
    },
  }),
  mounted() {
    const app = localStorage.app
    if (app) this.form_data = JSON.parse(app)
    if (this.form_data.input_status) this.input_status = true
  },
  methods: {
    async submitForm() {
      this.loading = true
      Object.keys(this.errors).forEach((key) => {
        this.errors[key] = false;
        this.messages[key] = null;
      })
      switch(this.way_to_participate) {
        case PC: this.form_data.how_to_watch_id = 1; break
        case SMART_PHONE: this.form_data.how_to_watch_id = 2; break;
        case TABLET : this.form_data.how_to_watch_id = 3; break
      }

      const response = await storeParticipant(this.form_data)
      if (response.status === 400) {
        Object.keys(response.errors).forEach((key) => {
          this.errors[key] = true;
          this.messages[key] = response.errors[key];
        })

        // emailのバリデーションに引っ掛かった時に、line_idも反応させる
        let messageDiff = null
        if (this.messages.email) {
          messageDiff = this.messages.email.slice()
          if (messageDiff.shift() === 'E-mailかLine-IDどちらかは必ず入力してください。') {
            this.errors.line_id = true
            this.$set(this.messages, 'line_id', this.messages.email[0])
          }  
        }
      } else {
        //成功した時の処理
        this.alertDisable()
        this.form_data.input_status = true
        this.app = this.form_data
        this.input_status = true
      }
      this.loading = false
    },
    // 各エラーのリセット
    clearError(item) {
      this.errors[item] = false;
      this.messages[item] = null;
    },
    backTopPage() {
      this.$router.push({ name: 'TopPage'})
    },
    alertDisable() {
      this.alertBox = true
      setTimeout(() => {this.alertBox = false}, 5000);
    }
  },
  watch: {
    app: {
      handler: function(newState) {
        localStorage.app = JSON.stringify(newState)
      },
      deep: true
    }
  },

}
</script>

<style>
  .content-center {
    display: flex;
    align-items: center;
  }
</style>
