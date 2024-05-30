import { defineStore } from 'pinia'
import axios from 'axios'

interface State {
	_token: string | null,
	_tokenType: string | null,
	user: Object,
}

export const useAuthStore = defineStore('auth', {
	state: (): State => ({
		_token: localStorage.getItem('predajto_user_token') || null,
		user: JSON.parse(localStorage.getItem('predajto_user_user') || '{}'),
		_tokenType: 'bearer '
	}),
	actions: {
		logIn(credentials: Object) {
			return new Promise((resolve, reject) => {
				axios.put('route', credentials)
				.then((response: any) => {
					this._token = response?.user?.stsTokenManager?.accessToken
					this.user = response?.user

					localStorage.setItem('reporter_user_user', JSON.stringify(this.user))
					localStorage.setItem('reporter_user_token', this._token)
					localStorage.setItem('reporter_user_token_type', this._tokenType)

					resolve(this.user)
				})
				.catch((error: any) => {
					reject(error)
				})
			})
			.finally(() => {
				console.clear()
			})
		},
		signUp(credentials: Object) {
			console.log(credentials)
			return new Promise((resolve, reject) => {
				axios.post('/auth/signup', credentials)
				.then((response: any) => {
					console.log(response)
					// this._token = response.data.token
					// this._type = response.data.token_type
					// this.user = response.data.user

					// localStorage.setItem('reporter_user_user', JSON.stringify(this.user))
					// localStorage.setItem('reporter_user_token', this._token)

					resolve(this.user)
				})
				.catch((error: any) => {
					reject(error)
				})
			})
			.finally(() => {
				// console.clear()
			})
		},
		signOut() {
			this._token = null
			this.user = {}

			localStorage.removeItem('reporter_user_user')
			localStorage.removeItem('reporter_user_token')
		}
	},
	getters: {
		isLoggedIn: (state) => !!state._token,
		getUser: (state) => state.user,
	}
})