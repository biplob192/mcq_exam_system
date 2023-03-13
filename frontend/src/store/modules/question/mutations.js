export const SET_QUESTIONS = (state, response) => {
  state.questions = response.data;
};

export const SET_QUESTION = (state, response) => {
  state.question = response.data;
};

export const ADD_QUESTION = (state, response) => {
  // console.log(response.data);
  // console.log(response.message);

  if (state.questions.push(response.data)) {
    state.success_message = response.data.message;
  } else {
    state.success_message = "";
  }
};
