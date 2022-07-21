import { $ } from "../../utils/querySelector.js"
import { submitHandler } from "./submitHandler.js"

export function addProductHandler() {
	const $addForm = $('#add-product')
	if (!$addForm) return
	$addForm.addEventListener("submit", (evt) => {
		evt.preventDefault()
		submitHandler($addForm)
	})
}