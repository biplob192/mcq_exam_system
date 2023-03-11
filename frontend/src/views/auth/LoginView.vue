<template>
  <div class="main">
    <form v-on:submit.prevent="handleLogin()">
      <input type="text" name="email" v-model="loginData.email" placeholder="Email" style="margin: 5px" required />
      <br />
      <input type="password" name="email" v-model="loginData.password" placeholder="Password" style="margin: 5px" required />
      <br />
      <button type="submit" style="margin: 5px">Login</button>
      <span style="margin-left: 10px"><RouterLink to="/register">Register</RouterLink></span>
    </form>
  </div>
</template>

<script>
import axios from "axios";
import Auth from "../../services/api/AuthApi";
import { mapState, mapGetters, mapActions, mapMutations } from "vuex";
import { parse } from "@vue/compiler-dom";

export default {
  name: "MyLogin",
  components: {},
  data() {
    return {
      loginData: {
        email: "",
        password: "",
      },
      response: "",

      errors: {},
    };
  },

  computed: {
    ...mapState(["access_token"]),
    ...mapState("auth", ["login_response", "user_info"]),
  },

  mounted() {
    console.log("login_response: " + this.login_response);
    console.log("access_token: " + this.access_token);
    console.log('Token: ' + localStorage.getItem("access_token"));
  },

  methods: {
    ...mapActions("auth", ["login"]),

    // 01. Use axios in the same page (DEMO for Login)
    // ----------------------------- //

    // Using Promise
    // handleLogin: function () {
    //   let formData = new FormData();
    //   formData.append("email", this.loginData.email);
    //   formData.append("password", this.loginData.password);
    //   axios
    //     .post("http://127.0.0.1:8000/api/login", formData)
    //     .then((response) => {
    //       localStorage.setItem("access_token", response.data.data.access_token);
    //       localStorage.setItem("refresh_token", response.data.data.refresh_token);
    //       if (response.status == 200) {
    //         this.$router.push({ name: "home" });
    //       }
    //     })
    //     .catch(function (error) {
    //       alert(error.response.data.message);
    //     });
    // },

    // Using Async-Await
    // handleLogin: async function () {
    //   let formData = new FormData();
    //   formData.append("email", this.loginData.email);
    //   formData.append("password", this.loginData.password);
    //   try {
    //     const response = await axios.post("http://127.0.0.1:8000/api/login", formData);
    //     localStorage.setItem("token", response.data.data.token);
    //     if (response.status == 200) {
    //       this.$router.push({ name: "home" });
    //     }
    //   } catch (error) {
    //     alert(error.response.data.message);
    //   }
    // },

    // 02. Remove axios from the current page (DEMO for Login)
    // ----------------------------- //

    // handleLogin: function () {
    //   console.log("Inside new handleLogin function!!");

    //   let formData = new FormData();
    //   formData.append("email", this.loginData.email);
    //   formData.append("password", this.loginData.password);

    //   Auth.login(formData)
    //     .then((response) => {
    //       localStorage.setItem("access_token", response.data.data.access_token);
    //       localStorage.setItem("refresh_token", response.data.data.refresh_token);

    //       if (response.status == 200) {
    //         this.$router.push({ name: "home" });
    //       }
    //     })
    //     .catch((errors) => {
    //       console.log(errors);
    //     });
    // },

    // 03. Dispatch action (DEMO for Login)
    // ----------------------------- //

    // handleLogin: async function () {
    //   let formData = new FormData();
    //   formData.append("email", this.loginData.email);
    //   formData.append("password", this.loginData.password);

    //   try {
    //     let info = await this.$store.dispatch("auth/login", formData);
    //     let response = JSON.parse(info);
    //     // console.log(response.status)

    //     if (response.status == 200) {
    //       this.$router.push({ name: "home" });
    //     }
    //   } catch (e) {
    //     console.log(e);
    //   }
    // },

    // 04. Call mapAction (DEMO for Login)
    // ----------------------------- //

    handleLogin: async function () {
      let formData = new FormData();
      formData.append("email", this.loginData.email);
      formData.append("password", this.loginData.password);

      try {
        let info = await this.login(formData);
        let response = JSON.parse(info);
        // console.log(response.status)

        if (response.status == 200) {
          this.$router.push({ name: "home" });
          // window.location.assign("/");
        }
      } catch (e) {
        console.log(e);
      }
    },
  },
};
</script>

<style scoped></style>
