<template>
    <div class="mb-4">
        <label :for="name" class="block text-gray-700">{{ label }}</label>
        <input type="file" :name="name" :id="name" class="form-input mt-1 block w-full" @change="handleFileChange">
        <img v-if="imageUrl" :src="imageUrl" alt="Preview" class="mt-2 max-w-full h-auto">
        <span v-if="errors[name]" class="text-red-500">{{ errors[name][0] }}</span>
    </div>
</template>

<script>
export default {
    props: {
        name: String,
        label: String,
        imageUrl: String,
        errors: {
            type: Object,
            default: () => ({}),
        },
    },
    methods: {
        handleFileChange(event) {
            const file = event.target.files[0];
            if (file) {
                this.$emit('update:imageUrl', URL.createObjectURL(file));
            }
        },
    },
};
</script>
