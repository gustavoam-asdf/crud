import { submitHandler } from "./submitHandler.js"

/**
 * @param {HTMLFormElement} $form 
 */
export function editProductHandler($form) {
	$form.addEventListener("submit", (evt) => {
		evt.preventDefault()
		submitHandler($form)
	})
}