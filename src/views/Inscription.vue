<template>
  <section class="main">
    <div class="name_date">
      <div class="epreuves">
        <h2>épreuves</h2>
      </div>
      <div class="inputone">
        <label for="#"> Nom de la station </label>
        <input
          v-model="form.station_name"
          type="text"
          name="station_name"
          placeholder="taper votre Nom station..."
        />
      </div>
      <div class="inputtwo">
        <label for="#"> Date d'inscription </label>
        <input
          v-model="form.registration_date"
          type="text"
          name="registration_date"
          placeholder="taper votre Date d'inscription..."
        />
      </div>
      <div class="inputthree">
        <input type="text" value="Valider" />
      </div>
    </div>
    <button v-on:click.prevent="exportForm" class="valide" value="Valider">
      Valider
    </button>
    <div class="form">
      <form
        v-on:submit.prevent="submitForm()"
        action=""
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
              v-model="form.lastname"
              type="text"
              name="lastname"
              placeholder="taper votre Nom..."
            />
          </div>

          <div class="form2">
            <label for="#"> Prénom </label>
            <input
              v-model="form.firstname"
              type="text"
              name="firstname"
              placeholder="taper votre Prénom..."
            />
          </div>

          <div class="form3">
            <label for="#"> Email </label>
            <input
              v-model="form.email"
              type="email"
              name="email"
              placeholder="taper votre Email..."
            />
          </div>

          <div class="form4">
            <label for="#"> Date de naissance </label>
            <input
              v-model="form.date_birth"
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
              v-model="form.number"
            />
            <label for="#"> Catégorie </label>
            <select type="text" name="category" v-model="form.category">
              <option
                v-for="category of categories"
                :key="category.id_category"
                :value="category.id_category"
                >{{ category.name_category }}</option
              >
            </select>
          </div>

          <div class="form6">
            <div class="file-upload">
              <input
                @change="previewFiles"
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
            <div id="idButton" v-on:click="generate()">Generer ID</div>
          </div>
          <div class="form8">
            <input id="marjorie" type="submit" value="Ajout participant" />
          </div>
          <div class="form9"></div>
        </div>
      </form>
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
        photo: '',
      },
    };
  },
  async mounted() {
    const response = await axios.get(`http://localhost/ski/API/category`);
    this.categories = response.data;
  },
  methods: {
    async generate() {
      let id = () => {
        return Math.floor((1 + Math.random()) * 0x10000)
          .toString(16)
          .substring(1);
      };
      document.getElementById("number").value = id();
    },
    previewFiles(event) {
      console.log(event)
      const photo = event.target.files;
      this.photo = photo.results;
      console.log(photo)
    },
    async submitForm() {
      await axios.post(
        `http://localhost/ski/API/insertParticipant`,
        this.form,
        {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        }
      );
    },
    async exportForm() {
      await axios.get(`http://localhost/ski/API/exportExcel`);
    },
  },
};
</script>
