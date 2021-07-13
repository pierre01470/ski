<template>
  <section class="main">
    <div class="name_date" id="trial">
      <div class="epreuves">
        <h2>épreuves</h2>
      </div>
      <div class="inputone">
        <label for="#"> Nom de la station </label>
        <input
          v-model="trial.station_name"
          type="text"
          name="station_name"
          placeholder="taper votre Nom station..."
        />
      </div>
      <div class="inputtwo">
        <label for="#"> Date d'inscription </label>
        <input
          v-model="trial.registration_date"
          type="date"
          name="registration_date"
          placeholder="taper votre Date d'inscription..."
        />
      </div>
      <div class="inputthree">
        <input v-on:click.prevent="submitTrial" type="submit" value="Valider" />
      </div>
    </div>
    <button v-on:click.prevent="exportForm" class="valide" value="Valider">
      Valider
    </button>
    <div class="blockForm" id="form">
      <form
        v-on:submit.prevent="submitForm"
        action=""
        method="POST"
        enctype="multipart/form-data"
        id="formulaire"
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
              >
                {{ category.name_category }}
              </option>
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
              <img v-if="url" :src="url" width="154px" alt="photo" />
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
            <input id="marjorie" type="submit" value="Ajout participant" />
          </div>
        </div>
      </form>
    </div>

    <div class="liste-participant" id="view">
      <div class="row">
        <div class="column">
          <div class="headcol">
            <h2>M1<br /><span id="nbr"></span></h2>
          </div>
          <div
            v-for="participant in participants"
            :key="participant.id_participant"
          >
            <span v-if="participant.name_category == 'M1'"
              >{{ participant.lastname }}
              <img
                src="../assets/ressources/cross.svg"
                alt=""
                width="20px"
                v-on:click="del(participant.id_participant)"
              />
            </span>
          </div>
        </div>
        <div class="column">
          <div class="headcol">
            <h2>M2<br /><span id="nbr"></span></h2>
          </div>
          <div
            v-for="participant in participants"
            :key="participant.id_participant"
          >
            <span v-if="participant.name_category == 'M2'"
              >{{ participant.lastname }}
              <img
                src="../assets/ressources/cross.svg"
                alt=""
                width="20px"
                v-on:click="del(participant.id_participant)"
            /></span>
          </div>
        </div>
        <div class="column">
          <div class="headcol">
            <h2>M3<br /><span id="nbr"></span></h2>
          </div>
          <div
            v-for="participant in participants"
            :key="participant.id_participant"
          >
            <span v-if="participant.name_category == 'M3'"
              >{{ participant.lastname }}
              <img
                src="../assets/ressources/cross.svg"
                alt=""
                width="20px"
                v-on:click="del(participant.id_participant)"
            /></span>
          </div>
        </div>
        <div class="column">
          <div class="headcol">
            <h2>Senior<br /><span id="nbr"></span></h2>
          </div>
          <div
            v-for="participant in participants"
            :key="participant.id_participant"
          >
            <span v-if="participant.name_category == 'Senior'"
              >{{ participant.lastname }}
              <img
                src="../assets/ressources/cross.svg"
                alt=""
                width="20px"
                v-on:click="del(participant.id_participant)"
            /></span>
          </div>
        </div>
        <div class="column">
          <div class="headcol">
            <h2>V<br /><span id="nbr"></span></h2>
          </div>
          <div
            v-for="participant in participants"
            :key="participant.id_participant"
          >
            <span v-if="participant.name_category == 'V'"
              >{{ participant.lastname }}
              <img
                src="../assets/ressources/cross.svg"
                alt=""
                width="20px"
                v-on:click="del(participant.id_participant)"
            /></span>
          </div>
        </div>
        <div class="column">
          <div class="headcol">
            <h2>Snow<br /><span id="nbr"></span></h2>
          </div>
          <div
            v-for="participant in participants"
            :key="participant.id_participant"
          >
            <span v-if="participant.name_category == 'Snow'"
              >{{ participant.lastname }}
              <img
                src="../assets/ressources/cross.svg"
                alt=""
                width="20px"
                v-on:click="del(participant.id_participant)"
            /></span>
          </div>
        </div>
        <div class="column">
          <div class="headcol">
            <h2>Nouvelle glisse<br /><span id="nbr"></span></h2>
          </div>
          <div
            v-for="participant in participants"
            :key="participant.id_participant"
          >
            <span v-if="participant.name_category == 'Nouvelle Glisse'"
              >{{ participant.lastname }}
              <img
                src="../assets/ressources/cross.svg"
                alt=""
                width="20px"
                v-on:click="del(participant.id_participant)"
            /></span>
          </div>
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
      participants: [],
      categories: [],
      data: "",
      url: "",
      trial: {
        station_name: "",
        registration_date: "",
      },
      form: {
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
    // Get all participants
    const responseParticipants = await axios.get(
      `http://localhost/ski/API/participant`
    );
    this.participants = responseParticipants.data;

    // Get all categories
    const responseCategory = await axios.get(
      `http://localhost/ski/API/category`
    );
    this.categories = responseCategory.data;
  },
  methods: {
    async generate() {
      // Generate ID unique for participants
      var id = Math.floor((1 + Math.random()) * 0x1000000)
        .toString(16)
        .substring(1);
      document.getElementById("number").value = id;
      this.form.number = id;
    },

    // Get input file
    previewFiles(e) {
      const selectedImage = e.target.files[0];
      this.createBase64Image(selectedImage);
      this.url = URL.createObjectURL(selectedImage);
      console.log(this.url);
    },

    createBase64Image(fileObject) {
      const reader = new FileReader();
      reader.onload = (e) => {
        this.form.photo = e.target.result;
      };
      reader.readAsDataURL(fileObject);
    },

    async submitTrial() {
      // Truncate table
      var truncate = confirm("Voulez-vous vider la base de données?");
      const responseParticipants = await axios.get(
        `http://localhost/ski/API/participant`
      );
      this.participants = responseParticipants.data;
      if (truncate == true) {
        axios.get(`http://localhost/ski/API/truncateTable`);
      }
      // Edit Dom
      document.getElementById("form").style.display = "flex";
      document.getElementById("form").className +=
        "animate__animated animate__fadeInUp form";
      document.getElementById("view").style.display = "grid";
      document.getElementById("trial").style.display = "none";
      // Send form trial
      await axios.post(`http://localhost/ski/API/insertTrial`, this.trial);
    },

    async submitForm() {
      // Send form participants
      await axios.post(`http://localhost/ski/API/insertParticipant`, this.form);
      document.getElementById("formulaire").reset();
      const responseParticipants = await axios.get(
        `http://localhost/ski/API/participant`
      );
      this.participants = responseParticipants.data;
    },
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
    async exportForm() {
      const responseExport = await axios.get(
        "http://localhost/ski/API/exportExcel"
      );
      var link = document.createElement("a");
      link.setAttribute("href", "../ListeCourse.xlsx");
      link.setAttribute("download", "liste.xlsx");
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    },
  },
};
</script>
