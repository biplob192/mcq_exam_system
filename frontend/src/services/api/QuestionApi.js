import Api, { http } from "./Api";
const END_POINT = "questions";

export default {
  store(data) {
    return Api.post(END_POINT, data);
  },

  show(id) {
    return http().get(`${END_POINT}/${id}`);
  },

  all() {
    return Api.get(END_POINT);
  },

  update() {
    return Api.put(`${END_POINT}/${id}`);
  },

  delete() {
    return Api.delete(`${END_POINT}/${id}`);
  },
};
