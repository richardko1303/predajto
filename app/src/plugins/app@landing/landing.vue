<template>
	<div class="h-screen w-screen bg-primary-white">
		<section class="
		    sec-search flex justify-center py-16
		    bg-gradient-to-r from-primary-light-green to-primary-white
        ">
            <search/>
        </section>

        <section class="options flex justify-center py-8">
            <p class="text-primary-gray text-[16px]">Mesto:</p>
        </section>

        <section class="main flex justify-around">
            <div>
                <Categories/>
            </div>
            <div>
                <p>A</p>
            </div>
        </section>
	</div>
</template>

<script>
import Search from "./_components/search.vue";
import Categories from "./_components/categories.vue";

export default {
    name: "Landing",
    components: {Categories, Search }
}

</script>