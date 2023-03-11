import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
// import store from "./store/store";
import store from "./store";
// import './assets/main.css'

// store.dispatch('auth/login', localStorage.getItem('access_token'));

const app = createApp(App);
app.use(router);
app.use(store);
app.mount("#app");
