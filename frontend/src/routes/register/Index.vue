<template>
  <register-form
    redirect="/book/titles"
    :locale-selectable="true"
    :show-logo="true"
    logo="books-kingdom-lg.png"
  ></register-form>
</template>

<script>

import RegisterForm from '@/utils/auth/components/RegisterForm.vue'

export default {
  components: {
    RegisterForm,
  },
}

</script>
