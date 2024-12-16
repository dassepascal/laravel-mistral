<template>
    <div class="mb-4">
        <label :for="name" class="block text-gray-700">{{ label }}</label>
        <input :type="type" :name="name" :id="name" class="form-input mt-1 block w-full" :value="modelValue" @input="updateValue">
        <span v-if="errors[name]" class="text-red-500">{{ errors[name][0] }}</span>
    </div>
</template>

<script>
export default {
    props: {
        name: String,
        label: String,
        type: {
            type: String,
            default: 'text',
        },
        modelValue: String,
        errors: {
            type: Object,
            default: () => ({}),
        },
    },
    methods: {
        updateValue(event) {
            this.$emit('update:modelValue', event.target.value);
        },
    },
};
</script>
