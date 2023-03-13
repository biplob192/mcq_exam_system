<script>
import { RouterLink } from "vue-router";
import { mapState, mapGetters, mapActions, mapMutations } from "vuex";

export default {
  data() {
    return {};
  },

  computed: {
    // Import states
    ...mapState("question", ["question", "questions"]),

    // Import getters
    ...mapGetters({
      logged_in: "loginStatus",
    }),
  },

  mounted() {
    if (this.logged_in) {
      this.getQuestions();
    }
  },

  methods: {
    ...mapActions("question", ["getQuestions"]),
  },
};
</script>
<template>
  <div>
    <h1>Questions Index</h1>
    <RouterLink to="/add_question">Add New Question</RouterLink>
  </div>

  <!-- Display all questions start -->
  <div>
    <ul v-for="question in questions" :key="question.id">
      <li>{{ question.question }}</li>
      <ul v-for="option in question.options" :key="option.id">
        <li :class="question.option_id == option.id ? 'answer' : ''">{{ option.option }} {{ question.option_id == option.id ? "(Right Answer)" : "" }}</li>
      </ul>
    </ul>
  </div>
  <!-- Display all questions end -->
</template>

<style scoped>
.answer {
  font-weight: bold;
  color: orangered;
}

a:hover {
  color: orangered;
  text-decoration: underline;
}

a {
  display: inline-block;
  font-size: 21px;
  text-decoration: none;
  padding: 5px;
  margin: 5px;
  border-left: 1px solid var(--color-border);
}
</style>
