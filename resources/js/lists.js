import { productContainerHandler } from "./handlers/productContainer/index.js";
import { editProductHandler } from "./handlers/editProductModal/index.js";

document.addEventListener("DOMContentLoaded", () => {
	productContainerHandler()
	editProductHandler()
})