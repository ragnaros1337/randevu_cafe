import './bootstrap';
import {createApp, defineAsyncComponent} from 'vue/dist/vue.esm-bundler.js';

import 'vuetify/styles'
import { createVuetify } from 'vuetify';
import '@mdi/font/css/materialdesignicons.css';
import * as components from 'vuetify/components';
import * as directives from 'vuetify/directives';

import store from './store';

import productcard from './components/ProductCard.vue';
import headerbuttongroup from './components/HeaderButtonGroup.vue';
import productcardcontainer from './components/ProductCardContainer.vue';
import shoppingcard from './components/ShoppingCard.vue';

const vuetify = createVuetify({
    components,
    directives,
    icons: {
        defaultSet: 'mdi'
    }
})

const app = createApp({});
app.use(vuetify);
app.use(store);

app.component('product-card', productcard);
app.component('header-button-group', headerbuttongroup);
app.component('product-card-container', productcardcontainer);
app.component('shopping-card', shoppingcard);

app.mount("#app");
