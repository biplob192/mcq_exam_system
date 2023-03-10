import Api from "./Api";

export default {
  login(data) {
    return Api.post('login', data);
  },

  //   store(data) {
  //     return Api.post(END_POINT, data);
  //   },

  //   show(id) {
  //     return Api.get(`${END_POINT}/${id}`);
  //   },

  //   all() {
  //     return Api.get(END_POINT);
  //   },

  //   update() {
  //     return Api.put(`${END_POINT}/${id}`);
  //   },

  //   delete() {
  //     return Api.delete(`${END_POINT}/${id}`);
  //   },
};
