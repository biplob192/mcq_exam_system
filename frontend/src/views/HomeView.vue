<script>
import { mapState, mapGetters, mapActions, mapMutations } from "vuex";
import Question from "../services/api/QuestionApi";
import axios from "axios";

export default {
  name: "HomeView",

  data() {
    return {
      singleQuestion: "",
      base_url: this.$store.state.baseUrl,
      access_token_local: localStorage.getItem("access_token"),
    };
  },

  computed: {
    studentCount() {
      return this.$store.getters.countStudents;
    },

    // Method 01
    // ...mapState(['user']),

    // Method 02
    ...mapState({
      user: "user",
      access_token: "access_token",
      // questions: "questions",
      // question: (state) => state.question.question,
    }),

    // Method 03
    ...mapState("question", ["question", "questions"]),

    ...mapGetters({
      logged_in: "loginStatus",
    }),
  },

  mounted() {
    // this.getTest();
    // this.module();
    // this.sampleAction();
    // this.$store.dispatch("sample/sampleAction");
    // this.getQuestion(1);
    // this.getQuestions();
    // this.access_token_local = localStorage.getItem("access_token");
    // this.getSingleQuestion(1);
    // this.getQuestionTest();
    // console.log("API base URL from mounted is: " + this.base_url);
    if (this.logged_in) {
      this.getQuestion(1);
    }
  },

  methods: {
    // Method 01
    ...mapActions(["getTest"]),

    // Method 02
    ...mapActions("sample", ["sampleAction"]),
    ...mapActions("question", ["getQuestion", "getQuestions"]),

    // Method 03
    // ...mapActions({
    //   sampleAction: "sample/sampleAction",
    //   getQuestions: "question/getQuestions",
    //   getQuestion: "question/getQuestion",
    // }),

    getSingleQuestion(id) {
      Question.show(id)
        .then((response) => {
          this.singleQuestion = response.data.data;

          console.log(this.singleQuestion);
          // let myTarget = JSON.parse(JSON.stringify(this.singleQuestion));
          // console.log(myTarget);
        })
        .catch((errors) => {
          console.log(errors);
        });
    },

    // getQuestionTest: function () {
    //   axios.defaults.headers.common["Authorization"] = "Bearer " + this.access_token;
    //   axios
    //     .get("http://127.0.0.1:8000/api/questions/1")
    //     .then((response) => {
    //       console.log(response);
    //     })
    //     .catch((errors) => {
    //       console.log(errors);
    //     });
    // },

    module() {
      console.log("Inside module.");

      try {
        this.$store.dispatch("sample/sampleAction").then(() => {
          console.log("ok");
        });
      } catch (e) {
        console.log(e);
      }
    },
  },
};
</script>

<template>
  <h1>Home Page</h1>
  {{ questions != "" ? questions : "Questions not set yet!!" }}
  <!-- {{ singleQuestion }} -->
  <br />
  <br />
  access_token From root state: {{ access_token }} <br />
  access_token From Local: {{ access_token_local }} <br />
  <br />
  <br />
  {{ question }}
</template>
