<template>
  <div class="">
    <div class="topform" v-for="trial in trials" :key="trial.id_trial">
      <h1 class="runtitle">{{ trial.name_station }}</h1>
      <form
        v-on:submit.prevent="submitExcel"
        class="runInput"
        action=""
        method="post"
        enctype="multipart/form-data"
      >
        <input
          @change="previewExcel"
          class="btn"
          id="upload"
          type="file"
        />
        <input
          class="btn"
          type="submit"
          id="add"
          value="Envoyer"
        />
      </form>
    </div>
    <section class="main-resultat">
      <div class="category">
        <table>
          <thead class="header-table">
            <tr>
              <th scope="col">Photo</th>
              <th scope="col">Nom</th>
              <th scope="col">Prénom</th>
              <th id="cat" scope="col" v-on:click="orderByCategory()">
                Catégorie
              </th>
              <th scope="col">Dossard</th>
              <th scope="col">Temps</th>
              <th scope="col">SUPPRIMER</th>
            </tr>
          </thead>
          <tbody class="body-table" id="infinite-list">
            <tr v-for="value in participants" :key="value.id_participant">
              <td>
                <img
                  :src="require(`@/assets/ressources/${value.photo}`)"
                  alt="photo"
                  id="infinite-list"
                  height="60px"
                  width="40px"
                />
              </td>
              <td>{{ value.lastname }}</td>
              <td>{{ value.firstname }}</td>
              <td>{{ value.name_category }}</td>
              <td>{{ value.number }}</td>
              <td>{{ value.result }}</td>
              <td>
                <button v-on:click="del(value.id_participant)">
                  <img
                    class="poubelle"
                    src="@/assets/ressources/poubelle.png"
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
  </div>
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
      url: "",
      trial: {
        station_name: "",
        registration_date: "",
      },
      form: {
        excel: "",
      },
    };
  },
  async mounted() {
    const responseParticipants = await axios.get(
      `http://localhost/ski/API/participantWithResult`
    );
    this.participants = responseParticipants.data;

    const responseTrial = await axios.get(`http://localhost/ski/API/trial`);
    this.trials = responseTrial.data;
  },

  methods: {
    async del(id) {
      var r = confirm("Etes-vous sûr de vouloir supprimer ce participant?");
      if (r == true) {
        await axios.get(`http://localhost/ski/API/deleteParticipant` + id);
        const responseParticipants = await axios.get(
          `http://localhost/ski/API/participantWithResult`
        );
        this.participants = responseParticipants.data;
      }
    },
    async orderByCategory() {
      const responseParticipants = await axios.get(
        `http://localhost/ski/API/participantByCategory`
      );
      this.participants = responseParticipants.data;
    },

    previewExcel(e) {
      const selectedImage = e.target.files[0];
      this.createBase64Image(selectedImage);
      this.url = URL.createObjectURL(selectedImage);
    },
    createBase64Image(fileObject) {
      const reader = new FileReader();
      reader.onload = (e) => {
        this.form.excel = e.target.result;
      };
      reader.readAsDataURL(fileObject);
    },
    async submitExcel() {
      // Send Excel
      await axios.post(`http://localhost/ski/API/importExcel`, this.form);
      const responseParticipants = await axios.get(
        `http://localhost/ski/API/participantWithResult`
      );
      this.participants = responseParticipants.data;
    },
  },
};
</script>
