/*! This file is auto-generated */
!function(l, u, d) {
    function m(e) {
        27 === e.which && (e = w(e.target, ".menupop")) && (e.querySelector(".menupop > .ab-item").focus(), y(e, "hover"))
    }
    function f(e) {
        var t;
        13 !== e.which || w(e.target, ".ab-sub-wrapper") || (t = w(e.target, ".menupop")) && (e.preventDefault(), (o(t, "hover") ? y : b)(t, "hover"))
    }
    function p(e) {
        var t;
        13 === e.which && (t = e.target.getAttribute("href"), -1 < d.userAgent.toLowerCase().indexOf("applewebkit") && t && "#" === t.charAt(0) && setTimeout(function() {
            var e = l.getElementById(t.replace("#", ""));
            e && (e.setAttribute("tabIndex", "0"), e.focus())
        }, 100))
    }
    function h(e, t) {
        w(t.target, ".ab-sub-wrapper") || (t.preventDefault(), (t = w(t.target, ".menupop")) && (o(t, "hover") ? y : (E(e), b))(t, "hover"))
    }
    function v(e) {
        var t,
            n = e.target.parentNode;
        if (t = n ? n.querySelector(".shortlink-input") : t)
            return e.preventDefault && e.preventDefault(), e.returnValue = !1, b(n, "selected"), t.focus(), t.select(), !(t.onblur = function() {
                y(n, "selected")
            })
    }
    function g() {
        if ("sessionStorage" in u)
            try {
                for (var e in sessionStorage)
                    -1 < e.indexOf("wp-autosave-") && sessionStorage.removeItem(e)
            } catch (e) {}
    }
    function o(e, t) {
        return e && (e.classList && e.classList.contains ? e.classList.contains(t) : e.className && -1 < e.className.split(" ").indexOf(t))
    }
    function b(e, t) {
        e && (e.classList && e.classList.add ? e.classList.add(t) : o(e, t) || (e.className && (e.className += " "), e.className += t))
    }
    function y(e, t) {
        var n,
            r;
        if (e && o(e, t))
            if (e.classList && e.classList.remove)
                e.classList.remove(t);
            else {
                for (n = " " + t + " ", r = " " + e.className + " "; -1 < r.indexOf(n);)
                    r = r.replace(n, "");
                e.className = r.replace(/^[\s]+|[\s]+$/g, "")
            }
    }
    function E(e) {
        if (e && e.length)
            for (var t = 0; t < e.length; t++)
                y(e[t], "hover")
    }
    function L(e) {
        if (!e.target || "wpadminbar" === e.target.id || "wp-admin-bar-top-secondary" === e.target.id)
            try {
                u.scrollTo({
                    top: -32,
                    left: 0,
                    behavior: "smooth"
                })
            } catch (e) {
                u.scrollTo(0, -32)
            }
    }
    function w(e, t) {
        for (u.Element.prototype.matches || (u.Element.prototype.matches = u.Element.prototype.matchesSelector || u.Element.prototype.mozMatchesSelector || u.Element.prototype.msMatchesSelector || u.Element.prototype.oMatchesSelector || u.Element.prototype.webkitMatchesSelector || function(e) {
            for (var t = (this.document || this.ownerDocument).querySelectorAll(e), n = t.length; 0 <= --n && t.item(n) !== this;)
                ;
            return -1 < n
        }); e && e !== l; e = e.parentNode)
            if (e.matches(t))
                return e;
        return null
    }
    l.addEventListener("DOMContentLoaded", function() {
        var n,
            e,
            t,
            r,
            o,
            a,
            s,
            i,
            c = l.getElementById("wpadminbar");
        if (c && "querySelectorAll" in c) {
            n = c.querySelectorAll("li.menupop"),
            e = c.querySelectorAll(".ab-item"),
            t = l.getElementById("wp-admin-bar-logout"),
            r = l.getElementById("adminbarsearch"),
            o = l.getElementById("wp-admin-bar-get-shortlink"),
            a = c.querySelector(".screen-reader-shortcut"),
            s = /Mobile\/.+Safari/.test(d.userAgent) ? "touchstart" : "click",
            y(c, "nojs"),
            "ontouchstart" in u && (l.body.addEventListener(s, function(e) {
                w(e.target, "li.menupop") || E(n)
            }), c.addEventListener("touchstart", function e() {
                for (var t = 0; t < n.length; t++)
                    n[t].addEventListener("click", h.bind(null, n));
                c.removeEventListener("touchstart", e)
            })),
            c.addEventListener("click", L);
            for (i = 0; i < n.length; i++)
                u.hoverintent(n[i], b.bind(null, n[i], "hover"), y.bind(null, n[i], "hover")).options({
                    timeout: 180
                }),
                n[i].addEventListener("keydown", f);
            for (i = 0; i < e.length; i++)
                e[i].addEventListener("keydown", m);
            r && ((s = l.getElementById("adminbar-search")).addEventListener("focus", function() {
                b(r, "adminbar-focused")
            }), s.addEventListener("blur", function() {
                y(r, "adminbar-focused")
            })),
            a && a.addEventListener("keydown", p),
            o && o.addEventListener("click", v),
            u.location.hash && u.scrollBy(0, -32),
            t && t.addEventListener("click", g)
        }
    })
}(document, window, navigator);