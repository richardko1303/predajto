<template>
    <div class="">
        <p class="text-primary-gray font-semibold pt-2">KATEGÓRIE</p>
        <div class="p-2 gap-1">
            <ul class="pl-4 text-lg">
                <li v-for="c in categories" class="flex flex-col">
                    <div class="flex flex-row align-middle">
                        <p class="w-32">{{ c.name }}</p>
                        <div
                            v-if="(c?.subcategories?.length ?? 0) > 0"
                            @click="c.expanded = !c.expanded"
                            class="ml-2 px-2 w-7 text-center bg-primary-light-green hover:bg-primary-dark-green rounded-lg"
                        >
                            <p class="text-white">{{ (c.expanded ? '-' : '+') }}</p>
                        </div>
                    </div>
                    <div v-if="c.expanded" v-for="subc in c.subcategories" class="pl-2">
                        <p class="text-sm text-primary-gray hover:text-primary-black">{{ subc }}</p>
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
            categories: categories
        }
    }
})
</script>

<style scoped>

</style>