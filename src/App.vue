<template>
  <div id="app" class="container-header">
    <Header />
    <Resultat />
    <Footer />
  </div>
</template>

<script>
import Header from "./components/Header.vue";
import Inscription from "./components/Inscription.vue";
import Resultat from "./components/Resultat.vue";
import Footer from "./components/Footer.vue";
import ApiService from "./services/api.services.js";

const apiservice = new ApiService();

export default {
  name: "App",
  components: {
    Header,
    Inscription,
    Resultat,
    Footer
  },
  data() {
    return {
      data: null
    };
  },
  mounted() {
    this.listParticipant();
  },
  methods: {
    async listParticipant() {
      const res = await apiservice.getParticipant();
      const data = await res.json();
      this.data = data.results;
    }
  }
};
</script>
<style>
@import "./assets/style.css";
@import url("https://fonts.googleapis.com/css2?family=Marcellus+SC&display=swap");
body {
  background-image: url(assets/ressources/skieur.jpg);
  background-attachment: fixed;
  background-size: cover;
}
</style>
