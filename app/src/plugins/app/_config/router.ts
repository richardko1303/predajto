import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
	history: createWebHistory(import.meta.env.BASE_URL),
	routes: [
		{
			path: '/',
			name: 'Landing',
			component: () => import('@/plugins/app@landing/landing.vue')
		},
		{
			path: '/inputs',
			name: 'Inputs',
			component: () => import('@/plugins/app@components/page.vue')
		},
		{
			path: '/creating',
			name: 'Creating',
			component: () => import('@/plugins/app@products/creating/creating.vue')
		},
		{
			path: '/login',
			name: 'Login',
			component: () => import('@/plugins/app@auth/login/login.vue')
		},
		{
			path: '/register',
			name: 'Register',
			component: () => import('@/plugins/app@auth/register/register.vue')
		}
	]
})

export default router
