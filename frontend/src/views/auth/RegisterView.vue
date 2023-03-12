<script>
import { mapState, mapGetters, mapActions, mapMutations } from "vuex";
import axios from "axios";

export default {
  name: "RegisterView",
  components: {},
  data() {
    return {
      loginData: {
        name: "",
        email: "",
        mobile: "",
        password: "",
        password_confirmation: "",
      },

      errors: {},
    };
  },

  methods: {
    ...mapActions("auth", ["register"]),

    handleRegister: async function () {
      let formData = new FormData();
      formData.append("name", this.loginData.name);
      formData.append("email", this.loginData.email);
      formData.append("mobile", this.loginData.mobile);
      formData.append("password", this.loginData.password);
      formData.append("password_confirmation", this.loginData.password_confirmation);

      try {
        let info = await this.register(formData);
        let response = JSON.parse(info);

        // console.log(response)

        if (response.status == 201) {
          this.$router.push({ name: "home" });
        }
      } catch (e) {
        console.log(e);
      }
    },

    // handleRegister: async function () {
    //   let formData = new FormData();
    //   formData.append("name", this.loginData.name);
    //   formData.append("email", this.loginData.email);
    //   formData.append("mobile", this.loginData.mobile);
    //   formData.append("password", this.loginData.password);
    //   formData.append("password_confirmation", this.loginData.password_confirmation);

    //   await axios
    //     .post("http://127.0.0.1:8000/api/register", formData)
    //     .then((response) => {
    //       localStorage.setItem("token", response.data.data.token);
    //       if (response.status == 201) {
    //         this.$router.push({ name: "login" });
    //       }
    //     })
    //     .catch(function (error) {
    //       console.log(error);
    //     });
    // },
  },
};
</script>

<template>
  <div class="main">
    <form v-on:submit.prevent="handleRegister">
      <input type="text" name="name" v-model="loginData.name" placeholder="Full Name" style="margin: 5px" required />
      <br />
      <input type="text" name="email" v-model="loginData.email" placeholder="Email" style="margin: 5px" required />
      <br />
      <input type="number" name="mobile" v-model="loginData.mobile" placeholder="Mobile" style="margin: 5px" required />
      <br />
      <input type="password" name="password" v-model="loginData.password" placeholder="Password" style="margin: 5px" required />
      <br />
      <input type="password" name="password_confirmation" v-model="loginData.password_confirmation" placeholder="Confirm Password" style="margin: 5px" required />
      <br />
      <button type="submit" style="margin: 5px">Register</button>
      <span style="margin-left: 10px"><RouterLink to="/login">Login</RouterLink></span>
    </form>
  </div>
</template>

<style scoped></style>
