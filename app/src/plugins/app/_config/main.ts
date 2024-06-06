import { createApp } from 'vue'
import { createPinia } from 'pinia'

//THEME IMPORTS
import '../_themes/global.sass'

//STORE IMPORTS
import { useCookieStore } from '../_stores/cookie.store'
import { useAuthStore } from '../_stores/auth.store'

//COMPONENT IMPORTS
import Input from '@/plugins/app@components/input.vue'

import App from './App.vue'
import router from './router'
import axios from 'axios'

const app = createApp(App)

app.use(createPinia())
app.use(
	router,
	axios
)

//COMPONENTS
app.component('Input', Input)


//AXIOS
axios.defaults.baseURL = import.meta.env.VITE_APP_AXIOS_URL
app.config.globalProperties.$axios = axios

//STORES
app.config.globalProperties.$cookieStore = useCookieStore()
app.config.globalProperties.$authStore = useAuthStore()

app.mount('#app')
