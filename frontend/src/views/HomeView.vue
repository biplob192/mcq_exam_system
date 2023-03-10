<script>
import { mapState, mapGetters, mapActions, mapMutations } from "vuex";
import Question from "../services/api/QuestionApi";

export default {
  name: "HomeView",

  data() {
    return {
      // data: "Data",
      base_url: this.$store.state.baseUrl,
      singleQuestion: "",
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
      // questions: "questions",
      // question: (state) => state.question.question,
    }),

    // Method 03
    ...mapState("question", ["question", "questions"]),
  },

  mounted() {
    // this.index();
    // this.getTest();

    // this.module();
    // this.sampleAction();
    // this.$store.dispatch("sample/sampleAction");

    // this.getQuestions();
    // this.getQuestion(1);
    this.getSingleQuestion(1);

    // console.log("API base URL from mounted is: " + this.base_url);
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

    index() {
      // console.log("Inside index.");
      // console.log("API base URL is: " + this.base_url);
    },

    getSingleQuestion(id) {
      Question.show(id)
        .then((response) => {
          this.singleQuestion = response.data.data;
          // console.log(this.singleQuestion);

          // let myTarget = JSON.parse(JSON.stringify(this.singleQuestion));
          // console.log(myTarget);
        })
        .catch((errors) => {
          console.log(errors);
        });
    },

    add: async function () {
      console.log("Inside module.");

      try {
        await this.$store.dispatch("sample/sampleAction");
        console.log("ok");
      } catch (e) {
        console.log(e);
      }
    },

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
  {{ singleQuestion }}
</template>
