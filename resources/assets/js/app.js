
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
document.addEventListener('DOMContentLoaded', () => {

	let elementExists = document.querySelector('.pagination');
	childrens = elementExists.childNodes;
	if (childrens !== 'null') {
		console.log(childrens);
		for (let i = 0; i < childrens.length; i++) {
			if (childrens[i].nodeName === 'LI') {
				childrens[i].setAttribute('class', 'page-item');
				if (childrens[i].children[0].nodeName === 'A' || childrens[i].children[0].nodeName === 'SPAN') {
					console.log(childrens[i].children[0].nodeName);
					childrens[i].childNodes[0].setAttribute('class', 'page-link');
				}	
			}

		}

	}
});


require('./bootstrap');

/*window.Vue = require('vue');*/

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/*Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});
*/
