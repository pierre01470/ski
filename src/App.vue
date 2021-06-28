<template>
  <div id="" class="container-header">
    <Header />
    <router-view />
    <Footer />
  </div>
</template>

<script>
import Header from "./components/Header.vue";
import Footer from "./components/Footer.vue";
import ApiService from "./services/api.services.js";

const apiservice = new ApiService();

export default {
  name: "App",
  components: {
    Header,
    Footer,
  },
};
</script>
<style>
@import "./assets/style.css";
@import url("https://fonts.googleapis.com/css2?family=Marcellus+SC&display=swap");
@font-face {
  font-family: "sporten_personal_useregular";
  src: url("assets/ressources/Sporten.woff") format("woff");
  font-weight: normal;
  font-style: normal;
}
body {
  background-image: url(assets/ressources/skieur.jpg);
  background-attachment: fixed;
  background-size: cover;
}
</style>
