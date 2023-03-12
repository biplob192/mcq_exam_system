import axios from "axios";
import store from "../../store";

const baseURL = store.state.baseUrl;
// const access_token = store.state.access_token;
// const access_token = localStorage.getItem("access_token");
// axios.defaults.headers.common["Authorization"] = "Bearer " + access_token;

const Api = axios.create({
  baseURL: baseURL,
  headers: {
    Accept: "application/json",
    Authorization: "Bearer " + localStorage.getItem("access_token"),
  },
});

export function http() {
  return axios.create({
    baseURL: baseURL,
    headers: {
      Accept: "application/json",
      Authorization: "Bearer " + localStorage.getItem("access_token"),
    },
  });
}

export default Api;
