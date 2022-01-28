<template>
<div class="content-register">
    <Head title="Register" />
         <h1 class="title"> <span class="title-green">Lorem</span> Ipsum</h1>

        <form @submit.prevent="submit">
                <h2>Register</h2>

                <label for="email">Usuario:</label>
                <div>
                      <input id="email" type="text" class="mt-1 block w-full" v-model="form.email" />
                      <img class="telegram" src="storage/assets/logos_telegram.png" >
                </div>




                 <label for="password">Contraseña:</label>
                <input id="password" type="password" class="mt-1 block w-full" v-model="form.password"  autocomplete="new-password" />


                 <label for="password_confirmation">Confirmar Contraseña:</label>
                <input id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation"  autocomplete="new-password" />

                 <button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </button>



                <Link :href="route('login')" class="link">
                  Ya tienes una cuenta?
                </Link>

              <jet-validation-errors class="mb-4" />
        </form>
</div>


</template>

<script>
    import { defineComponent } from 'vue'
    import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Head,
            JetValidationErrors,
            Link,
        },

        data() {
            return {
                form: this.$inertia.form({
                    name: 'lorem',
                    email: '@',
                    image: 'assets/user.png',
                    password: '',
                    password_confirmation: '',
                    terms: false,
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('register'), {
                    onFinish: () => this.form.reset('password', 'password_confirmation'),
                })
            }
        },

    })
</script>
<style scoped>
    .content-register{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        background: #131416 !important;
        font-family: 'Oxanium', cursive;
        height: 100vh;
    }
    .title{
        font-family: Archivo Black;
        font-style: normal;
        font-weight: normal;
        font-size: 72px;
        line-height: 78px;
        letter-spacing: -0.125em;
        color: #FFFFFF;;
        text-align: center;
        padding-bottom: 50px;
         padding-top: 100px;
    }

    .title-green{
        color: #34D178;
    }
    form{
        width: 460px;
        background: rgba(25, 27, 31, 0.8);
        box-shadow: 15px 15px 20px rgba(0, 0, 0, 0.25);
        display: block;
        margin: 0 auto;
         padding: 40px 40px 20px;
    }
    h2{
        font-family: Oxanium;
        font-style: normal;
        font-weight: bold;
        font-size: 64px;
        line-height: 80px;
        color: #FFFFFF;
        text-align: center;
        padding-bottom: 20px;
    }
    label{
        font-family: Oxanium;
        font-style: normal;
        font-weight: 600;
        font-size: 24px;
        line-height: 30px;
        color: #FFFFFF;
    }
    input{
        font-family: Oxanium;
        font-style: normal;
        font-weight: normal;
        font-size: 20px;
        line-height: 25px;
        color: #E0E0E0;
        width: 100%;
        background: #131416 !important;
        border: none;
        margin-bottom: 20px;
        border-radius: 5px !important;
        box-shadow: none !important;
    }

    input:nth-child(1){
         padding-left: 50px !important;
    }


    .telegram{
        position: absolute;
        top: 403px;
    }
    button{
        background: #34D178;
        width: 200px;
        height: 50px;
        font-family: Oxanium;
        font-style: normal;
        font-weight: bold;
        font-size: 20px;
        line-height: 25px;
        color: #08080C;
        border-radius: 5px;
        cursor: pointer !important;
        opacity: 1;
        display: block;
        margin: 20px auto 30px;
    }

    button:hover{
        border: none;
        background: #34D178;
        transition-duration: 0.5s;
        transition-delay: 0.1s;
        opacity: 0.4;
        color: #191B1F;
    }

    .link{
        font-family: Oxanium;
        font-style: normal;
        font-weight: normal;
        font-size: 18px;
        line-height: 22px;
        color: #E0E0E0;
        text-decoration: none;
    }

    .link:hover{
        color: rgb(74, 97, 97);
    }
</style>
