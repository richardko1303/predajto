<template>
    <div class="">
        <p class="py-2 font-semibold text-primary-gray select-none">KATEGÓRIE</p>
        <div class="py-2 gap-1">
            <ul class="text-lg">
                <li v-for="c in categories" class="flex flex-col mb-1">
                    <div class="flex flex-row">
                        <img class="w-7" :src="getIcon(`category-${c?.icon ?? 'table'}.svg`)" alt="Category Icon" />
                        <p
                            @click="selected_category = c.name"
                            class="ml-2 w-44 cursor-pointer overflow-scroll"
                            :class="selected_category == c.name ? 'font-semibold' : ''"
                        >
                            {{ c.name }}
                        </p>
                        <div
                            v-if="(c?.subcategories?.length ?? 0) > 0"
                            @click="c.expanded = !c.expanded"
                            class="px-2 w-7 text-center cursor-pointer bg-primary-light-green bg-opacity-30 hover:bg-opacity-100 rounded-lg"
                        >
                            <p class="text-primary-black">{{ (c.expanded ? '-' : '+') }}</p>
                        </div>
                    </div>
                    <div v-if="c.expanded" v-for="subc in c.subcategories" class="pl-9">
                        <p
                            @click="selected_category = c.name; selected_subcategory = subc;"
                            class="text-sm cursor-pointer hover:font-semibold"
                            :class="selected_category == c.name && selected_subcategory == subc ? 'font-semibold text-primary-black' : 'text-primary-gray hover:text-primary-dark-green'"
                        >
                            {{ subc }}
                        </p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script lang="ts">
import {defineComponent} from 'vue'

interface Category {
    name: string
    expanded?: boolean | null
    subcategories?: string[]
    icon?: string
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
            selected_category: "Vsetky Produkty", // TODO: dat to store
            selected_subcategory: ""
        }
    },
    methods: {
        getIcon: function (icon: string) {
            return new URL(`/src/assets/${icon}`, import.meta.url).href
        }
    }
})
</script>

<style scoped>

</style>