import { $ } from "./utils/querySelector.js";
import { productContainerHandler } from "./handlers/productContainer/index.js";

/**
 * @param {HTMLFormElement} $form 
 */
async function saveEditedProductHandler($form) {
	const data = new FormData($form)

	const product = {
		id: Number($form.dataset.productId),
		name: data.get('product-name').trim(),
		description: data.get('product-description').trim(),
		price: Number(data.get('product-price')),
		imageUrl: data.get('product-url').trim()
	}

	/**
	 * @type {RequestInit}
	 */
	const fetchOptions = {
		method: 'PUT',
		headers: {
			'Content-Type': 'application/json'
		},
		body: JSON.stringify(product)
	}

	await fetch(`/crud/api/v1/products.php`, fetchOptions)
		.then(res => res.json())
		.then(data => {
			console.log(data)
		})

	location.reload()

}

function editProductHandler($form) {
	$form.addEventListener("submit", (evt) => {
		evt.preventDefault()
		saveEditedProductHandler($form)
	})
}

document.addEventListener("DOMContentLoaded", () => {
	const $form = $('#edit-product')
	if (!$form) return
	productContainerHandler($form)
	editProductHandler($form)
})