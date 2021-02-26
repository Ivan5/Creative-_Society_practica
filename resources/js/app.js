require("./bootstrap");

window.Vue = require("vue");

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);
Vue.component(
    "welcome-component",
    require("./components/WelcomeComponent.vue").default
);

const app = new Vue({
    el: "#app"
});
