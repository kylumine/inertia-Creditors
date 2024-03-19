<script setup>
import { Link } from '@inertiajs/vue3'
import 'tailwindcss/tailwind.css';
import { useForm } from '@inertiajs/vue3'
import { defineProps } from 'vue';
import HeaderBar from '@/Components/HeaderBar.vue';

const props = defineProps({
  creditor: Array
});

const form = useForm({
    last_name: '',
    first_name: '',
    gender: '',
    birth_date: '',
    phone:'',
    address:'',
    credit_limit:''
});

const submit = () => {
    form.submit('post', '/creditors');
};

</script>

<template>
    <HeaderBar />

    <h1 class="text-4xl mt-2 ml-1">Create Creditor</h1>

    <div style="max.width: 400px;" class="p-4">
        <form @submit.prevent="submit">
            <div class="mb-3">
                <label for="last_name">Last Name: </label>
                <input type="text" id="last_name" class="w-full" v-model="form.last_name">
            </div>
            <div class="mb-3">
                <label for="first_name">First Name: </label>
                <input type="text" id="first_name" class="w-full" v-model="form.first_name">
            </div>
            <div class="mb-3">
                <label for="gender"> Gender:</label>
                <select name="gender" id="gender" v-model="form.gender" class="form-select w-full">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            </div>
            <div class="mb-3">
                <label for="birth_date">Birthdate: </label>
                <input type="date" id="birth_date" class="w-full" v-model="form.birth_date">
            </div>
            <div class="mb-3">
                <label for="phone">Phone: </label>
                <input type="text" id="phone" class="w-full" v-model="form.phone">
            </div>
            <div class="mb-3">
                <label for="address">Address: </label>
                <input type="text" id="address" class="w-full" v-model="form.address">
            </div>
            <div class="mb-3">
                <label for="credit_limit">Credit Limit: </label>
                <input type="text" id="credit_limit" class="w-full" v-model="form.credit_limit">
            </div>

            <button type="submit" class="btn bg-pink-500 text-white py-2 px-4 rounded">Submit</button>
             
            <Link href="/creditors" class="btn btn-pink text-white py-2 px-4 rounded ml-2">Back
            </Link>

        </form>        
    </div>
</template>