<template>
  <Sidebar>
    <h2>Foro:</h2>
    <button class="btn" @click="openPost">Crear un nuevo post</button>
    <form method="POST" @submit.prevent="actualizar" v-show="open">
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
      <h3>Pregunta:</h3>
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
        <p class="p">Contenido:</p>
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

    <div class="anuncios" v-for="foro in foros">
      <div class="icon-post" @click.prevent="likePost(foro)">
        <span class="post-like">{{ foro.likes}}</span>
        <i class="fa-solid fa-heart fa-3x"></i>
      </div>
      <img :src="'storage/' + foro.img" class="anuncios-img" />
      <h5 class="anuncios-h5">{{ foro.title }}</h5>
      <span class="inicio-autor">by: {{ foro.user.email }}</span>
      <p class="p">
        {{ foro.content }}
      </p>
    </div>
    {{ foros }}
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
    foros: Object,
    errors: Object,
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
      usuarios: this.users,
      role: "",
      open: false,
    };
  },
  computed: {},
  methods: {
    actualizar() {
      if (this.$refs.photo) {
        this.form.image = this.$refs.photo.files[0];
      }

      console.log(this.form.text);
      this.form.post(route("foro-post", usePage().props.value.user));
    },
    previewImage(e) {
      const file = e.target.files[0];
      this.url = URL.createObjectURL(file);
    },
    openPost() {
      if (this.open == false) {
        this.open = true;
      } else {
        this.open = false;
      }
    },
    likePost(id){
        this.form.post(route("foro-like", id));
    }
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
  width: 800px;
  height: auto;
  border-radius: 16px;
  border: 1px solid #34d178;
  padding: 20px;
  margin: 60px 0;
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
  font-size: 30px;
  display: flex;
  align-items: center;
  color: #ffffff;
  margin-top: 10px;
  word-wrap: anywhere;
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

.p {
  line-height: none;
}
.inicio-autor {
  font-family: Oxanium;
  font-style: normal;
  font-weight: bold;
  font-size: 18px;
  display: flex;
  align-items: center;
  color: #bdbdbd;
  margin-top: -10px;
  margin-bottom: 5px;
}

.icon-post {
  margin-left: 71%;
  position: absolute;
  color: #34d178;
  margin-top: 10px;
  cursor: pointer;
}

.post-like {
  font-size: 22px;
  font-family: Oxanium;

  position: absolute;

  z-index: 999;

  color: black;

  left: 17px;
  top: 8px;
}
</style>
