<template>
	<footer>
	  	<div>
			<div>
		  		<p>Vytvorené pomocou <span>Predajto Studio™</span></p>
			</div>
	  	</div>
	</footer>
</template>

<style scoped lang="sass">

	footer 
		@apply bg-primary-dark-green w-full
		div
			@apply mx-auto max-w-7xl px-3 py-6 md:flex md:items-center md:justify-between lg:px-8
			div
				@apply md:order-1 mt-0
				p
					@apply text-center text-lg leading-5 text-white font-light
					span
						@apply font-semibold

</style>