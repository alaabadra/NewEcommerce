<template>
  <div>
    <!--main nav bar that contains sign in and other user tasks-->

    <v-app-bar color="primary accent-2" dark dense class="mb-11" >
      <!--sign up dialog-->
      <v-dialog v-model="signupDialog" width="500">
        <template v-slot:activator="{ on, attrs }">
          <v-toolbar-title
            dark
            v-bind="attrs"
            v-on="on"
            class="subtitle-1 ml-4"
          >
            إنشاء حساب <v-icon small>mdi-account-plus</v-icon>
          </v-toolbar-title>
        </template>

        <v-card>
          <v-card-title class="deep-purple darken-2 white--text kufy">
            <v-icon large class="ml-3 white--text">mdi-account-plus</v-icon>
            إنشاء حساب
          </v-card-title>

          <v-card-text class="mt-2">
            <v-text-field
              class="col-sm-12 mx-auto mt-21"
              outlined
              dense
              label="الإسم"
              v-model="name"
              :rules="[rules.required]"
            ></v-text-field>
            <v-text-field
              class="col-sm-12 mx-auto mt-21"
              outlined
              dense
              label="البريد الإلكتروني"
              v-model="email"
              :rules="[rules.required]"
            ></v-text-field>
            <v-text-field
              :append-icon="show ? 'mdi-eye' : 'mdi-eye-off'"
              :rules="[rules.required, rules.min]"
              :type="show ? 'text' : 'password'"
              name="input-10-2"
              hint="لابد ان تكون كلمة المرور اكثر من 8 رموز"
              @click:append="show = !show"
              v-model="password"
              class="col-sm-12 mx-auto"
              outlined
              dense
              label="كلمة المرور"
            ></v-text-field>
            <v-text-field
              :append-icon="show ? 'mdi-eye' : 'mdi-eye-off'"
              :rules="[rules.required, rules.min, rules.passMatch]"
              :type="show ? 'text' : 'password'"
              name="input-10-2"
              hint="لابد ان تكون كلمة المرور اكثر من 8 رموز"
              @click:append="show = !show"
              v-model="confirmPass"
              class="col-sm-12 mx-auto"
              outlined
              dense
              label="تأكيد كلمة المرور"
            ></v-text-field>
          </v-card-text>

          <v-divider></v-divider>

          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn
              color="amber darken-3"
              @click="signupDialog = false"
              dark
              class="kufy"
            >
              إلغاء
            </v-btn>
            <v-btn color="blue" @click="dialog = false" dark class="kufy">
              إنشاء
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
      <!--sign in dialog-->
      <v-dialog v-model="signinDialog" width="500">
        <template v-slot:activator="{ on, attrs }">
          <v-toolbar-title
            dark
            v-bind="attrs"
            v-on="on"
            class="subtitle-1 ml-4"
          >
            دخول <v-icon small>mdi-account-key</v-icon>
          </v-toolbar-title>
        </template>

        <v-card>
          <v-card-title class="deep-purple darken-2 white--text kufy">
            <v-icon large class="ml-3 white--text">mdi-account-key</v-icon>
            تسجيل دخول
          </v-card-title>

          <v-card-text class="mt-2">
            <v-text-field
              class="col-sm-12 mx-auto mt-21"
              outlined
              dense
              label="البريد الإلكتروني"
              v-model="email"
              :rules="[rules.required]"
            ></v-text-field>
            <v-text-field
              :append-icon="show ? 'mdi-eye' : 'mdi-eye-off'"
              :rules="[rules.required, rules.min]"
              :type="show ? 'text' : 'password'"
              name="input-10-2"
              hint="لابد ان تكون كلمة المرور اكثر من 8 رموز"
              @click:append="show = !show"
              v-model="password"
              class="col-sm-12 mx-auto"
              outlined
              dense
              label="كلمة المرور"
            ></v-text-field>
          </v-card-text>
          <v-divider></v-divider>

          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn
              color="amber darken-3"
              @click="signinDialog = false"
              dark
              class="kufy"
            >
              إلغاء
            </v-btn>
            <v-btn color="blue" @click="dialog = false" dark class="kufy">
              دخول
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>

      <v-menu bottom :offset-y="true">
        <template v-slot:activator="{ on, attrs }">
          <v-toolbar-title
            dark
            v-bind="attrs"
            v-on="on"
            class="subtitle-1 p-2 mt-1"
          >
            English <v-icon small>mdi-pencil</v-icon>
          </v-toolbar-title>
        </template>
      </v-menu>
    </v-app-bar>
    <!--navbar that containes the cart and other shopping tasks-->
    <v-app-bar color="white" app class="mt-11 mainNav">
      <v-app-bar-nav-icon
        @click.stop="drawer = !drawer"
        class="d-md-none d-flex"
      ></v-app-bar-nav-icon>
      <v-toolbar-title class="kufy  d-md-flex">
        <v-icon large class="d-none d-sm-none d-md-flex">mdi-store</v-icon>
        متجرك</v-toolbar-title
      >
      <v-spacer></v-spacer>
      <v-combobox
        outlined
        dense
        placeholder="بحث"
        append-icon="mdi-magnify"
        v-model="search"
        :items="itemsSearch"
        @input="show()"
        class="mt-5 d-none d-sm-none d-md-flex"
      ></v-combobox>
      <v-spacer></v-spacer>
      <v-badge content="3" left overlap>
        <v-btn class="kufy" text to="/cart" style="text-decoration : none">
          <v-icon>mdi-cart</v-icon></v-btn
        >
      </v-badge>
      <v-badge content="0" left overlap class=" mr-3">
        <v-btn class="kufy" text style="text-decoration : none" @click="wishListDialog = !wishListDialog">
          <v-icon>mdi-heart-box</v-icon></v-btn
        >
      </v-badge>
      <template v-slot:extension>
        <v-tabs
          show-arrows
          next-icon="mdi-arrow-right-bold-box-outline"
          prev-icon="mdi-arrow-left-bold-box-outline"
        >
          <v-tab
            v-for="tab in tabItems"
            :key="tab.title"
            class="kufy"
            style="width: 150px; text-decoration: none !important"
            :to="tab.link"
          >
            {{ tab.title }}
            <v-icon>{{ tab.icon }}</v-icon>
          </v-tab>
        </v-tabs>
      </template>
    </v-app-bar>

    <v-footer dark padless absolute style="top: 100% !important;">
      <v-card flat tile class="white--text text-center" color="pink">
        <v-card-text>
          <v-btn
            v-for="icon in icons"
            :key="icon"
            class="mx-4 white--text"
            icon
          >
            <v-icon size="24px">
              {{ icon }}
            </v-icon>
          </v-btn>
        </v-card-text>

        <v-card-text class="white--text pt-0">
          Phasellus feugiat arcu sapien, et iaculis ipsum elementum sit amet.
          Mauris cursus commodo interdum. Praesent ut risus eget metus luctus
          accumsan id ultrices nunc. Sed at orci sed massa consectetur dignissim
          a sit amet dui. Duis commodo vitae velit et faucibus. Morbi vehicula
          lacinia malesuada. Nulla placerat augue vel ipsum ultrices, cursus
          iaculis dui sollicitudin. Vestibulum eu ipsum vel diam elementum
          tempor vel ut orci. Orci varius natoque penatibus et magnis dis
          parturient montes, nascetur ridiculus mus.
        </v-card-text>

        <v-divider></v-divider>

        <v-card-text class="white--text">
          {{ new Date().getFullYear() }} — <strong>RED-STORES</strong>
        </v-card-text>
      </v-card>
    </v-footer>
    <v-navigation-drawer
      v-model="drawer"
      temporary
      right
      app
      class="d-md-none d-flex"
    >
      <v-list-item>
        <v-text-field
          outlined
          dense
          placeholder="بحث"
          append-icon="mdi-magnify"
          class="mt-5 d-md-none d-flex"
        ></v-text-field>
      </v-list-item>

      <v-divider class="d-md-none d-flex"></v-divider>

      <v-list dense>
        <v-list-item v-for="item in drawerItems" :key="item.title" link>
          <v-list-item-icon>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title class="kufy">{{ item.title }}</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
    <!--wish list-->
    <v-dialog
      v-model="wishListDialog"
      fullscreen
      hide-overlay
      transition="dialog-bottom-transition"
    >
      <v-card>
        <v-toolbar
          dark
          color="primary"
        >
         
            <v-icon class="ml-3">mdi-heart-box</v-icon>
          
          <v-toolbar-title class="kufy">قائمة الرغبات</v-toolbar-title>
          <v-spacer></v-spacer>
          
            <v-btn
            icon
            dark
            @click="wishListDialog = false"
          >
            <v-icon>mdi-close</v-icon>
          </v-btn>
        </v-toolbar>
        <v-list
          three-line
          subheader
        >
          <v-subheader class="kufy">المنتجات</v-subheader>
          <v-list-item>
            <v-list-item-avatar>
            <img src="https://randomuser.me/api/portraits/women/81.jpg">
          </v-list-item-avatar>
            <v-list-item-content>
              
              <v-list-item-subtitle class="text-right">Set the content filtering level to restrict apps that can be downloaded</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
        </v-list>
        <v-divider></v-divider>
        <v-list
          three-line
          subheader
        >
          <v-subheader class="kufy">الفئات</v-subheader>
          
        </v-list>
      </v-card>
    </v-dialog>
  </div>
