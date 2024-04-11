<template>
    <div class="">
        <p class="text-primary-gray font-semibold py-2">KATEGÓRIE</p>
        <div class="py-2 gap-1">
            <ul class="text-lg">
                <li v-for="c in categories" class="flex flex-col mb-1">
                    <div class="flex flex-row">
                        <img class="w-7 select-none" src="@/assets/category-table.svg" alt="Category Icon" />
                        <p class="ml-2 w-44 overflow-scroll">{{ c.name }}</p>
                        <div
                            v-if="(c?.subcategories?.length ?? 0) > 0"
                            @click="c.expanded = !c.expanded"
                            class="px-2 w-7 text-center cursor-pointer bg-primary-light-green bg-opacity-30 hover:bg-opacity-100 rounded-lg"
                        >
                            <p class="text-primary-black select-none">{{ (c.expanded ? '-' : '+') }}</p>
                        </div>
                    </div>
                    <div v-if="c.expanded" v-for="subc in c.subcategories" class="pl-9">
                        <p class="text-sm cursor-pointer select-none text-primary-gray hover:text-primary-black">{{ subc }}</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

interface Category {
    name: string
    expanded?: boolean | null
    subcategories?: string[]
}

let categories: Category[] = [
    { name: "Vsetky Produkty" },
    {
        name: "Elektronika",
        subcategories: [
            "Telefony",
            "Prislusenstvo",
            "Kable"
        ]
    },
    {
        name: "Sport",
        subcategories: ["nieco", "nieco 2"]
    },
    { name: "Hobby" },
    { name: "Upratovanie" },
    { name: "Ostatne" },
]

export default defineComponent({
    name: "Categories",
    data() {
        return {
            categories: categories,
        }
    }
})
</script>

<style scoped>

</style>