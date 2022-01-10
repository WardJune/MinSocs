<template>
  <body class="vh-100 bg-secondary d-flex justify-content-center">
    <div
      id="sign-up"
      class="w-50 bg-dark text-light p-5 align-self-center rounded-3"
    >
      <h2 class="fw-bold">Sign up to MiniSoc</h2>
      <form class="fw-bold" action="javascript:void(0)">
        <div class="form-group mb-3">
          <label for="name" class="text-warning mb-1">Name</label>
          <input
            type="text"
            v-model="form.name"
            class="form-control bg-transparent text-light"
            id="name"
          />
          <span v-if="messages.name" class="text-danger" role="alert">
            {{ messages.name[0] }}
          </span>
        </div>

        <div class="form-group mb-3">
          <label for="email" class="text-warning mb-1">Email</label>
          <input
            type="email"
            v-model="form.email"
            class="form-control bg-transparent text-light"
            id="email"
          />
          <span v-if="messages.email" class="text-danger" role="alert">
            {{ messages.email[0] }}
          </span>
        </div>

        <div class="form-group mb-3">
          <label for="password" class="text-warning mb-1">Password</label>
          <input
            type="password"
            v-model="form.password"
            class="form-control bg-transparent text-light"
            id="password"
          />
          <span v-if="messages.password" class="text-danger" role="alert">
            {{ messages.password[0] }}
          </span>
        </div>

        <div class="form-group mb-3">
          <label for="password2" class="text-warning mb-1"
            >Confirm Password</label
          >
          <input
            type="password"
            v-model="form.password_confirmation"
            class="form-control bg-transparent text-light"
            id="password2"
          />
        </div>
        <div class="text-center">
          <button
            @click="register"
            type="submit"
            class="btn btn-warning text-center fw-bold"
          >
            Submit
          </button>
          <span class="text-center d-block mt-2 fw-normal"
            >Already have account ??
            <router-link to="/login">
              <a class="link-warning text-decoration-none"> Login </a>
            </router-link>
          </span>
        </div>
      </form>
    </div>
  </body>
</template>

<script>
import { mapActions } from "vuex";
export default {
  data() {
    return {
      form: {
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
      },
      messages: {},
    };
  },

  methods: {
    ...mapActions({
      signUp: "auth/register",
    }),

    register() {
      this.signUp(this.form)
        .then(() => {
          this.$router.replace({
            name: "home",
          });
        })
        .catch((e) => {
          this.messages = e.response.data.errors;
        });
    },
  },
};
</script>

<style>
</style>