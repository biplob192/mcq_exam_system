import Auth from "../../../services/api/AuthApi";

export const login = ({ commit, dispatch, rootState }, data) => {
  return Auth.login(data).then((response) => {
    var data = response.data;
    commit("SET_LOGIN_INFO", { rootState, data });

    // Dispatch can set rootState as wel as localStorage
    // dispatch("setTokens", data);

    return JSON.stringify(response);
  });
};

export const attempt = ({ commit, state, rootState }, access_token) => {
  console.log("Token from attempt: " + access_token);
  if (access_token) {
    console.log("Token from attempt: " + access_token);
    // console.log(state);
    // console.log(rootState);
    commit("SET_TOKEN", { rootState, access_token });
  }

  if (!state.token) {
    return;
  }
};

export const setTokens = (state, response) => {
  let user = response.data.user;
  let accessToken = response.data.access_token;
  let refreshToken = response.data.refresh_token;

  state.rootState.access_token = accessToken;
  state.rootState.refresh_token = refreshToken;
  state.rootState.user_info = JSON.stringify(user);

  localStorage.setItem("access_token", accessToken);
  localStorage.setItem("refresh_token", refreshToken);

  console.log(user);
};
