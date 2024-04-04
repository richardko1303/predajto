<template>
    <div class="">
        <p class="text-primary-gray font-semibold pt-2">KATEGÓRIE</p>
        <div class="p-2 gap-1">
            <ul class="pl-4 text-lg">
                <li v-for="c in categories" class="flex flex-row align-middle">
                    <p>{{ c.name }}</p>
                    <div class="ml-2 px-2 bg-primary-light-green hover:bg-primary-dark-green rounded-lg">
                        <p class="text-white">+</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script lang="ts">
import {defineComponent} from 'vue'

export default defineComponent({
    name: "Categories",
    data() {
        return {
            categories: [
                {
                    name: "Vsetky Produkty",
                    expanded: false,
                    subcategories: []
                },
                {
                    name: "Elektronika",
                    expanded: false,
                    subcategories: []
                },
            ]
        }
    }
})
</script>

<style scoped>

</style>