import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
// import store from "./store/store";
import store from "./store";
// import axios from "axios";
// import './assets/main.css'

// store.dispatch('auth/attempt', localStorage.getItem('access_token'));
// axios.defaults.headers.common["Authorization"] = "Bearer " + store.state.access_token;
// axios.defaults.headers.common["Authorization"] = "Bearer " + localStorage.getItem('access_token');

const app = createApp(App);
app.use(router);
app.use(store);
app.mount("#app");
