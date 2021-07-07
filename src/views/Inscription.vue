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
          type="date"
          name="registration_date"
          placeholder="taper votre Date d'inscription..."
        />
      </div>
      <div class="inputthree">
        <input type="submit" value="Valider" />
      </div>
    </div>
    <button v-on:click.prevent="exportForm" class="valide" value="Valider">
      Valider
    </button>
    <div class="form">
      <form
        v-on:submit.prevent="submitForm"
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
              disabled
              type="text"
              name="number"
              id="number"
              v-model="form.number"
            />
            <label for="#"> Catégorie </label>
            <select type="text" name="category" v-model="form.category">
              <option
                v-for="category in categories"
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
              <label for="file" id="picture"></label>
            </div>
          </div>

          <div class="form7">
            <div id="dossardBtn" v-on:click="generate()">
              Generer: <br />
              N° dossard
            </div>
          </div>
          <div class="form8">
            <button id="marjorie" type="submit" value="Ajout participant" />
          </div>
          <div class="form9"></div>
        </div>
      </form>
    </div>

    <div class="liste-participant">
      <table>
        <thead class="liste-header">
          <tr>
            <th scope="col">M1</th>
            <th scope="col">M2</th>
            <th scope="col">M3</th>
            <th scope="col">Senior</th>
            <th scope="col">V</th>
            <th scope="col">Snow</th>
            <th scope="col">Nouvelle Glisse</th>
          </tr>
          <tr class="nbr-parti">
            <th scope="col">Nombre participant</th>
            <th scope="col">Nombre participant</th>
            <th scope="col">Nombre participant</th>
            <th scope="col">Nombre participant</th>
            <th scope="col">Nombre participant</th>
            <th scope="col">Nombre participant</th>
            <th scope="col">Nombre participant</th>
          </tr>
        </thead>
        <tbody class="liste-middle">
          <tr>
            <td>Nbr parti</td>
            <td>Nbr parti</td>
            <td>Nbr parti</td>
            <td>Nbr parti</td>
            <td>Nbr parti</td>
            <td>Nbr parti</td>
            <td>Nbr parti</td>
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