<template>
  <section class="main">
    <div class="name_date">
      <div class="epreuves">
        <h2>épreuves</h2>
      </div>
      <div class="inputone">
        <label for="#"> Nom de la station </label>
        <input
          v-model="station_name"
          type="text"
          name="station_name"
          placeholder="taper votre Nom station..."
        />
      </div>
      <div class="inputtwo">
        <label for="#"> Date d'inscription </label>
        <input
          v-model="registration_date"
          type="text"
          name="registration_date"
          placeholder="taper votre Date d'inscription..."
        />
      </div>
      <div class="inputthree">
        <input type="text" value="Valider" />
      </div>
    </div>
    <button class="valide" value="Valider">Valider</button>

    <div class="form">
      <form
        action="./insertParticipants"
        method="POST"
        enctype="multipart/form-data"
      >
        <div class="titre-form">
          <h2>Formulaire</h2>
        </div>
        <div class="la-in">
          <div class="form1">
            <label for="#"> Nom </label>
            <input
              v-model="lastname"
              type="text"
              name="lastname"
              placeholder="taper votre Nom..."
            />
          </div>

          <div class="form2">
            <label for="#"> Prénom </label>
            <input
              v-model="firstname"
              type="text"
              name="firstname"
              placeholder="taper votre Prénom..."
            />
          </div>

          <div class="form3">
            <label for="#"> Email </label>
            <input
              v-model="email"
              type="email"
              name="email"
              placeholder="taper votre Email..."
            />
          </div>

          <div class="form4">
            <label for="#"> Date de naissance </label>
            <input
              v-model="date_birth"
              type="date"
              name="date_birth"
              placeholder="taper votre Date de naissance..."
            />
          </div>

          <div class="form5">
            <label for="number">n° Dossard</label>
            <input
              type="text"
              name="number"
              id="number"
              placeholder="taper votre Numero de dossard..."
            />
            <label for="#"> Catégorie </label>
            <select type="text" name="category" v-model="category">
              <option
                v-for="category of categories"
                :key="category.id_category"
                :value="category.id_category"
              >
                {{ category.name_category }}
              </option>
            </select>
          </div>

          <div class="form6">
            <div class="file-upload">
              <input
                class="inPhoto"
                type="file"
                name="photo"
                value="Photo"
                placeholder="Photo"
                size="80px"
              />
              <label for="file" id="picture">Photo</label>
            </div>
          </div>

          <div class="form7">
            <div id="dossardBtn" v-on:click="generate()">
              Generer: <br />
              N° dossard
            </div>
          </div>
          <div class="form8">
            <input id="marjorie" type="submit" value="Ajout participant" />
          </div>
          <div class="form9"></div>
        </div>
      </form>
    </div>

    <div class="liste-participant" id="view">
      <div id="row">
        <div class="column">
          <h2>M1</h2>
          <div
            v-for="participant in participants"
            :key="participant.id_participant"
          >
            <span v-if="participant.id_category == 1">{{
              participant.lastname
            }}</span>
          </div>
        </div>
        <div class="column">
          <h2>M2</h2>
          <div
            v-for="participant in participants"
            :key="participant.id_participant"
          >
            <span v-if="participant.id_category == 2">{{
              participant.lastname
            }}</span>
          </div>
        </div>
        <div class="column">
          <h2>M3</h2>
          <div
            v-for="participant in participants"
            :key="participant.id_participant"
          >
            <span v-if="participant.id_category == 3">id3</span>
          </div>
        </div>
        <div class="column">
          <h2>Senior</h2>
        </div>
        <div class="column">
          <h2>V</h2>
        </div>
        <div class="column">
          <h2>Snow</h2>
        </div>
        <div class="column">
          <h2>Nouvelle Glisse</h2>
        </div>
      </div>
    </div>
  </section>
</template>





<script>
const axios = require("axios");
export default {
  data() {
    return {
      categories: [],
      form: {
        station_name: "",
        registration_date: "",
        lastname: "",
        firstname: "",
        email: "",
        date_birth: "",
        number: "",
        category: "",
      },
    };
  },
  async mounted() {
    const responseParticipants = await axios.get(
      `http://localhost/ski/API/participant`
    );
    this.participants = responseParticipants.data;
    const element = (document.getElementById("participant").innerHTML =
      responseParticipants.data.length);
    console.log(responseParticipants.data.length);
    const responseCategory = await axios.get(
      `http://localhost/ski/API/category`
    );
    this.categories = responseCategory.data;
  },
  methods: {
    async generate() {
      var id = Math.floor((1 + Math.random()) * 0x1000000)
        .toString(16)
        .substring(1);
      document.getElementById("number").value = id;
      this.form.number = id;
    },
    previewFiles(e) {
      const selectedImage = e.target.files[0];
      this.createBase64Image(selectedImage);
    },
    createBase64Image(fileObject) {
      const reader = new FileReader();
      reader.onload = (e) => {
        this.form.photo = e.target.result;
      };
      reader.readAsDataURL(fileObject);
    },
    async submitForm() {
      console.log(this.form);
      await axios.post(`http://localhost/ski/API/insertParticipant`, this.form);
    },
    async exportForm() {
      await axios.get(`http://localhost/ski/API/exportExcel`);
    },
  },
};
</script>