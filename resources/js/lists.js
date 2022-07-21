/**
 * @param {string} selector 
 * @returns {HTMLElement | null}
 */
const $ = (selector) => document.querySelector(selector)
let productId
const getProductInputs = () => ({
	$name: $('#product-name'),
	$description: $('#product-description'),
	$price: $('#product-price'),
	$imageUrl: $('#product-url')
})

/**
 * @param {HTMLDivElement} $card 
 */
function getProductCardContent($card) {
	const $cardBody = $card.querySelector('div.card-body')

	const product = {
		id: Number($card.dataset.productId),
		name: $cardBody.querySelector('h5.card-title').textContent.trim(),
		description: $cardBody.querySelector('p.card-text').textContent.trim(),
		price: Number($cardBody.querySelector('span.price').dataset.price.trim()),
		imageUrl: $card.querySelector('img').src.trim()
	}

	return product
}

/**
 * @param {MouseEvent} evt 
 */
function productContainerClickHandler(evt) {
	/**
 * @type {HTMLButtonElement}
 */
	const $target = evt.target
	const $targetType = $target.getAttribute('type')
	if ($targetType !== 'button') return

	const productInputs = getProductInputs()

	const $card = $target.closest('div.card')
	const targetProduct = getProductCardContent($card)

	productId = Number(targetProduct.id)
	productInputs.$name.value = targetProduct.name
	productInputs.$description.value = targetProduct.description
	productInputs.$price.value = targetProduct.price
	productInputs.$imageUrl.value = targetProduct.imageUrl

}

function productContainerHandler() {
	const $productContainer = $('#product-container');
	if (!$productContainer) return
	$productContainer.addEventListener("click", productContainerClickHandler)
}

/**
 * @param {HTMLFormElement} $form 
 */
function saveEditedProductHandler($form) {
	const data = new FormData($form)
	data.append('product-id', productId)

	const fetchOptions = {
		method: 'POST',
		body: data
	}

	fetch(`/crud/public/api/v1/products.php`, fetchOptions)
		.then(res => res.json())
		.then(data => {
			console.log(JSON.parse(data))
		})

}

function editProductHandler() {
	const $form = $('#edit-product')
	if (!$form) return
	$form.addEventListener("submit", (evt) => {
		evt.preventDefault()
		saveEditedProductHandler($form)
	})
}

document.addEventListener("DOMContentLoaded", () => {
	productContainerHandler()
	editProductHandler()
})