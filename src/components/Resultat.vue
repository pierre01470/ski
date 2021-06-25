<template>
  <section class="main-resultat">
    <div class="back-date">
      <div class="station">
        <h2>Nom de la station</h2>
      </div>
      <div class="test">
        <h2>Date de l'épreuve</h2>
      </div>
    </div>

    <div class="category">
      <div class="header-back">
        <h3>Photo</h3>
        

        <span>|</span>
        <h3>Nom</h3>
        <span>|</span>
        <h3>Prénom</h3>
        <span>|</span>
        <h3>Catégorie</h3>
        <span>|</span>
        <h3>Dossard</h3>
        <span>|</span>
        <h3>Temps</h3>
        <span>|</span>
        <h3>Classement</h3>
        <span>|</span>
        <h3>Poubelle</h3>
      </div>
      <ul v-for="value in data" :key="value.id_participant">
        <li>{{ value.firstname }}</li>
        <li>{{ value.lastname }}</li>
        <li>{{ value.date_birth }}</li>
        <li>{{ value.email }}</li>
        <li>{{ value.number }}</li>
        <img src="" alt="">
      </ul>
    </div>
  </section>
</template>

<script>
import ApiService from "../services/api.services.js";

const apiservice = new ApiService();

export default {
  name: "Resultat",
  props: {
    id_participant: Number,
    firstname: String,
    lastname: String,
    date_birth: Date,
    email: String,
    number: String,
    photo: String,
    id_trial: Number,
    id_category: Number
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
      this.data = data;
    }
  }
};
</script>
