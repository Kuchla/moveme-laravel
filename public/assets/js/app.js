/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/css/app.scss":
/*!***************************************!*\
  !*** ./resources/assets/css/app.scss ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/js/app.js":
/*!************************************!*\
  !*** ./resources/assets/js/app.js ***!
  \************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _main__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./main */ "./resources/assets/js/main.js");
/* harmony import */ var _main__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_main__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _event__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./event */ "./resources/assets/js/event.js");
/* harmony import */ var _event__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_event__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _comment__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./comment */ "./resources/assets/js/comment.js");
/* harmony import */ var _comment__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_comment__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _place__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./place */ "./resources/assets/js/place.js");
/* harmony import */ var _place__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_place__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _public_profile__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./public-profile */ "./resources/assets/js/public-profile.js");
/* harmony import */ var _public_profile__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_public_profile__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _user__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./user */ "./resources/assets/js/user.js");
/* harmony import */ var _user__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_user__WEBPACK_IMPORTED_MODULE_5__);






_main__WEBPACK_IMPORTED_MODULE_0___default()();
_event__WEBPACK_IMPORTED_MODULE_1___default()();
_comment__WEBPACK_IMPORTED_MODULE_2___default()();
_place__WEBPACK_IMPORTED_MODULE_3___default()();
_public_profile__WEBPACK_IMPORTED_MODULE_4___default()();
_user__WEBPACK_IMPORTED_MODULE_5___default()();

/***/ }),

/***/ "./resources/assets/js/comment.js":
/*!****************************************!*\
  !*** ./resources/assets/js/comment.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).on('click', '.create-comment', function () {
  var url = $(this).data('route-create');
  var eventId = $(this).data('event');
  dataComment = {
    text: $('#comment-text-' + eventId).val(),
    model_name: $('.comment-model-name').val(),
    model_id: $('#comment-model-' + eventId).val()
  };
  createComment(url, dataComment, eventId);
});
$(document).on('click', '.delete-comment', function () {
  var url = $(this).data('route');
  var eventId = $(this).data('event');
  var modelName = $(this).data('model-name');
  deleteComment(url, eventId, modelName);
});

var deleteComment = function deleteComment(url, eventId, modelName) {
  $.ajax({
    type: "POST",
    method: 'DELETE',
    url: url,
    data: {
      modelName: modelName
    },
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  }).then(function (data) {
    $('#' + modelName + '-' + eventId).html(data);
  });
};

var createComment = function createComment(url, dataComment, eventId) {
  $.ajax({
    type: "POST",
    url: url,
    data: {
      dataComment: dataComment
    },
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  }).then(function (data) {
    $('#' + dataComment['model_name'] + '-' + eventId).html(data);
  });
};

/***/ }),

/***/ "./resources/assets/js/event.js":
/*!**************************************!*\
  !*** ./resources/assets/js/event.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$("#event_search").click(function () {
  var url = $(this).data('route');
  var isFree = $("input[name='event-is-free']:checked").val();
  var isLimited = $("input[name='event-is-limited']:checked").val();
  var month = $("input[name='event-month']:checked").val();
  var activity = $("#event-activity").val();
  $('.pagination').hide();
  fetchData(isFree, isLimited, url, month, activity);
});

var fetchData = function fetchData(is_free, is_limited, url, month, activity) {
  $.ajax({
    type: "GET",
    url: url,
    data: {
      is_free: is_free,
      is_limited: is_limited,
      month: month,
      activity: activity
    }
  }).then(function (data) {
    $(".event-list").html(data);
  });
};

/***/ }),

