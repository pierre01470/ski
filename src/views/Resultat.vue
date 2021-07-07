<template>
  <section class="main-resultat">
    <div class="back-date">
      <div class="station">
        <h2>Nom de la station</h2>
        <div class="name-station">
          <p>station de vaulx en velin</p>
        </div>
      </div>
      <div class="test">
        <h2>Date de l'épreuve</h2>
        <div class="date-epr">
          <p>10/03/2865</p>
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
              <img
                v-if="photo == null"
                :src="require(`../assets/ressources/${value.photo}`)"
                alt="photo"
                id="infinite-list"
              />
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
      category: [],
      trial: [],
      run: [],
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
    this.category = responseCategory.data;
    const responseTrial = await axios.get(`http://localhost/ski/API/trial`);
    this.trial = responseTrial.data;
    const responseRun = await axios.get(`http://localhost/ski/API/run`);
    this.run = responseRun.data;
  },
  methods: {
    async del(id) {
      await axios.get(`http://localhost/ski/API/deleteParticipant` + id);
    },
  },
};
</script>
