"use strict";function _typeof(t){return(_typeof="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t})(t)}function _classCallCheck(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}function _defineProperties(t,e){for(var n=0;n<e.length;n++){var a=e[n];a.enumerable=a.enumerable||!1,a.configurable=!0,"value"in a&&(a.writable=!0),Object.defineProperty(t,_toPropertyKey(a.key),a)}}function _createClass(t,e,n){return e&&_defineProperties(t.prototype,e),n&&_defineProperties(t,n),Object.defineProperty(t,"prototype",{writable:!1}),t}function _toPropertyKey(t){t=_toPrimitive(t,"string");return"symbol"===_typeof(t)?t:String(t)}function _toPrimitive(t,e){if("object"!==_typeof(t)||null===t)return t;var n=t[Symbol.toPrimitive];if(void 0===n)return("string"===e?String:Number)(t);n=n.call(t,e||"default");if("object"!==_typeof(n))return n;throw new TypeError("@@toPrimitive must return a primitive value.")}var LeftSidebar=function(){function t(){_classCallCheck(this,t),this.body=$("body"),this.window=$(window)}return _createClass(t,[{key:"initMenu",value:function(){var n,a,e,i,o;$("#side-menu").length&&((i=$("#side-menu li .collapse")).on({"show.bs.collapse":function(t){t=$(t.target).parents(".collapse.show");$("#side-menu .collapse.show").not(t).collapse("hide")}}),$("#side-menu a").each(function(){var t=window.location.href.split(/[?#]/)[0];this.href==t&&($(this).addClass("active"),$(this).parent().addClass("menuitem-active"),$(this).parent().parent().parent().addClass("show"),$(this).parent().parent().parent().parent().addClass("menuitem-active"),"sidebar-menu"!==(t=$(this).parent().parent().parent().parent().parent().parent()).attr("id")&&t.addClass("show"),$(this).parent().parent().parent().parent().parent().parent().parent().addClass("menuitem-active"),"wrapper"!==(t=$(this).parent().parent().parent().parent().parent().parent().parent().parent().parent()).attr("id")&&t.addClass("show"),(t=$(this).parent().parent().parent().parent().parent().parent().parent().parent().parent().parent()).is("body")||t.addClass("menuitem-active"))})),$("#two-col-sidenav-main").length&&(n=$("#two-col-sidenav-main .nav-link"),a=$(".twocolumn-menu-item"),e=$(".twocolumn-menu-item .nav-second-level"),(i=$("#two-col-menu li .collapse")).on({"show.bs.collapse":function(){var t=$(this).closest(e).closest(e).find(i);(t.length?t:i).not($(this)).collapse("hide")}}),n.on("click",function(t){var e=$($(this).attr("href"));return!e.length||(t.preventDefault(),n.removeClass("active"),$(this).addClass("active"),a.removeClass("d-block"),e.addClass("d-block"),$.LayoutThemeApp.leftSidebar.changeSize("default"),!1)}),o=window.location.href,n.each(function(){this.href===o&&$(this).addClass("active")}),$("#two-col-menu a").each(function(){var t,e,n;this.href==o&&($(this).addClass("active"),$(this).parent().addClass("menuitem-active"),$(this).parent().parent().parent().addClass("show"),$(this).parent().parent().parent().parent().addClass("menuitem-active"),"sidebar-menu"!==(t=$(this).parent().parent().parent().parent().parent().parent()).attr("id")&&t.addClass("show"),$(this).parent().parent().parent().parent().parent().parent().parent().addClass("menuitem-active"),"wrapper"!==(t=$(this).parent().parent().parent().parent().parent().parent().parent().parent().parent()).attr("id")&&t.addClass("show"),(t=$(this).parent().parent().parent().parent().parent().parent().parent().parent().parent().parent()).is("body")||t.addClass("menuitem-active"),e=null,n="#"+$(this).parents(".twocolumn-menu-item").attr("id"),$("#two-col-sidenav-main .nav-link").each(function(){$(this).attr("href")===n&&(e=$(this))}),e)&&e.trigger("click")}))}},{key:"init",value:function(){this.initMenu()}}]),t}(),Topbar=function(){function t(){_classCallCheck(this,t),this.body=$("body"),this.window=$(window)}return _createClass(t,[{key:"toggleRightSideBar",value:function(){document.body.classList.contains("right-bar-enabled")?document.body.classList.remove("right-bar-enabled"):document.body.classList.add("right-bar-enabled")}},{key:"initMenu",value:function(){var t=this,e=(null!=(e=document.querySelector(".right-bar-toggle"))&&e.addEventListener("click",function(){t.toggleRightSideBar()}),$("#top-search").on("click",function(t){$("#search-dropdown").addClass("d-block")}),$(".topbar-dropdown").on("show.bs.dropdown",function(){$("#search-dropdown").removeClass("d-block")}),$(".navbar-nav a").each(function(){var t,e=window.location.href.split(/[?#]/)[0];this.href==e&&($(this).addClass("active"),$(this).parent().addClass("active"),$(this).parent().parent().addClass("active"),$(this).parent().parent().parent().addClass("active"),$(this).parent().parent().parent().parent().addClass("active"),$(this).parent().parent().parent().parent().hasClass("mega-dropdown-menu")?($(this).parent().parent().parent().parent().parent().addClass("active"),$(this).parent().parent().parent().parent().parent().parent().addClass("active")):(t=$(this).parent().parent()[0].querySelector(".dropdown-item"))&&(e=window.location.href.split(/[?#]/)[0],t.href!=e&&!t.classList.contains("dropdown-toggle")||t.classList.add("active")),(e=$(this).parent().parent().parent().parent().addClass("active").prev()).hasClass("nav-link"))&&e.addClass("active")}),$(".navbar-toggle").on("click",function(t){$(this).toggleClass("open"),$("#navigation").slideToggle(400)}),document.querySelectorAll("ul.navbar-nav .dropdown .dropdown-toggle")),a=!1;e.forEach(function(n){n.addEventListener("click",function(t){var e;n.parentElement.classList.contains("nav-item")||(a=!0,n.parentElement.parentElement.classList.add("show"),(e=n.parentElement.parentElement.parentElement.querySelector(".nav-link")).ariaExpanded=!0,e.classList.add("show"),bootstrap.Dropdown.getInstance(n).show())}),n.addEventListener("hide.bs.dropdown",function(t){a&&(t.preventDefault(),t.stopPropagation(),a=!1)})})}},{key:"init",value:function(){this.initMenu()}}]),t}(),RightSidebar=function(){function t(){_classCallCheck(this,t),this.body=$("body"),this.window=$(window)}return _createClass(t,[{key:"init",value:function(){$(document).on("click","body",function(t){1!==$(t.target).closest("#top-search").length&&$("#search-dropdown").removeClass("d-block"),0<$(t.target).closest(".right-bar-toggle, .right-bar").length||0<$(t.target).closest(".left-side-menu, .side-nav").length||$(t.target).hasClass("button-menu-mobile")||0<$(t.target).closest(".button-menu-mobile").length||($("body").removeClass("right-bar-enabled"),$("body").removeClass("sidebar-enable"))})}}]),t}(),ThemeCustomizer=function(){function t(){_classCallCheck(this,t),this.body=document.body,this.defaultConfig={leftbar:{color:"light",size:"default",position:"fixed"},layout:{color:"light",size:"fluid",mode:"default"},topbar:{color:"light"},sidebar:{user:!0}}}return _createClass(t,[{key:"initConfig",value:function(){var t,e=JSON.parse(JSON.stringify(this.defaultConfig));e.leftbar.color=null!=(t=this.body.getAttribute("data-leftbar-color"))?t:this.defaultConfig.leftbar.color,e.leftbar.size=null!=(t=this.body.getAttribute("data-leftbar-size"))?t:this.defaultConfig.leftbar.size,e.leftbar.position=null!=(t=this.body.getAttribute("data-leftbar-position"))?t:this.defaultConfig.leftbar.position,e.layout.color=null!=(t=this.body.getAttribute("data-layout-color"))?t:this.defaultConfig.layout.color,e.layout.size=null!=(t=this.body.getAttribute("data-layout-size"))?t:this.defaultConfig.layout.size,e.layout.mode=null!=(t=this.body.getAttribute("data-layout-mode"))?t:this.defaultConfig.layout.mode,e.topbar.color=null!=(t=this.body.getAttribute("data-topbar-color"))?t:this.defaultConfig.topbar.color,e.sidebar.user=null!=(t=this.body.getAttribute("data-sidebar-user"))?t:this.defaultConfig.sidebar.user,this.defaultConfig=JSON.parse(JSON.stringify(e)),this.config=e,this.setSwitchFromConfig()}},{key:"changeLeftbarColor",value:function(t){this.config.leftbar.color=t,this.body.setAttribute("data-leftbar-color",t),this.setSwitchFromConfig()}},{key:"changeLeftbarPosition",value:function(t){this.config.leftbar.position=t,this.body.setAttribute("data-leftbar-position",t),this.setSwitchFromConfig()}},{key:"changeLeftbarSize",value:function(t){this.config.leftbar.size=t,this.body.setAttribute("data-leftbar-size",t),this.setSwitchFromConfig()}},{key:"changeLayoutMode",value:function(t){this.config.layout.mode=t,this.body.setAttribute("data-layout-mode",t),this.setSwitchFromConfig()}},{key:"changeLayoutColor",value:function(t){this.config.layout.color=t,this.body.setAttribute("data-layout-color",t),this.setSwitchFromConfig()}},{key:"changeLayoutSize",value:function(t){this.config.layout.size=t,this.body.setAttribute("data-layout-size",t),this.setSwitchFromConfig()}},{key:"changeTopbarColor",value:function(t){this.config.topbar.color=t,this.body.setAttribute("data-topbar-color",t),this.setSwitchFromConfig()}},{key:"changeSidebarUser",value:function(t){(this.config.sidebar.user=t)?this.body.setAttribute("data-sidebar-user",t):this.body.removeAttribute("data-sidebar-user"),this.setSwitchFromConfig()}},{key:"resetTheme",value:function(){this.config=JSON.parse(JSON.stringify(this.defaultConfig)),this.changeLeftbarColor(this.config.leftbar.color),this.changeLeftbarPosition(this.config.leftbar.position),this.changeLeftbarSize(this.config.leftbar.size),this.changeLayoutColor(this.config.layout.color),this.changeLayoutSize(this.config.layout.size),this.changeLayoutMode(this.config.layout.mode),this.changeTopbarColor(this.config.topbar.color),this.changeSidebarUser(this.config.sidebar.user)}},{key:"initSwitchListener",value:function(){var t,n=this;document.querySelectorAll("input[name=leftbar-color]").forEach(function(e){e.addEventListener("change",function(t){n.changeLeftbarColor(e.value)})}),document.querySelectorAll("input[name=leftbar-size]").forEach(function(e){e.addEventListener("change",function(t){n.changeLeftbarSize(e.value)})}),document.querySelectorAll("input[name=leftbar-position]").forEach(function(e){e.addEventListener("change",function(t){n.changeLeftbarPosition(e.value)})}),document.querySelectorAll("input[name=layout-color]").forEach(function(e){e.addEventListener("change",function(t){n.changeLayoutColor(e.value)})}),document.querySelectorAll("input[name=layout-size]").forEach(function(e){e.addEventListener("change",function(t){n.changeLayoutSize(e.value)})}),document.querySelectorAll("input[name=layout-mode]").forEach(function(e){e.addEventListener("change",function(t){n.changeLayoutMode(e.value)})}),document.querySelectorAll("input[name=topbar-color]").forEach(function(e){e.addEventListener("change",function(t){n.changeTopbarColor(e.value)})}),document.querySelectorAll("input[name=sidebar-user]").forEach(function(e){e.addEventListener("change",function(t){n.changeSidebarUser(e.checked)})}),null!=(t=document.querySelector("#resetBtn"))&&t.addEventListener("click",function(t){n.resetTheme()}),null!=(t=document.querySelector(".button-menu-mobile"))&&t.addEventListener("click",function(){n.body.classList.toggle("sidebar-enable")})}},{key:"setSwitchFromConfig",value:function(){document.querySelectorAll(".right-bar input[type=checkbox]").forEach(function(t){t.checked=!1});var t,e,n,a,i,o,r,s,l=this.config;l&&(t=document.querySelector("input[type=checkbox][name=leftbar-color][value="+l.leftbar.color+"]"),e=document.querySelector("input[type=checkbox][name=leftbar-size][value="+l.leftbar.size+"]"),n=document.querySelector("input[type=checkbox][name=leftbar-position][value="+l.leftbar.position+"]"),a=document.querySelector("input[type=checkbox][name=layout-color][value="+l.layout.color+"]"),i=document.querySelector("input[type=checkbox][name=layout-size][value="+l.layout.size+"]"),o=document.querySelector("input[type=checkbox][name=layout-mode][value="+l.layout.type+"]"),r=document.querySelector("input[type=checkbox][name=topbar-color][value="+l.topbar.color+"]"),s=document.querySelector("input[type=checkbox][name=sidebar-user]"),t&&(t.checked=!0),e&&(e.checked=!0),n&&(n.checked=!0),a&&(a.checked=!0),i&&(i.checked=!0),o&&(o.checked=!0),r&&(r.checked=!0),s)&&"true"===l.sidebar.user.toString()&&(s.checked=!0)}},{key:"init",value:function(){this.initConfig(),this.initSwitchListener()}}]),t}(),Layout=function(){function t(){_classCallCheck(this,t)}return _createClass(t,[{key:"init",value:function(){this.themeCustomizer=new ThemeCustomizer,this.themeCustomizer.init(),this.leftSidebar=new LeftSidebar,this.topbar=new Topbar,this.rightSidebar=new RightSidebar(this),this.rightSidebar.init(),this.topbar.init(),this.leftSidebar.init()}}]),t}();window.addEventListener("DOMContentLoaded",function(t){(new Layout).init()});
/*
Template Name: Tapeli - Responsive Bootstrap 5 Admin Dashboard
Author: Zoyothemes
Version: 1.0.0
Website: https://zoyothemes.com/
File: Main Js File
*/


class App {

    initComponents() {

        // Waves Effect
        Waves.init();

        // Feather Icons
        feather.replace()

        // Popovers
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })

        // Tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })

        // Toasts
        var toastElList = [].slice.call(document.querySelectorAll('.toast'))
        var toastList = toastElList.map(function (toastEl) {
            return new bootstrap.Toast(toastEl)
        })

        // Toasts Placement
        var toastPlacement = document.getElementById("toastPlacement");
        if (toastPlacement) {
            document.getElementById("selectToastPlacement").addEventListener("change", function () {
                if (!toastPlacement.dataset.originalClass) {
                    toastPlacement.dataset.originalClass = toastPlacement.className;
                }
                toastPlacement.className = toastPlacement.dataset.originalClass + " " + this.value;
            });
        }

        // liveAlert
        var alertPlaceholder = document.getElementById('liveAlertPlaceholder')
        var alertTrigger = document.getElementById('liveAlertBtn')

        function alert(message, type) {
            var wrapper = document.createElement('div')
            wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'

            alertPlaceholder.append(wrapper)
        }

        if (alertTrigger) {
            alertTrigger.addEventListener('click', function () {
                alert('Nice, you triggered this alert message!', 'primary')
            })
        }
    }

    initControls = function () {

        //  Full Screen Controls
        $('[data-toggle="fullscreen"]').on("click", function (e) {
            e.preventDefault();
            $('body').toggleClass('fullscreen-enable');
            if (!document.fullscreenElement && /* alternative standard method */ !document.mozFullScreenElement && !document.webkitFullscreenElement) {  // current working methods
                if (document.documentElement.requestFullscreen) {
                    document.documentElement.requestFullscreen();
                } else if (document.documentElement.mozRequestFullScreen) {
                    document.documentElement.mozRequestFullScreen();
                } else if (document.documentElement.webkitRequestFullscreen) {
                    document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
                }
            } else {
                if (document.cancelFullScreen) {
                    document.cancelFullScreen();
                } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                } else if (document.webkitCancelFullScreen) {
                    document.webkitCancelFullScreen();
                }
            }
        });
        document.addEventListener('fullscreenchange', exitHandler);
        document.addEventListener("webkitfullscreenchange", exitHandler);
        document.addEventListener("mozfullscreenchange", exitHandler);

        function exitHandler() {
            if (!document.webkitIsFullScreen && !document.mozFullScreen && !document.msFullscreenElement) {
                $('body').removeClass('fullscreen-enable');
            }
        }
    }

    initMenu() {
        var self = this;
        var body = document.body;

        // Menu Toggle Button ( Placed in Topbar) (Left menu collapse)
        var menuToggleBtn = document.querySelector('.button-toggle-menu');
        if (menuToggleBtn) {
            menuToggleBtn.addEventListener('click', function () {

                if (body.getAttribute('data-sidebar') == 'default') {
                    body.setAttribute('data-sidebar', 'hidden');
                } else {
                    body.setAttribute('data-sidebar', 'default');
                }
            });
        }

        const updateOnWindowResize = () => {
            if (window.innerWidth < 1040) {
                body.setAttribute('data-sidebar', 'hidden');
            } else {
                body.setAttribute('data-sidebar', 'default');
            }
        }

        updateOnWindowResize();
        window.addEventListener('resize', updateOnWindowResize)

        // sidebar - main menu
        if ($("#side-menu").length) {
            var navCollapse = $('#side-menu li .collapse');

            // open one menu at a time only
            navCollapse.on({
                'show.bs.collapse': function (event) {
                    var parent = $(event.target).parents('.collapse.show');
                    $('#side-menu .collapse.show').not(parent).collapse('hide');
                }
            });

            // activate the menu in left side bar (Vertical Menu) based on url
            $("#side-menu a").each(function () {
                var pageUrl = window.location.href.split(/[?#]/)[0];
                if (this.href == pageUrl) {
                    $(this).addClass("active");
                    $(this).parent().addClass("menuitem-active");
                    $(this).parent().parent().parent().addClass("show");
                    $(this).parent().parent().parent().parent().addClass("menuitem-active");

                    var firstLevelParent = $(this).parent().parent().parent().parent().parent().parent();
                    if (firstLevelParent.attr('id') !== 'sidebar-menu') firstLevelParent.addClass("show");

                    $(this).parent().parent().parent().parent().parent().parent().parent().addClass("menuitem-active");

                    var secondLevelParent = $(this).parent().parent().parent().parent().parent().parent().parent().parent().parent();
                    if (secondLevelParent.attr('id') !== 'wrapper') secondLevelParent.addClass("show");

                    var upperLevelParent = $(this).parent().parent().parent().parent().parent().parent().parent().parent().parent().parent();
                    if (!upperLevelParent.is('body')) upperLevelParent.addClass("menuitem-active");
                }
            });
        }
    }

    init() {
        this.initComponents();
        this.initMenu();
        this.initControls();
    }
}

new App().init();