/***/ "./resources/assets/js/main.js":
/*!*************************************!*\
  !*** ./resources/assets/js/main.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

jQuery(document).ready(function ($) {
  $(window).scroll(function () {
    var height = $(window).height();
    var scroll = $(window).scrollTop();

    if (scroll) {
      $(".header-hide").addClass("scroll-header");
    } else {
      $(".header-hide").removeClass("scroll-header");
    }
  }); // Back to top button

  $(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
      $(".back-to-top").fadeIn("slow");
    } else {
      $(".back-to-top").fadeOut("slow");
    }
  });
  $(".back-to-top").click(function () {
    $("html, body").animate({
      scrollTop: 0
    }, 1500, "easeInOutExpo");
    return false;
  }); // Initiate the wowjs animation library

  new WOW().init(); // Initiate superfish on nav menu

  $(".nav-menu").superfish({
    animation: {
      opacity: "show"
    },
    speed: 400
  }); // Mobile Navigation

  if ($("#nav-menu-container").length) {
    var $mobile_nav = $("#nav-menu-container").clone().prop({
      id: "mobile-nav"
    });
    $mobile_nav.find("> ul").attr({
      "class": "",
      id: ""
    });
    $("body").append($mobile_nav);
    $("body").prepend('<button type="button" id="mobile-nav-toggle"><i class="fa fa-bars"></i></button>');
    $("body").append('<div id="mobile-body-overly"></div>');
    $("#mobile-nav").find(".menu-has-children").prepend('<i class="fa fa-chevron-down"></i>');
    $(document).on("click", ".menu-has-children i", function (e) {
      $(this).next().toggleClass("menu-item-active");
      $(this).nextAll("ul").eq(0).slideToggle();
      $(this).toggleClass("fa-chevron-up fa-chevron-down");
    });
    $(document).on("click", "#mobile-nav-toggle", function (e) {
      $("body").toggleClass("mobile-nav-active");
      $("#mobile-nav-toggle i").toggleClass("fa-times fa-bars");
      $("#mobile-body-overly").toggle();
    });
    $(document).click(function (e) {
      var container = $("#mobile-nav, #mobile-nav-toggle");

      if (!container.is(e.target) && container.has(e.target).length === 0) {
        if ($("body").hasClass("mobile-nav-active")) {
          $("body").removeClass("mobile-nav-active");
          $("#mobile-nav-toggle i").toggleClass("fa-times fa-bars");
          $("#mobile-body-overly").fadeOut();
        }
      }
    });
  } else if ($("#mobile-nav, #mobile-nav-toggle").length) {
    $("#mobile-nav, #mobile-nav-toggle").hide();
  } // Smooth scroll for the menu and links with .scrollto classes


  $(".nav-menu a, #mobile-nav a, .scrollto").on("click", function () {
    if (location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") && location.hostname == this.hostname) {
      var target = $(this.hash);

      if (target.length) {
        var top_space = 0;

        if ($("#header").length) {
          top_space = $("#header").outerHeight();

          if (!$("#header").hasClass("header-fixed")) {
            top_space = top_space - 20;
          }
        }

        $("html, body").animate({
          scrollTop: target.offset().top - top_space
        }, 1500, "easeInOutExpo");

        if ($(this).parents(".nav-menu").length) {
          $(".nav-menu .menu-active").removeClass("menu-active");
          $(this).closest("li").addClass("menu-active");
        }

        if ($("body").hasClass("mobile-nav-active")) {
          $("body").removeClass("mobile-nav-active");
          $("#mobile-nav-toggle i").toggleClass("fa-times fa-bars");
          $("#mobile-body-overly").fadeOut();
        }

        return false;
      }
    }
  }); // custom code

  $(document).ready(function () {
    var get = document.URL;

    if (get.match(/events/i)) {
      $("#events").addClass("menu-active");
    }

    if (get.match(/places/i)) {
      $("#places").addClass("menu-active");
    }

    if (get.match(/activities/i)) {
      $("#activities").addClass("menu-active");
    }

    if (get.match(/users/i)) {
      $("#users").addClass("menu-active");
    }

    if (get.match(/profiles/i)) {
      $("#profiles").addClass("menu-active");
    }
  });
});

/***/ }),

/***/ "./resources/assets/js/place.js":
/*!**************************************!*\
  !*** ./resources/assets/js/place.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$("#search_place").click(function () {
  var url = $(this).data("route");
  var isFree = $("input[name='visitation']:checked").val();
  var activity = $("#place_activity").val();
  var city = $("#place_city").val();
  $('.pagination').hide();
  fetchData(isFree, activity, city, url);
});

var fetchData = function fetchData(is_free, activity, city, url) {
  $.ajax({
    type: "GET",
    url: url,
    data: {
      is_free: is_free,
      activity: activity,
      city: city
    }
  }).then(function (data) {
    $(".place-list").html(data);
  });
};

/***/ }),

/***/ "./resources/assets/js/public-profile.js":
/*!***********************************************!*\
  !*** ./resources/assets/js/public-profile.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

if ($('.file').hasClass('show-file')) {
  $("#profile-image").fileinput({
    overwriteInitial: true,
    maxFileSize: 1500,
    showClose: false,
    showCaption: false,
    browseLabel: '',
    removeLabel: '',
    browseIcon: '<i class="fa fa-fw fa-search"></i>',
    removeIcon: '<i class="fa fa-fw fa-window-close"></i>',
    removeTitle: 'Cancel or reset changes',
    elErrorContainer: '#kv-avatar-errors-1',
    msgErrorClass: 'alert alert-block alert-danger',
    defaultPreviewContent: '<img src="' + $('#profile-image')[0].defaultValue + '" + ' + 'alt="Foto de perfil">',
    layoutTemplates: {
      main2: '{preview} ' + ' {browse}'
    },
    allowedFileExtensions: ["jpg", "png", "gif"]
  });
}

/***/ }),

/***/ "./resources/assets/js/user.js":
/*!*************************************!*\
  !*** ./resources/assets/js/user.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$("#search-user").click(function () {
  var url = $(this).data("route");
  var activity = $("#user-activity").val();
  $('.pagination').hide();
  fetchData(activity, url);
});

var fetchData = function fetchData(activity, url) {
  $.ajax({
    type: "GET",
    url: url,
    data: {
      activity: activity
    }
  }).then(function (data) {
    $("#people-list").html(data);
  });
};

/***/ }),

/***/ 0:
/*!**************************************************************************!*\
  !*** multi ./resources/assets/js/app.js ./resources/assets/css/app.scss ***!
  \**************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /home/kuchla/tcc/moveme-laravel/moveme-app/moveme/resources/assets/js/app.js */"./resources/assets/js/app.js");
module.exports = __webpack_require__(/*! /home/kuchla/tcc/moveme-laravel/moveme-app/moveme/resources/assets/css/app.scss */"./resources/assets/css/app.scss");


/***/ })

/******/ });