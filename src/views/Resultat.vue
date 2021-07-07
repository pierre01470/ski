<template>
  <section class="main-resultat">
    <div class="back-date" v-for="trial in trials" :key="trial.id_trial">
      <div class="station">
        <h2>Nom de la station</h2>
        <div class="name-station">
          <p>{{ trial.name_station }}</p>
        </div>
      </div>
      <div class="test">
        <h2>Date de l'épreuve</h2>
        <div class="date-epr">
          <p>{{ trial.date }}</p>
        </div>
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
        <tbody class="body-table" id="infinite-list">
          <tr v-for="value in participants" :key="value.id_participant">
            <td>
              <div class="picture-participant">
                <img
                  :src="require(`../assets/ressources/${value.photo}`)"
                  alt="photo"
                  
                />
              </div>
            </td>
            <td>{{ value.lastname }}</td>
            <td>{{ value.firstname }}</td>
            <td>{{ value.id_category }}</td>
            <td>{{ value.number }}</td>
            <td>temps</td>
            <td>{{ value.id_trial }}</td>
            <td>
              <button v-on:click="del(value.id_participant)">
                <img
                  src="@/assets/ressources/poubelles.jpg"
                  height="45px"
                  width="45px"
                  id="test"
                  alt=""
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
      participants: [],
      categories: [],
      trials: [],
      runs: [],
    };
  },
  async mounted() {
    const responseParticipants = await axios.get(
      `http://localhost/ski/API/participant`
    );
    this.participants = responseParticipants.data;
    const responseCategory = await axios.get(
      `http://localhost/ski/API/category`
    );
    this.categories = responseCategory.data;
    const responseTrial = await axios.get(`http://localhost/ski/API/trial`);
    this.trials = responseTrial.data;
    const responseRun = await axios.get(`http://localhost/ski/API/run`);
    this.runs = responseRun.data;
  },
  methods: {
    async del(id) {
      var r = confirm("Etes-vous sûr de vouloir supprimer ce participant?");
      if (r == true) {
        await axios.get(`http://localhost/ski/API/deleteParticipant` + id);
        const responseParticipants = await axios.get(
          `http://localhost/ski/API/participant`
        );
        this.participants = responseParticipants.data;
      }
    },
  },
};
</script>
