import { productContainerHandler } from "./handlers/productContainer/index.js";
import { editProductHandler } from "./handlers/editProductModal/index.js";
import { deleteProductHandler } from "./handlers/deleteProductModal/index.js";
import { addProductHandler } from "./handlers/addProductModal/index.js";

document.addEventListener("DOMContentLoaded", () => {
	productContainerHandler()
	addProductHandler()
	editProductHandler()
	deleteProductHandler()
})