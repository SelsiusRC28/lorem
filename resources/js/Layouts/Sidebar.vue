<template>
  <div class="load" v-show="load">
    <h1 class="title title-load">
      <span class="title-green">Lorem</span> Ipsum
    </h1>
    <p class="p p-load">
      Bienvenido {{ $page.props.user.email }} a Lorem Ipsum
    </p>
    <div class="hm-spinner"></div>
  </div>

  <div v-show="!load">
    <div class="sidebar" :class="dropclass">
      <i class="fas fa-bars fa-2x drop-icon" @click="drop"></i>
      <div class="profile-center">
        <div class="profile">
          <img :src="'storage/' + $page.props.user.image" class="profile-img" />
          <div class="profile-container">
            <span class="profile-name">{{ $page.props.user.email }}</span>
            <span class="profile-type"
              >User <span class="profile-range font-bold" :class="colorRole" >{{ rango }}</span></span
            >
          </div>
        </div>
        <Link href="profile"><button class="btn">Profile</button></Link>
      </div>
      <div v-if="hasRole(['Owner', 'Admin'])">
          <h4 class="text-center mt-4">{{ rango }}</h4>
        <div class="role-nav">
          <Link
            href="role"
            class="card card-role"
            :class="{ activerole: $page.url === '/role' }"
          >
            <i class="fas fa-unlock-alt fa-2x card-img "></i>
            <span class="card-span">{{ rango }}</span>
          </Link>
        </div>
      </div>
      <nav>
        <Link
          href="home"
          class="card"
          :class="{ active: $page.url === '/home' }"
        >
          <i class="fas fa-home fa-2x card-img"></i>
          <span class="card-span">Inicio</span>
        </Link>

        <Link
          href="chat"
          class="card"
          :class="{ active: $page.url === '/chat' }"
        >
          <i class="fas fa-comments fa-2x card-img"></i>
          <span class="card-span">Chat</span>
        </Link>
        <Link
          href="foro"
          class="card"
          :class="{ active: $page.url === '/foro' }"
        >
          <i class="fas fa-question-circle fa-2x card-img"></i>
          <span class="card-span">Foro</span>
        </Link>
        <Link
          href="aprender"
          class="card"
          :class="{ active: $page.url === '/aprender' }"
        >
          <i class="fas fa-graduation-cap fa-2x card-img"></i>
          <span class="card-span">Aprender</span>
        </Link>
        <Link
          href="tienda"
          class="card"
          :class="{ active: $page.url === '/tienda' }"
        >
          <i class="fas fa-shopping-cart fa-2x card-img"></i>
          <span class="card-span">Tienda</span>
        </Link>
        <Link
          href="checker"
          class="card"
          :class="{ active: $page.url === '/checker' }"
        >
          <i class="fas fa-credit-card fa-2x card-img"></i>
          <span class="card-span">Checker</span>
        </Link>
        <form method="POST" @submit.prevent="logout">
          <button class="btn btn-logout" type="submit">
            <i class="fas fa-sign-out-alt fa-2x card-img"></i>
          </button>
        </form>
      </nav>
    </div>
    <div class="content" :class="dropContent">
      <h1 class="title"><span class="title-green">Lorem</span> Ipsum</h1>
      <slot></slot>
    </div>
  </div>
</template>

<script>
import { defineComponent } from "vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { usePage } from "@inertiajs/inertia-vue3";

export default {
  components: {
    Link,
  },
  data() {
    return {
      dropdown: false,
      load: true,
      rango: ''
    };
  },
  computed: {
    dropclass() {
      return this.dropdown ? "drop" : " ";
    },
    dropContent() {
      return this.dropdown ? "drop-content" : "";
    },
    validacion() {},
    colorRole(){
        if(this.rango == 'Owner'){
            return 'color-owner'
        }else if(this.rango == 'Admin'){
            return 'color-admin'
        }else if(this.rango == 'Seller'){
            return 'color-seller'
        }else{
            return 'color-vip'
        }
    }
  },
  methods: {
    drop() {
      if (this.dropdown == false) {
        this.dropdown = true;
      } else {
        this.dropdown = false;
      }
    },
    logout() {
      localStorage.removeItem("load");
      this.$inertia.post(route("logout"));
    },
  },
  created() {
    setTimeout(() => {
      this.load = false;
      localStorage.setItem("load", this.load);
    }, 3000);

    let datosDB = localStorage.getItem("load");
    if (datosDB == null) {
      this.load = true;
    } else {
      this.load = false;
    }
    if(this.$page.props.user.roles[0]){
        this.rango = this.$page.props.user.roles[0].name
    }
  },
};
</script>

<style >
body {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  background: #131416;
  font-family: "Oxanium", cursive;
}

