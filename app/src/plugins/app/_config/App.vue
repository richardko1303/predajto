<template>
	<div>
		<Navbar/>
		<router-view></router-view>
	</div>
</template>

<script>
import Navbar from '@/plugins/app@navbar/navbar.vue' 

export default {
	components: {
		Navbar
	}
}

</script>