<script>
import { mapState, mapGetters, mapActions, mapMutations } from "vuex";

export default {
  name: "AddQuestionView",
  data() {
    return {
      formData: {
        question: "",
        subject_id: "",
        options: [],
        right_option: "",
      },

      errors: {},
    };
  },

  computed: {
    // Import states
    ...mapState("question", ["success_message"]),

    // Import getters
    // ...mapGetters({
    //   logged_in: "loginStatus",
    // }),
  },

  methods: {
    ...mapActions("question", ["storeQuestion", "getQuestions"]),

    handleAddQuestion: async function () {
      console.log("Inside add question fun.");
      let formData = new FormData();
      formData.append("question", this.formData.question);
      formData.append("subject_id", this.formData.subject_id);

      for (var i = 0; i < this.formData.options.length; i++) {
        let option = this.formData.options[i];
        formData.append("options[" + i + "]", option);
      }

      formData.append("right_option", this.formData.right_option);

      try {
        let info = await this.storeQuestion(formData);
        let response = JSON.parse(info);

        if (response.status == 201) {
          alert(this.success_message);
          this.$router.push({ name: "Questions" });
          // window.location.assign("/");
        }
      } catch (e) {
        console.log(e);

        if (e.response.status == 401) {
          alert('User not logged in!');
        }
        if (e.response.status == 500) {
          alert(e.response.data.data);
        }
      }
    },

    // goBack() {
    //   $this.router.go(-1);
    // },
  },
};
</script>
<template>
  <div><h1>Add Questions</h1></div>
  <div class="main">
    <form v-on:submit.prevent="handleAddQuestion">
      <input type="text" name="question" v-model="formData.question" placeholder="Question" style="margin: 5px" required />
      <input type="number" name="subject_id" v-model="formData.subject_id" placeholder="Subject ID" style="margin: 5px" required />
      <br />
      <input type="text" name="options" v-model="formData.options['0']" placeholder="Question option 01" style="margin: 5px" required />
      <input type="text" name="options" v-model="formData.options['1']" placeholder="Question option 02" style="margin: 5px" required />
      <input type="text" name="options" v-model="formData.options['2']" placeholder="Question option 03" style="margin: 5px" required />
      <input type="text" name="options" v-model="formData.options['3']" placeholder="Question option 04" style="margin: 5px" required />
      <br />
      <input type="text" name="right_option" v-model="formData.right_option" placeholder="Right option" style="margin: 5px" required />
      <br />
      <button type="submit" style="margin: 5px">Save</button>
      <button @click="$router.go(-1)">Go Back</button>
    </form>
  </div>
</template>

<style scoped></style>
