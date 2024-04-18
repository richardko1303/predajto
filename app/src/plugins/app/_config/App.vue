<template>
	<div class="flex flex-col items-center bg-primary-white">
		<Navbar/>
		<div class="h-fit">
			<router-view></router-view>
		</div>

		<Cookies v-if="this.$cookieStore.getCookiePosition !== -1"/>

		<Footer/>
	</div>
</template>

<script>
import Navbar					from '@/plugins/app@navbar/navbar.vue'
import Footer 					from '@/plugins/app@footer/footer.vue'
import Cookies					from '@/plugins/app@cookies/cookies-popover.vue'

export default {
	components: {
		Navbar,
		Footer,
		Cookies
	},
	mounted() {
		console.log(this.$cookieStore.getStrictlyNecessaryCookie())
		if(!this.$cookieStore.getStrictlyNecessaryCookie()) this.$cookieStore.setCookiePosition(1)

		this.$cookieStore.setStrictlyNecessary(this.$cookieStore.getStrictlyNecessaryCookie())
		this.$cookieStore.setPreferences(this.$cookieStore.getPreferencesCookie())
		this.$cookieStore.setMarketingAnalytics(this.$cookieStore.getMarketingAnalyticsCookie())
	}
}

</script>