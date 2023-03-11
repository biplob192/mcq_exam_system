import Api from "./Api";
import { http } from "./BaseApi";
import axios from "axios";
import store from "../../store";

const END_POINT = "questions";
const BASE_URL = store.state.baseUrl;
const API_URL = BASE_URL + END_POINT;
const TOKEN = store.state.access_token;

export default {
  store(data) {
    return Api.post(END_POINT, data);
  },

  show(id) {
    // axios.defaults.headers.common["Authorization"] = "Bearer " + store.state.access_token;
    // return axios.get(`${API_URL}/${id}`);


    // return Api.get(`${END_POINT}/${id}`);
    // return Api.get(`${END_POINT}/${id}`);


    console.log(store.state.access_token);

    return http(store.state.access_token).get(`${API_URL}/${id}`)
    // .then((response) => {
    //   this.loader('circular');
    //   this.w_orders = response.data.data.data;
    //   this.pagination = response.data.data;
    // })
    // .catch((error) => {
    //   console.log(error);
    // });
  },

  all() {
    return Api.get(END_POINT);
  },

  update() {
    return Api.put(`${END_POINT}/${id}`);
  },

  delete() {
    return Api.delete(`${END_POINT}/${id}`);
  },
};
