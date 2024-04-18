<template>
	<div class="flex flex-col gap-2 w-full">
		<label>{{ label }}</label>
		<div v-if="type === 'phone'" class="input relative" :class="[inputFocus ? '!border-primary-light-green' : '']">
			<div @click="displayPopover = true" class="text-sm text-primary-gray font-light flex items-center border-r-[0.5px] border-primary-gray p-4 cursor-pointer" :class="[inputFocus ? '!border-primary-light-green' : '']">
				{{ selectedCountryDial.Country_Code }}
				<img src="@/assets/dropdown.svg" alt="">
			</div>
			<input v-model="value" @focus="inputFocus = true" @blur="inputFocus = false" class=" !rounded-none !border-none p-4" type="text">
			<div v-if="displayPopover" class="border-[0.5px] border-primary-light-green rounded-md absolute top-16 left-0 overflow-y-scroll max-h-[240px]">
				<div v-for="country in countries" @click="selectedCountryDial = country; displayPopover = false" class="flex items-center gap-2 cursor-pointer">
					<div class="flex gap-2 p-2 border-b">
						{{ country.Country_Code }} +{{ country.Dial }}
					</div>

				</div>
			</div>
		</div>
		<input v-else-if="(type !== 'textarea') && (type !== 'phone')" v-model="value" :class="[minHeight, maxWidth, 'p-4']" :type="type" :placeholder="placeholder">
		<textarea v-else v-model="value" :placeholder="placeholder" :class="[minHeight, maxWidth, 'p-4']"></textarea>
	</div>
</template>

<script>
import coutriesDial from '@/assets/jsons/countries.json'
export default {
	data() {
		return {
			countries: coutriesDial,
			selectedCountryDial: {
				Country_Name: 'Slovakia',
				Official_Name_English: 'Slovakia',
				Country_Code: 'SK',
				Dial: 421
			},
			inputFocus: false,
			displayPopover: false,
		}
	},
	computed: {
		value: {
			get() {
				return this.modelValue
			},
			set(value) {
				if(this.type === 'phone') this.$emit('dial', this.selectedCountryDial.Dial)
				return this.$emit('update:modelValue', value)
			}
		}
	},
	props: {
		modelValue: {
			type: String || Number,
			default: ''
		},
		maxWidth: {
			type: String,
			default: ''
		},
		minHeight: {
			type: String,
			default: ''
		},
		placeholder: {
			type: String,
			default: ''
		},
		label: {
			type: String,
			default: ''
		},
		disabled: {
			type: Boolean,
			default: false
		},
		type: {
			type: String,
			default: 'text'
		}
	}
}
</script>

<style scoped lang="sass">
	textarea, input, .input
		@apply w-full text-sm text-primary-black rounded-md bg-transparent border-[0.5px] border-primary-gray flex resize-none
		@apply focus:border-primary-light-green outline-none
		&::placeholder
			@apply text-primary-gray font-light text-sm absolute top-0 left-0 p-4
	label
		@apply text-sm text-primary-gray font-light
</style>