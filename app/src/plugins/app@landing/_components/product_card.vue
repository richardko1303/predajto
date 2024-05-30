<template>
    <div class="flex flex-col w-[232px] h-[282px] border border-primary-light-green rounded-3xl overflow-hidden">
        <div class="select-none">
            <img src="/src/assets/product-image.png" alt="Product Image" />
        </div>
        <div class="flex flex-col p-2 px-3 bg-[#00D2BA] bg-opacity-20 flex-1">
            <div class="flex flex-row justify-between">
                <p class="font-semibold">{{ title }}</p>
                <p class="text-primary-light-green font-semibold">{{ price }}</p>
            </div>
            <p class="text-sm text-primary-gray whitespace-normal w-full">{{ desc }}</p>
            <div class="flex flex-row justify-self-end mt-8">
                <img src="/src/assets/map-pin.svg" alt="Place Icon" />
                <p>{{ place }}</p>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import {defineComponent} from 'vue'

export default defineComponent({
    name: "ProductCard",
    props: {
        title: String,
        price: String,
        desc: String,
        place: String
    }
})
</script>

<style scoped lang="sass">

</style>