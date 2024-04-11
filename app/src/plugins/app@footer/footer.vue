<template>
	<footer>
		<p>Vytvorené pomocou <span>Predajto Studio™</span></p>
		<div @click="this.$cookieStore.setCookiePosition(2)" class=" text-white hover:underline cursor-pointer">
			Cookies
		</div>
	</footer>
</template>

<style scoped lang="sass">

	footer 
		@apply bg-primary-dark-green w-full h-[90px] flex justify-evenly items-center
		p
			@apply text-center text-lg leading-5 text-white font-light
			span
				@apply font-semibold

</style>