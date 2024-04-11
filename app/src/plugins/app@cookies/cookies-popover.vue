<template>
	<div v-if="cookiePosition == 1 || cookiePosition == 2" class="cookies-popover cookies-small popover">
		<template v-if="this.$cookieStore.getCookiePosition == 1">
			<h1 class="cookies-small title-1 mx-2">
				Chcete povoliť súbory Cookies?
			</h1>
			<p class="cookies-small description">
				Súbory cookie používame na to, aby sme zistili, kde máte problémy pri navigácii na našich webových stránkach a opravili ich pre vašu budúcu návštevu.
			</p>
			<div class="flex gap-2">
				<button @click="this.$cookieStore.setCookiePosition(2)" class="btn cookies-small customize-button">
					Upraviť
				</button>
				<button @click="setCookies(true)" class="btn cookies-small allow-all-button">
					Povoliť
				</button>
			</div>
		</template>

		<template v-if="cookiePosition == 2">
			<div class="flex flex-col w-full">
				<div class="flex flex-row items-center justify-center mb-6">
					<img class="cursor-pointer mr-auto" src="@/plugins/app@cookies/_assets/arrow-narrow-left.svg" width="24px" alt="back"
						@click="this.$cookieStore.setCookiePosition(1)">
					<h1 class="cookies-small title-2">
						Zvoľte si svoje nastavenia
					</h1>
				</div>
				<div class="flex justify-between items-center mb-6">
					<span class="cookies-small subtitle">
						Nutné
					</span>
					<div class="px-4 py-[6px] bg-primary-light-green rounded-[50px]">
						<img src="./_assets/primary-lock.svg" width="18px" />
					</div>
				</div>
				<div class="flex justify-between items-center mb-6">
					<span class="cookies-small subtitle">
						Marketing & Analytiky
					</span>
					<Switch
						v-model="marketingAnalytics"
						class="relative inline-flex h-[30px] w-[50px] items-center rounded-full"
						:class="marketingAnalytics ? 'bg-primary-dark-green' : 'bg-primary-gray'"
					>
						<span class="sr-only">Enable notifications</span>
						<span
						:class="marketingAnalytics ? 'translate-x-6' : 'translate-x-1'"
						class="inline-block h-5 w-5 transform rounded-full bg-white transition"
						/>
					</Switch>
				</div>
				<div class="flex justify-between items-center mb-10">
					<span class="cookies-small subtitle">
						Voľby
					</span>
					<Switch
						v-model="preferences"
						class="relative inline-flex h-[30px] w-[50px] items-center rounded-full"
						:class="preferences ? 'bg-primary-dark-green' : 'bg-primary-gray'"
					>
						<span class="sr-only">Enable notifications</span>
						<span
						:class="preferences ? 'translate-x-6' : 'translate-x-1'"
						class="inline-block h-5 w-5 transform rounded-full bg-white transition"
						/>
					</Switch>
				</div>
				<div class="flex justify-center sm:justify-end gap-2 items-center">
					<button class="btn text-sm w-full bg-primary-dark-green bg-opacity-80 hover:bg-opacity-100 text-white font-medium leading-[120%] !px-8 !py-4"
						@click="setCookies()">
						Uložiť
					</button>
				</div>
			</div>
		</template>
	</div>
</template>

<script lang="ts">
import { Switch } from '@headlessui/vue'
export default {
	components: {
		Switch,
	},
	computed: {
		preferences: {
			get() {				
				return this.$cookieStore.getPreferences
			},
			set(val: boolean) {
				this.$cookieStore.setPreferences(val)
			}
		},
		marketingAnalytics: {
			get() {
				return this.$cookieStore.getMarketingAnalytics
			},
			set(val: boolean) {
				this.$cookieStore.setMarketingAnalytics(val)
			}
		},
		cookiePosition: {
			get() {
				return this.$cookieStore.getCookiePosition
			},
			set(val: number) {
				this.$cookieStore.setCookiePosition(val)
			}
		}
	},

	methods: {
		setCookies(allowAll = false) {
			if(allowAll) {
				this.preferences = true
				this.marketingAnalytics = true
			}
			this.$cookieStore.setPreferences(this.preferences)
			this.$cookieStore.setMarketingAnalytics(this.marketingAnalytics)
			this.$cookieStore.setCookies()
		},
		cancel() {
			this.$cookieStore.setCookiePosition(-1)
			this.preferences = this.$cookieStore.getPreferencesCookie()
			this.marketingAnalytics = this.$cookieStore.getMarketingAnalyticsCookie()
		}
	},
}
</script>

<style scoped lang="sass">
	.btn 
		border: none
		border-radius: 6px
		font-weight: 500
		line-height: 120%
		font-size: 16px

	.cookies-popover
		box-shadow: 0px 28px 76px 0px rgba(0, 0, 0, 0.45)
		&::-webkit-scrollbar
			display: none

	.cookies-small
		&.popover
			@apply sm:w-[475px] sm:mr-24 sm:mb-20 sm:py-8 sm:px-12 px-6 py-6 mr-[5%] mb-[10vw] w-[90%] z-50 fixed right-0 bottom-0 bg-[#ABFFFA] rounded-xl flex flex-col justify-center items-center text-center
		&.title-1
			@apply text-primary-black text-xl leading-6 font-[600] mb-2
		&.description
			@apply text-primary-gray text-sm font-normal leading-7 tracking-[-0.28px] max-w-[380px] mb-6
		&.customize-button
			@apply sm:min-w-[160px] min-w-[132px] text-primary-white bg-primary-dark-green font-medium text-sm leading-[120%] py-4 px-8 hover:bg-opacity-100 bg-opacity-80 hover:text-primary-white
		&.allow-all-button
			@apply sm:min-w-[160px] min-w-[132px] font-medium bg-primary-light-green bg-opacity-80 hover:bg-opacity-100 text-sm leading-[120%] py-4 px-8
		&.title-2
			@apply text-primary-black text-xl mr-auto sm:ml-[-24px]
		&.subtitle
			@apply text-base leading-[120%] font-medium
</style>