import {createApp} from "vue";
import HomePage from "./pages/HomePage";

require('./bootstrap');


const homeApp = createApp(HomePage);

if (document.getElementById('home')) {
    homeApp.mount('#home');
}
