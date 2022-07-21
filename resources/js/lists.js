/**
 * @param {string} selector 
 * @returns {HTMLElement | null}
 */
const $ = (selector) => document.querySelector(selector)

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
function clickHandler(evt) {
	/**
 * @type {HTMLButtonElement}
 */
	const $target = evt.target
	const $targetType = $target.getAttribute('type')
	if ($targetType !== 'button') return

	const productInputs = {
		$name: $('#product-name'),
		$description: $('#product-description'),
		$price: $('#product-price'),
		$imageUrl: $('#product-url')
	}
	productInputs.$name.value = ""
	productInputs.$description.value = ""
	productInputs.$price.value = ""
	productInputs.$imageUrl.value = ""

	const $card = $target.closest('div.card')
	const targetProduct = getProductCardContent($card)

	productInputs.$name.value = targetProduct.name
	productInputs.$description.value = targetProduct.description
	productInputs.$price.value = targetProduct.price
	productInputs.$imageUrl.value = targetProduct.imageUrl

}

document.addEventListener("DOMContentLoaded", () => {
	const $productContainer = $('#product-container');
	if (!$productContainer) return
	$productContainer.addEventListener("click", clickHandler)
})