<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<template>
    <div class="bg-pink-300 text-white p-4">
        <div class="w-[1020px] mx-auto flex">
            <h1 class="font-bold flex-1 p-1">Midterm Project</h1>
            <nav class="flex gap-5">
                <Link href="/" class="p-1" :class="{'bg-pink-500 text-white font-bold p-1 rounded' : $page.component == 'Landing' }">Home</Link>
                <Link href="/creditors" class="p-1" :class="{'bg-pink-500 text-white font-bold p-1 rounded' : $page.component == 'Creditors/Index' }">Creditors</Link>
                <Link href="/about" class="p-1" :class="{'bg-pink-500 text-white font-bold p-1 rounded' : $page.component == 'About' }">About</Link>
            </nav>
        </div>
    </div>
</template>


