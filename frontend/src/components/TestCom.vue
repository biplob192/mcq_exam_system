<script>
import { mapState, mapGetters, mapActions, mapMutations } from "vuex";
export default {
  props: {
    msg: String,
    likes: Number,
  },

  data() {
    return {
      // books: this.$store.state.books,
      access_token: this.$store.state.access_token,
      // user_info: this.$store.state.user_info,
      singleQuestion: "",
    };
  },

  computed: {
    studentCount() {
      return this.$store.getters.countStudents;
    },

    // First method
    // ...mapState("sample", {
    //     data: (state) => state.data,
    //   }),

    // Second method
    // ...mapState(['user']),
    ...mapState("question", ["question", "questions"]),

    ...mapState({
      user: "user",
      books: "books",
      questions: "questions",
      data: (state) => state.sample.data,
      // user_info: (state) => state.auth.user_info,
      user_info: (state) => state.auth.user_info,
    }),
  },

  mounted() {
    if (this.$store.state.access_token) {
      this.getQuestions();
    }
  },

  methods: {
    ...mapActions(["getQuestions"]),
  },

  
};
</script>

<template>
  <div>
    <h3>
      You've successfully created a project with <span style="color: orangered">{{ msg }}</span>
    </h3>
    <b>{{ data }}</b> from Test components.

    <br>
    <br>
    This is from TestCom
    <br>
    
    {{ question }}
    <!-- {{ singleQuestion }}; -->
    <p>User Info:</p>
    {{ user.name }} <br />
    Mobile: {{ user.mobile }}<br />
    Address: {{ user.address }}<br />

    <p>Book Info:</p>
    <li v-for="book in books">{{ book.name }}, [Author: {{ book.author }}]</li>

    <p>Total Number of Students: {{ studentCount }}</p>
    <!-- Token: {{ access_token }} -->
  </div>
</template>

<style scoped></style>
