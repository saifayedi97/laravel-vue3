<template>
    <nav class="npm run dev
    bg-white sidebar">
        <div class="pt-3 sidebar-sticky">
            <ul id="menu" class="nav flex-column mb-2">
                <li class="nav-item">
                    <router-link to="/admin" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-speedometer2" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
                            <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z"/>
                        </svg>
                        <span class="d-none d-sm-inline ps-2">Dashboard</span>
                    </router-link>
                </li>
                <li v-if="can('post-list')" class="nav-item">
                    <router-link :to="{ name: 'posts.index' }" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                        <span class="d-none d-sm-inline ps-2">Posts</span>
                    </router-link>
                </li>
                <li v-if="can('category-list')" class="nav-item">
                    <router-link :to="{ name: 'categories.index' }" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                        <span class="d-none d-sm-inline ps-2">Categories</span>
                    </router-link>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script setup>
import {useAbility} from '@casl/vue'
const {can} = useAbility();
</script>

<style scoped>
/* Sidebar Styles */
.sidebar {
    display: flex;
    justify-content: center;
    background-color: #b71c1c; /* Dark Red */
    color: white;
    min-height: 100vh;
    width: 100px;
    box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 0 20px 0 0;
}
.nav {
    gap: 15px;
}
/* Navigation Links */
.nav-link {
    color: #c62828;
    padding: 10px 40px;
    display: flex;
    align-items: center;
    border-radius: 30px;
    transition: background-color 0.3s ease-in-out;
}

.nav-link:hover {
    color: white;
    background-color: #FB1919;
    border-radius: 30px;
}

/* Active Link */
.router-link-active.router-link-exact-active{
    background-color: #FB1919;
    color: white;
    font-weight: bold;
    border-radius: 30px;
}

/* Icons */
.nav-link svg {
    margin-right: 8px;
}

/* Submenu Styling */
.collapse {
    background-color: #FB1919;
    padding-left: 10px;
    border-left: 2px solid white;
}

.collapse .nav-link {
    font-size: 14px;
    padding: 8px 10px;
}

.collapse .nav-link:hover {
    background-color: #FB1919;
}

/* Responsive */
@media (max-width: 768px) {
    .sidebar {
        width: 100%;
    }
}
</style>
