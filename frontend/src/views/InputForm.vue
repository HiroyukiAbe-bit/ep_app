<template>
  <v-container>
    <v-row class="text-center">
      <HeaderCarousel />
      <v-col cols="12">
        <h1 class="text-sm-h3 text-md-h2">
          ご出席確認入力フォーム
        </h1>
      </v-col>
        <v-col 
        cols="10"
        offset="1"
        >
          <v-radio-group
            v-model="form_data.relation"
            row
          >
            <v-radio
              :disabled="input_status"
              label="新郎側ゲスト"
              :value="0"
            ></v-radio>
            <v-radio
              :disabled="input_status"
              label="新婦側ゲスト"
              :value="1"
            ></v-radio>
          </v-radio-group>
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
                v-model="form_data.last_name"
                :counter="10"
                :error="errors.last_name"
                :error-messages="messages.last_name"
                @keydown="clearError('last_name')"
                label="名字"
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
                v-model="first_name"
                :counter="10"
                :error="errors.first_name"
                :error-messages="messages.first_name"
                @keydown="clearError('first_name')"
                label="名前"
                required
              ></v-text-field>
            </v-col>
            <v-col
              col="12"
              offset-md="1"
              md="10"
            >
              <v-text-field  v-for="(form, index) in forms" :key="index"
                :disabled="input_status"
                :loading="loading"
                v-model="forms[index]"
                :counter="10"
                :error="errors.first_name"
                :error-messages="messages.first_name"
                @keydown="clearError('first_name')"
                label="連名"
                required
              ></v-text-field>
            </v-col>
            <v-col
              offset="8"
              col="4"
              offset-md="9"
              md="2"
            >
              <v-btn
                v-if="input_status !== true"
                class="mx-2"
                fab
                dark
                small
                color="primary"
                @click="addForm()"
              >
                <v-icon dark>
                  mdi-plus
                </v-icon>
              </v-btn>
              <v-btn
                v-if="forms.length !== 0"
                class="mx-2"
                fab
                dark
                small
                color="primary"
                @click="deleteForm()"
              >
                <v-icon dark>
                  mdi-minus
                </v-icon>
              </v-btn>
            </v-col>
            
            <v-col
              cols="12"
              md="2"
              offset-md="1"
            >
              <v-select
                :disabled="input_status"
                :loading="loading"
                item-text="text"
                :error="errors.prefecture"
                :error-messages="messages.prefecture"
                @keydown="clearError('prefecture')"
                :items="prefectures"
                label="都道府県"
                solo
                v-model="form_data.prefecture"
              ></v-select>
            </v-col>
            <v-col
              cols="12"
              md="8"
            >
              <v-text-field
                :disabled="input_status"
                :loading="loading"
                :counter="100"
                v-model="form_data.address"
                :error="errors.address"
                :error-messages="messages.address"
                @keydown="clearError('address')"
                label="以下住所"
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
                v-model="form_data.tel"
                :error="errors.tel"
                :error-messages="messages.tel"
                @keydown="clearError('tel')"
                label="電話番号"
                required
              ></v-text-field>
            </v-col>

            <v-col 
            cols="12"
            md="10"
            offset-md="1"
            >
              <v-combobox
                v-model="selected_allergies"
                :items="select_allergy"
                :disabled="input_status"
                label="アレルギーがあればご選択ください"
                multiple
                @change="isOtherInput()"
              ></v-combobox>
            </v-col>
            <v-col v-if="this.is_other_input"
              cols="12"
              md="10"
              offset-md="1"
            >
              <v-text-field
                :disabled="input_status"
                :loading="loading"
                v-model="form_data.other_allergy"
                :error="errors.other_allergy"
                :error-messages="messages.other_allergy"
                @keydown="clearError('other_allergy')"
                label="その他のアレルギーをご入力ください"
                required
              ></v-text-field>
            </v-col>
            <v-col 
            cols="12"
            md="4"
            offset-md="4"
            >
              <v-radio-group
                v-model="form_data.attendance"
                row
              >
                <v-radio
                  :disabled="input_status"
                  label="ご出席"
                  :value="true"
                  class="mx-auto"
                ></v-radio>
                <v-radio
                  :disabled="input_status"
                  label="ご欠席"
                  :value="false"
                  class="mx-auto"
                ></v-radio>
              </v-radio-group>
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
              md="4"
              offset-md="4"
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
import { storeParticipant, participants_delete } from '@/api/Route'

const OTHER_NUMBER = 8

