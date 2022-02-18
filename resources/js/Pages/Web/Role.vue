<template>
  <Sidebar>
    <form method="POST" @submit.prevent="actualizar">
      <div
        v-if="$page.props.flash.message"
        class="
          p-4
          mb-4
          text-sm text-green-700
          bg-green-100
          rounded-lg
          dark:bg-green-200 dark:text-green-800
        "
        role="alert"
      >
        <span class="font-medium">Publicado Correctamente</span>
      </div>
      <h2>Nuevo Anuncio</h2>
      <div class="anuncios">
        <input
          type="file"
          @change="previewImage"
          ref="photo"
          id="file-input"
          class="profile-file-input"
        />

        <label for="file-input">
          <i class="fas fa-arrow-circle-up fa-6x profile-file-svg"></i>
          <img :src="url" class="profile-imgg" for="file-input" />
        </label>
        <p class="p">Titulo:</p>
        <input type="text" class="profile-input" v-model="form.title" />
        <br />
        <p class="p">Texto:</p>
        <textarea v-model="form.text" class="role-textarea"></textarea>
        <div v-if="errors.image" class="font-bold text-red-600">
          {{ errors.image }}
        </div>
        <div v-if="errors.text" class="font-bold text-red-600">
          {{ errors.text }}
        </div>
        <button class="btn profile-btn">Publicar</button>
      </div>
    </form>

    <form method="POST" @submit.prevent="logout" class="form-logout">
      <p class="p">Cerrar Sesion:</p>
      <button class="btn btn-logout" type="submit">
        <i class="fas fa-sign-out-alt fa-2x card-img"></i>
      </button>
    </form>
    {{ users }}
  </Sidebar>
</template>

<script>
import Sidebar from "@/Layouts/Sidebar.vue";
import axios from "axios";
import { Head, Link, useForm, usePage } from "@inertiajs/inertia-vue3";

export default {
  components: {
    Sidebar,
    Link,
  },
  props: {
    errors: Object,
    users: Object
  },
  setup() {
    const form = useForm({
      image: null,
      text: "",
      title: "",
    });

    return { form };
  },
  data() {
    return {
      url: "storage/assets/Carding.png",
    };
  },
  methods: {
    logout() {
      localStorage.removeItem("load");
      this.$inertia.post(route("logout"));
    },
    actualizar() {
      if (this.$refs.photo) {
        this.form.image = this.$refs.photo.files[0];
      }

      console.log(this.form.text);
      this.form.post(route("role-anuncio", usePage().props.value.user));
    },
    previewImage(e) {
      const file = e.target.files[0];
      this.url = URL.createObjectURL(file);
    },
  },
};
</script>

<style scoped>
.profile-div {
  display: flex;
  margin-top: 20px;
}
.profile-imgg {
  width: 560px;
  height: 360px;
  object-fit: cover;
  display: block;
  margin: 0 auto;
  background-size: cover;
  background-position: center top;
}
.profile-imgg:hover {
  cursor: pointer;
  transition-duration: 0.5s;
  filter: blur(3px) grayscale(60%);
}
.profile-file-input {
  display: none;
}
.profile-file-svg {
  position: absolute;
  margin-top: 150px;
  margin-left: 220px;
  opacity: 0.5;
  color: #eb5757;
}

.profile-input {
  border: none;
  background: #191b1f;
  box-shadow: 15px 15px 20px rgba(0, 0, 0, 0.25);
  font-family: Oxanium;
  font-style: normal;
  font-weight: 500;
  font-size: 20px;
  line-height: 25px;
  color: #576170;
  width: 100%;
}

.profile-btn {
  background: #34d178;
  color: #08080c;
  width: 300px;
}
.form-logout {
  margin: 50px 0;
}
.btn-logout {
  margin: 10px 0;
}

.anuncios {
  width: 600px;
  height: auto;
  border-radius: 16px;
  border: 1px solid #34d178;
  padding: 20px;
}
.anuncios-img {
  width: 560px;
  height: 360px;
  object-fit: cover;
  display: block;
  margin: 0 auto;
}
.anuncios-h5 {
  font-family: Oxanium;
  font-style: normal;
  font-weight: bold;
  font-size: 24px;
  line-height: 30px;
  display: flex;
  align-items: center;
  color: #bdbdbd;
}
li {
  font-family: Oxanium;
  font-style: normal;
  font-weight: normal;
  font-size: 20px;
  line-height: 25px;
  display: flex;
  align-items: center;
  color: #bdbdbd;
}
a {
  color: #34d178;
}

.role-textarea {
  border: none;
  width: 100%;
  height: 342px;
  background: #191b1f;
  box-shadow: 15px 15px 20px rgba(0, 0, 0, 0.25);
  padding: 20px;
  font-family: Oxanium;
  font-style: normal;
  font-weight: 500;
  font-size: 20px;
  line-height: 25px;
  color: #576170;
  margin: 20px 0;
}
</style>
