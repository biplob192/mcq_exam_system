export const SET_LOGIN_INFO = (state, response) => {
  let root = response.rootState;
  let user = response.data.data.user;
  let accessToken = response.data.data.access_token;
  let refreshToken = response.data.data.refresh_token;

  root.logged_in_status = true;
  root.access_token = accessToken;
  root.refresh_token = refreshToken;
  root.user_info = JSON.stringify(user);
  state.user_info = JSON.stringify(user);
  state.login_response = JSON.stringify(response.data);

  localStorage.setItem("access_token", accessToken);
  localStorage.setItem("refresh_token", refreshToken);
  localStorage.setItem("user_info", JSON.stringify(user));

  // console.log(user);
  //   console.log(accessToken);
  //   console.log(refreshToken);

  //   console.log(root.user_info);
  //   console.log(root.access_token);
  //   console.log(root.refresh_token);

  //   console.log(state.user_info);

  // console.log(response.data);
  console.log("root.access_token: " + root.access_token);
};

export const SET_TOKEN = (state, response) => {
  let root = response.rootState;
  let accessToken = response.access_token;

  root.logged_in_status = true;
  root.access_token = accessToken;
  state.access_token = accessToken;

  localStorage.setItem("access_token", accessToken);

  // console.log(root.access_token);
  // console.log(state.access_token);
};
