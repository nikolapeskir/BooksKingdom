<template>
  <div
    class="register-form white"
    color="primary"
  >
    <v-alert
      class="register-form__fail-alert px-5"
      type="error"
      :value="registerFailed"
      dismissible
    >
      {{ $t('global.register.failed') }}
    </v-alert>
    <div
      class="
        register-form__wrapper
        d-flex
        flex-column
        align-center
        justify-center
      "
    >
      <v-progress-circular
        v-if="registerWait"
        :size="100"
        :width="5"
        class="register-form__loader"
        color="primary"
        indeterminate
      />

      <template v-else>

        <!-- logo -->
        <img
          v-if="showLogo"
          class="mb-2"
          :src="require(`@/assets/images/${logo}`)"
        >

        <!-- app title -->
        <h1
          class="
            register-form__title
            text-center
            primary--text
            display-1
            font-weight-bold
            mb-10
          "
        >
          {{ $t('global.register.title') }}
        </h1>

        <!-- locale select -->
        <v-menu v-if="localeSelectable">
          <template v-slot:activator="{ on }">
            <v-btn
              v-on="on"
              dark fab small
              color="secondary"
              class="mb-2"
            >
              <v-icon>language</v-icon>
            </v-btn>
          </template>
          <v-list>
            <v-list-item
              v-for="(locale, i) in locales"
              :key="i"
              @click="changeLocale(locale.name)"
            >
              <v-list-item-title>{{ locale.text }}</v-list-item-title>
            </v-list-item>
          </v-list>
        </v-menu>

        <!-- register form -->
        <v-form
          v-model="valid"
          class="register-form__form"
          ref="form"
          lazy-validation
          @submit.prevent
        >
          <v-text-field
            :label="$t('global.register.name')"
            v-model="name"
            :rules="passwordRules"
            required
          ></v-text-field>
          <v-text-field
            :label="$t('global.register.login')"
            v-model="user"
            :rules="registerRules"
            required
          ></v-text-field>
          <v-text-field
            :label="$t('global.register.password')"
            v-model="password"
            :rules="passwordRules"
            :counter="30"
            required
            :append-icon="passAppendIcon"
            @click:append="() => (passwordHidden = !passwordHidden)"
            :type="passTextFieldType"
            class="mb-5"
          ></v-text-field>
          <v-btn
            block
            @click="registerAttempt()"
            :disabled="!valid"
            class="primary white--text"
          >
            {{ $t('global.register.submit') }}
          </v-btn>
          <v-btn
            block
            text
            @click="loginPage()"
          >
            {{ $t('global.register.loginBtn') }}
          </v-btn>
        </v-form>
      </template>
    </div>
  </div>
</template>
<script>
import {
  mapState,
  mapMutations,
  mapActions,
} from 'vuex'
import auth from '@/config/auth'

export default {
  name: 'register',
  props: {
    redirect: {
      type: String,
      default: '/',
    },
    showLogo: {
      type: Boolean,
      default: true,
    },
    logo: {
      type: String,
      default: 'books-kingdom-sm.png',
    },
    localeSelectable: {
      type: Boolean,
      default: true,
    },
  },
  data () {
    return {
      valid: false,
      password: '',
      name: '',
      user: '',
      passwordHidden: true,
      alphanumericRegex: /^[a-zA-Z0-9]+$/,
      emailRegex: /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/,
    }
  },
  computed: {
    ...mapState('auth', [
      'registerWait',
      'registerFailed',
    ]),
    ...mapState(['locales']),
    registerRegex () {
      return auth.registerRegex ? auth.registerRegex : (auth.registerWithEmail ? this.emailRegex : this.alphanumericRegex)
    },
    registerRules () {
      return [
        v => !!v || this.$t('global.register.registerRequired'),
        v => this.emailRegex.test(v) || this.$t('global.register.incorrectRegister'),
      ]
    },
    passwordRegex () {
      return auth.passwordRegex ? auth.passwordRegex : this.alphanumericRegex
    },
    passwordRules () {
      return [
        v => !!v || this.$t('global.register.passwordRequired'),
        v => this.passwordRegex.test(v) || this.$t('global.register.incorrectPassword'),
      ]
    },
    credential () {
      let credentials = {}
      credentials[auth.nameFieldName || 'name'] = this.name
      credentials[auth.registerFieldName || 'register'] = this.user
      credentials[auth.passwordFieldName || 'password'] = this.password
      return credentials
    },
    passTextFieldType () {
      return this.passwordHidden ? 'password' : 'text'
    },
    passAppendIcon () {
      return this.passwordHidden ? 'visibility' : 'visibility_off'
    },
  },
  methods: {
    ...mapMutations(['setLocale']),
    ...mapActions('auth', ['register']),
    changeLocale (locale) {
      this.$i18n.locale = locale
      this.$vuetify.lang.current = locale
      this.setLocale(locale)
    },
    registerAttempt () {
      this.register(this.credential).then(() => {
        this.$router.push({ path: this.redirect })
      })
    },
    loginPage () {
      this.$router.push({ path: auth.paths.login })
    },
  },
}

</script>
<style lang="scss" scoped>
.register-form {
  &__fail-alert {
    width:100%;
    position:absolute;
    top: 0;
    left:0;
  }
  &__wrapper {
    height: 100vh;
    width: 100%;
  }
  &__form {
    width: 300px;
  }
  &__logo {
    width:100%;
    height:auto;
  }
}
</style>
