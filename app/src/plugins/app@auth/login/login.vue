<template>
	<div class="h-full flex flex-col justify-center">
		<div class="pb-8">
			<h1>
				Prihláste sa do svojho účtu
			</h1>
			<p class="text-light text-center">
				Nemáte účet? <span @click="$router.push('/register')" class=" text-primary-light-green underline cursor-pointer">Vytvorte ho tu!</span>
			</p>
		</div>
		<div class="gap-4 flex flex-col pb-4">
			<Input v-model="credentials.email" type="email" label="Email" placeholder="Zadajte svoj email"/>
			<Input v-model="credentials.password" type="password" label="Heslo" placeholder="Zadajte svoje heslo"/>
		</div>
		<div>
			<button @click="login()" class="login">
				Prihlásiť sa
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
				email: '',
				password: ''
			}
		}
	},
	methods: {
		login() {
			
		}
	}
}
</script>

<style lang="sass" scoped>

	h1
		@apply text-[32px] mb-2
	
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