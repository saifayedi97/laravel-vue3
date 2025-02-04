<template>
    <div class="d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row justify-content-center my-5">
                <div class="col-md-6">
                    <div class="card border-0 shadow-lg">
                        <div class="card-body">
                            <!-- Top Section (Logo and Title) -->
                            <div class="text-center mb-4">
                                <img
                                    class="logo"
                                    src="https://www.die-zeitungen.de/fileadmin/_processed_/8/8/csm_mgo_360_logo_13bfa93c74.jpg"
                                    alt="Logo"
                                />
                            </div>
                            <!-- Login Form -->
                            <form @submit.prevent="submitLogin">
                                <div class="form">
                                    <!-- Email Field -->
                                    <div class="mb-3">
                                        <label for="email" class="form-label">{{ $t('email') }}</label>
                                        <input
                                            v-model="loginForm.email"
                                            id="email"
                                            type="email"
                                            class="form-control input-red"
                                            autofocus
                                            autocomplete="username"
                                        />
                                        <!-- Validation Errors -->
                                        <div class="text-danger mt-1">
                                            <div v-for="message in validationErrors?.email" :key="message">
                                                {{ message }}
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Password Field -->
                                    <div class="mb-3">
                                        <label for="password" class="form-label">{{ $t('password') }}</label>
                                        <input
                                            v-model="loginForm.password"
                                            id="password"
                                            type="password"
                                            class="form-control input-red"
                                            autocomplete="current-password"
                                        />
                                        <!-- Validation Errors -->
                                        <div class="text-danger mt-1">
                                            <div v-for="message in validationErrors?.password" :key="message">
                                                {{ message }}
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Remember Me -->
                                    <div class="form-check mb-3">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            v-model="loginForm.remember"
                                            id="remember"
                                        />
                                        <label class="form-check-label" for="remember">
                                            {{ $t('remember_me') }}
                                        </label>
                                    </div>

                                    <!-- Submit Button -->
                                    <button
                                        class="btn btn-primary w-100"
                                        :class="{ 'opacity-25': processing }"
                                        :disabled="processing"
                                    >
                                        {{ $t('login') }}
                                    </button>
                                </div>
                            </form>
                            <!-- Forgot Password -->
                            <router-link
                                :to="{ name: 'auth.forgot-password' }"
                                class="m-forget-password d-block text-right mt-3">
                                {{ $t('forgot_password') }}
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import useAuth from "@/composables/auth";

const {loginForm, validationErrors, processing, submitLogin} = useAuth();

const redirectToRegister = () => {
    // Example: Redirect to the register page
    console.log("Redirecting to register...");
};
</script>

<style>

/* Added styles from the first template */
.logo {
    width: 250px;
    display: block;
    margin: 0 auto 20px;
}
.input-red:focus {
    border-color: #F70201FF !important;
    box-shadow: 0 0 5px #F70201FF !important;
    outline: none;
}

.subtitle-action {
    color: #F70201FF;
    text-decoration: underline;
    cursor: pointer;
}
.btn {
    font-family: 'Roboto', sans-serif;
    padding: 10px 20px;
    font-size: 16px;
    letter-spacing: 1px;
    background: #F70201FF;
    border-radius: 50px;
    border: none;
    display: flex;
    justify-content: center;
    align-items: center;
    &:hover {
        background: black;
    }
}
.card{
    padding: 50px;
    border-radius: 40px;
}

.m-forget-password {
    color: #F70201FF;
    text-align: right;
}

</style>
