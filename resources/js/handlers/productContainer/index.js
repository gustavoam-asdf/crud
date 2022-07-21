import { $ } from "../../utils/querySelector.js";
import { clickHandler } from "./clickHandler.js";

/**
 * @param {HTMLFormElement} $form 
 */
export function productContainerHandler($form) {
	const $productContainer = $('#product-container');
	if (!$productContainer) return
	$productContainer.addEventListener("click", (evt) => clickHandler(evt, $form))
}
