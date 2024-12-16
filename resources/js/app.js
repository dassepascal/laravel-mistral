import './bootstrap';
import './../css/app.css';

import Alpine from 'alpinejs';
import { createApp } from 'vue';
import ProductForm from './components/ProductForm.vue';
import Test from './components/Test.vue';

window.Alpine = Alpine;

Alpine.start();


const app = createApp({});

app.component('product-form', ProductForm);
app.component('test', Test);


app.mount('#app')