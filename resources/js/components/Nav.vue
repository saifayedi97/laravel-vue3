<template>
    <nav class="navbar navbar-expand-md shadow-sm custom-navbar">
        <div class="container">
            <!-- Logo Section -->
            <router-link to="/" class="navbar-brand d-flex align-items-center">
                <img src="https://www.die-zeitungen.de/fileadmin/_processed_/8/8/csm_mgo_360_logo_13bfa93c74.jpg" alt="Logo" class="navbar-logo me-2" />
            </router-link>

            <!-- Toggler for Mobile -->
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side -->
                <ul class="navbar-nav me-auto">
                    <LocaleSwitcher />
                </ul>

                <!-- Right Side -->
                <ul class="navbar-nav ms-auto">
                    <template v-if="!user?.name">
                        <li class="nav-item">
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" to="/register">{{ $t('register') }}</router-link>
                        </li>
                    </template>

                    <li v-if="user?.name" class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            {{ user.name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <router-link class="dropdown-item" to="/admin">Admin</router-link>
                            </li>
                            <li>
                                <router-link class="dropdown-item" to="/admin/posts">Post</router-link>
                            </li>
                            <li><hr class="dropdown-divider" /></li>
                            <li>
                                <a class="dropdown-item" href="javascript:void(0)" @click="logout">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script setup>
import useAuth from "@/composables/auth";
import { computed } from "vue";
import LocaleSwitcher from "../components/LocaleSwitcher.vue";
import { useAuthStore } from "@/store/auth";

const auth = useAuthStore();
const user = computed(() => auth.user);
const { processing, logout } = useAuth();
</script>

<style scoped>
.custom-navbar {
    background-color: white;
    border-bottom: 2px solid red;
}

.navbar-brand {
    font-weight: bold;
    font-size: 1.5rem;
    color: red;
}

.navbar-logo {
    width: 200px;
    height: 50px;
    object-fit: contain;
}

.nav-link {
    color: red;
    transition: color 0.3s;
}

.nav-link:hover {
    color: #ff4d4d;
}

.dropdown-menu {
    border-color: red;
}

.dropdown-item:hover {
    background-color: #ffe6e6;
}
</style>
