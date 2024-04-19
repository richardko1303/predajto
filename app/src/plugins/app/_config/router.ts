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
		}
	]
})

export default router
