/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ (() => {

(function () {
  document.querySelectorAll(".card-status-bar.error").forEach(function (el) {
    setTimeout(function () {
      console.log('Doing the things');
      el.style.backgroundColor = "rgb(191, 66, 66)";
      el.style.color = "#000000";
    }, 100);
  });
  document.querySelectorAll(".card-status-bar.success").forEach(function (el) {
    setTimeout(function () {
      el.style.backgroundColor = "rgb(66, 191, 66)";
      el.style.color = "#000000";
    }, 100);
  });
})();

window.toggle_form_groups = function (el) {
  var form_card = el.parentElement.parentElement;
  console.log('clicking it, yo', form_card); // console.log(el)

  if (form_card.classList.contains('collapsed')) {
    form_card.classList.remove('collapsed');
    el.innerHTML = '&#8722';
  } else {
    form_card.classList.add('collapsed');
    el.innerHTML = '&#x270E;';
  }
};

window.previous_listing_img = function (el, type) {
  console.log('previous: ', el.previousElementSibling.previousElementSibling.children);
  var listing_images = el.previousElementSibling.previousElementSibling.children;
  if (type == 'users') var listing_images_delete = el.previousElementSibling.previousElementSibling.previousElementSibling.children;
  var current_index = null;
  var new_index = null;

  for (var i = 0; i < listing_images.length; i++) {
    if (listing_images[i].classList.contains('current-img')) current_index = i;

    if (current_index != null) {
      if (current_index <= listing_images.length - 1) {
        if (current_index == 0) {
          new_index = listing_images.length - 1;
        } else {
          new_index = current_index - 1;
        }
      } else {
        new_index = current_index - 1;
      }

      break;
    }
  }

  console.log('current_index', current_index);
  console.log('new_index', new_index);

  if (type == 'users') {
    listing_images_delete[current_index].classList.remove('current-img-delete');
    listing_images_delete[new_index].classList.add('current-img-delete');
  }

  listing_images[current_index].classList.remove('current-img');
  listing_images[new_index].classList.add('current-img');
};

window.next_listing_img = function (el, type) {
  var listing_images = el.previousElementSibling.children;
  if (type == 'users') var listing_images_delete = el.previousElementSibling.previousElementSibling.children;
  var current_index = null;
  var new_index = null;

  for (var i = 0; i < listing_images.length; i++) {
    if (listing_images[i].classList.contains('current-img')) current_index = i;

    if (current_index != null) {
      if (current_index <= listing_images.length - 1) {
        if (current_index == listing_images.length - 1) {
          new_index = 0;
        } else {
          new_index = current_index + 1;
        }
      } else {
        new_index = current_index + 1;
      }

      break;
    }
  }

  if (type == 'users') {
    listing_images_delete[current_index].classList.remove('current-img-delete');
    listing_images_delete[new_index].classList.add('current-img-delete');
  }

  listing_images[current_index].classList.remove('current-img');
  listing_images[new_index].classList.add('current-img');
};

window.toggle_user_nav = function (el) {
  var user_nav = document.getElementById('user_nav');
  if (user_nav.classList.contains('opened')) user_nav.classList.remove('opened');else user_nav.classList.add('opened');
};

window.post = function (url) {
  var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  fetch(url, {
    headers: {
      "Content-Type": "application/json",
      "Accept": "application/json, text-plain, */*",
      "X-Requested-With": "XMLHttpRequest",
      "X-CSRF-TOKEN": token
    },
    method: 'post',
    credentials: "same-origin"
  }).then(function (response) {
    return response.json();
  }).then(function (data) {
    console.log(data);
    var card = document.getElementById('artisan_card_' + data.catalog_key);
    var card_status_bar = document.getElementById('artisan_card_status_bar_' + data.catalog_key);

    if (card_status_bar) {
      card_status_bar.childNodes[0].innerHTML = data.message;
      card_status_bar.classList.remove('hidden');
    }

    if (data.type && data.type == 'destroy') card.parentNode.removeChild(card);
  })["catch"](function (error) {
    console.log(error);
  });
};

window.toggle_cart_details = function () {
  var cart_details = document.getElementById('cart_details');

  if (cart_details.classList.contains('opened')) {
    cart_details.classList.remove('opened');
    setTimeout(function () {
      document.body.removeEventListener('mousedown', close_cart_details);
    }, 10);
  } else {
    cart_details.classList.add('opened');
    document.body.addEventListener('mousedown', close_cart_details);
  }
};

window.close_cart_details = function (click) {
  console.log('click: ', click);
  var target = click.target;
  var target_parent = click.target.parentElement;
  var target_parent_parent = click.target.parentElement.parentElement;
  if (target.classList && target.classList.contains('cart-details') || target.classList && target.classList.contains('toggle-cart-btn') || target.classList && target.classList.contains('remove-cart-item') || target_parent.classList && target_parent.classList.contains('cart-details') || target_parent_parent.classList && target_parent_parent.classList.contains('cart-details')) return;
  var cart_details = document.getElementById('cart_details');

  if (cart_details.classList.contains('opened')) {
    cart_details.classList.remove('opened');
    setTimeout(function () {
      document.body.removeEventListener('mousedown', close_cart_details);
    }, 10);
  }
};

/***/ }),

/***/ "./resources/css/app.css":
/*!*******************************!*\
  !*** ./resources/css/app.css ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


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
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
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
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/app": 0,
/******/ 			"css/app": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			for(moduleId in moreModules) {
/******/ 				if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 					__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 				}
/******/ 			}
/******/ 			if(runtime) var result = runtime(__webpack_require__);
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkIds[i]] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/js/app.js")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/css/app.css")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;