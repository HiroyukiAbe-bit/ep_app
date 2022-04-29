// import request from '@/utils/request'
import axios from 'axios'

// axios直接で接続する場合の記述法 
export function getVer() {
  return axios.get("/api/ver").then(res => res.data)
}

export function storeParticipant(params) {
  return axios.post("/api/form/store", params).then(res => res.data).catch((error) => { console.log(error.response) })
}

export function login(params) {
  return axios.post("/api/login", params).then(res => res.data).catch( error => error.response )
}

export function getParticipants() {
  return axios.get("/api/admin/index").then(res => res.data).catch( error => error.response )
}

export function logout() {
  return axios.post("/api/logout").then(res => res.data).catch( error => error.response )
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