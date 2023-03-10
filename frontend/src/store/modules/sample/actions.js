export const sampleAction = (data) => {
  console.log("Inside sampleAction");
  console.log(data.rootState.baseUrl);
  console.log(data.state.data);
};
