import { createApp } from 'vue'
import { createPinia } from 'pinia'

//THEMES
import '../_themes/global.sass'

//STORES
import { useCookieStore } from '../_stores/cookie.store'

//COMPONENTS
import Input from '@/plugins/app@components/input.vue'

import App from './App.vue'
import router from './router'

const app = createApp(App)

app.use(createPinia())
app.use(router)

app.component('Input', Input)

app.config.globalProperties.$cookieStore = useCookieStore()

app.mount('#app')
