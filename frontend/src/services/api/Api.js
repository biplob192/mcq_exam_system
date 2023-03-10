import axios from "axios";
import store from "../../store";

// const token = "11|tnLBsop1RIheIv4oXD1pI6h2ZApwr939XobDc6Wt";
const access_token = localStorage.getItem("access_token");
const baseURL = store.state.baseUrl;

axios.defaults.headers.common["Authorization"] = "Bearer " + access_token;

const Api = axios.create({
  baseURL: baseURL,
  timeout: 5000,
  headers: { "X-Custom-Header": "foobar" },
});

export default Api;
