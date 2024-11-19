/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./js/app.js":
/*!*******************!*\
  !*** ./js/app.js ***!
  \*******************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _components_component__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./components/component */ \"./js/components/component.js\");\n/* harmony import */ var _utils_selector__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./utils/selector */ \"./js/utils/selector.js\");\n\n\n\nconst globalCallback = () => {\n    // ...add functionality here if there is anything that needs to be called on everypage\n}\n\n// define all the elements with there relevant component\nconst elements = [\n    {\n        el: (0,_utils_selector__WEBPACK_IMPORTED_MODULE_1__[\"default\"])('component'),\n        component: _components_component__WEBPACK_IMPORTED_MODULE_0__[\"default\"]\n    }\n]\n\n// loops through all elements and initialises the elements on the page\nelements.forEach(({el, component}) => {\n    if (el.length === 0) {\n        return;\n    }\n\n    el.getAllElements().forEach((element) => {\n        try {\n            if (typeof component == 'class') {\n                new component(element)\n            } else {\n                component(element)\n            }\n        } catch (error) {\n            console.error(`Error with ${el.getName()}`, error)\n        }\n    })\n})\n\n// function that should be called on all pages...\nglobalCallback()\n\n//# sourceURL=webpack:///./js/app.js?");

/***/ }),

/***/ "./js/components/component.js":
/*!************************************!*\
  !*** ./js/components/component.js ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": () => (__WEBPACK_DEFAULT_EXPORT__)\n/* harmony export */ });\n/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ((element) => {\n    const button = element.querySelector('[data-element=\"button\"]');\n    const number = element.querySelector('[data-element=\"number\"]');\n    let i = 1;\n    number.innerHTML = i;\n    \n    button.addEventListener('click', (e) => {\n        i++;\n        number.innerHTML = i\n    })\n});\n\n//# sourceURL=webpack:///./js/components/component.js?");

/***/ }),

/***/ "./js/utils/selector.js":
/*!******************************!*\
  !*** ./js/utils/selector.js ***!
  \******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": () => (__WEBPACK_DEFAULT_EXPORT__)\n/* harmony export */ });\n/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ((element, type = 'behaviour') => {\n\n    const selector = `[data-${type}=\"${element}\"]`;\n    const elements = document.querySelectorAll(selector);\n\n    return {\n        getName: () => elements[0]?.dataset?.[type] ?? elements.id ?? elements.tagName ?? 'unknown',\n        getElement: () => elements[0],\n        getAllElements: () => elements,\n        getallElementsAsArray: () => Array.from(elements),\n        selector\n    }\n});\n\n//# sourceURL=webpack:///./js/utils/selector.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = __webpack_require__("./js/app.js");
/******/ 	
/******/ })()
;