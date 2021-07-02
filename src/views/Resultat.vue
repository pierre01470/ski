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
      <table>
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
        <tbody class="body-table" v-if="participants && participants.length">
          <tr
            v-for="participant of participants"
            :key="participant.id_participant"
          >
            <td></td>
            <td>{{ participant.lastname }}</td>
            <td>{{ participant.firstname }}</td>
            <td>{{ participant.id_category }}</td>
            <td>{{ participant.number }}</td>
            <td>temps</td>
            <td>{{ participant.id_trial }}</td>
            <td>
              <button v-on:click="del()">
                <img
                  :src="''"
                  width="40px"
                  height="40px"
                  alt="logo_supprimer"
                />
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>
</template>

<script>
const axios = require("axios");
export default {
  data() {
    return {
      participants: []
    };
  },
  async mounted() {
    const response = await axios.get(`http://localhost/ski/API/participant`);
    this.participants = response.data;
  },
  methods: {
    async del() {
      await axios.delete(`http://localhost/ski/API/deleteParticipant`);
    },
  },
};
</script>
