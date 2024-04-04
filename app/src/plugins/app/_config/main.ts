import { createApp } from 'vue'
import { createPinia } from 'pinia'

//THEMES

import '../_themes/global.sass'

import App from './App.vue'
import router from './router'

const app = createApp(App)

app.use(createPinia())
app.use(router)

app.mount('#app')
