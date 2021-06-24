<template>
  <div id="app" class="container-header">
    <Header />
  </div>
</template>

<script>
import Header from "./components/Header.vue";
import ApiService from "./services/api.services.js";

const apiservice = new ApiService();

export default {
  name: "App",
  components: {
    Header
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
}
</script>
<style>
 @import'./assets/style.css';
</style>
