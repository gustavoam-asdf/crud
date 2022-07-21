import { $ } from "./utils/querySelector.js";
import { productContainerHandler } from "./handlers/productContainer/index.js";
import { editProductHandler } from "./handlers/editProductModal/index.js";

document.addEventListener("DOMContentLoaded", () => {
	const $form = $('#edit-product')
	if (!$form) return
	productContainerHandler($form)
	editProductHandler($form)
})