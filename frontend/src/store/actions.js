import axios from "axios";
import Question from "../services/api/QuestionApi";
export const getStudents = ({ commit }) => {
  return axios.get("http://localhost:8000/api/books").then((response) => {
    commit("SET_STUDENTS", response.data);
  });
};

export const getQuestions = ({ commit }) => {
  Question.all().then((response) => {
    commit("SET_QUESTIONS", response.data);
    // console.log("SET_QUESTIONS DONE!!");
  });
};

export const getTest = ({ commit }) => {
  console.log("Inside getTest");
};
