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

/***/ "./resources/assets/core/js/custom/apps/projects/targets/targets.js":
/*!**************************************************************************!*\
  !*** ./resources/assets/core/js/custom/apps/projects/targets/targets.js ***!
  \**************************************************************************/
/***/ (() => {

eval("\n\n// Class definition\nvar KTProjectTargets = function () {\n  var initDatatable = function initDatatable() {\n    var table = document.getElementById('kt_profile_overview_table');\n\n    // set date data order\n    var tableRows = table.querySelectorAll('tbody tr');\n    tableRows.forEach(function (row) {\n      var dateRow = row.querySelectorAll('td');\n      var realDate = moment(dateRow[1].innerHTML, \"MMM D, YYYY\").format();\n      dateRow[1].setAttribute('data-order', realDate);\n    });\n\n    // init datatable --- more info on datatables: https://datatables.net/manual/\n    var datatable = $(table).DataTable({\n      \"info\": false,\n      'order': [],\n      \"paging\": false\n    });\n  };\n\n  // Public methods\n  return {\n    init: function init() {\n      initDatatable();\n    }\n  };\n}();\n\n// On document ready\nKTUtil.onDOMContentLoaded(function () {\n  KTProjectTargets.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYXNzZXRzL2NvcmUvanMvY3VzdG9tL2FwcHMvcHJvamVjdHMvdGFyZ2V0cy90YXJnZXRzLmpzIiwibWFwcGluZ3MiOiJBQUFhOztBQUViO0FBQ0EsSUFBSUEsZ0JBQWdCLEdBQUcsWUFBWTtFQUUvQixJQUFJQyxhQUFhLEdBQUcsU0FBaEJBLGFBQWFBLENBQUEsRUFBZTtJQUM1QixJQUFNQyxLQUFLLEdBQUdDLFFBQVEsQ0FBQ0MsY0FBYyxDQUFDLDJCQUEyQixDQUFDOztJQUVsRTtJQUNBLElBQU1DLFNBQVMsR0FBR0gsS0FBSyxDQUFDSSxnQkFBZ0IsQ0FBQyxVQUFVLENBQUM7SUFDcERELFNBQVMsQ0FBQ0UsT0FBTyxDQUFDLFVBQUFDLEdBQUcsRUFBSTtNQUNyQixJQUFNQyxPQUFPLEdBQUdELEdBQUcsQ0FBQ0YsZ0JBQWdCLENBQUMsSUFBSSxDQUFDO01BQzFDLElBQU1JLFFBQVEsR0FBR0MsTUFBTSxDQUFDRixPQUFPLENBQUMsQ0FBQyxDQUFDLENBQUNHLFNBQVMsRUFBRSxhQUFhLENBQUMsQ0FBQ0MsTUFBTSxDQUFDLENBQUM7TUFDckVKLE9BQU8sQ0FBQyxDQUFDLENBQUMsQ0FBQ0ssWUFBWSxDQUFDLFlBQVksRUFBRUosUUFBUSxDQUFDO0lBQ25ELENBQUMsQ0FBQzs7SUFFRjtJQUNBLElBQU1LLFNBQVMsR0FBR0MsQ0FBQyxDQUFDZCxLQUFLLENBQUMsQ0FBQ2UsU0FBUyxDQUFDO01BQ2pDLE1BQU0sRUFBRSxLQUFLO01BQ2IsT0FBTyxFQUFFLEVBQUU7TUFDWCxRQUFRLEVBQUU7SUFDZCxDQUFDLENBQUM7RUFFTixDQUFDOztFQUVEO0VBQ0EsT0FBTztJQUNIQyxJQUFJLEVBQUUsU0FBTkEsSUFBSUEsQ0FBQSxFQUFjO01BQ2RqQixhQUFhLENBQUMsQ0FBQztJQUNuQjtFQUNKLENBQUM7QUFDTCxDQUFDLENBQUMsQ0FBQzs7QUFHSDtBQUNBa0IsTUFBTSxDQUFDQyxrQkFBa0IsQ0FBQyxZQUFXO0VBQ2pDcEIsZ0JBQWdCLENBQUNrQixJQUFJLENBQUMsQ0FBQztBQUMzQixDQUFDLENBQUMiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvYXNzZXRzL2NvcmUvanMvY3VzdG9tL2FwcHMvcHJvamVjdHMvdGFyZ2V0cy90YXJnZXRzLmpzP2FmZGMiXSwic291cmNlc0NvbnRlbnQiOlsiXCJ1c2Ugc3RyaWN0XCI7XHJcblxyXG4vLyBDbGFzcyBkZWZpbml0aW9uXHJcbnZhciBLVFByb2plY3RUYXJnZXRzID0gZnVuY3Rpb24gKCkge1xyXG5cclxuICAgIHZhciBpbml0RGF0YXRhYmxlID0gZnVuY3Rpb24gKCkge1xyXG4gICAgICAgIGNvbnN0IHRhYmxlID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2t0X3Byb2ZpbGVfb3ZlcnZpZXdfdGFibGUnKTtcclxuXHJcbiAgICAgICAgLy8gc2V0IGRhdGUgZGF0YSBvcmRlclxyXG4gICAgICAgIGNvbnN0IHRhYmxlUm93cyA9IHRhYmxlLnF1ZXJ5U2VsZWN0b3JBbGwoJ3Rib2R5IHRyJyk7XHJcbiAgICAgICAgdGFibGVSb3dzLmZvckVhY2gocm93ID0+IHtcclxuICAgICAgICAgICAgY29uc3QgZGF0ZVJvdyA9IHJvdy5xdWVyeVNlbGVjdG9yQWxsKCd0ZCcpO1xyXG4gICAgICAgICAgICBjb25zdCByZWFsRGF0ZSA9IG1vbWVudChkYXRlUm93WzFdLmlubmVySFRNTCwgXCJNTU0gRCwgWVlZWVwiKS5mb3JtYXQoKTtcclxuICAgICAgICAgICAgZGF0ZVJvd1sxXS5zZXRBdHRyaWJ1dGUoJ2RhdGEtb3JkZXInLCByZWFsRGF0ZSk7XHJcbiAgICAgICAgfSk7XHJcblxyXG4gICAgICAgIC8vIGluaXQgZGF0YXRhYmxlIC0tLSBtb3JlIGluZm8gb24gZGF0YXRhYmxlczogaHR0cHM6Ly9kYXRhdGFibGVzLm5ldC9tYW51YWwvXHJcbiAgICAgICAgY29uc3QgZGF0YXRhYmxlID0gJCh0YWJsZSkuRGF0YVRhYmxlKHtcclxuICAgICAgICAgICAgXCJpbmZvXCI6IGZhbHNlLFxyXG4gICAgICAgICAgICAnb3JkZXInOiBbXSxcclxuICAgICAgICAgICAgXCJwYWdpbmdcIjogZmFsc2UsXHJcbiAgICAgICAgfSk7XHJcblxyXG4gICAgfVxyXG5cclxuICAgIC8vIFB1YmxpYyBtZXRob2RzXHJcbiAgICByZXR1cm4ge1xyXG4gICAgICAgIGluaXQ6IGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgaW5pdERhdGF0YWJsZSgpO1xyXG4gICAgICAgIH1cclxuICAgIH1cclxufSgpO1xyXG5cclxuXHJcbi8vIE9uIGRvY3VtZW50IHJlYWR5XHJcbktUVXRpbC5vbkRPTUNvbnRlbnRMb2FkZWQoZnVuY3Rpb24oKSB7XHJcbiAgICBLVFByb2plY3RUYXJnZXRzLmluaXQoKTtcclxufSk7XHJcbiJdLCJuYW1lcyI6WyJLVFByb2plY3RUYXJnZXRzIiwiaW5pdERhdGF0YWJsZSIsInRhYmxlIiwiZG9jdW1lbnQiLCJnZXRFbGVtZW50QnlJZCIsInRhYmxlUm93cyIsInF1ZXJ5U2VsZWN0b3JBbGwiLCJmb3JFYWNoIiwicm93IiwiZGF0ZVJvdyIsInJlYWxEYXRlIiwibW9tZW50IiwiaW5uZXJIVE1MIiwiZm9ybWF0Iiwic2V0QXR0cmlidXRlIiwiZGF0YXRhYmxlIiwiJCIsIkRhdGFUYWJsZSIsImluaXQiLCJLVFV0aWwiLCJvbkRPTUNvbnRlbnRMb2FkZWQiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/assets/core/js/custom/apps/projects/targets/targets.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/assets/core/js/custom/apps/projects/targets/targets.js"]();
/******/ 	
/******/ })()
;