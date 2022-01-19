<template>
  <h2>Holaaaaaa</h2>
  {{ canLogin }}
  <br>
  {{ canRegister }}
  <br>
   <pre>{{ $page.props }}</pre>
</template>

<script>
import { defineComponent } from 'vue'
import { Head, Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
            Head,
            Link,
    },
    props: {
            canLogin: Boolean,
            canRegister: Boolean,
            laravelVersion: String,
            phpVersion: String,
    }
}
</script>

<style>

</style>
