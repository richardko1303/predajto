<template>
<div class="container px-2 pb-4">
		<h1>
			Nový inzerát
		</h1>
		<div class="sm:grid sm:grid-cols-2 sm:gap-6">
			<div class="col-span-1">
				<div class="my-12 w-full grid grid-cols-4 gap-2 mb-4">
					<Input class="col-span-3" placeholder="Zadajte názov" label="Názov produktu"/>
					<Input class="col-span-1" placeholder="Zadajte cenu" label="Cena"/>
				</div>
				<Input class="mb-4" placeholder="Pridajte popis produktu" label="Popis" minHeight="min-h-[150px]" type="textarea"/>
				<div class="mb-6 w-full grid grid-cols-4 gap-2">
					<Input class="col-span-2" placeholder="Zadajte svoje meno" label="Meno"/>
					<Input class="col-span-2" placeholder="Zadajte mesto" label="Mesto"/>
				</div>
				<Input v-model="phone" @dial="console.log($event)" class="pb-2" placeholder="Zadajte svoje telefónne číslo" label="Telefónne číslo" type="phone"/>
				<Input class=" pb-6" placeholder="Zadajte svoj email" label="Email"/>
				<Input type="textarea" placeholder="Zadajte informácie, ktoré je potrbné zdôrazniť" minHeight="h-[80px]" bg="!bg-primary-dark-green" bgOpacity="!bg-opacity-20" customBorder="!border !border-primary-dark-green"/>
			</div>
			<div class="col-span-1 hidden sm:flex justify-center items-center cursor-pointer">
				<div class="px-12 py-8 rounded-xl bg-primary-dark-green bg-opacity-20 w-fit text-primary-black font-medium text-xl flex justify-center items-center flex-col gap-2 shadow-lg hover:shadow-2xl">
					<img width="96px" src="@/assets/add-image.svg">
					Pridať obrázok
				</div>
			</div>
			<div class="sm:hidden flex items-center py-2 my-2 px-2 rounded-md bg-primary-dark-green bg-opacity-20 align-middle text-center">
				<img class="pr-2" width="32px" src="@/assets/add-image.svg">
				Pridať obrázok
			</div>
		</div>
	</div>
</template>

<script>

</script>

<style lang="sass" scoped>

	h1
		@apply text-[32px] my-8
</style>