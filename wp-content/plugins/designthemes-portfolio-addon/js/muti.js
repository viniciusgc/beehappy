/*!
 * multiscroll.js 0.1.8 Beta
 * https://github.com/alvarotrigo/multiscroll.js
 * @license MIT licensed
 *
 * Copyright (C) 2016 alvarotrigo.com - A project by Alvaro Trigo
 */
! function(e, t, n, o, i) {
    e.fn.multiscroll = function(s) {
        function a() {
            var n = t.location.hash.replace("#", ""),
                o = n;
            if (o.length) {
                var i = e(".ms-left").find('[data-anchor="' + o + '"]'),
                    s = "undefined" == typeof lastScrolledDestiny;
                (s || o !== lastScrolledDestiny) && h(i)
            }
        }

        function l(t) {
            clearTimeout(N);
            var o = e(n.activeElement);
            if (!o.is("textarea") && !o.is("input") && !o.is("select") && s.keyboardScrolling) {
                var i = t.which,
                    a = [40, 38, 32, 33, 34];
                e.inArray(i, a) > -1 && t.preventDefault(), N = setTimeout(function() {
                    r(t)
                }, 150)
            }
        }

        function r(t) {
            var n = t.shiftKey;
            switch (t.which) {
                case 38:
                case 33:
                    F.moveSectionUp();
                    break;
                case 32:
                    if (n) {
                        F.moveSectionUp();
                        break
                    }
                case 40:
                case 34:
                    F.moveSectionDown();
                    break;
                case 36:
                    F.moveTo(1);
                    break;
                case 35:
                    F.moveTo(e(".ms-left .ms-section").length);
                    break;
                default:
                    return
            }
        }

        function c(t) {
            t.preventDefault();
            var n = e(this).parent().index();
            h(e(".ms-left .ms-section").eq(n))
        }

        function m() {
            var t = e(this).data("tooltip");
            e('<div class="multiscroll-tooltip ' + s.navigationPosition + '">' + t + "</div>").hide().appendTo(e(this)).fadeIn(200)
        }

        function f() {
            e(this).find(".multiscroll-tooltip").fadeOut(200, function() {
                e(this).remove()
            })
        }

        function d() {
            K = e(t).height(), e(".ms-tableCell").each(function() {
                e(this).css({
                    height: L(e(this).parent())
                })
            }), u(), e.isFunction(s.afterResize) && s.afterResize.call(this)
        }

        function u() {
            s.css3 ? (S(e(".ms-left"), "translate3d(0px, -" + e(".ms-left").find(".ms-section.active").position().top + "px, 0px)", !1), S(e(".ms-right"), "translate3d(0px, -" + e(".ms-right").find(".ms-section.active").position().top + "px, 0px)", !1)) : (e(".ms-left").css("top", -e(".ms-left").find(".ms-section.active").position().top), e(".ms-right").css("top", -e(".ms-right").find(".ms-section.active").position().top))
        }

        function h(t) {
            var n = t.index(),
                o = e(".ms-right").find(".ms-section").eq(U - 1 - n),
                i = t.data("anchor"),
                a = e(".ms-left .ms-section.active"),
                l = a.index() + 1,
                r = w(t);
            W = !0;
            var c = {
                left: t.position().top,
                right: o.position().top
            };
            if (o.addClass("active").siblings().removeClass("active"), t.addClass("active").siblings().removeClass("active"), C(i), s.css3) {
                e.isFunction(s.onLeave) && s.onLeave.call(this, l, n + 1, r);
                var m = "translate3d(0px, -" + c.left + "px, 0px)",
                    f = "translate3d(0px, -" + c.right + "px, 0px)";
                S(e(".ms-left"), m, !0), S(e(".ms-right"), f, !0), setTimeout(function() {
                    e.isFunction(s.afterLoad) && s.afterLoad.call(this, i, n + 1), setTimeout(function() {
                        W = !1
                    }, X)
                }, s.scrollingSpeed)
            } else e.isFunction(s.onLeave) && s.onLeave.call(this, l, n + 1, r), e(".ms-left").animate({
                top: -c.left
            }, s.scrollingSpeed, s.easing, function() {
                e.isFunction(s.afterLoad) && s.afterLoad.call(this, i, n + 1), setTimeout(function() {
                    W = !1
                }, X)
            }), e(".ms-right").animate({
                top: -c.right
            }, s.scrollingSpeed, s.easing);
            lastScrolledDestiny = i, b(i), x(i, n)
        }

        function v() {
            n.addEventListener ? (n.removeEventListener("mousewheel", g, !1), n.removeEventListener("wheel", g, !1)) : n.detachEvent("onmousewheel", g)
        }

        function p() {
            n.addEventListener ? (n.addEventListener("mousewheel", g, !1), n.addEventListener("wheel", g, !1)) : n.attachEvent("onmousewheel", g)
        }

        function g(e) {
            e = t.event || e;
            var n = o.max(-1, o.min(1, e.wheelDelta || -e.deltaY || -e.detail));
            return W || (n < 0 ? F.moveSectionDown() : F.moveSectionUp()), !1
        }

        function S(e, t, n) {
            e.toggleClass("ms-easing", n), e.css(y(t))
        }

        function y(e) {
            return {
                "-webkit-transform": e,
                "-moz-transform": e,
                "-ms-transform": e,
                transform: e
            }
        }

        function x(t, n) {
            s.navigation && (e("#multiscroll-nav").find(".active").removeClass("active"), t ? e("#multiscroll-nav").find('a[href="#' + t + '"]').addClass("active") : e("#multiscroll-nav").find("li").eq(n).find("a").addClass("active"))
        }

        function b(t) {
            s.menu && (e(s.menu).find(".active").removeClass("active"), e(s.menu).find('[data-menuanchor="' + t + '"]').addClass("active"))
        }

        function w(t) {
            var n = e(".ms-left .ms-section.active").index(),
                o = t.index();
            return n > o ? "up" : "down"
        }

        function C(e) {
            s.anchors.length && (location.hash = e), T()
        }

        function T() {
            var t = e(".ms-left .ms-section.active"),
                n = t.data("anchor"),
                o = t.index(),
                i = String(o);
            s.anchors.length && (i = n), i = i.replace("/", "-").replace("#", "");
            var a = new RegExp("\\b\\s?ms-viewing-[^\\s]+\\b", "g");
            e("body")[0].className = e("body")[0].className.replace(a, ""), e("body").addClass("ms-viewing-" + i)
        }

        function E() {
            var e, o = n.createElement("p"),
                s = {
                    webkitTransform: "-webkit-transform",
                    OTransform: "-o-transform",
                    msTransform: "-ms-transform",
                    MozTransform: "-moz-transform",
                    transform: "transform"
                };
            n.body.insertBefore(o, null);
            for (var a in s) o.style[a] !== i && (o.style[a] = "translate3d(1px,1px,1px)", e = t.getComputedStyle(o).getPropertyValue(s[a]));
            return n.body.removeChild(o), e !== i && e.length > 0 && "none" !== e
        }

        function k(e) {
            e.addClass("ms-table").wrapInner('<div class="ms-tableCell" style="height: ' + L(e) + 'px" />')
        }

        function L(e) {
            var t = K;
            if (s.paddingTop || s.paddingBottom) {
                var n = parseInt(e.css("padding-top")) + parseInt(e.css("padding-bottom"));
                t = K - n
            }
            return t
        }

        function M() {
            var n = t.location.hash.replace("#", ""),
                o = e('.ms-left .ms-section[data-anchor="' + n + '"]');
            n.length && h(o)
        }

        function P(n) {
            var i = n.originalEvent;
            if (D(i)) {
                n.preventDefault();
                e(".ms-left .ms-section.active");
                if (!W) {
                    var a = Y(i);
                    j = a.y, A = a.x, o.abs(O - j) > e(t).height() / 100 * s.touchSensitivity && (O > j ? F.moveSectionDown() : j > O && F.moveSectionUp())
                }
            }
        }

        function D(e) {
            return "undefined" == typeof e.pointerType || "mouse" != e.pointerType
        }

        function z(e) {
            var t = e.originalEvent;
            if (D(t)) {
                var n = Y(t);
                O = n.y, Q = n.x
            }
        }

        function B() {
            q && (MSPointer = R(), e(n).off("touchstart " + MSPointer.down).on("touchstart " + MSPointer.down, z), e(n).off("touchmove " + MSPointer.move).on("touchmove " + MSPointer.move, P))
        }

        function R() {
            var e;
            return e = t.PointerEvent ? {
                down: "pointerdown",
                move: "pointermove"
            } : {
                down: "MSPointerDown",
                move: "MSPointerMove"
            }
        }

        function Y(e) {
            var t = [];
            return t.y = "undefined" != typeof e.pageY && (e.pageY || e.pageX) ? e.pageY : e.touches[0].pageY, t.x = "undefined" != typeof e.pageX && (e.pageY || e.pageX) ? e.pageX : e.touches[0].pageX, q && D(e) && (t.y = e.touches[0].pageY, t.x = e.touches[0].pageX), t
        }
        var F = e.fn.multiscroll;
        s = e.extend({
            verticalCentered: !0,
            scrollingSpeed: 700,
            easing: "easeInQuart",
            menu: !1,
            sectionsColor: [],
            anchors: [],
            navigation: !1,
            navigationPosition: "right",
            navigationColor: "#000",
            navigationTooltips: [],
            loopBottom: !1,
            loopTop: !1,
            css3: !1,
            paddingTop: 0,
            paddingBottom: 0,
            fixedElements: null,
            normalScrollElements: null,
            keyboardScrolling: !0,
            touchSensitivity: 5,
            sectionSelector: ".ms-section",
            leftSelector: ".ms-left",
            rightSelector: ".ms-right",
            afterLoad: null,
            onLeave: null,
            afterRender: null,
            afterResize: null
        }, s);
        var X = 600,
            q = "ontouchstart" in t || navigator.msMaxTouchPoints > 0 || navigator.maxTouchPoints;
        ".ms-right" !== s.rightSelector && e(s.rightSelector).addClass("ms-right"), ".ms-left" !== s.leftSelector && e(s.leftSelector).addClass("ms-left");
        var I, U = e(".ms-left").find(".ms-section").length,
            W = !1,
            K = e(t).height();
        p(), B(), s.css3 && (s.css3 = E()), e("html, body").css({
            overflow: "hidden",
            height: "100%"
        }), ".ms-section" !== s.sectionSelector && e(s.sectionSelector).each(function() {
            e(this).addClass("ms-section")
        }), s.navigation && (e("body").append('<div id="multiscroll-nav"><ul></ul></div>'), I = e("#multiscroll-nav"), I.css("color", s.navigationColor), I.addClass(s.navigationPosition)), e(".ms-right, .ms-left").css({
            width: "50%",
            position: "absolute",
            height: "100%",
            "-ms-touch-action": "none"
        }), e(".ms-right").css({
            right: "1px",
            top: "0",
            "-ms-touch-action": "none",
            "touch-action": "none"
        }), e(".ms-left").css({
            left: "0",
            top: "0",
            "-ms-touch-action": "none",
            "touch-action": "none"
        }), e(".ms-left .ms-section, .ms-right .ms-section").each(function() {
            var t = e(this).index();
            if ((s.paddingTop || s.paddingBottom) && e(this).css("padding", s.paddingTop + " 0 " + s.paddingBottom + " 0"), "undefined" != typeof s.sectionsColor[t] && e(this).css("background-color", s.sectionsColor[t]), "undefined" != typeof s.anchors[t] && e(this).attr("data-anchor", s.anchors[t]), s.verticalCentered && k(e(this)), e(this).closest(".ms-left").length && s.navigation) {
                var n = "";
                s.anchors.length && (n = s.anchors[t]);
                var o = s.navigationTooltips[t];
                "undefined" == typeof o && (o = ""), s.navigation && I.find("ul").append('<li data-tooltip="' + o + '"><a href="#' + n + '"><span></span></a></li>')
            }
        }), e(".ms-right").html(e(".ms-right").find(".ms-section").get().reverse()), e(".ms-left .ms-section, .ms-right .ms-section").each(function() {
            var t = e(this).index();
            e(this).css({
                height: "100%"
            }), !t && s.navigation && I.find("li").eq(t).find("a").addClass("active")
        }).promise().done(function() {
            e(".ms-left .ms-section.active").length || (e(".ms-right").find(".ms-section").last().addClass("active"), e(".ms-left").find(".ms-section").first().addClass("active")), s.navigation && I.css("margin-top", "-" + I.height() / 2 + "px"), e.isFunction(s.afterRender) && s.afterRender.call(this), u(), T(), e(t).on("load", function() {
                M()
            })
        }), e(t).on("hashchange", a), e(n).keydown(l);
        var N;
        e(n).mousedown(function(e) {
            if (1 == e.button) return e.preventDefault(), !1
        }), e(n).on("click", "#multiscroll-nav a", c), e(n).on({
            mouseenter: m,
            mouseleave: f
        }, "#multiscroll-nav li"), s.normalScrollElements && (e(n).on("mouseenter", s.normalScrollElements, function() {
            F.setMouseWheelScrolling(!1)
        }), e(n).on("mouseleave", s.normalScrollElements, function() {
            F.setMouseWheelScrolling(!0)
        })), e(t).on("resize", d), F.moveSectionUp = function() {
            var t = e(".ms-left .ms-section.active").prev(".ms-section");
            !t.length && s.loopTop && (t = e(".ms-left .ms-section").last()), t.length && h(t)
        }, F.moveSectionDown = function() {
            var t = e(".ms-left .ms-section.active").next(".ms-section");
            !t.length && s.loopBottom && (t = e(".ms-left .ms-section").first()), t.length && h(t)
        }, F.moveTo = function(t) {
            var n = "";
            n = isNaN(t) ? e('.ms-left [data-anchor="' + t + '"]') : e(".ms-left .ms-section").eq(t - 1), h(n)
        }, F.setKeyboardScrolling = function(e) {
            s.keyboardScrolling = e
        }, F.setMouseWheelScrolling = function(e) {
            e ? p() : v()
        }, F.setScrollingSpeed = function(e) {
            s.scrollingSpeed = e
        };
        var O = 0,
            Q = 0,
            j = 0,
            A = 0;
        F.destroy = function() {
            F.setKeyboardScrolling(!1), F.setMouseWheelScrolling(!1), e(t).off("hashchange", a).off("resize", d), e(n).off("mouseenter", "#multiscroll-nav li").off("mouseleave", "#multiscroll-nav li").off("click", "#multiscroll-nav a")
        }, F.build = function() {
            F.setKeyboardScrolling(!0), F.setMouseWheelScrolling(!0), e(t).on("hashchange", a).on("resize", d), e(n).on("mouseenter", "#multiscroll-nav li", m).on("mouseleave", "#multiscroll-nav li", f).on("click", "#multiscroll-nav a", c)
        }
    }
}(jQuery, window, document, Math);