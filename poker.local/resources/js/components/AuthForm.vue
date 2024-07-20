<template>
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
        <h2 v-if="isLogin" class="text-2xl font-bold text-center mb-6">Login</h2>
        <h2 v-else class="text-2xl font-bold text-center mb-6">Register</h2>

        <form v-if="isLogin" @submit.prevent="login">
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" v-model="email" id="email" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" required>
                <p v-if="errors.email" class="text-red-600 text-sm mt-1">{{ errors.email[0] }}</p>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" v-model="password" id="password" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" required>
                <p v-if="errors.password" class="text-red-600 text-sm mt-1">{{ errors.password[0] }}</p>
            </div>
            <button type="submit" class="w-full bg-green-700 text-white py-2 px-4 rounded-md hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-500">Login</button>
            <p v-if="errors.general" class="text-red-600 text-sm mt-2">{{ errors.general }}</p>
        </form>

        <form v-else @submit.prevent="register">
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" v-model="name" id="name" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" required>
                <p v-if="errors.name" class="text-red-600 text-sm mt-1">{{ errors.name[0] }}</p>
            </div>
            <div class="mb-4">
                <label for="regEmail" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" v-model="regEmail" id="regEmail" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" required>
                <p v-if="errors.email" class="text-red-600 text-sm mt-1">{{ errors.email[0] }}</p>
            </div>
            <div class="mb-4">
                <label for="regPassword" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" v-model="regPassword" id="regPassword" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" required>
                <p v-if="errors.password" class="text-red-600 text-sm mt-1">{{ errors.password[0] }}</p>
            </div>
            <button type="submit" class="w-full bg-green-700 text-white py-2 px-4 rounded-md hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-500">Register</button>
            <p v-if="errors.general" class="text-red-600 text-sm mt-2">{{ errors.general }}</p>
        </form>

        <p class="text-center text-gray-600 mt-4">
            <span v-if="isLogin">Don't have an account? <a href="#" @click.prevent="toggleForm" class="text-green-700">Register</a></span>
            <span v-else>Already have an account? <a href="#" @click.prevent="toggleForm" class="text-green-700">Login</a></span>
        </p>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';

const isLogin = ref(true);
const email = ref('');
const password = ref('');
const name = ref('');
const regEmail = ref('');
const regPassword = ref('');
const errors = ref({});

const toggleForm = () => {
    isLogin.value = !isLogin.value;
    errors.value = {};
};

const login = async () => {
    errors.value = {};
    try {
        const response = await axios.post('/login', {
            email: email.value,
            password: password.value,
        });
        window.location.href = response.data.url;
    } catch (error) {
        if (error.response && error.response.data.errors) {
            errors.value = error.response.data.errors;
        } else {
            errors.value.general = 'An unexpected error occurred.';
        }
    }
};

const register = async () => {
    errors.value = {};
    try {
        const response = await axios.post('/register', {
            name: name.value,
            email: regEmail.value,
            password: regPassword.value,
        });
        window.location.href = response.data.url;
    } catch (error) {
        if (error.response && error.response.data.errors) {
            errors.value = error.response.data.errors;
        } else {
            errors.value.general = 'An unexpected error occurred.';
        }
    }
};
</script>
