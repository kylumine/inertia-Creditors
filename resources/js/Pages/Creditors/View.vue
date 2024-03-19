<script setup>
import { Link } from '@inertiajs/vue3'
import 'tailwindcss/tailwind.css';
import { defineProps } from 'vue';
import HeaderBar from '@/Components/HeaderBar.vue';

const props = defineProps({
  creditor: Array
});
</script>

<template>
    <HeaderBar />
        <div class="p-8">
            <h1 class="text-4xl pink">View Creditor</h1>

            <div class="border bordp p-4 rounded m-6 fs-5">
                <table class="tanle-striped flex">
                    <tr class="flex flex-col border-end border-solid mr-2 p-2">
                        <th>Last Name: </th>
                        <th>First Name: </th>
                        <th>Gender: </th>
                        <th>Birthdate: </th>
                        <th>Contact #: </th>
                        <th>Address: </th>
                        <th>Credit Limit: </th>
                    </tr>
                    <tr class="flex flex-col mr-2 p-2">
                        <td>{{ creditor.last_name }}</td>
                        <td>{{ creditor.first_name }}</td>
                        <td>{{ creditor.gender }}</td>
                        <td>{{ creditor.birth_date }}</td>
                        <td>{{ creditor.phone }}</td>
                        <td>{{ creditor.address }}</td>
                        <td>${{ creditor.credit_limit }}</td>
                    </tr>
                </table>
            </div>

            <div class="mt-1">
                <Link href="/creditors" class="btn btn-pink" preserve-scroll>Back</Link>
            </div>
        </div>


</template>