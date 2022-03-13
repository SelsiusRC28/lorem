<template>
    <Sidebar>
        <h2>Contenido del Curso:</h2>

        <div class="container-curso">

            <Link v-for="video in videos" class="m-1">
                <div class="container-video">
                    <i class="fa-solid fa-play fa-2x icon-play"></i>
                    <p class="container-video-p">
                        {{ video.title }}
                    </p>
                </div>
            </Link>


        </div>
        {{ videos }}
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
        videos: Object,
    },
};
</script>

<style scoped>
.container-curso {
    width: auto;
}

.container-video {
    display: flex;
    align-items:center;
    justify-content: flex-start;
    padding: 10px;
    width: 100%;
    background: #191b1f;
    border-radius: 5px;
    height: 60px;
    min-height: 60px;

}
.icon-play {
    color: #34d178;
}

.container-video-p {
    font-family: "Oxanium";
    font-style: normal;
    font-weight: 400;
    font-size: 20px;
    color: #bdbdbd;
    padding-left: 10px;
    word-wrap: anywhere;
}
</style>
