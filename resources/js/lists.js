/**
 * @param {string} selector 
 * @returns {HTMLElement | null}
 */
const $ = (selector) => document.querySelector(selector)

document.addEventListener("DOMContentLoaded", () => {
	const $productContainer = $('#product-container');
	if (!$productContainer) return
	$productContainer.addEventListener("click", (evt) => {
		/**
		 * @type {HTMLButtonElement}
		 */
		const $target = evt.target
		const $targetType = $target.getAttribute('type')
		if ($targetType !== 'button') return
		const $card = $target.closest('div.card')
		
		console.log({ $card, productId: $card.dataset.productId })
	})
})