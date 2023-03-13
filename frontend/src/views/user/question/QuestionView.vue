<script>
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
  <div><h1>Questions Index</h1></div>
  <ul v-for="question in questions" :key="question.id">
    <li>{{ question.question }}</li>
    <ul v-for="option in question.options" :key="option.id">
      <li :class="question.option_id == option.id ? 'answer' : ''">
        {{ option.option }} {{ question.option_id == option.id ? "(Right Answer)" : "" }}
      </li>
    </ul>
    <!-- <tr v-show="users.length" v-for="user in users" :key="user.id"></tr> -->
  </ul>
  {{ questions }}
</template>

<style scoped>
.answer {
  font-weight: bold;
  color: orangered;
}
</style>
