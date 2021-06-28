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
      <table >
                <thead class="header-table">
                    <tr>
                        <th scope="col">Photo</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Catégorie</th>
                        <th scope="col">Dossard</th>
                        <th scope="col">Temps</th>
                        <th scope="col">Classement</th>
                        <th scope="col">SUPPRIMER</th>
                    </tr>
                </thead>
                <tbody class="body-table">
                        <tr v-for="value in data" :key="value.id_participant">
                            <td>Photo</td>
                            <td>{{value.lastname}}</td>
                            <td>{{value.firstname}}</td>
                            <td>{{value.id_category}}</td>
                            <td>{{value.number}}</td>
                            <td>temps</td>
                            <td>{{value.id_trial}}</td>
                            <td><button><img :src="''" width="40px" height="40px" alt="logo_supprimer"></button></td>
                        </tr>
                </tbody>
            </table>
      
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
    id_category: Number,
  },
  data() {
    return {
      data: null,
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
    },
  },
};
</script>