import { defineStore } from 'pinia'

export const useCookieStore = defineStore('cookie', {
	state: () => ({
		strictlyNecessary: false,
		marketingAnalitics: false,
		preferences: false,
		cookiePosition: -1,
	}),
	actions: {
		setStrictlyNecessary(value: boolean) {
			this.strictlyNecessary = value
		},
		setMarketingAnalytics(value: boolean, setCookies = false) {
			this.marketingAnalitics = value
			if(!setCookies) return

			this.setCookies()
		},
		setPreferences(value: boolean, setCookies = false) {
			this.preferences = value
			if(!setCookies) return

			this.setCookies()
		},
		setCookies() {
			const d = new Date()
			d.setTime(d.getTime() + (365 * 24 * 60 * 60 * 1000))
			const expires = "expires=" + d.toUTCString()

			document.cookie = "strictly_necessary" + "=" + true + ";" + expires
			document.cookie = "marketing_analytics" + "=" + this.getMarketingAnalytics + ";" + expires
			document.cookie = "preferences" + "=" + this.getPreferences + ";" + expires

			this.setStrictlyNecessary(true)
			this.setCookiePosition(-1)
		},
		deleteCookies() {
			const d = new Date()
			d.setTime(d.getTime() + (0 * 24 * 60 * 60 * 1000))
			const expires = "expires=" + d.toUTCString()

			document.cookie = "strictly_necessary" + "=" + true + ";" + expires
			document.cookie = "marketing_analytics" + "=" + this.getMarketingAnalytics + ";" + expires
			document.cookie = "preferences" + "=" + this.getPreferences + ";" + expires
		},
		getStrictlyNecessaryCookie() {
			const name = "strictly_necessary" + "="
			const decodedCookie = decodeURIComponent(document.cookie)
			const ca = decodedCookie.split(';')
			for (let i = 0; i < ca.length; i++) {
				let c = ca[i]
				while (c.charAt(0) === ' ') {
					c = c.substring(1)
				}
				if (c.indexOf(name) === 0) {
					if (c.substring(name.length, c.length) === "true") return true

					return false
				}
			}
			return false
		},
		getMarketingAnalyticsCookie() {
			const name = "marketing_analytics" + "="
			const decodedCookie = decodeURIComponent(document.cookie)
			const ca = decodedCookie.split(';')

			for (let i = 0; i < ca.length; i++) {
				let c = ca[i]
				while (c.charAt(0) === ' ') {
					c = c.substring(1)
				}
				if (c.indexOf(name) === 0) {
					if (c.substring(name.length, c.length) === "true") return true

					return false
				}
			}
			return false
		},
		getPreferencesCookie() {
			const name = "preferences" + "="
			const decodedCookie = decodeURIComponent(document.cookie)
			const ca = decodedCookie.split(';')

			for (let i = 0; i < ca.length; i++) {
				let c = ca[i]
				while (c.charAt(0) === ' ') {
					c = c.substring(1)
				}
				if (c.indexOf(name) === 0) {
					if (c.substring(name.length, c.length) === "true") return true

					return false
				}
			}
			return false
		},
		setCookiePosition(value: number) {
			this.cookiePosition = value
		}
	},
	getters: {
		getStrictlyNecessary: state => state.strictlyNecessary,
		getMarketingAnalytics: state => state.marketingAnalitics,
		getPreferences: state => state.preferences,
		getCookiePosition: state => state.cookiePosition
	}
})

