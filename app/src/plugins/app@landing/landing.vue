<template>
	<div class="h-fit w-screen bg-primary-white mb-8">
		<section class="
		    sec-search flex justify-center py-16
		    bg-gradient-to-r from-primary-light-green to-primary-white
        ">
		<input v-model="searchQuery" placeholder="Search..." class="rounded-full bg-primary-white pl-8 py-3 w-[35vw] outline-none border border-transparent cursor-text focus:border focus:border-primary-light-green" type="text">
        </section>

        <section class="options flex justify-center py-8">
            <p class="text-primary-gray text-[16px]">Mesto:</p>
        </section>

        <section class="main flex justify-between">
            <div class="flex justify-center w-[20vw] ml-16">
                <Categories/>
            </div>
            <div class="flex flex-wrap justify-start w-[70vw] gap-3">
                <div v-for="i in 10" class="mr-2" :key="i">
                    <ProductCard title="Product Name" price="99$" place="Meno Mesta" desc="Lorem ipsum, the text that does have any meaning." />
                </div>
            </div>
        </section>
	</div>
</template>

<script>
import Categories from "./_components/categories.vue"
import ProductCard from "./_components/product_card.vue"

export default {
    components: {
        ProductCard,
		Categories 
	},
	data() {
		return {
			searchQuery: ''
		}
	},
}

</script>