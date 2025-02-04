<template>
    <nav class="mx-2">
        <ol class="breadcrumb">
            <li
                v-for="(crumb, ci) in crumbs"
                :key="ci"
                class="breadcrumb-item align-items-center"
            >
                <router-link :to="crumb.href" class="btn" :class="{ disabled: isLast(ci) }"
                             @click="selected(crumb)">
                    {{ crumb.text }}
                </router-link>
            </li>
        </ol>
    </nav>
</template>

<script>
export default {
    props: {
        crumbs: {
            type: Array,
            required: true,
        },
    },
    methods: {
        isLast(index) {
            return index === this.crumbs.length - 1;
        },
        selected(crumb) {
            this.$emit('selected', crumb);
        },
    },
};
</script>

<style scoped>
.breadcrumb {
    background-color: white;
    border: 1px solid rgba(0, 0, 0, 0.125);
    border-radius: 30px;
    padding: 2px 20px;
    border: solid 1px #FA6568 ;
}

.breadcrumb-item + .breadcrumb-item::before {
    float: none;
}

.border-radius-0 {
    border-radius: 0
}
.btn {
    border: none;
    &.disabled {
        color: #F30600 ;
        font-weight: bold;
    }
}
</style>
