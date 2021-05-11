import {createApp} from "vue";
import ProductForm from "./components/forms/ProductForm";

require('./bootstrap');

const app = createApp(ProductForm);
app.mount('#product-form')
