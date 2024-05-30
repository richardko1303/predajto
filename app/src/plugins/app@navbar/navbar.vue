<template>
	<Disclosure as="nav" class="bg-gray-900 max-w-[1032px] w-full" v-slot="{ open }">
		<div class="px-2 sm:px-0">
			<div class="flex h-20 justify-between">
				<div class="flex">
					<div class="flex flex-shrink-0 items-center">
						<img @click="$router.push('/')" class="w-44 cursor-pointer" src="@/assets/main-logo.svg" alt="Your Company" />
					</div>
				</div>
				<div class="hidden sm:ml-6 sm:flex sm:items-center">
					<div class="flex space-x-4 cursor-pointer">
						<button @click="$router.push('/creating')" class="py-4 px-8 rounded-full bg-primary-light-green bg-opacity-50 hover:bg-opacity-100 text-primary-black font-medium">
							Vytvoriť nový inzerát
						</button>
						<button @click="$router.push('/login')" class="py-4 px-8 rounded-full bg-primary-dark-green bg-opacity-80 hover:bg-opacity-100 text-white font-medium">
							Prihlásiť sa
						</button>
					</div>
					<Menu as="div" class="relative ml-3">
						<div>
							<MenuButton
								class="relative flex rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
								<span class="absolute -inset-1.5" />
								<span class="sr-only">Open user menu</span>
							</MenuButton>
						</div>
						<transition enter-active-class="transition ease-out duration-200"
							enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100"
							leave-active-class="transition ease-in duration-75"
							leave-from-class="transform opacity-100 scale-100"
							leave-to-class="transform opacity-0 scale-95">
							<MenuItems
								class="absolute right-0 mt-2 w-48 origin-top-right rounded-md py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
								<MenuItem v-slot="{ active }">
									<a @click="signOut()"
										:class="[active ? 'bg-gray-100' : 'bg-white', 'block px-4 py-2 text-sm text-gray-700 rounded-md cursor-pointer']">Sign
										out</a>
								</MenuItem>
							</MenuItems>
						</transition>
					</Menu>
				</div>
				<div class="-mr-2 flex items-center sm:hidden">
					<!-- Mobile menu button -->
					<DisclosureButton
						class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
						<span class="absolute -inset-0.5" />
						<span class="sr-only">Open main menu</span>
						<Bars3Icon v-if="!open" class="block h-6 w-6" aria-hidden="true" />
						<XMarkIcon v-else class="block h-6 w-6" aria-hidden="true" />
					</DisclosureButton>
				</div>
			</div>
		</div>

		<DisclosurePanel class="sm:hidden">
			<div class="px-4 py-2 flex flex-col gap-2">
				<button class="py-4 px-8 rounded-full bg-primary-light-green bg-opacity-50 hover:bg-opacity-100 text-primary-black font-medium">
					Vytvoriť nový inzerát
				</button>
				<button @click="$router.push('/login')" class="py-4 px-8 rounded-full bg-primary-dark-green bg-opacity-80 hover:bg-opacity-100 text-white font-medium">
					Prihlásiť sa
				</button>
			</div>
		</DisclosurePanel>
	</Disclosure>
</template>
  
<script>
import { Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { Bars3Icon, BellIcon, XMarkIcon } from '@heroicons/vue/24/outline'

export default {
	components: { Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems, Bars3Icon, BellIcon, XMarkIcon },
}
</script>