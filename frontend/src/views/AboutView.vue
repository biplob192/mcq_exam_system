<script>
import { mapState, mapGetters, mapActions, mapMutations } from "vuex";
export default {
  name: "AboutView",

  data() {
    return {
      access_token: null,
      qs: "null",
    };
  },

  computed: {
    ...mapState("auth", ["login_response", "user_info", "test", "data", "samples"]),
    ...mapState("question", ["question", "questions"]),
  },

  mounted() {
    // if (this.$store.state.access_token) {
    //   this.getQuestions();
    // }

    this.access_token = localStorage.getItem("access_token");
    this.qs = this.user_info;
  },
};
</script>

<template>
  <div class="about">
    <h1>This is an about page</h1>

    {{ question }}
    <br />
    <br />
    {{ access_token }}
    <br />
    <br />
    {{ qs }}
  </div>
</template>

<style>
/* @media (min-width: 1024px) {
  .about {
    min-height: 100vh;
    display: flex;
    align-items: center;
  }
} */
</style>
