<template>
	<h1 class=" text-red">
		nieco
	</h1>
</template>

<script>
// import { Menu, MenuButton, MenuItem, MenuItems, Popover, PopoverButton, PopoverPanel } from '@headlessui/vue'
// import { MagnifyingGlassIcon } from '@vue-hero-icons/solid'
// // import { Bars3Icon, BellIcon, XMarkIcon } from '@vue-hero-icons/outline'

export default {
	data() {
		return {
			user: {
				name: 'Tom Cook',
				email: 'nieco@ne.com'
			},
			navigation: [
				{ name: 'Dashboard', href: '#', current: true },
				{ name: 'Calendar', href: '#', current: false },
				{ name: 'Teams', href: '#', current: false },
				{ name: 'Directory', href: '#', current: false },
			],
			userNavigation: [
				{ name: 'Your Profile', href: '#' },
				{ name: 'Settings', href: '#' },
				{ name: 'Sign out', href: '#' },
			]
		}
	}
}

</script>