import Questions from "../../views/user/question/QuestionView.vue";
import AddQuestion from "../../views/user/question/AddQuestionView.vue";
import EditQuestion from "../../views/user/question/EditQuestionView.vue";

export default [
  {
    path: "/questions",
    name: "Questions",
    component: Questions,
  },

  {
    path: "/add_question",
    name: "AddQuestion",
    component: AddQuestion,
  },

  {
    path: "/edit_question",
    name: "EditQuestion",
    component: EditQuestion,
  },
];
