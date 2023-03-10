import { createStore } from "vuex";
import state from "./state";
import * as getters from "./getters";
import * as mutations from "./mutations";
import * as actions from "./actions";

// Import Modules
import auth from "./modules/auth";
import question from "./modules/question";
import sample from "./modules/sample";

const store = createStore({
  namespaced: true,
  state,
  getters,
  mutations,
  actions,

  modules: {
    auth,
    question,
    sample,
  },
});

export default store;