</template>
<script>
export default {
  name: "navigation",
  data: () => {
    return {
      search: null,
      itemsSearch:["hello", "hi", "wow"],
      tabItems: [
        {
          title: "HOME",
          icon: "mdi-home",
          link: "/",
        },
        {
          title: "SHOP",
          icon: "mdi-tag-multiple",
          link: "/categories",
        },
        {
          title: "PAGES",
          icon: "mdi-tag-faces",
          link: "/bestSales"
        },
        {
          title: "PLOG",
          icon: "mdi-script",
          link: "/about"
        },
        {
          title: "CONTACT",
          icon: "mdi-phone-in-talk",
        },
      ],
      items: [
        {
          src: "https://cdn.vuetifyjs.com/images/carousel/squirrel.jpg",
        },
        {
          src: "https://cdn.vuetifyjs.com/images/carousel/sky.jpg",
        },
        {
          src: "https://cdn.vuetifyjs.com/images/carousel/bird.jpg",
        },
        {
          src: "https://cdn.vuetifyjs.com/images/carousel/planet.jpg",
        },
      ],
      drawerItems: [
        {
          title: "تسجيل الدخول",
          icon: "mdi-account-key",
        },
        {
          title: "إنشاء حساب",
          icon: "mdi-account-plus",
        },
      ],
      drawer: null,
      signinDialog: false,
      signupDialog: false,
      wishListDialog: false,
      icons: ["mdi-facebook", "mdi-twitter", "mdi-linkedin", "mdi-instagram"],
      name: null,
      email: null,
      password: null,
      confirmPass: null,
      show: false,
      showConfirm: false,
      rules: {
        required: (value) => !!value || "هذا الحقل مطلوب",
        min: (v) => v.length >= 8 || "لابد ان تكون كلمة المرور اكثر من 8 رموز",
        passMatch: () =>
          this.password == this.confirmPass || "الرجاء التأكد من كلمة المرور",
      },
    };
  },
  mounted: () => {
    document.addEventListener("scroll", () => {
      let mainNav = document.querySelector(".mainNav");
      mainNav.classList.remove("mt-11");
    });
  },
  methods: {
    show(){
      axios.post("/fetch-data")
    }
  },
  computed: {
    resize() {},
  },
};
</script>
<style>
@font-face {
  font-family: kufy;
  font-weight: 500;
  src: url("../assets/fonts/18 Khebrat Musamim Bold.ttf");
}
.kufy {
  font-family: kufy !important;
}
</style>
