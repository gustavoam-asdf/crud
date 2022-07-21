/**
 * @param {HTMLFormElement} $deleteForm 
 */
export async function submitHandler($deleteForm) {
	const productId = Number($deleteForm.dataset.productId)

	const fetchOptions = {
		method: 'DELETE',
		headers: {
			'Content-Type': 'application/json'
		},
		body: JSON.stringify({ productId })
	}

	await fetch(`/crud/api/v1/products.php`, fetchOptions)
		.then(res => res.json())
		.then(data => {
			console.log(data)
		})

	location.reload()
}