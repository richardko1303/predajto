<template>
	<div class="flex flex-col items-center bg-primary-white">
		<Navbar/>
		<div class="h-[100vh]">
			<router-view></router-view>
		</div>
		<Footer/>
	</div>
</template>

<script>
import Navbar from '@/plugins/app@navbar/navbar.vue'
import Footer from '@/plugins/app@footer/footer.vue'

export default {
	components: {
		Navbar,
	Footer
	}
}

</script>