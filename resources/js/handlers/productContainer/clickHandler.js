import { getProductCardContent } from "../../utils/getProductCardContent.js"

/**
 * @param {MouseEvent} evt 
 * @param {HTMLFormElement} $form
 */
export function clickHandler(evt, $form) {
	/**
 * @type {HTMLButtonElement}
 */
	const $target = evt.target
	const $targetType = $target.getAttribute('type')
	if ($targetType !== 'button') return

	const $card = $target.closest('div.card')
	const targetProduct = getProductCardContent($card)

	$form.dataset.productId = targetProduct.id
	$form['product-name'].value = targetProduct.name
	$form['product-description'].value = targetProduct.description
	$form['product-price'].value = targetProduct.price
	$form['product-url'].value = targetProduct.imageUrl
}