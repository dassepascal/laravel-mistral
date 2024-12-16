<template>
    <div>
        <form @submit.prevent="submitForm">
            <!-- Image Upload -->
            <ImageUpload name="image" label="Image" :imageUrl="form.image" :errors="errors" @update:imageUrl="form.image = $event" />

            <FormInput name="name" label="Name" v-model="form.name" :errors="errors" @input="updateSlugAndSeoTitle" />

            <FormInput name="slug" label="Slug" v-model="form.slug" :errors="errors" />

            <FormInput name="description" label="Description" v-model="form.description" :errors="errors" />

            <FormInput name="price" label="Price" v-model="form.price" :errors="errors" />

            <!-- SEO -->
            <hr>

            <FormInput name="seo_title" label="SEO Title" v-model="form.seo_title" :errors="errors" />
            <FormInput name="meta_description" label="META Description" v-model="form.meta_description" :errors="errors" />
            <FormInput name="meta_keywords" label="META Keywords" v-model="form.meta_keywords" :errors="errors" />

            <div class="mb-4">
                <label class="form-checked-label col-md-4 text-md-end text-start" for="sold">Vendu</label>
                <div class="form-check form-switch col-md-6">
                    <input type="hidden" name="sold" value="0" class="">
                    <input type="checkbox" name="sold" id="sold" value="1" v-model="form.sold"
                           class="form-check-input" role="switch">
                </div>
            </div>

            <div class="mb-4">
                <input type="submit" class="btn btn-primary" value="Add Product">
            </div>
        </form>
    </div>
</template>

<script>
import { ref } from 'vue';
import ImageUpload from './ImageUpload.vue';
import FormInput from './FormInput.vue';

export default {
    components: {
        ImageUpload,
        FormInput,
    },
    setup() {
        const form = ref({
            name: '',
            slug: '',
            description: '',
            price: '',
            seo_title: '',
            meta_description: '',
            meta_keywords: '',
            sold: false,
            image: null,
        });

        const errors = ref({});

        const updateSlugAndSeoTitle = () => {
            form.value.slug = form.value.name.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-+|-+$/g, '');
            form.value.seo_title = form.value.name;
        };

        const submitForm = () => {
            // Handle form submission
            console.log('Form submitted:', form.value);
        };

        return {
            form,
            errors,
            updateSlugAndSeoTitle,
            submitForm,
        };
    },
};
</script>
