<template>
    <button :class="buttonClass" @click="handleClick">
        <slot></slot>
    </button>
</template>

<script>
export default {
    props: {
        type: {
            type: String,
            default: "button",
        },
        variant: {
            type: String,
            default: "primary", // Options: primary, secondary, danger, etc.
        },
    },
    computed: {
        buttonClass() {
            return `btn btn-${this.variant}`;
        },
    },
    methods: {
        handleClick(event) {
            this.$emit("click", event);
        },
    },
};
</script>

<style scoped>
.btn {
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}
.btn-primary {
    background-color: #007bff;
    color: white;
}
.btn-secondary {
    background-color: #6c757d;
    color: white;
}
.btn-danger {
    background-color: #dc3545;
    color: white;
}
</style>
