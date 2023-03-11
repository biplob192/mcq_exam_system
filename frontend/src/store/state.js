export default {
  baseUrl: "http://127.0.0.1:8000/api/",
  // baseUrl: "http://localhost:8000/api/",
  authUrl: "http://localhost:8000/api/auth/",
  apiUrlV1: "http://localhost:8000/api/mcq_exam_v1/",

  access_token: null,
  refresh_token: null,
  logged_in_status: false,

  user_info: "",

  questions: [],
  name: "The state item",
  students: [],
  data: "The main state item",
  user: {
    id: 1,
    name: "MD BIPLOB MIA",
    mobile: "01725361208",
    address: "93/A, Bashir Uddin Road, Kalabagan, Dhaka-1205",
    role: "Super Admin",
  },
  books: [
    {
      name: "Book for Science",
      author: "Abdul hamid Khan",
    },
    {
      name: "Book for Bangla",
      author: "Sabbir Rahman",
    },
    {
      name: "Book for English",
      author: "Bappi Khan",
    },
  ],
  students: [
    {
      name: "BIPLOB",
      city: "Dhaka",
    },
    {
      name: "KABIR",
      city: "Dhaka",
    },
    {
      name: "HASSAN",
      city: "Dhaka",
    },
    {
      name: "SHAJIB",
      city: "Dhaka",
    },
  ],
  services: {},
};