.sidebar {
  width: 300px;
  height: 100vh;
  background-color: #08080c;
  transition-duration: 1s;
  position: fixed;
}
.drop-icon {
  color: #576170;
  display: flex;
  justify-content: right;
  padding: 20px;
  cursor: pointer;
}
.profile-center {
  display: block;
  margin: 0px auto;
  width: 240px;
}
.profile {
  display: flex;
  padding-top: 30px;
}
.profile-img {
  width: 67px;
  height: 67px;
  border-radius: 50%;
}
.profile-container {
  text-align: center;
  padding: 5px 10px;
}
.profile-name {
  font-family: "Oxanium", cursive;
  font-style: normal;
  font-weight: bold;
  font-size: 24px;
  line-height: 30px;
  color: #f2f2f2;
  text-align: center;
  display: block;
}
.profile-type {
  font-family: Oxanium;
  font-style: normal;
  font-weight: normal;
  font-size: 20px;
  line-height: 25px;
  color: #d7d5d5;
  text-align: center;
  display: block;
}
.profile-range {
  color: #faff00;
}
.btn {
  display: block;
  margin: 0 auto;
  background: #08080c;
  border: 2px solid #191b1f;
  box-sizing: border-box;
  width: 239px;
  height: 50px;
  color: white;
  margin-top: 10px;
  font-family: "Oxanium", cursive;
  border-radius: 5px;
  font-size: 20px;
}

.btn:hover {
  border: none;
  background: #34d178;
  transition-duration: 0.5s;
  transition-delay: 0.1s;
  opacity: 0.4;
  color: #191b1f;
}

nav {
  display: flex;
  flex-wrap: wrap;
  gap: 17px;
  justify-content: center;
  align-content: center;
  margin-top: 25px;
}
.card {
  width: 120px;
  height: 120px;
  background: #191b1f;
  border-radius: 10px;
  display: grid;
  align-content: center;
}
.card-img {
  display: block;
  margin: 0 auto;
  padding-bottom: 5px;
  color: #576170;
}
.card-span {
  font-family: Oxanium;
  font-style: normal;
  font-weight: bold;
  font-size: 20px;
  line-height: 22px;
  color: #576170;
  text-align: center;
  padding-top: 5px;
}

.card:hover {
  background: #34d178;
  opacity: 0.4;
  transition-duration: 0.5s;
  transition-delay: 0.1s;
}

/* Active links */
.active {
  background: #34d178;
}
.active .card-img {
  color: #191b1f;
}
.active .card-span {
  color: #191b1f;
}

/* Dropwdown */
.drop {
  width: 70px;
  transition-duration: 1s;
}

.drop .profile-container {
  display: none;
  transition-duration: 1s;
}
.drop .btn {
  display: none;
}

.drop .card {
  background: none;
  border-radius: none;
}

.drop .active .card-img {
  color: #34d178;
}
.drop .active .card-span {
  color: #34d178;
}

.drop-content {
  left: 70px !important;
  transition: all 1s ease;
  width: calc(100% - 70px) !important;
}

.content {
  width: calc(100% - 300px);
  position: relative;
  left: 300px;
  transition: 1s;
  padding: 30px 100px;
}

.title {
  font-family: Archivo Black;
  font-style: normal;
  font-weight: normal;
  font-size: 72px;
  line-height: 78px;
  letter-spacing: -0.125em;
  color: #ffffff;
  text-align: center;
  padding-bottom: 50px;
}

.title-green {
  color: #34d178;
}

h2 {
  font-family: Oxanium;
  font-style: normal;
  font-weight: bold;
  font-size: 48px;
  line-height: 60px;
  padding-bottom: 10px;
  color: #e0e0e0;
}

h3 {
  font-family: Oxanium;
  font-style: normal;
  font-weight: bold;
  font-size: 38px;
  line-height: 60px;
  padding-bottom: 10px;
  color: #e0e0e0;
}

h4{
   font-family: Oxanium;
  font-style: normal;
  font-weight: bold;
  font-size: 30px;
  color: #e0e0e0;
}

.p {
  font-family: Oxanium;
  font-style: normal;
  font-weight: normal;
  font-size: 20px;
  line-height: 25px;
  color: #bdbdbd;
}
.p-error {
  color: #eb5757;
}
.a {
  font-family: Oxanium;
  font-style: normal;
  font-weight: normal;
  font-size: 20px;
  line-height: 25px;
  color: #34d178;
}

.btn-logout {
  margin-top: 30px;
}

.btn-logout:hover {
  background: #eb5757;
}

.hm-spinner {
  display: block;
  margin: 0 auto;
  height: 80px;
  width: 80px;
  border: 6px solid transparent;
  border-top-color: #34d178;
  border-bottom-color: #34d178;
  border-radius: 50%;
  position: relative;
  -webkit-animation: spin 3s linear infinite;
  animation: spin 3s linear infinite;
}

.hm-spinner::before {
  content: "";
  position: absolute;
  top: 20px;
  right: 20px;
  bottom: 20px;
  left: 20px;
  border: 6px solid transparent;
  border-top-color: #fff;
  border-bottom-color: #fff;
  border-radius: 50%;
  -webkit-animation: spin 1.5s linear infinite;
  animation: spin 1.5s linear infinite;
}

@-webkit-keyframes spin {
  from {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  to {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}

@keyframes spin {
  from {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  to {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}

.load {
  margin: 35vh 0;
}

.title-load {
  padding: 0;
  font-size: 100px;
}

.p-load {
  font-size: 24px;
  text-align: center;
  padding: 20px 0 30px;
}


/* role */

.role-nav{
    display: block;
    margin: 10px 20px;
}

.card-role:hover{
    background: #eb5757;
  opacity: 0.4;
  transition-duration: 0.5s;
  transition-delay: 0.1s;
}

.activerole {
  background: #eb5757;
}

.color-owner{
    color: #eb5757;
}

.color-admin{
    color: #34d178;
}
.color-seller{
    color: skyblue;
}

.color-vip{
    color: #faff00;
}
</style>
