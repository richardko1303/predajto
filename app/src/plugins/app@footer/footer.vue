<template>
	<footer>
		<p>Vytvorené pomocou <span>Predajto Studio™</span></p>
		<div @click="$cookieStore.setCookiePosition(2)" class="font-light text-white hover:underline cursor-pointer">
			Cookies
		</div>
	</footer>
</template>

<style scoped lang="sass">

	footer 
		@apply bg-primary-dark-green w-full h-[90px] flex justify-evenly items-center px-4
		p
			@apply text-center text-lg leading-5 text-white font-light
			span
				@apply font-semibold

</style>