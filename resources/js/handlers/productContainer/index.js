import { $ } from "../../utils/querySelector.js";
import { clickHandler } from "./clickHandler.js";

export function productContainerHandler() {
	const $productContainer = $('#product-container');
	if (!$productContainer) return
	$productContainer.addEventListener("click", clickHandler)
}
