<template>
	<div class="h-screen w-screen bg-primary-white">
		<section class="
		    sec-search flex justify-center py-16
		    bg-gradient-to-r from-primary-light-green to-primary-white
        ">
		<input v-model="searchQueary" placeholder="Search..." class="rounded-full bg-primary-white pl-8 py-3 w-[35vw] outline-none border border-transparent cursor-text focus:border focus:border-primary-light-green" type="text">
        </section>

        <section class="options flex justify-center py-8">
            <p class="text-primary-gray text-[16px]">Mesto:</p>
        </section>

        <section class="main flex justify-between">
            <div class="flex justify-center w-[20vw] ml-16">
                <Categories/>
            </div>
            <div class="flex justify-center w-[70vw]">
                <p>A</p>
            </div>
        </section>
	</div>
</template>

<script>
import Categories from "./_components/categories.vue"

export default {
    components: {
		Categories 
	},
	data() {
		return {
			searchQueary: ''
		}
	},
}

</script>