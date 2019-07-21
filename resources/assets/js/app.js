/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

Vue.component(
  "locations-table",
  require("./components/LocationsComponent/LocationsTable.vue")
);
Vue.component(
  "categories-table",
  require("./components/CategoriesComponent/CategoriesTable.vue")
);
Vue.component(
  "items-table",
  require("./components/ItemsComponent/ItemsTable.vue")
);
Vue.component("reports", require("./components/Reports.vue"));

new Vue({ el: "#app-container" });
