<template>
  <login-form
    redirect="/book/titles"
    :locale-selectable="true"
    :show-logo="true"
    logo="books-kingdom-lg.png"
  ></login-form>
</template>

<script>

import LoginForm from '@/utils/auth/components/LoginForm.vue'

export default {
  components: {
    LoginForm,
  },
}

</script>
