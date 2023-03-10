<template>
  <div>
    <sidebar
      :items="sidebarItems"
      expand-on="hover"
      :lock-sidebar-btn="true"
      :title="$store.state.title"
      title-link="/book/titles"
      :show-logo="true"
      logo="books-kingdom-avatar.png"
      sidebar-color="secondary"
      :sidebar-dark="true"
      title-color="primary"
      :title-dark="true"
      nav-color="primary"
    >
      <template slot="nav">
        <v-list-item-action>
          <v-icon color="primary">person</v-icon>
        </v-list-item-action>
        <v-list-item-title class="white--text">{{ userInfo.name }}</v-list-item-title>
      </template>
    </sidebar>
    <toolbar
      :profile-btn="profile"
      :locales-btn="true"
      :logout-btn="true"
      color="secondary"
      :dark="true"
    >
      <template slot="left">
        <div class="headline d-none d-md-inline">
          <template v-if="$store.state.app.module !=null">
              {{ $t('global.routes.' + $store.state.app.module) }}
          </template>
          <template v-if="$store.state.app.page !=null">
              <v-icon slot="divider">forward</v-icon>
              {{ $t('global.routes.' + $store.state.app.page) }}
          </template>
        </div>
      </template>
    </toolbar>
    <v-content class="content">
      <v-container fluid fill-height class="main-container">
        <v-layout style="width:100%">
          <v-flex xs12>
            <v-card flat class="main-card">
              <v-card-text class="content-container">

                <router-view style="margin: 0 auto;"></router-view>

                <alert-box></alert-box>
              </v-card-text>
            </v-card>
          </v-flex>
        </v-layout>
      </v-container>
    </v-content>
    <footnote
      v-if="footer"
      color="primary"
      :dark="true"
    >
      <template slot="left">
        <a href="https://bookskingdom.io/" target="_blank" style="color:white;text-decoration:none;">
          <v-icon color="white">help</v-icon> bookskingdom.io
        </a>
      </template>
      <template slot="center">
        <b>elephant</b>pink
      </template>
      <template slot="right">
        &#9400; {{ year }}
      </template>
    </footnote>
    <back-top></back-top>
    <profile v-if="profile"></profile>
  </div>
</template>

<script>
import Sidebar from '@/utils/app/components/Sidebar.vue'
import Toolbar from '@/utils/app/components/Toolbar.vue'
import AlertBox from '@/utils/app/components/AlertBox.vue'
import Footnote from '@/utils/app/components/Footnote.vue'
import BackTop from '@/utils/app/components/BackTop.vue'
import Profile from '@/utils/app/components/Profile.vue'
import { mapGetters } from 'vuex'

export default {
  name: 'app',
  data: () => ({
    profile: true,
    footer: true,
    sidebarItems: [
      {
        icon: 'menu_book',
        text: 'book.name',
        model: false,
        guard: 'BOOK',
        route: '/book',
        children: [
          {
            icon: 'sort_by_alpha',
            text: 'book.titles',
            route: '/titles',
          },
          {
            icon: 'face',
            text: 'book.authors',
            route: '/authors',
          },
          {
            icon: 'local_offer',
            text: 'book.tags',
            route: '/tags',
          },
          // {
          //   icon: 'style',
          //   text: 'book.bookTags',
          //   route: '/book-tags',
          // },
        ],
      },
    ],
  }),
  computed: {
    ...mapGetters('auth', [
      'isLogged',
      'userInfo',
    ]),
    year () {
      let year = new Date()
      return year.getFullYear()
    },
  },
  components: {
    Sidebar,
    Toolbar,
    AlertBox,
    Footnote,
    BackTop,
    Profile,
  },
}
</script>
<style scoped>
.main-container {
  padding: 10px 0 0 0;
  background-color: white;
}
.content {
  min-height: 100vh;
  overflow-x: auto;
  background-color: white;
}
.main-card {
  background-color: white;
}
.card-title {
  padding: 0;
}
.content-container {
  margin-bottom: 100px;
  padding: 0;
}
.headline {
  padding-bottom: 10px;
}
</style>
