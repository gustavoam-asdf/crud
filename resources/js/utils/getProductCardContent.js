/**
 * @param {HTMLDivElement} $card 
 */
export function getProductCardContent($card) {
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