const { defineConfig } = require('@vue/cli-service')
module.exports = defineConfig({
  transpileDependencies: [
    'vuetify'
  ],
  lintOnSave: false
})

// ### ローカル開発環境用設定
module.exports = {
  devServer: {
    proxy: {
      "/api/": {
        target: "http://localhost:80",
      }
    }
  },
  transpileDependencies: [
    'vuetify'
  ],
  publicPath: '/app'
}


// // ### 本番デプロイ ビルド用の設定
// module.exports = {
//   // アセットはLaravelのpublic/appディレクトリ配下に作成される
//   outputDir: '../backend/public/app',

//   // app配下にjs, cssなどが置かれるので、publicPathを調整
//   publicPath: '/app',

//   pages: {
//       // appのエントリポイント、テンプレート、出力先を調整
//       app: {
//           entry: 'src/main.js',
//           template: 'templates/base.html',
//           filename: '../../resources/views/spa/app.blade.php',
//           title: '結婚式参加予約アプリ',
//       },
//   },
// }
