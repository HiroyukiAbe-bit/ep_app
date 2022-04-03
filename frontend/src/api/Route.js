// import request from '@/utils/request'
import axios from 'axios'

// axios直接で接続する場合の記述法 
export function getVer() {
  return axios.get("/api/ver").then(res => res.data)
}


//request.jsで接続する場合の記述法
// export function getVer() {
//   return request({
//     url: '/ver',
//     method: 'GET',
//     params: 
//     headers: {
//       'Access-Control-Allow-Origin': '*',
//       'Access-Control-Allow-Methods': 'GET',
//       'Access-Control-Allow-Headers': 'Content-Type',
//       'Access-Control-Allow-Credentials': 'true',
//       'Content-Type':'application/json'
//     },
//     proxy: {
//       host: 'localhost',
//       port: 80,
//     }
//   })
// }