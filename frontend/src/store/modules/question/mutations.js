export const SET_QUESTIONS = (state, response) => {
    state.questions = response.data;
};

export const SET_QUESTION = (state, response) => {
    state.question = response.data;

    console.log('SET_QUESTION');
};
