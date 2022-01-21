<template>

    <Sidebar>
        <div v-if="$page.props.flash.message" class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
            <span class="font-medium">Actualizado Correctamente</span>
        </div>
        <h2>Perfil</h2>
        <form method="POST" @submit.prevent="actualizar">
            <div class="profile-div">
                <div>
                    <input
                        type="file"
                        @change="previewImage"
                        ref="photo"
                        id="file-input"
                        class="profile-file-input"
                    />

                    <label for="file-input" >
                        <i class="fas fa-arrow-circle-up fa-6x profile-file-svg"></i>
                        <img :src="url" class="profile-img" for="file-input">
                    </label>
                </div>
                <div class="profile-datos" >

                        <p class="p">Usuario:</p>
                        <input type="text" name="username" class="profile-input" v-model="form.username">
                        <br>
                        <p class="p">Rango:</p>
                        <input type="text" value="User Vip" class="profile-input" disabled>
                        <br>
                        <p class="p">Checker Saldo:</p>
                        <input type="text" value="9999" class="profile-input" disabled>
                        <br>
                                    <div
                                        v-if="errors.image"
                                        class="font-bold text-red-600"
                                    >
                                        {{ errors.image }}
                                    </div>
                        <button class="btn profile-btn">Actualizar Informacion</button>

                </div>
            </div>
        </form>
        <form method="POST" @submit.prevent="logout" class="form-logout">
                <p class="p">Cerrar Sesion:</p>
                <button class="btn btn-logout" type="submit">
                    <i class="fas fa-sign-out-alt fa-2x card-img"></i>
                </button>
            </form>



    </Sidebar>




</template>

<script>
import Sidebar from '@/Layouts/Sidebar.vue'
import axios from 'axios'
import { Head, Link, useForm, usePage} from '@inertiajs/inertia-vue3';


export default {
    components:{
        Sidebar,
        Link
    },
     props: {
        errors: Object,
    },
    setup() {
        const form = useForm({
            image: null,
        });

        return { form };
    },
    data(){
        return {
             url: 'storage/'+usePage().props.value.user.image,
        }
    },
    methods: {
         logout() {
                localStorage.removeItem('load');
                this.$inertia.post(route('logout'));
        },
        actualizar(){
            if (this.$refs.photo) {
                this.form.image = this.$refs.photo.files[0];
            }
            console.log(this.image)
            this.form.post(route("profile-image", usePage().props.value.user));
        },
          previewImage(e) {
            const file = e.target.files[0];
            this.url = URL.createObjectURL(file);
        },
    },
    created(){

    },


    }



</script>

<style scoped>
    .profile-div{
        display: flex;
        margin-top: 20px;
    }
    .profile-img{
        width: 300px;
        height: 300px;
        background-size: cover;
        background-position: center top;
    }
    .profile-img:hover{
        cursor: pointer;
        transition-duration: 0.5s;
        filter: blur(3px) grayscale(60%);
    }
    .profile-file-input{
        display: none;
    }
    .profile-file-svg{
        position: absolute;
        margin-top: 90px;
        margin-left: 105px;
        opacity: 0.3;
    }
    .p{
        font-size: 25;
        display: inline-block;
    }
    .profile-input{
        border: none;
        background: #191B1F;
        box-shadow: 15px 15px 20px rgba(0, 0, 0, 0.25);
        font-family: Oxanium;
        font-style: normal;
        font-weight: 500;
        font-size: 20px;
        line-height: 25px;
        color: #576170;
        margin: 10px;
    }
    .profile-datos{
        margin: 0 30px;
    }
    .profile-btn{
        background: #34D178;
        color: #08080C;
        width: 300px;
    }
   .form-logout{
       margin: 50px 0;
   }
   .btn-logout{
       margin: 10px 0;
   }
</style>
