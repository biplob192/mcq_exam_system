import Auth from "../../../services/api/AuthApi";

export const login = ({ commit, dispatch, rootState }, data) => {
  Auth.login(data).then((response) => {
    let data = response.data;
    commit("SET_LOGIN_INFO", { rootState, data });

    // Dispatch can set rootState as wel as localStorage
    // dispatch("setTokens", data);
  });
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