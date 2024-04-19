<template>
	<div class="my-12 w-full grid grid-cols-4 gap-2">
		<Input class="col-span-3" placeholder="Zadajte názov" label="Názov produktu"/>
		<Input class="col-span-1" placeholder="Zadajte cenu v eurách" label="Cena"/>
	</div>
	<Input placeholder="Pridajte popis produktu" label="Popis" minHeight="min-h-[150px]" type="textarea"/>
	<Input v-model="phone" @dial="console.log($event)" class="mt-2" placeholder="Zadajte svoje telefónne číslo" label="Telefónne číslo" type="phone"/>
</template>

<script>
export default {
	data() {
		return {
			phone: ''
		}
	},
	watch: {
    phone(newValue, oldValue) {
      console.log('Phone number changed:', newValue);
      
    }
  }
}
</script>