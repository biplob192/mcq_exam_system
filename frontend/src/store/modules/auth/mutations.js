export const SET_LOGIN_INFO = (state, response) => {
  let root = response.rootState;
  let user = response.data.data.user;
  let accessToken = response.data.data.access_token;
  let refreshToken = response.data.data.refresh_token;

  root.access_token = accessToken;
  root.refresh_token = refreshToken;
  root.user_info = JSON.stringify(user);
  state.user_info = JSON.stringify(user);

  localStorage.setItem("access_token", accessToken);
  localStorage.setItem("refresh_token", refreshToken);
  localStorage.setItem("user_info", JSON.stringify(user));

  //   console.log(user);
  //   console.log(accessToken);
  //   console.log(refreshToken);

  //   console.log(root.user_info);
  //   console.log(root.access_token);
  //   console.log(root.refresh_token);

  //   console.log(state.user_info);

    console.log(response.data);
};