export default {
  
  name: 'InputForm',
  components: {
    HeaderCarousel
  },
  data: () => ({
    forms: [],
    loading: false,
    input_status: false,
    alertBox: false,
    first_name: '',
    app: {},
    selected_allergies: [],
    form_data: {
      first_name: '',
      last_name: '',
      prefecture: '',
      address: '',
      tel: '',
      allergy: '',
      other_allergy: '',
      relation: 0,
      attendance: true,
    },
    way_to_participate: '',
    prefectures: [
      {id:1, text: '北海道' },
      {id:2, text: '青森県' },
      {id:3, text: '岩手県' },
      {id:4, text: '宮城県' },
      {id:5, text: '秋田県' },
      {id:6, text: '山形県' },
      {id:7, text: '福島県' },
      {id:8, text: '茨城県' },
      {id:9, text: '栃木県' },
      {id:10, text: '群馬県' },
      {id:11, text: '埼玉県' },
      {id:12, text: '千葉県' },
      {id:13, text: '東京都' },
      {id:14, text: '神奈川県' },
      {id:15, text: '新潟県' },
      {id:16, text: '富山県' },
      {id:17, text: '石川県' },
      {id:18, text: '福井県' },
      {id:19, text: '山梨県' },
      {id:20, text: '長野県' },
      {id:21, text: '岐阜県' },
      {id:22, text: '静岡県' },
      {id:23, text: '愛知県' },
      {id:24, text: '三重県' },
      {id:25, text: '滋賀県' },
      {id:26, text: '京都府' },
      {id:27, text: '大阪府' },
      {id:28, text: '兵庫県' },
      {id:29, text: '奈良県' },
      {id:30, text: '和歌山県' },
      {id:31, text: '鳥取県' },
      {id:32, text: '島根県' },
      {id:33, text: '岡山県' },
      {id:34, text: '広島県' },
      {id:35, text: '山口県' },
      {id:36, text: '徳島県' },
      {id:37, text: '香川県' },
      {id:38, text: '愛媛県' },
      {id:39, text: '高知県' },
      {id:40, text: '福岡県' },
      {id:41, text: '佐賀県' },
      {id:42, text: '長崎県' },
      {id:43, text: '熊本県' },
      {id:44, text: '大分県' },
      {id:45, text: '宮崎県' },
      {id:46, text: '鹿児島県' },
      {id:47, text: '沖縄県' },
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
    select_allergy: [
      {id:1, text: '卵' },
      {id:2, text: '乳製品' },
      {id:3, text: '小麦' },
      {id:4, text: 'そば' },
      {id:5, text: '落花生' },
      {id:6, text: 'エビ' },
      {id:7, text: 'カニ' },
      {id:8, text: 'その他' },
    ],
    is_other_input: false,
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

      if (this.selected_allergies.length !== 0) {
        this.selected_allergies.sort(function(a,b){
          if(a.id < b.id) return -1;
          if(a.id > b.id) return 1;
          return 0;
        });
        this.form_data.allergy = this.selected_allergies.map((item) => item.text).join(',')
      } else {
        this.form_data.allergy = 'なし'
      }

      this.form_data.first_name = this.first_name

      try {
        const response = await storeParticipant(this.form_data)
        if (response.status === 400) {
          Object.keys(response.errors).forEach((key) => {
            this.errors[key] = true;
            this.messages[key] = response.errors[key];
          })
          throw new Error('バリデーションエラー')
        }
      
        if (this.forms.length !== 0) {
          for (let i = 0; this.forms.length > i; i++) {
            this.form_data.first_name = this.forms[i];
            const res = await storeParticipant(this.form_data)
            if (res.status === 400) {
              Object.keys(res.errors).forEach((key) => {
                this.errors[key] = true;
                this.messages[key] = res.errors[key];
              })
              let count = i + 1;
              // 登録に失敗した登録を削除
              participants_delete(count);
              let message = '連名入力失敗：' + this.forms[i] + 'さんの登録に失敗しました、入力内容を見直してください。' 
              throw new Error(message)
            }
          }
        }

        //成功した時の処理
        this.alertDisable()
        this.form_data.first_name = this.first_name
        this.form_data.input_status = true
        this.app = this.form_data
        this.input_status = true
      } catch (e) {
          console.log(e.message)
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
    },
    isOtherInput() {
      if (this.selected_allergies.length !== 0) {
        // その他が選択された場合は、その他インプットの表示
        this.is_other_input = false
        if (this.selected_allergies.find(function(val) {
          return val.id === OTHER_NUMBER;
        }) !== undefined) {
          this.is_other_input = true
        }
      } else {
        this.is_other_input = false
      }
    },
    addForm () {
      this.forms.push('')
    },
    deleteForm (index) {
      this.forms.splice(index, 1)
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
