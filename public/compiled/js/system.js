/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/system/system.js":
/*!***************************************!*\
  !*** ./resources/js/system/system.js ***!
  \***************************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* DELETE BUTTON TRIGGER*/\n$(document).ready(function () {\n  $(\".delete-button\").click(function () {\n    var actionUrl = $(this).data(\"actionurl\");\n    $(\"#deleteForm\").attr(\"action\", actionUrl);\n  });\n});\n/*END DELETE BUTTON TRIGGER*/\n\n/*AUTO HIDE ALERT MESSAGES*/\n$(document).ready(function () {\n  setTimeout(function () {\n    $('.autoDismissAlert').addClass('fade-out');\n    setTimeout(function () {\n      $('.autoDismissAlert').remove();\n    }, 1000); // Delay removal to match the fade-out transition duration\n  }, 5000); // Delay before starting fade-out\n});\n/*END AUTO HIDE ALERT MESSAGES*///# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvc3lzdGVtL3N5c3RlbS5qcyIsIm1hcHBpbmdzIjoiO0FBQUE7QUFDQUEsQ0FBQyxDQUFDQyxRQUFRLENBQUMsQ0FBQ0MsS0FBSyxDQUFDLFlBQVk7RUFDMUJGLENBQUMsQ0FBQyxnQkFBZ0IsQ0FBQyxDQUFDRyxLQUFLLENBQUMsWUFBWTtJQUNsQyxJQUFJQyxTQUFTLEdBQUdKLENBQUMsQ0FBQyxJQUFJLENBQUMsQ0FBQ0ssSUFBSSxDQUFDLFdBQVcsQ0FBQztJQUN6Q0wsQ0FBQyxDQUFDLGFBQWEsQ0FBQyxDQUFDTSxJQUFJLENBQUMsUUFBUSxFQUFFRixTQUFTLENBQUM7RUFDOUMsQ0FBQyxDQUFDO0FBQ04sQ0FBQyxDQUFDO0FBQ0Y7O0FBRUE7QUFDSUosQ0FBQyxDQUFDQyxRQUFRLENBQUMsQ0FBQ0MsS0FBSyxDQUFDLFlBQVc7RUFDN0JLLFVBQVUsQ0FBQyxZQUFZO0lBQ25CUCxDQUFDLENBQUMsbUJBQW1CLENBQUMsQ0FBQ1EsUUFBUSxDQUFDLFVBQVUsQ0FBQztJQUMzQ0QsVUFBVSxDQUFDLFlBQVk7TUFDbkJQLENBQUMsQ0FBQyxtQkFBbUIsQ0FBQyxDQUFDUyxNQUFNLENBQUMsQ0FBQztJQUNuQyxDQUFDLEVBQUUsSUFBSSxDQUFDLENBQUMsQ0FBQztFQUNkLENBQUMsRUFBRSxJQUFJLENBQUMsQ0FBQyxDQUFDO0FBQ2QsQ0FBQyxDQUFDO0FBQ0YiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvc3lzdGVtL3N5c3RlbS5qcz9lZGFjIl0sInNvdXJjZXNDb250ZW50IjpbIi8qIERFTEVURSBCVVRUT04gVFJJR0dFUiovXG4kKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbiAoKSB7XG4gICAgJChcIi5kZWxldGUtYnV0dG9uXCIpLmNsaWNrKGZ1bmN0aW9uICgpIHtcbiAgICAgICAgdmFyIGFjdGlvblVybCA9ICQodGhpcykuZGF0YShcImFjdGlvbnVybFwiKTtcbiAgICAgICAgJChcIiNkZWxldGVGb3JtXCIpLmF0dHIoXCJhY3Rpb25cIiwgYWN0aW9uVXJsKTtcbiAgICB9KTtcbn0pO1xuLypFTkQgREVMRVRFIEJVVFRPTiBUUklHR0VSKi9cblxuLypBVVRPIEhJREUgQUxFUlQgTUVTU0FHRVMqL1xuICAgICQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uKCkge1xuICAgIHNldFRpbWVvdXQoZnVuY3Rpb24gKCkge1xuICAgICAgICAkKCcuYXV0b0Rpc21pc3NBbGVydCcpLmFkZENsYXNzKCdmYWRlLW91dCcpO1xuICAgICAgICBzZXRUaW1lb3V0KGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgICQoJy5hdXRvRGlzbWlzc0FsZXJ0JykucmVtb3ZlKCk7XG4gICAgICAgIH0sIDEwMDApOyAvLyBEZWxheSByZW1vdmFsIHRvIG1hdGNoIHRoZSBmYWRlLW91dCB0cmFuc2l0aW9uIGR1cmF0aW9uXG4gICAgfSwgNTAwMCk7IC8vIERlbGF5IGJlZm9yZSBzdGFydGluZyBmYWRlLW91dFxufSk7XG4vKkVORCBBVVRPIEhJREUgQUxFUlQgTUVTU0FHRVMqL1xuIl0sIm5hbWVzIjpbIiQiLCJkb2N1bWVudCIsInJlYWR5IiwiY2xpY2siLCJhY3Rpb25VcmwiLCJkYXRhIiwiYXR0ciIsInNldFRpbWVvdXQiLCJhZGRDbGFzcyIsInJlbW92ZSJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/system/system.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
/******/ 	
/************************************************************************/
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
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/system/system.js"](0, __webpack_exports__, __webpack_require__);
/******/ 	
/******/ })()
;