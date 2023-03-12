export const SET_LOGIN_INFO = (state, response) => {
  let root = response.rootState;
  let user = response.data.data.user;
  let accessToken = response.data.data.access_token;
  let refreshToken = response.data.data.refresh_token;

  root.logged_in = true;
  root.access_token = accessToken;
  root.refresh_token = refreshToken;
  root.user_info = JSON.stringify(user);
  state.user_info = JSON.stringify(user);
  state.login_response = JSON.stringify(response.data);

  localStorage.setItem("access_token", accessToken);
  localStorage.setItem("refresh_token", refreshToken);
  localStorage.setItem("user_info", JSON.stringify(user));
};

export const SET_TOKEN = (state, response) => {
  let root = response.rootState;
  let accessToken = response.access_token;

  root.logged_in = true;
  root.access_token = accessToken;
  state.access_token = accessToken;

  localStorage.setItem("access_token", accessToken);
};
