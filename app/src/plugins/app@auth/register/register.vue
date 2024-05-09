<template>
	<div class="h-full flex flex-col justify-center sm:min-w-[415px] w-full p-2 sm:p-0">
		<div class="pb-8">
			<h1>
				Nový účet
			</h1>
			<p class="text-light text-center">
				Účet už máte? <span @click="$router.push('/login')" class=" text-primary-light-green underline cursor-pointer">Prihláste sa tu!</span>
			</p>
		</div>
		<div class="gap-4 flex flex-col pb-4">
			<Input v-model="credentials.name" type="text" label="Celé meno" placeholder="Zadajte svoje meno a priezvisko"/>
			<Input v-model="credentials.email" type="email" label="Email" placeholder="Zadajte svoj email"/>
			<Input v-model="credentials.phone" @dial="console.log(phoneDial = `${$event}`)" class="mt-2" placeholder="Zadajte svoje telefónne číslo" label="Telefónne číslo" type="phone"/>
			<div class="w-full grid grid-cols-4 gap-2">
				<Input type="password" class="col-span-2" placeholder="Zadajte heslo" label="Heslo"/>
				<Input type="password" class="col-span-2" placeholder="Zopakujte heslo" label="Potvrdenie hesla"/>
			</div>
		</div>
		<div>
			<button @click="register()" class="login">
				Vytvoriť účet
			</button>
			<div class="flex justify-center items-center">
				<div class="w-full h-[0.5px] bg-primary-gray"></div>
				<p class="font-light px-2 text-primary-gray text-sm text-center">
					alebo
				</p>
				<div class="w-full h-[0.5px] bg-primary-gray"></div>
			</div>
			<button class="register">
				<img src="@/assets/google-icon.svg" alt="">
				Prihlásiť sa pomocou účtu Google
			</button>
		</div>
	</div>
</template>

<script>
export default {
	data() {
		return {
			credentials: {
				name: '',
				email: '',
				phone: '',
				password: '',
				confirmPassword: '',
			},
			phoneDial: ''
		}
	},
	methods: {
		register() {
			this.credentials.phone = `+${this.phoneDial} ${this.credentials.phone}`
			console.log(this.credentials)
		}
	}
}
</script>

<style lang="sass" scoped>

	h1
		@apply text-[32px] mb-2 text-center
	
	button
		@apply py-4 px-2 text-center items-center justify-center rounded-md rounded-md my-2 flex w-full
		&.login
			@apply bg-primary-dark-green bg-opacity-80 text-white
			&:hover
				@apply bg-opacity-100
		&.register
			@apply bg-primary-light-green bg-opacity-80 text-primary-black gap-2
			&:hover
				@apply bg-opacity-100

</style>