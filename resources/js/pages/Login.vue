<template>
  <div class="vh-100 bg-secondary d-flex justify-content-center">
    <div
      id="sign-up"
      class="w-50 bg-dark text-light p-5 align-self-center rounded-3"
    >
      <h2 class="fw-bold">Log in to MiniSoc</h2>
      <form class="fw-bold" action="javascript:void(0)">
        <div class="form-group mb-3">
          <label for="email" class="text-warning mb-1">Email</label>
          <input
            type="email"
            id="email"
            v-model="form.email"
            class="form-control bg-transparent text-light"
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

        <div class="text-center">
          <button
            type="submit"
            @click="login"
            class="btn btn-warning text-center fw-bold"
          >
            Log in
          </button>
          <span class="text-center d-block mt-3 fw-normal">
            <router-link to="/register"
              ><a class="link-warning text-decoration-none">
                Create new account
              </a>
            </router-link>
          </span>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";
export default {
  data() {
    return {
      form: {
        email: "",
        password: "",
      },
      messages: {},
    };
  },
  methods: {
    ...mapActions({
      signIn: "auth/login",
    }),

    login() {
      this.signIn(this.form)
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
