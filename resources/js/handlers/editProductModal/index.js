import { $ } from "../../utils/querySelector.js"
import { submitHandler } from "./submitHandler.js"

export function editProductHandler() {
	const $editForm = $('#edit-product')
	if (!$editForm) return
	$editForm.addEventListener("submit", (evt) => {
		evt.preventDefault()
		submitHandler($form)
	})
}