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

/***/ "./resources/assets/demo9/js/custom/landing.js":
/*!*****************************************************!*\
  !*** ./resources/assets/demo9/js/custom/landing.js ***!
  \*****************************************************/
/***/ ((module) => {

eval("\n\n// Class definition\nvar KTLandingPage = function () {\n  // Private methods\n  var initTyped = function initTyped() {\n    var typed = new Typed(\"#kt_landing_hero_text\", {\n      strings: [\"The Best Theme Ever\", \"The Most Trusted Theme\", \"#1 Selling Theme\"],\n      typeSpeed: 50,\n      loop: true\n    });\n  };\n\n  // Public methods\n  return {\n    init: function init() {\n      // initTyped();\n      AOS.init({\n        once: true\n      });\n    }\n  };\n}();\n\n// Webpack support\nif (true) {\n  module.exports = KTLandingPage;\n}\n\n// On document ready\nKTUtil.onDOMContentLoaded(function () {\n  KTLandingPage.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYXNzZXRzL2RlbW85L2pzL2N1c3RvbS9sYW5kaW5nLmpzIiwibWFwcGluZ3MiOiJBQUFhOztBQUViO0FBQ0EsSUFBSUEsYUFBYSxHQUFHLFlBQVk7RUFDNUI7RUFDQSxJQUFJQyxTQUFTLEdBQUcsU0FBWkEsU0FBU0EsQ0FBQSxFQUFjO0lBQ3ZCLElBQUlDLEtBQUssR0FBRyxJQUFJQyxLQUFLLENBQUMsdUJBQXVCLEVBQUU7TUFDM0NDLE9BQU8sRUFBRSxDQUFDLHFCQUFxQixFQUFFLHdCQUF3QixFQUFFLGtCQUFrQixDQUFDO01BQzlFQyxTQUFTLEVBQUUsRUFBRTtNQUNiQyxJQUFJLEVBQUU7SUFDVixDQUFDLENBQUM7RUFDTixDQUFDOztFQUVEO0VBQ0EsT0FBTztJQUNIQyxJQUFJLEVBQUUsU0FBTkEsSUFBSUEsQ0FBQSxFQUFjO01BQ2Q7TUFDQUMsR0FBRyxDQUFDRCxJQUFJLENBQUM7UUFDTEUsSUFBSSxFQUFFO01BQ1YsQ0FBQyxDQUFDO0lBQ047RUFDSixDQUFDO0FBQ0wsQ0FBQyxDQUFDLENBQUM7O0FBRUg7QUFDQSxJQUFJLElBQTZCLEVBQUU7RUFDL0JDLE1BQU0sQ0FBQ0MsT0FBTyxHQUFHWCxhQUFhO0FBQ2xDOztBQUVBO0FBQ0FZLE1BQU0sQ0FBQ0Msa0JBQWtCLENBQUMsWUFBVztFQUNqQ2IsYUFBYSxDQUFDTyxJQUFJLENBQUMsQ0FBQztBQUN4QixDQUFDLENBQUMiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvYXNzZXRzL2RlbW85L2pzL2N1c3RvbS9sYW5kaW5nLmpzP2ZiYmYiXSwic291cmNlc0NvbnRlbnQiOlsiXCJ1c2Ugc3RyaWN0XCI7XHJcblxyXG4vLyBDbGFzcyBkZWZpbml0aW9uXHJcbnZhciBLVExhbmRpbmdQYWdlID0gZnVuY3Rpb24gKCkge1xyXG4gICAgLy8gUHJpdmF0ZSBtZXRob2RzXHJcbiAgICB2YXIgaW5pdFR5cGVkID0gZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgdmFyIHR5cGVkID0gbmV3IFR5cGVkKFwiI2t0X2xhbmRpbmdfaGVyb190ZXh0XCIsIHtcclxuICAgICAgICAgICAgc3RyaW5nczogW1wiVGhlIEJlc3QgVGhlbWUgRXZlclwiLCBcIlRoZSBNb3N0IFRydXN0ZWQgVGhlbWVcIiwgXCIjMSBTZWxsaW5nIFRoZW1lXCJdLFxyXG4gICAgICAgICAgICB0eXBlU3BlZWQ6IDUwLFxyXG4gICAgICAgICAgICBsb29wOiB0cnVlXHJcbiAgICAgICAgfSk7XHJcbiAgICB9XHJcblxyXG4gICAgLy8gUHVibGljIG1ldGhvZHNcclxuICAgIHJldHVybiB7XHJcbiAgICAgICAgaW5pdDogZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICAvLyBpbml0VHlwZWQoKTtcclxuICAgICAgICAgICAgQU9TLmluaXQoe1xyXG4gICAgICAgICAgICAgICAgb25jZTogdHJ1ZVxyXG4gICAgICAgICAgICB9KTtcclxuICAgICAgICB9XHJcbiAgICB9XHJcbn0oKTtcclxuXHJcbi8vIFdlYnBhY2sgc3VwcG9ydFxyXG5pZiAodHlwZW9mIG1vZHVsZSAhPT0gJ3VuZGVmaW5lZCcpIHtcclxuICAgIG1vZHVsZS5leHBvcnRzID0gS1RMYW5kaW5nUGFnZTtcclxufVxyXG5cclxuLy8gT24gZG9jdW1lbnQgcmVhZHlcclxuS1RVdGlsLm9uRE9NQ29udGVudExvYWRlZChmdW5jdGlvbigpIHtcclxuICAgIEtUTGFuZGluZ1BhZ2UuaW5pdCgpO1xyXG59KTtcclxuIl0sIm5hbWVzIjpbIktUTGFuZGluZ1BhZ2UiLCJpbml0VHlwZWQiLCJ0eXBlZCIsIlR5cGVkIiwic3RyaW5ncyIsInR5cGVTcGVlZCIsImxvb3AiLCJpbml0IiwiQU9TIiwib25jZSIsIm1vZHVsZSIsImV4cG9ydHMiLCJLVFV0aWwiLCJvbkRPTUNvbnRlbnRMb2FkZWQiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/assets/demo9/js/custom/landing.js\n");

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
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module is referenced by other modules so it can't be inlined
/******/ 	var __webpack_exports__ = __webpack_require__("./resources/assets/demo9/js/custom/landing.js");
/******/ 	
/******/ })()
;