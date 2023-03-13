import Question from "../../../services/api/QuestionApi";
// import store from "../../index";
import store from "../../../store";

export const getQuestions = ({ commit }) => {
  Question.all().then((response) => {
    commit("SET_QUESTIONS", response.data);
  });
};

export const getQuestion = ({ commit }, id) => {
  Question.show(id).then((response) => {
    commit("SET_QUESTION", response.data);
  });
};

export const storeQuestion = ({ commit, dispatch, rootState }, data) => {
  return Question.store(data).then((response) => {
    var data = response.data;
    commit("ADD_QUESTION", { data });

    return JSON.stringify(response);
  });
};
