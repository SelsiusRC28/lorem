<template>
    <Head title="Register" />



        <form @submit.prevent="submit">
            <div class="mt-4">
                <label for="email" value="Email" />
                <input id="email" type="text" class="mt-1 block w-full" v-model="form.email" />
            </div>

            <div class="mt-4">
                <label for="password" value="Password" />
                <input id="password" type="password" class="mt-1 block w-full" v-model="form.password"  autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <label for="password_confirmation" value="Confirm Password" />
                <input id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation"  autocomplete="new-password" />
            </div>


            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Already registered?
                </Link>

                <button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </button>
            </div>
              <jet-validation-errors class="mb-4" />
        </form>

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
                    email: '',
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
