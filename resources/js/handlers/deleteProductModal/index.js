import { $ } from "../../utils/querySelector.js";
import { submitHandler } from "./submitHandler.js";

export function deleteProductHandler() {
	const $deleteForm = $('#delete-product')
	if (!$deleteForm) return

	$deleteForm.addEventListener('submit', (evt) => {
		evt.preventDefault()
		submitHandler($deleteForm)
	})
}