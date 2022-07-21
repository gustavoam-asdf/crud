import { getProductCardContent } from "../../utils/getProductCardContent.js"
import { $ } from "../../utils/querySelector.js"

/**
 * @param {MouseEvent} evt 
 */
export function clickHandler(evt) {
	const $editForm = $('#edit-product')
	if (!$editForm) return
	const $deleteForm = $('#delete-product')
	if (!$deleteForm) return

	/**
 * @type {HTMLButtonElement}
 */
	const $target = evt.target
	const $targetType = $target.getAttribute('type')
	if ($targetType !== 'button') return

	const $card = $target.closest('div.card')
	const targetProduct = getProductCardContent($card)

	$editForm.dataset.productId = targetProduct.id
	$deleteForm.dataset.productId = targetProduct.id
	$editForm['product-name'].value = targetProduct.name
	$editForm['product-description'].value = targetProduct.description
	$editForm['product-price'].value = targetProduct.price
	$editForm['product-url'].value = targetProduct.imageUrl
}