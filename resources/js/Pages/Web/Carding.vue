<template>

    <Sidebar>
        <div class="nav">
            <Link href="carding" class="nav-item">Checker</Link>
            <Link href="carding" class="nav-item">CC Info</Link>
        </div>
        <div class="grid grid-cols-8">
            <div class="checker col-span-4">
                <textarea name="" id="" class="checker-textarea" placeholder="4685310400098585|04|2024|058" v-model="cc"></textarea>
                <div class="checker-buttons">
                    <button class="checker-start" @click="checkCC">Iniciar</button>
                    <button class="checker-stop" @click="stopCC">Detener</button>
                </div>
            </div>
            <div class="checker-messages col-span-4">
                <span class="messages-cc">Coloque la cc en formato : </span>
                <br>
                <span class="messages-cc">xxxxxxxxxxxxxxxxx|xx|xxxx|xxx</span>
                <br>
                <a href="https://namso-gen.com/" target="_blank"><span class="messages-cc">Namso-gen: https://namso-gen.com/</span> </a>
                <a href="">hola</a>
            </div>
        </div>
        <h2>Resultado:</h2>
        <div v-for="cc in checked">
            <p v-if="cc.msg == 'Live'" class="cc-live">
                {{ cc.data.cc }}|{{ cc.data.mes }}|{{ cc.data.ano }}|{{ cc.data.cvv }} [Aprovada] ~ Check en Lorem Checker
            </p>
            <p v-else-if="cc.msg == 'Proxy Muerta'" class="cc-proxy">
                {{ cc.msg }} [Proxy] ~ Check en Lorem Checker
            </p>
            <p v-else class="cc-dead">
                {{ cc.data.cc }}|{{ cc.data.mes }}|{{ cc.data.ano }}|{{ cc.data.cvv }} [Reprovada] ~ Check en Lorem Checker
            </p>
        </div>


    </Sidebar>




</template>

<script>
import Sidebar from '@/Layouts/Sidebar.vue'
import axios from 'axios'
import { Head, Link } from '@inertiajs/inertia-vue3';

export default {
    components:{
        Sidebar,
        Link
    },
    data(){
        return{
            cc: '',
            checked: []
        }
    },
    methods:{
        async checkCC() {


            let vue =
                {
                    cc : this.cc
                }




           const rawResponse = await fetch('https://localhost/apiv2.php', {
                method: 'POST',
                headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
                },
                body: JSON.stringify(vue)
            });
            const data = await rawResponse.json();

            console.log(data)
            console.log(data.cc)



            // if(data.msg == "Dead"){
            //     this.checked.push("<p class='cc-dead'>"+vue.cc+" [Reprovada] ~ Check en Lorem Checker  </p>")
            // }else if(data.msg == "Proxy Muerta"){
            //     this.checked.push("<p class=''>"+vue.cc+" [Proxy Muerta] ~ Check en Lorem Checker  </p>")
            // } else{
            //     this.checked.push("<p class='cc-live'>"+vue.cc+" [Aprovada] ~ Check en Lorem Checker  </p>")
            // }

            this.checked.push(data)


        },
         stopCC(){
            const cards = this.cc.split("\n")
            cards.forEach(async cc => {
                let vue =
                {
                    "cc" : cc
                }
                 const rawResponse = await fetch('https://localhost/apiv2.php', {
                    method: 'POST',
                    headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(vue)
                });
                const data = await rawResponse.json();

                // if(data.msg == "Proxy Muerta"){
                //     console.log("dd")
                // }
                console.log(data)
                this.checked.push(data)

            });



        }
    },

    }



</script>

<style scoped>
    .nav{
        background: #08080C;
        border-radius: 5px;
        display: flex;
    }
    .nav-item{
        font-family: Oxanium;
        font-style: normal;
        font-weight: bold;
        font-size: 24px;
        line-height: 30px;
        color: #FFFFFF;
        padding: 20px 40px;
    }

    .checker{
        margin-top: 40px;
    }
    .checker-textarea{
        border: none;
        width: 100%;
        height: 342px;
        background: #191B1F;
        box-shadow: 15px 15px 20px rgba(0, 0, 0, 0.25);
        padding: 20px;
        font-family: Oxanium;
        font-style: normal;
        font-weight: 500;
        font-size: 20px;
        line-height: 25px;
        color: #576170;
    }
    .checker-buttons{
        margin-top: 10px;
        display: flex;
        justify-content: center;
        gap: 20px;
    }
    .checker-start{
        background: #34D178;
        width: 200px;
        height: 50px;
        font-family: Oxanium;
        font-style: normal;
        font-weight: bold;
        font-size: 20px;
        line-height: 25px;
        color: #08080C;
    }

    .checker-start:hover{
       border: none;
        background: #34D178;
        transition-duration: 0.5s;
        transition-delay: 0.1s;
        opacity: 0.4;
        color: #191B1F;
    }

    .checker-stop{
        background: #08080C;
        border: 2px solid #191B1F;
        box-sizing: border-box;
        width: 200px;
        height: 50px;
        color: white;
        font-family: 'Oxanium', cursive;
        border-radius: 5px;
        font-size: 20px;
    }

    .checker-stop:hover{
       border: none;
        background: #34D178;
        transition-duration: 0.5s;
        transition-delay: 0.1s;
        opacity: 0.4;
        color: #191B1F;
    }

    .checker-messages{
        width: auto;
        padding: 20px;
        margin-top: 40px;
    }

    .messages-cc{
        font-family: Oxanium;
        font-style: normal;
        font-weight: normal;
        font-size: 20px;
        line-height: 25px;
        color: #BDBDBD;
    }

    h2{
        font-family: Oxanium;
        font-style: normal;
        font-weight: bold;
        font-size: 48px;
        line-height: 60px;
        padding: 40px 0 0;
        color: #E0E0E0;
    }

    .cc-live{
        font-family: Oxanium;
        font-style: normal;
        font-weight: bold;
        font-size: 20px;
        line-height: 25px;
        color: #34D178;
        padding-bottom: 5px;

    }
    .cc-dead{
        font-family: Oxanium;
        font-style: normal;
        font-weight: bold;
        font-size: 20px;
        line-height: 25px;
        color: #EB5757;
        padding-bottom: 5px;
    }

    .cc-proxy{
        font-family: Oxanium;
        font-style: normal;
        font-weight: bold;
        font-size: 20px;
        line-height: 25px;
        color: #969696;
        padding-bottom: 5px;
    }
    a{
        color: #34D178;
    }
</style>
