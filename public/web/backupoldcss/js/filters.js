/*! Arcadia Theme: Last modified: Monday, September 11th, 2017, 6:53:09 AM (by edenCreates) */

! function(a, b) {
    ! function(a, b) {
        "use strict";
        "object" == typeof module && "object" == typeof module.exports ? module.exports = a.document ? b(a, !0) : function(a) {
            if (!a.document) throw new Error("jQuery requires a window with a document");
            return b(a)
        } : b(a)
    }(void 0 !== a ? a : this, function(a, b) {
        "use strict";

        function c(a, b) {
            b = b || ba;
            var c = b.createElement("script");
            c.text = a, b.head.appendChild(c).parentNode.removeChild(c)
        }

        function d(a) {
            var b = !!a && "length" in a && a.length,
                c = oa.type(a);
            return "function" !== c && !oa.isWindow(a) && ("array" === c || 0 === b || "number" == typeof b && b > 0 && b - 1 in a)
        }

        function e(a, b, c) {
            return oa.isFunction(b) ? oa.grep(a, function(a, d) {
                return !!b.call(a, d, a) !== c
            }) : b.nodeType ? oa.grep(a, function(a) {
                return a === b !== c
            }) : "string" != typeof b ? oa.grep(a, function(a) {
                return ga.call(b, a) > -1 !== c
            }) : ya.test(b) ? oa.filter(b, a, c) : (b = oa.filter(b, a), oa.grep(a, function(a) {
                return ga.call(b, a) > -1 !== c && 1 === a.nodeType
            }))
        }

        function f(a, b) {
            for (;
                (a = a[b]) && 1 !== a.nodeType;);
            return a
        }

        function g(a) {
            var b = {};
            return oa.each(a.match(Da) || [], function(a, c) {
                b[c] = !0
            }), b
        }

        function h(a) {
            return a
        }

        function i(a) {
            throw a
        }

        function j(a, b, c) {
            var d;
            try {
                a && oa.isFunction(d = a.promise) ? d.call(a).done(b).fail(c) : a && oa.isFunction(d = a.then) ? d.call(a, b, c) : b.call(void 0, a)
            } catch (a) {
                c.call(void 0, a)
            }
        }

        function k() {
            ba.removeEventListener("DOMContentLoaded", k), a.removeEventListener("load", k), oa.ready()
        }

        function l() {
            this.expando = oa.expando + l.uid++
        }

        function m(a) {
            return "true" === a || "false" !== a && ("null" === a ? null : a === +a + "" ? +a : Ka.test(a) ? JSON.parse(a) : a)
        }

        function n(a, b, c) {
            var d;
            if (void 0 === c && 1 === a.nodeType)
                if (d = "data-" + b.replace(La, "-$&").toLowerCase(), "string" == typeof(c = a.getAttribute(d))) {
                    try {
                        c = m(c)
                    } catch (a) {}
                    Ja.set(a, b, c)
                } else c = void 0;
            return c
        }

        function o(a, b, c, d) {
            var e, f = 1,
                g = 20,
                h = d ? function() {
                    return d.cur()
                } : function() {
                    return oa.css(a, b, "")
                },
                i = h(),
                j = c && c[3] || (oa.cssNumber[b] ? "" : "px"),
                k = (oa.cssNumber[b] || "px" !== j && +i) && Na.exec(oa.css(a, b));
            if (k && k[3] !== j) {
                j = j || k[3], c = c || [], k = +i || 1;
                do {
                    f = f || ".5", k /= f, oa.style(a, b, k + j)
                } while (f !== (f = h() / i) && 1 !== f && --g)
            }
            return c && (k = +k || +i || 0, e = c[1] ? k + (c[1] + 1) * c[2] : +c[2], d && (d.unit = j, d.start = k, d.end = e)), e
        }

        function p(a) {
            var b, c = a.ownerDocument,
                d = a.nodeName,
                e = Ra[d];
            return e || (b = c.body.appendChild(c.createElement(d)), e = oa.css(b, "display"), b.parentNode.removeChild(b), "none" === e && (e = "block"), Ra[d] = e, e)
        }

        function q(a, b) {
            for (var c, d, e = [], f = 0, g = a.length; f < g; f++) d = a[f], d.style && (c = d.style.display, b ? ("none" === c && (e[f] = Ia.get(d, "display") || null, e[f] || (d.style.display = "")), "" === d.style.display && Pa(d) && (e[f] = p(d))) : "none" !== c && (e[f] = "none", Ia.set(d, "display", c)));
            for (f = 0; f < g; f++) null != e[f] && (a[f].style.display = e[f]);
            return a
        }

        function r(a, b) {
            var c;
            return c = void 0 !== a.getElementsByTagName ? a.getElementsByTagName(b || "*") : void 0 !== a.querySelectorAll ? a.querySelectorAll(b || "*") : [], void 0 === b || b && oa.nodeName(a, b) ? oa.merge([a], c) : c
        }

        function s(a, b) {
            for (var c = 0, d = a.length; c < d; c++) Ia.set(a[c], "globalEval", !b || Ia.get(b[c], "globalEval"))
        }

        function t(a, b, c, d, e) {
            for (var f, g, h, i, j, k, l = b.createDocumentFragment(), m = [], n = 0, o = a.length; n < o; n++)
                if ((f = a[n]) || 0 === f)
                    if ("object" === oa.type(f)) oa.merge(m, f.nodeType ? [f] : f);
                    else if (Wa.test(f)) {
                for (g = g || l.appendChild(b.createElement("div")), h = (Ta.exec(f) || ["", ""])[1].toLowerCase(), i = Va[h] || Va._default, g.innerHTML = i[1] + oa.htmlPrefilter(f) + i[2], k = i[0]; k--;) g = g.lastChild;
                oa.merge(m, g.childNodes), g = l.firstChild, g.textContent = ""
            } else m.push(b.createTextNode(f));
            for (l.textContent = "", n = 0; f = m[n++];)
                if (d && oa.inArray(f, d) > -1) e && e.push(f);
                else if (j = oa.contains(f.ownerDocument, f), g = r(l.appendChild(f), "script"), j && s(g), c)
                for (k = 0; f = g[k++];) Ua.test(f.type || "") && c.push(f);
            return l
        }

        function u() {
            return !0
        }

        function v() {
            return !1
        }

        function w() {
            try {
                return ba.activeElement
            } catch (a) {}
        }

        function x(a, b, c, d, e, f) {
            var g, h;
            if ("object" == typeof b) {
                "string" != typeof c && (d = d || c, c = void 0);
                for (h in b) x(a, h, c, d, b[h], f);
                return a
            }
            if (null == d && null == e ? (e = c, d = c = void 0) : null == e && ("string" == typeof c ? (e = d, d = void 0) : (e = d, d = c, c = void 0)), !1 === e) e = v;
            else if (!e) return a;
            return 1 === f && (g = e, e = function(a) {
                return oa().off(a), g.apply(this, arguments)
            }, e.guid = g.guid || (g.guid = oa.guid++)), a.each(function() {
                oa.event.add(this, b, e, d, c)
            })
        }

        function y(a, b) {
            return oa.nodeName(a, "table") && oa.nodeName(11 !== b.nodeType ? b : b.firstChild, "tr") ? a.getElementsByTagName("tbody")[0] || a : a
        }

        function z(a) {
            return a.type = (null !== a.getAttribute("type")) + "/" + a.type, a
        }

        function A(a) {
            var b = cb.exec(a.type);
            return b ? a.type = b[1] : a.removeAttribute("type"), a
        }

        function B(a, b) {
            var c, d, e, f, g, h, i, j;
            if (1 === b.nodeType) {
                if (Ia.hasData(a) && (f = Ia.access(a), g = Ia.set(b, f), j = f.events)) {
                    delete g.handle, g.events = {};
                    for (e in j)
                        for (c = 0, d = j[e].length; c < d; c++) oa.event.add(b, e, j[e][c])
                }
                Ja.hasData(a) && (h = Ja.access(a), i = oa.extend({}, h), Ja.set(b, i))
            }
        }

        function C(a, b) {
            var c = b.nodeName.toLowerCase();
            "input" === c && Sa.test(a.type) ? b.checked = a.checked : "input" !== c && "textarea" !== c || (b.defaultValue = a.defaultValue)
        }

        function D(a, b, d, e) {
            b = ea.apply([], b);
            var f, g, h, i, j, k, l = 0,
                m = a.length,
                n = m - 1,
                o = b[0],
                p = oa.isFunction(o);
            if (p || m > 1 && "string" == typeof o && !ma.checkClone && bb.test(o)) return a.each(function(c) {
                var f = a.eq(c);
                p && (b[0] = o.call(this, c, f.html())), D(f, b, d, e)
            });
            if (m && (f = t(b, a[0].ownerDocument, !1, a, e), g = f.firstChild, 1 === f.childNodes.length && (f = g), g || e)) {
                for (h = oa.map(r(f, "script"), z), i = h.length; l < m; l++) j = f, l !== n && (j = oa.clone(j, !0, !0), i && oa.merge(h, r(j, "script"))), d.call(a[l], j, l);
                if (i)
                    for (k = h[h.length - 1].ownerDocument, oa.map(h, A), l = 0; l < i; l++) j = h[l], Ua.test(j.type || "") && !Ia.access(j, "globalEval") && oa.contains(k, j) && (j.src ? oa._evalUrl && oa._evalUrl(j.src) : c(j.textContent.replace(db, ""), k))
            }
            return a
        }

        function E(a, b, c) {
            for (var d, e = b ? oa.filter(b, a) : a, f = 0; null != (d = e[f]); f++) c || 1 !== d.nodeType || oa.cleanData(r(d)), d.parentNode && (c && oa.contains(d.ownerDocument, d) && s(r(d, "script")), d.parentNode.removeChild(d));
            return a
        }

        function F(a, b, c) {
            var d, e, f, g, h = a.style;
            return c = c || gb(a), c && (g = c.getPropertyValue(b) || c[b], "" !== g || oa.contains(a.ownerDocument, a) || (g = oa.style(a, b)), !ma.pixelMarginRight() && fb.test(g) && eb.test(b) && (d = h.width, e = h.minWidth, f = h.maxWidth, h.minWidth = h.maxWidth = h.width = g, g = c.width, h.width = d, h.minWidth = e, h.maxWidth = f)), void 0 !== g ? g + "" : g
        }

        function G(a, b) {
            return {
                get: function() {
                    return a() ? void delete this.get : (this.get = b).apply(this, arguments)
                }
            }
        }

        function H(a) {
            if (a in lb) return a;
            for (var b = a[0].toUpperCase() + a.slice(1), c = kb.length; c--;)
                if ((a = kb[c] + b) in lb) return a
        }

        function I(a, b, c) {
            var d = Na.exec(b);
            return d ? Math.max(0, d[2] - (c || 0)) + (d[3] || "px") : b
        }

        function J(a, b, c, d, e) {
            var f, g = 0;
            for (f = c === (d ? "border" : "content") ? 4 : "width" === b ? 1 : 0; f < 4; f += 2) "margin" === c && (g += oa.css(a, c + Oa[f], !0, e)), d ? ("content" === c && (g -= oa.css(a, "padding" + Oa[f], !0, e)), "margin" !== c && (g -= oa.css(a, "border" + Oa[f] + "Width", !0, e))) : (g += oa.css(a, "padding" + Oa[f], !0, e), "padding" !== c && (g += oa.css(a, "border" + Oa[f] + "Width", !0, e)));
            return g
        }

        function K(a, b, c) {
            var d, e = !0,
                f = gb(a),
                g = "border-box" === oa.css(a, "boxSizing", !1, f);
            if (a.getClientRects().length && (d = a.getBoundingClientRect()[b]), d <= 0 || null == d) {
                if (d = F(a, b, f), (d < 0 || null == d) && (d = a.style[b]), fb.test(d)) return d;
                e = g && (ma.boxSizingReliable() || d === a.style[b]), d = parseFloat(d) || 0
            }
            return d + J(a, b, c || (g ? "border" : "content"), e, f) + "px"
        }

        function L(a, b, c, d, e) {
            return new L.prototype.init(a, b, c, d, e)
        }

        function M() {
            nb && (a.requestAnimationFrame(M), oa.fx.tick())
        }

        function N() {
            return a.setTimeout(function() {
                mb = void 0
            }), mb = oa.now()
        }

        function O(a, b) {
            var c, d = 0,
                e = {
                    height: a
                };
            for (b = b ? 1 : 0; d < 4; d += 2 - b) c = Oa[d], e["margin" + c] = e["padding" + c] = a;
            return b && (e.opacity = e.width = a), e
        }

        function P(a, b, c) {
            for (var d, e = (S.tweeners[b] || []).concat(S.tweeners["*"]), f = 0, g = e.length; f < g; f++)
                if (d = e[f].call(c, b, a)) return d
        }

        function Q(a, b, c) {
            var d, e, f, g, h, i, j, k, l = "width" in b || "height" in b,
                m = this,
                n = {},
                o = a.style,
                p = a.nodeType && Pa(a),
                r = Ia.get(a, "fxshow");
            c.queue || (g = oa._queueHooks(a, "fx"), null == g.unqueued && (g.unqueued = 0, h = g.empty.fire, g.empty.fire = function() {
                g.unqueued || h()
            }), g.unqueued++, m.always(function() {
                m.always(function() {
                    g.unqueued--, oa.queue(a, "fx").length || g.empty.fire()
                })
            }));
            for (d in b)
                if (e = b[d], ob.test(e)) {
                    if (delete b[d], f = f || "toggle" === e, e === (p ? "hide" : "show")) {
                        if ("show" !== e || !r || void 0 === r[d]) continue;
                        p = !0
                    }
                    n[d] = r && r[d] || oa.style(a, d)
                }
            if ((i = !oa.isEmptyObject(b)) || !oa.isEmptyObject(n)) {
                l && 1 === a.nodeType && (c.overflow = [o.overflow, o.overflowX, o.overflowY], j = r && r.display, null == j && (j = Ia.get(a, "display")), k = oa.css(a, "display"), "none" === k && (j ? k = j : (q([a], !0), j = a.style.display || j, k = oa.css(a, "display"), q([a]))), ("inline" === k || "inline-block" === k && null != j) && "none" === oa.css(a, "float") && (i || (m.done(function() {
                    o.display = j
                }), null == j && (k = o.display, j = "none" === k ? "" : k)), o.display = "inline-block")), c.overflow && (o.overflow = "hidden", m.always(function() {
                    o.overflow = c.overflow[0], o.overflowX = c.overflow[1], o.overflowY = c.overflow[2]
                })), i = !1;
                for (d in n) i || (r ? "hidden" in r && (p = r.hidden) : r = Ia.access(a, "fxshow", {
                    display: j
                }), f && (r.hidden = !p), p && q([a], !0), m.done(function() {
                    p || q([a]), Ia.remove(a, "fxshow");
                    for (d in n) oa.style(a, d, n[d])
                })), i = P(p ? r[d] : 0, d, m), d in r || (r[d] = i.start, p && (i.end = i.start, i.start = 0))
            }
        }

        function R(a, b) {
            var c, d, e, f, g;
            for (c in a)
                if (d = oa.camelCase(c), e = b[d], f = a[c], oa.isArray(f) && (e = f[1], f = a[c] = f[0]), c !== d && (a[d] = f, delete a[c]), (g = oa.cssHooks[d]) && "expand" in g) {
                    f = g.expand(f), delete a[d];
                    for (c in f) c in a || (a[c] = f[c], b[c] = e)
                } else b[d] = e
        }

        function S(a, b, c) {
            var d, e, f = 0,
                g = S.prefilters.length,
                h = oa.Deferred().always(function() {
                    delete i.elem
                }),
                i = function() {
                    if (e) return !1;
                    for (var b = mb || N(), c = Math.max(0, j.startTime + j.duration - b), d = c / j.duration || 0, f = 1 - d, g = 0, i = j.tweens.length; g < i; g++) j.tweens[g].run(f);
                    return h.notifyWith(a, [j, f, c]), f < 1 && i ? c : (h.resolveWith(a, [j]), !1)
                },
                j = h.promise({
                    elem: a,
                    props: oa.extend({}, b),
                    opts: oa.extend(!0, {
                        specialEasing: {},
                        easing: oa.easing._default
                    }, c),
                    originalProperties: b,
                    originalOptions: c,
                    startTime: mb || N(),
                    duration: c.duration,
                    tweens: [],
                    createTween: function(b, c) {
                        var d = oa.Tween(a, j.opts, b, c, j.opts.specialEasing[b] || j.opts.easing);
                        return j.tweens.push(d), d
                    },
                    stop: function(b) {
                        var c = 0,
                            d = b ? j.tweens.length : 0;
                        if (e) return this;
                        for (e = !0; c < d; c++) j.tweens[c].run(1);
                        return b ? (h.notifyWith(a, [j, 1, 0]), h.resolveWith(a, [j, b])) : h.rejectWith(a, [j, b]), this
                    }
                }),
                k = j.props;
            for (R(k, j.opts.specialEasing); f < g; f++)
                if (d = S.prefilters[f].call(j, a, k, j.opts)) return oa.isFunction(d.stop) && (oa._queueHooks(j.elem, j.opts.queue).stop = oa.proxy(d.stop, d)), d;
            return oa.map(k, P, j), oa.isFunction(j.opts.start) && j.opts.start.call(a, j), oa.fx.timer(oa.extend(i, {
                elem: a,
                anim: j,
                queue: j.opts.queue
            })), j.progress(j.opts.progress).done(j.opts.done, j.opts.complete).fail(j.opts.fail).always(j.opts.always)
        }

        function T(a) {
            return (a.match(Da) || []).join(" ")
        }

        function U(a) {
            return a.getAttribute && a.getAttribute("class") || ""
        }

        function V(a, b, c, d) {
            var e;
            if (oa.isArray(b)) oa.each(b, function(b, e) {
                c || zb.test(a) ? d(a, e) : V(a + "[" + ("object" == typeof e && null != e ? b : "") + "]", e, c, d)
            });
            else if (c || "object" !== oa.type(b)) d(a, b);
            else
                for (e in b) V(a + "[" + e + "]", b[e], c, d)
        }

        function W(a) {
            return function(b, c) {
                "string" != typeof b && (c = b, b = "*");
                var d, e = 0,
                    f = b.toLowerCase().match(Da) || [];
                if (oa.isFunction(c))
                    for (; d = f[e++];) "+" === d[0] ? (d = d.slice(1) || "*", (a[d] = a[d] || []).unshift(c)) : (a[d] = a[d] || []).push(c)
            }
        }

        function X(a, b, c, d) {
            function e(h) {
                var i;
                return f[h] = !0, oa.each(a[h] || [], function(a, h) {
                    var j = h(b, c, d);
                    return "string" != typeof j || g || f[j] ? g ? !(i = j) : void 0 : (b.dataTypes.unshift(j), e(j), !1)
                }), i
            }
            var f = {},
                g = a === Lb;
            return e(b.dataTypes[0]) || !f["*"] && e("*")
        }

        function Y(a, b) {
            var c, d, e = oa.ajaxSettings.flatOptions || {};
            for (c in b) void 0 !== b[c] && ((e[c] ? a : d || (d = {}))[c] = b[c]);
            return d && oa.extend(!0, a, d), a
        }

        function Z(a, b, c) {
            for (var d, e, f, g, h = a.contents, i = a.dataTypes;
                "*" === i[0];) i.shift(), void 0 === d && (d = a.mimeType || b.getResponseHeader("Content-Type"));
            if (d)
                for (e in h)
                    if (h[e] && h[e].test(d)) {
                        i.unshift(e);
                        break
                    }
            if (i[0] in c) f = i[0];
            else {
                for (e in c) {
                    if (!i[0] || a.converters[e + " " + i[0]]) {
                        f = e;
                        break
                    }
                    g || (g = e)
                }
                f = f || g
            }
            if (f) return f !== i[0] && i.unshift(f), c[f]
        }

        function $(a, b, c, d) {
            var e, f, g, h, i, j = {},
                k = a.dataTypes.slice();
            if (k[1])
                for (g in a.converters) j[g.toLowerCase()] = a.converters[g];
            for (f = k.shift(); f;)
                if (a.responseFields[f] && (c[a.responseFields[f]] = b), !i && d && a.dataFilter && (b = a.dataFilter(b, a.dataType)), i = f, f = k.shift())
                    if ("*" === f) f = i;
                    else if ("*" !== i && i !== f) {
                if (!(g = j[i + " " + f] || j["* " + f]))
                    for (e in j)
                        if (h = e.split(" "), h[1] === f && (g = j[i + " " + h[0]] || j["* " + h[0]])) {
                            !0 === g ? g = j[e] : !0 !== j[e] && (f = h[0], k.unshift(h[1]));
                            break
                        }
                if (!0 !== g)
                    if (g && a.throws) b = g(b);
                    else try {
                        b = g(b)
                    } catch (a) {
                        return {
                            state: "parsererror",
                            error: g ? a : "No conversion from " + i + " to " + f
                        }
                    }
            }
            return {
                state: "success",
                data: b
            }
        }

        function _(a) {
            return oa.isWindow(a) ? a : 9 === a.nodeType && a.defaultView
        }
        var aa = [],
            ba = a.document,
            ca = Object.getPrototypeOf,
            da = aa.slice,
            ea = aa.concat,
            fa = aa.push,
            ga = aa.indexOf,
            ha = {},
            ia = ha.toString,
            ja = ha.hasOwnProperty,
            ka = ja.toString,
            la = ka.call(Object),
            ma = {},
            na = "3.1.1",
            oa = function(a, b) {
                return new oa.fn.init(a, b)
            },
            pa = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,
            qa = /^-ms-/,
            ra = /-([a-z])/g,
            sa = function(a, b) {
                return b.toUpperCase()
            };
        oa.fn = oa.prototype = {
            jquery: na,
            constructor: oa,
            length: 0,
            toArray: function() {
                return da.call(this)
            },
            get: function(a) {
                return null == a ? da.call(this) : a < 0 ? this[a + this.length] : this[a]
            },
            pushStack: function(a) {
                var b = oa.merge(this.constructor(), a);
                return b.prevObject = this, b
            },
            each: function(a) {
                return oa.each(this, a)
            },
            map: function(a) {
                return this.pushStack(oa.map(this, function(b, c) {
                    return a.call(b, c, b)
                }))
            },
            slice: function() {
                return this.pushStack(da.apply(this, arguments))
            },
            first: function() {
                return this.eq(0)
            },
            last: function() {
                return this.eq(-1)
            },
            eq: function(a) {
                var b = this.length,
                    c = +a + (a < 0 ? b : 0);
                return this.pushStack(c >= 0 && c < b ? [this[c]] : [])
            },
            end: function() {
                return this.prevObject || this.constructor()
            },
            push: fa,
            sort: aa.sort,
            splice: aa.splice
        }, oa.extend = oa.fn.extend = function() {
            var a, b, c, d, e, f, g = arguments[0] || {},
                h = 1,
                i = arguments.length,
                j = !1;
            for ("boolean" == typeof g && (j = g, g = arguments[h] || {}, h++), "object" == typeof g || oa.isFunction(g) || (g = {}), h === i && (g = this, h--); h < i; h++)
                if (null != (a = arguments[h]))
                    for (b in a) c = g[b], d = a[b], g !== d && (j && d && (oa.isPlainObject(d) || (e = oa.isArray(d))) ? (e ? (e = !1, f = c && oa.isArray(c) ? c : []) : f = c && oa.isPlainObject(c) ? c : {}, g[b] = oa.extend(j, f, d)) : void 0 !== d && (g[b] = d));
            return g
        }, oa.extend({
            expando: "jQuery" + (na + Math.random()).replace(/\D/g, ""),
            isReady: !0,
            error: function(a) {
                throw new Error(a)
            },
            noop: function() {},
            isFunction: function(a) {
                return "function" === oa.type(a)
            },
            isArray: Array.isArray,
            isWindow: function(a) {
                return null != a && a === a.window
            },
            isNumeric: function(a) {
                var b = oa.type(a);
                return ("number" === b || "string" === b) && !isNaN(a - parseFloat(a))
            },
            isPlainObject: function(a) {
                var b, c;
                return !(!a || "[object Object]" !== ia.call(a) || (b = ca(a)) && ("function" != typeof(c = ja.call(b, "constructor") && b.constructor) || ka.call(c) !== la))
            },
            isEmptyObject: function(a) {
                var b;
                for (b in a) return !1;
                return !0
            },
            type: function(a) {
                return null == a ? a + "" : "object" == typeof a || "function" == typeof a ? ha[ia.call(a)] || "object" : typeof a
            },
            globalEval: function(a) {
                c(a)
            },
            camelCase: function(a) {
                return a.replace(qa, "ms-").replace(ra, sa)
            },
            nodeName: function(a, b) {
                return a.nodeName && a.nodeName.toLowerCase() === b.toLowerCase()
            },
            each: function(a, b) {
                var c, e = 0;
                if (d(a))
                    for (c = a.length; e < c && !1 !== b.call(a[e], e, a[e]); e++);
                else
                    for (e in a)
                        if (!1 === b.call(a[e], e, a[e])) break; return a
            },
            trim: function(a) {
                return null == a ? "" : (a + "").replace(pa, "")
            },
            makeArray: function(a, b) {
                var c = b || [];
                return null != a && (d(Object(a)) ? oa.merge(c, "string" == typeof a ? [a] : a) : fa.call(c, a)), c
            },
            inArray: function(a, b, c) {
                return null == b ? -1 : ga.call(b, a, c)
            },
            merge: function(a, b) {
                for (var c = +b.length, d = 0, e = a.length; d < c; d++) a[e++] = b[d];
                return a.length = e, a
            },
            grep: function(a, b, c) {
                for (var d = [], e = 0, f = a.length, g = !c; e < f; e++) !b(a[e], e) !== g && d.push(a[e]);
                return d
            },
            map: function(a, b, c) {
                var e, f, g = 0,
                    h = [];
                if (d(a))
                    for (e = a.length; g < e; g++) null != (f = b(a[g], g, c)) && h.push(f);
                else
                    for (g in a) null != (f = b(a[g], g, c)) && h.push(f);
                return ea.apply([], h)
            },
            guid: 1,
            proxy: function(a, b) {
                var c, d, e;
                if ("string" == typeof b && (c = a[b], b = a, a = c), oa.isFunction(a)) return d = da.call(arguments, 2), e = function() {
                    return a.apply(b || this, d.concat(da.call(arguments)))
                }, e.guid = a.guid = a.guid || oa.guid++, e
            },
            now: Date.now,
            support: ma
        }), "function" == typeof Symbol && (oa.fn[Symbol.iterator] = aa[Symbol.iterator]), oa.each("Boolean Number String Function Array Date RegExp Object Error Symbol".split(" "), function(a, b) {
            ha["[object " + b + "]"] = b.toLowerCase()
        });
        var ta = function(a) {
            function b(a, b, c, d) {
                var e, f, g, h, i, k, m, n = b && b.ownerDocument,
                    o = b ? b.nodeType : 9;
                if (c = c || [], "string" != typeof a || !a || 1 !== o && 9 !== o && 11 !== o) return c;
                if (!d && ((b ? b.ownerDocument || b : N) !== F && E(b), b = b || F, H)) {
                    if (11 !== o && (i = pa.exec(a)))
                        if (e = i[1]) {
                            if (9 === o) {
                                if (!(g = b.getElementById(e))) return c;
                                if (g.id === e) return c.push(g), c
                            } else if (n && (g = n.getElementById(e)) && L(b, g) && g.id === e) return c.push(g), c
                        } else {
                            if (i[2]) return Y.apply(c, b.getElementsByTagName(a)), c;
                            if ((e = i[3]) && u.getElementsByClassName && b.getElementsByClassName) return Y.apply(c, b.getElementsByClassName(e)), c
                        }
                    if (u.qsa && !S[a + " "] && (!I || !I.test(a))) {
                        if (1 !== o) n = b, m = a;
                        else if ("object" !== b.nodeName.toLowerCase()) {
                            for ((h = b.getAttribute("id")) ? h = h.replace(ta, ua) : b.setAttribute("id", h = M), k = y(a), f = k.length; f--;) k[f] = "#" + h + " " + l(k[f]);
                            m = k.join(","), n = qa.test(a) && j(b.parentNode) || b
                        }
                        if (m) try {
                            return Y.apply(c, n.querySelectorAll(m)), c
                        } catch (a) {} finally {
                            h === M && b.removeAttribute("id")
                        }
                    }
                }
                return A(a.replace(fa, "$1"), b, c, d)
            }

            function c() {
                function a(c, d) {
                    return b.push(c + " ") > v.cacheLength && delete a[b.shift()], a[c + " "] = d
                }
                var b = [];
                return a
            }

            function d(a) {
                return a[M] = !0, a
            }

            function e(a) {
                var b = F.createElement("fieldset");
                try {
                    return !!a(b)
                } catch (a) {
                    return !1
                } finally {
                    b.parentNode && b.parentNode.removeChild(b), b = null
                }
            }

            function f(a, b) {
                for (var c = a.split("|"), d = c.length; d--;) v.attrHandle[c[d]] = b
            }

            function g(a, b) {
                var c = b && a,
                    d = c && 1 === a.nodeType && 1 === b.nodeType && a.sourceIndex - b.sourceIndex;
                if (d) return d;
                if (c)
                    for (; c = c.nextSibling;)
                        if (c === b) return -1;
                return a ? 1 : -1
            }

            function h(a) {
                return function(b) {
                    return "form" in b ? b.parentNode && !1 === b.disabled ? "label" in b ? "label" in b.parentNode ? b.parentNode.disabled === a : b.disabled === a : b.isDisabled === a || b.isDisabled !== !a && wa(b) === a : b.disabled === a : "label" in b && b.disabled === a
                }
            }

            function i(a) {
                return d(function(b) {
                    return b = +b, d(function(c, d) {
                        for (var e, f = a([], c.length, b), g = f.length; g--;) c[e = f[g]] && (c[e] = !(d[e] = c[e]))
                    })
                })
            }

            function j(a) {
                return a && void 0 !== a.getElementsByTagName && a
            }

            function k() {}

            function l(a) {
                for (var b = 0, c = a.length, d = ""; b < c; b++) d += a[b].value;
                return d
            }

            function m(a, b, c) {
                var d = b.dir,
                    e = b.next,
                    f = e || d,
                    g = c && "parentNode" === f,
                    h = P++;
                return b.first ? function(b, c, e) {
                    for (; b = b[d];)
                        if (1 === b.nodeType || g) return a(b, c, e);
                    return !1
                } : function(b, c, i) {
                    var j, k, l, m = [O, h];
                    if (i) {
                        for (; b = b[d];)
                            if ((1 === b.nodeType || g) && a(b, c, i)) return !0
                    } else
                        for (; b = b[d];)
                            if (1 === b.nodeType || g)
                                if (l = b[M] || (b[M] = {}), k = l[b.uniqueID] || (l[b.uniqueID] = {}), e && e === b.nodeName.toLowerCase()) b = b[d] || b;
                                else {
                                    if ((j = k[f]) && j[0] === O && j[1] === h) return m[2] = j[2];
                                    if (k[f] = m, m[2] = a(b, c, i)) return !0
                                } return !1
                }
            }

            function n(a) {
                return a.length > 1 ? function(b, c, d) {
                    for (var e = a.length; e--;)
                        if (!a[e](b, c, d)) return !1;
                    return !0
                } : a[0]
            }

            function o(a, c, d) {
                for (var e = 0, f = c.length; e < f; e++) b(a, c[e], d);
                return d
            }

            function p(a, b, c, d, e) {
                for (var f, g = [], h = 0, i = a.length, j = null != b; h < i; h++)(f = a[h]) && (c && !c(f, d, e) || (g.push(f), j && b.push(h)));
                return g
            }

            function q(a, b, c, e, f, g) {
                return e && !e[M] && (e = q(e)), f && !f[M] && (f = q(f, g)), d(function(d, g, h, i) {
                    var j, k, l, m = [],
                        n = [],
                        q = g.length,
                        r = d || o(b || "*", h.nodeType ? [h] : h, []),
                        s = !a || !d && b ? r : p(r, m, a, h, i),
                        t = c ? f || (d ? a : q || e) ? [] : g : s;
                    if (c && c(s, t, h, i), e)
                        for (j = p(t, n), e(j, [], h, i), k = j.length; k--;)(l = j[k]) && (t[n[k]] = !(s[n[k]] = l));
                    if (d) {
                        if (f || a) {
                            if (f) {
                                for (j = [], k = t.length; k--;)(l = t[k]) && j.push(s[k] = l);
                                f(null, t = [], j, i)
                            }
                            for (k = t.length; k--;)(l = t[k]) && (j = f ? $(d, l) : m[k]) > -1 && (d[j] = !(g[j] = l))
                        }
                    } else t = p(t === g ? t.splice(q, t.length) : t), f ? f(null, g, t, i) : Y.apply(g, t)
                })
            }

            function r(a) {
                for (var b, c, d, e = a.length, f = v.relative[a[0].type], g = f || v.relative[" "], h = f ? 1 : 0, i = m(function(a) {
                        return a === b
                    }, g, !0), j = m(function(a) {
                        return $(b, a) > -1
                    }, g, !0), k = [function(a, c, d) {
                        var e = !f && (d || c !== B) || ((b = c).nodeType ? i(a, c, d) : j(a, c, d));
                        return b = null, e
                    }]; h < e; h++)
                    if (c = v.relative[a[h].type]) k = [m(n(k), c)];
                    else {
                        if (c = v.filter[a[h].type].apply(null, a[h].matches), c[M]) {
                            for (d = ++h; d < e && !v.relative[a[d].type]; d++);
                            return q(h > 1 && n(k), h > 1 && l(a.slice(0, h - 1).concat({
                                value: " " === a[h - 2].type ? "*" : ""
                            })).replace(fa, "$1"), c, h < d && r(a.slice(h, d)), d < e && r(a = a.slice(d)), d < e && l(a))
                        }
                        k.push(c)
                    }
                return n(k)
            }

            function s(a, c) {
                var e = c.length > 0,
                    f = a.length > 0,
                    g = function(d, g, h, i, j) {
                        var k, l, m, n = 0,
                            o = "0",
                            q = d && [],
                            r = [],
                            s = B,
                            t = d || f && v.find.TAG("*", j),
                            u = O += null == s ? 1 : Math.random() || .1,
                            w = t.length;
                        for (j && (B = g === F || g || j); o !== w && null != (k = t[o]); o++) {
                            if (f && k) {
                                for (l = 0, g || k.ownerDocument === F || (E(k), h = !H); m = a[l++];)
                                    if (m(k, g || F, h)) {
                                        i.push(k);
                                        break
                                    }
                                j && (O = u)
                            }
                            e && ((k = !m && k) && n--, d && q.push(k))
                        }
                        if (n += o, e && o !== n) {
                            for (l = 0; m = c[l++];) m(q, r, g, h);
                            if (d) {
                                if (n > 0)
                                    for (; o--;) q[o] || r[o] || (r[o] = W.call(i));
                                r = p(r)
                            }
                            Y.apply(i, r), j && !d && r.length > 0 && n + c.length > 1 && b.uniqueSort(i)
                        }
                        return j && (O = u, B = s), q
                    };
                return e ? d(g) : g
            }
            var t, u, v, w, x, y, z, A, B, C, D, E, F, G, H, I, J, K, L, M = "sizzle" + 1 * new Date,
                N = a.document,
                O = 0,
                P = 0,
                Q = c(),
                R = c(),
                S = c(),
                T = function(a, b) {
                    return a === b && (D = !0), 0
                },
                U = {}.hasOwnProperty,
                V = [],
                W = V.pop,
                X = V.push,
                Y = V.push,
                Z = V.slice,
                $ = function(a, b) {
                    for (var c = 0, d = a.length; c < d; c++)
                        if (a[c] === b) return c;
                    return -1
                },
                _ = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",
                aa = "[\\x20\\t\\r\\n\\f]",
                ba = "(?:\\\\.|[\\w-]|[^\0-\\xa0])+",
                ca = "\\[" + aa + "*(" + ba + ")(?:" + aa + "*([*^$|!~]?=)" + aa + "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" + ba + "))|)" + aa + "*\\]",
                da = ":(" + ba + ")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|" + ca + ")*)|.*)\\)|)",
                ea = new RegExp(aa + "+", "g"),
                fa = new RegExp("^" + aa + "+|((?:^|[^\\\\])(?:\\\\.)*)" + aa + "+$", "g"),
                ga = new RegExp("^" + aa + "*," + aa + "*"),
                ha = new RegExp("^" + aa + "*([>+~]|" + aa + ")" + aa + "*"),
                ia = new RegExp("=" + aa + "*([^\\]'\"]*?)" + aa + "*\\]", "g"),
                ja = new RegExp(da),
                ka = new RegExp("^" + ba + "$"),
                la = {
                    ID: new RegExp("^#(" + ba + ")"),
                    CLASS: new RegExp("^\\.(" + ba + ")"),
                    TAG: new RegExp("^(" + ba + "|[*])"),
                    ATTR: new RegExp("^" + ca),
                    PSEUDO: new RegExp("^" + da),
                    CHILD: new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + aa + "*(even|odd|(([+-]|)(\\d*)n|)" + aa + "*(?:([+-]|)" + aa + "*(\\d+)|))" + aa + "*\\)|)", "i"),
                    bool: new RegExp("^(?:" + _ + ")$", "i"),
                    needsContext: new RegExp("^" + aa + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + aa + "*((?:-\\d)?\\d*)" + aa + "*\\)|)(?=[^-]|$)", "i")
                },
                ma = /^(?:input|select|textarea|button)$/i,
                na = /^h\d$/i,
                oa = /^[^{]+\{\s*\[native \w/,
                pa = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,
                qa = /[+~]/,
                ra = new RegExp("\\\\([\\da-f]{1,6}" + aa + "?|(" + aa + ")|.)", "ig"),
                sa = function(a, b, c) {
                    var d = "0x" + b - 65536;
                    return d !== d || c ? b : d < 0 ? String.fromCharCode(d + 65536) : String.fromCharCode(d >> 10 | 55296, 1023 & d | 56320)
                },
                ta = /([\0-\x1f\x7f]|^-?\d)|^-$|[^\0-\x1f\x7f-\uFFFF\w-]/g,
                ua = function(a, b) {
                    return b ? "\0" === a ? "�" : a.slice(0, -1) + "\\" + a.charCodeAt(a.length - 1).toString(16) + " " : "\\" + a
                },
                va = function() {
                    E()
                },
                wa = m(function(a) {
                    return !0 === a.disabled && ("form" in a || "label" in a)
                }, {
                    dir: "parentNode",
                    next: "legend"
                });
            try {
                Y.apply(V = Z.call(N.childNodes), N.childNodes), V[N.childNodes.length].nodeType
            } catch (a) {
                Y = {
                    apply: V.length ? function(a, b) {
                        X.apply(a, Z.call(b))
                    } : function(a, b) {
                        for (var c = a.length, d = 0; a[c++] = b[d++];);
                        a.length = c - 1
                    }
                }
            }
            u = b.support = {}, x = b.isXML = function(a) {
                var b = a && (a.ownerDocument || a).documentElement;
                return !!b && "HTML" !== b.nodeName
            }, E = b.setDocument = function(a) {
                var b, c, d = a ? a.ownerDocument || a : N;
                return d !== F && 9 === d.nodeType && d.documentElement ? (F = d, G = F.documentElement, H = !x(F), N !== F && (c = F.defaultView) && c.top !== c && (c.addEventListener ? c.addEventListener("unload", va, !1) : c.attachEvent && c.attachEvent("onunload", va)), u.attributes = e(function(a) {
                    return a.className = "i", !a.getAttribute("className")
                }), u.getElementsByTagName = e(function(a) {
                    return a.appendChild(F.createComment("")), !a.getElementsByTagName("*").length
                }), u.getElementsByClassName = oa.test(F.getElementsByClassName), u.getById = e(function(a) {
                    return G.appendChild(a).id = M, !F.getElementsByName || !F.getElementsByName(M).length
                }), u.getById ? (v.filter.ID = function(a) {
                    var b = a.replace(ra, sa);
                    return function(a) {
                        return a.getAttribute("id") === b
                    }
                }, v.find.ID = function(a, b) {
                    if (void 0 !== b.getElementById && H) {
                        var c = b.getElementById(a);
                        return c ? [c] : []
                    }
                }) : (v.filter.ID = function(a) {
                    var b = a.replace(ra, sa);
                    return function(a) {
                        var c = void 0 !== a.getAttributeNode && a.getAttributeNode("id");
                        return c && c.value === b
                    }
                }, v.find.ID = function(a, b) {
                    if (void 0 !== b.getElementById && H) {
                        var c, d, e, f = b.getElementById(a);
                        if (f) {
                            if ((c = f.getAttributeNode("id")) && c.value === a) return [f];
                            for (e = b.getElementsByName(a), d = 0; f = e[d++];)
                                if ((c = f.getAttributeNode("id")) && c.value === a) return [f]
                        }
                        return []
                    }
                }), v.find.TAG = u.getElementsByTagName ? function(a, b) {
                    return void 0 !== b.getElementsByTagName ? b.getElementsByTagName(a) : u.qsa ? b.querySelectorAll(a) : void 0
                } : function(a, b) {
                    var c, d = [],
                        e = 0,
                        f = b.getElementsByTagName(a);
                    if ("*" === a) {
                        for (; c = f[e++];) 1 === c.nodeType && d.push(c);
                        return d
                    }
                    return f
                }, v.find.CLASS = u.getElementsByClassName && function(a, b) {
                    if (void 0 !== b.getElementsByClassName && H) return b.getElementsByClassName(a)
                }, J = [], I = [], (u.qsa = oa.test(F.querySelectorAll)) && (e(function(a) {
                    G.appendChild(a).innerHTML = "<a id='" + M + "'></a><select id='" + M + "-\r\\' msallowcapture=''><option selected=''></option></select>", a.querySelectorAll("[msallowcapture^='']").length && I.push("[*^$]=" + aa + "*(?:''|\"\")"), a.querySelectorAll("[selected]").length || I.push("\\[" + aa + "*(?:value|" + _ + ")"), a.querySelectorAll("[id~=" + M + "-]").length || I.push("~="), a.querySelectorAll(":checked").length || I.push(":checked"), a.querySelectorAll("a#" + M + "+*").length || I.push(".#.+[+~]")
                }), e(function(a) {
                    a.innerHTML = "<a href='' disabled='disabled'></a><select disabled='disabled'><option/></select>";
                    var b = F.createElement("input");
                    b.setAttribute("type", "hidden"), a.appendChild(b).setAttribute("name", "D"), a.querySelectorAll("[name=d]").length && I.push("name" + aa + "*[*^$|!~]?="), 2 !== a.querySelectorAll(":enabled").length && I.push(":enabled", ":disabled"), G.appendChild(a).disabled = !0, 2 !== a.querySelectorAll(":disabled").length && I.push(":enabled", ":disabled"), a.querySelectorAll("*,:x"), I.push(",.*:")
                })), (u.matchesSelector = oa.test(K = G.matches || G.webkitMatchesSelector || G.mozMatchesSelector || G.oMatchesSelector || G.msMatchesSelector)) && e(function(a) {
                    u.disconnectedMatch = K.call(a, "*"), K.call(a, "[s!='']:x"), J.push("!=", da)
                }), I = I.length && new RegExp(I.join("|")), J = J.length && new RegExp(J.join("|")), b = oa.test(G.compareDocumentPosition), L = b || oa.test(G.contains) ? function(a, b) {
                    var c = 9 === a.nodeType ? a.documentElement : a,
                        d = b && b.parentNode;
                    return a === d || !(!d || 1 !== d.nodeType || !(c.contains ? c.contains(d) : a.compareDocumentPosition && 16 & a.compareDocumentPosition(d)))
                } : function(a, b) {
                    if (b)
                        for (; b = b.parentNode;)
                            if (b === a) return !0;
                    return !1
                }, T = b ? function(a, b) {
                    if (a === b) return D = !0, 0;
                    var c = !a.compareDocumentPosition - !b.compareDocumentPosition;
                    return c || (c = (a.ownerDocument || a) === (b.ownerDocument || b) ? a.compareDocumentPosition(b) : 1, 1 & c || !u.sortDetached && b.compareDocumentPosition(a) === c ? a === F || a.ownerDocument === N && L(N, a) ? -1 : b === F || b.ownerDocument === N && L(N, b) ? 1 : C ? $(C, a) - $(C, b) : 0 : 4 & c ? -1 : 1)
                } : function(a, b) {
                    if (a === b) return D = !0, 0;
                    var c, d = 0,
                        e = a.parentNode,
                        f = b.parentNode,
                        h = [a],
                        i = [b];
                    if (!e || !f) return a === F ? -1 : b === F ? 1 : e ? -1 : f ? 1 : C ? $(C, a) - $(C, b) : 0;
                    if (e === f) return g(a, b);
                    for (c = a; c = c.parentNode;) h.unshift(c);
                    for (c = b; c = c.parentNode;) i.unshift(c);
                    for (; h[d] === i[d];) d++;
                    return d ? g(h[d], i[d]) : h[d] === N ? -1 : i[d] === N ? 1 : 0
                }, F) : F
            }, b.matches = function(a, c) {
                return b(a, null, null, c)
            }, b.matchesSelector = function(a, c) {
                if ((a.ownerDocument || a) !== F && E(a), c = c.replace(ia, "='$1']"), u.matchesSelector && H && !S[c + " "] && (!J || !J.test(c)) && (!I || !I.test(c))) try {
                    var d = K.call(a, c);
                    if (d || u.disconnectedMatch || a.document && 11 !== a.document.nodeType) return d
                } catch (a) {}
                return b(c, F, null, [a]).length > 0
            }, b.contains = function(a, b) {
                return (a.ownerDocument || a) !== F && E(a), L(a, b)
            }, b.attr = function(a, b) {
                (a.ownerDocument || a) !== F && E(a);
                var c = v.attrHandle[b.toLowerCase()],
                    d = c && U.call(v.attrHandle, b.toLowerCase()) ? c(a, b, !H) : void 0;
                return void 0 !== d ? d : u.attributes || !H ? a.getAttribute(b) : (d = a.getAttributeNode(b)) && d.specified ? d.value : null
            }, b.escape = function(a) {
                return (a + "").replace(ta, ua)
            }, b.error = function(a) {
                throw new Error("Syntax error, unrecognized expression: " + a)
            }, b.uniqueSort = function(a) {
                var b, c = [],
                    d = 0,
                    e = 0;
                if (D = !u.detectDuplicates, C = !u.sortStable && a.slice(0), a.sort(T), D) {
                    for (; b = a[e++];) b === a[e] && (d = c.push(e));
                    for (; d--;) a.splice(c[d], 1)
                }
                return C = null, a
            }, w = b.getText = function(a) {
                var b, c = "",
                    d = 0,
                    e = a.nodeType;
                if (e) {
                    if (1 === e || 9 === e || 11 === e) {
                        if ("string" == typeof a.textContent) return a.textContent;
                        for (a = a.firstChild; a; a = a.nextSibling) c += w(a)
                    } else if (3 === e || 4 === e) return a.nodeValue
                } else
                    for (; b = a[d++];) c += w(b);
                return c
            }, v = b.selectors = {
                cacheLength: 50,
                createPseudo: d,
                match: la,
                attrHandle: {},
                find: {},
                relative: {
                    ">": {
                        dir: "parentNode",
                        first: !0
                    },
                    " ": {
                        dir: "parentNode"
                    },
                    "+": {
                        dir: "previousSibling",
                        first: !0
                    },
                    "~": {
                        dir: "previousSibling"
                    }
                },
                preFilter: {
                    ATTR: function(a) {
                        return a[1] = a[1].replace(ra, sa), a[3] = (a[3] || a[4] || a[5] || "").replace(ra, sa), "~=" === a[2] && (a[3] = " " + a[3] + " "), a.slice(0, 4)
                    },
                    CHILD: function(a) {
                        return a[1] = a[1].toLowerCase(), "nth" === a[1].slice(0, 3) ? (a[3] || b.error(a[0]), a[4] = +(a[4] ? a[5] + (a[6] || 1) : 2 * ("even" === a[3] || "odd" === a[3])), a[5] = +(a[7] + a[8] || "odd" === a[3])) : a[3] && b.error(a[0]), a
                    },
                    PSEUDO: function(a) {
                        var b, c = !a[6] && a[2];
                        return la.CHILD.test(a[0]) ? null : (a[3] ? a[2] = a[4] || a[5] || "" : c && ja.test(c) && (b = y(c, !0)) && (b = c.indexOf(")", c.length - b) - c.length) && (a[0] = a[0].slice(0, b), a[2] = c.slice(0, b)), a.slice(0, 3))
                    }
                },
                filter: {
                    TAG: function(a) {
                        var b = a.replace(ra, sa).toLowerCase();
                        return "*" === a ? function() {
                            return !0
                        } : function(a) {
                            return a.nodeName && a.nodeName.toLowerCase() === b
                        }
                    },
                    CLASS: function(a) {
                        var b = Q[a + " "];
                        return b || (b = new RegExp("(^|" + aa + ")" + a + "(" + aa + "|$)")) && Q(a, function(a) {
                            return b.test("string" == typeof a.className && a.className || void 0 !== a.getAttribute && a.getAttribute("class") || "")
                        })
                    },
                    ATTR: function(a, c, d) {
                        return function(e) {
                            var f = b.attr(e, a);
                            return null == f ? "!=" === c : !c || (f += "", "=" === c ? f === d : "!=" === c ? f !== d : "^=" === c ? d && 0 === f.indexOf(d) : "*=" === c ? d && f.indexOf(d) > -1 : "$=" === c ? d && f.slice(-d.length) === d : "~=" === c ? (" " + f.replace(ea, " ") + " ").indexOf(d) > -1 : "|=" === c && (f === d || f.slice(0, d.length + 1) === d + "-"))
                        }
                    },
                    CHILD: function(a, b, c, d, e) {
                        var f = "nth" !== a.slice(0, 3),
                            g = "last" !== a.slice(-4),
                            h = "of-type" === b;
                        return 1 === d && 0 === e ? function(a) {
                            return !!a.parentNode
                        } : function(b, c, i) {
                            var j, k, l, m, n, o, p = f !== g ? "nextSibling" : "previousSibling",
                                q = b.parentNode,
                                r = h && b.nodeName.toLowerCase(),
                                s = !i && !h,
                                t = !1;
                            if (q) {
                                if (f) {
                                    for (; p;) {
                                        for (m = b; m = m[p];)
                                            if (h ? m.nodeName.toLowerCase() === r : 1 === m.nodeType) return !1;
                                        o = p = "only" === a && !o && "nextSibling"
                                    }
                                    return !0
                                }
                                if (o = [g ? q.firstChild : q.lastChild], g && s) {
                                    for (m = q, l = m[M] || (m[M] = {}), k = l[m.uniqueID] || (l[m.uniqueID] = {}), j = k[a] || [], n = j[0] === O && j[1], t = n && j[2], m = n && q.childNodes[n]; m = ++n && m && m[p] || (t = n = 0) || o.pop();)
                                        if (1 === m.nodeType && ++t && m === b) {
                                            k[a] = [O, n, t];
                                            break
                                        }
                                } else if (s && (m = b, l = m[M] || (m[M] = {}), k = l[m.uniqueID] || (l[m.uniqueID] = {}), j = k[a] || [], n = j[0] === O && j[1], t = n), !1 === t)
                                    for (;
                                        (m = ++n && m && m[p] || (t = n = 0) || o.pop()) && ((h ? m.nodeName.toLowerCase() !== r : 1 !== m.nodeType) || !++t || (s && (l = m[M] || (m[M] = {}), k = l[m.uniqueID] || (l[m.uniqueID] = {}), k[a] = [O, t]), m !== b)););
                                return (t -= e) === d || t % d == 0 && t / d >= 0
                            }
                        }
                    },
                    PSEUDO: function(a, c) {
                        var e, f = v.pseudos[a] || v.setFilters[a.toLowerCase()] || b.error("unsupported pseudo: " + a);
                        return f[M] ? f(c) : f.length > 1 ? (e = [a, a, "", c], v.setFilters.hasOwnProperty(a.toLowerCase()) ? d(function(a, b) {
                            for (var d, e = f(a, c), g = e.length; g--;) d = $(a, e[g]), a[d] = !(b[d] = e[g])
                        }) : function(a) {
                            return f(a, 0, e)
                        }) : f
                    }
                },
                pseudos: {
                    not: d(function(a) {
                        var b = [],
                            c = [],
                            e = z(a.replace(fa, "$1"));
                        return e[M] ? d(function(a, b, c, d) {
                            for (var f, g = e(a, null, d, []), h = a.length; h--;)(f = g[h]) && (a[h] = !(b[h] = f))
                        }) : function(a, d, f) {
                            return b[0] = a, e(b, null, f, c), b[0] = null, !c.pop()
                        }
                    }),
                    has: d(function(a) {
                        return function(c) {
                            return b(a, c).length > 0
                        }
                    }),
                    contains: d(function(a) {
                        return a = a.replace(ra, sa),
                            function(b) {
                                return (b.textContent || b.innerText || w(b)).indexOf(a) > -1
                            }
                    }),
                    lang: d(function(a) {
                        return ka.test(a || "") || b.error("unsupported lang: " + a), a = a.replace(ra, sa).toLowerCase(),
                            function(b) {
                                var c;
                                do {
                                    if (c = H ? b.lang : b.getAttribute("xml:lang") || b.getAttribute("lang")) return (c = c.toLowerCase()) === a || 0 === c.indexOf(a + "-")
                                } while ((b = b.parentNode) && 1 === b.nodeType);
                                return !1
                            }
                    }),
                    target: function(b) {
                        var c = a.location && a.location.hash;
                        return c && c.slice(1) === b.id
                    },
                    root: function(a) {
                        return a === G
                    },
                    focus: function(a) {
                        return a === F.activeElement && (!F.hasFocus || F.hasFocus()) && !!(a.type || a.href || ~a.tabIndex)
                    },
                    enabled: h(!1),
                    disabled: h(!0),
                    checked: function(a) {
                        var b = a.nodeName.toLowerCase();
                        return "input" === b && !!a.checked || "option" === b && !!a.selected
                    },
                    selected: function(a) {
                        return a.parentNode && a.parentNode.selectedIndex, !0 === a.selected
                    },
                    empty: function(a) {
                        for (a = a.firstChild; a; a = a.nextSibling)
                            if (a.nodeType < 6) return !1;
                        return !0
                    },
                    parent: function(a) {
                        return !v.pseudos.empty(a)
                    },
                    header: function(a) {
                        return na.test(a.nodeName)
                    },
                    input: function(a) {
                        return ma.test(a.nodeName)
                    },
                    button: function(a) {
                        var b = a.nodeName.toLowerCase();
                        return "input" === b && "button" === a.type || "button" === b
                    },
                    text: function(a) {
                        var b;
                        return "input" === a.nodeName.toLowerCase() && "text" === a.type && (null == (b = a.getAttribute("type")) || "text" === b.toLowerCase())
                    },
                    first: i(function() {
                        return [0]
                    }),
                    last: i(function(a, b) {
                        return [b - 1]
                    }),
                    eq: i(function(a, b, c) {
                        return [c < 0 ? c + b : c]
                    }),
                    even: i(function(a, b) {
                        for (var c = 0; c < b; c += 2) a.push(c);
                        return a
                    }),
                    odd: i(function(a, b) {
                        for (var c = 1; c < b; c += 2) a.push(c);
                        return a
                    }),
                    lt: i(function(a, b, c) {
                        for (var d = c < 0 ? c + b : c; --d >= 0;) a.push(d);
                        return a
                    }),
                    gt: i(function(a, b, c) {
                        for (var d = c < 0 ? c + b : c; ++d < b;) a.push(d);
                        return a
                    })
                }
            }, v.pseudos.nth = v.pseudos.eq;
            for (t in {
                    radio: !0,
                    checkbox: !0,
                    file: !0,
                    password: !0,
                    image: !0
                }) v.pseudos[t] = function(a) {
                return function(b) {
                    return "input" === b.nodeName.toLowerCase() && b.type === a
                }
            }(t);
            for (t in {
                    submit: !0,
                    reset: !0
                }) v.pseudos[t] = function(a) {
                return function(b) {
                    var c = b.nodeName.toLowerCase();
                    return ("input" === c || "button" === c) && b.type === a
                }
            }(t);
            return k.prototype = v.filters = v.pseudos, v.setFilters = new k, y = b.tokenize = function(a, c) {
                var d, e, f, g, h, i, j, k = R[a + " "];
                if (k) return c ? 0 : k.slice(0);
                for (h = a, i = [], j = v.preFilter; h;) {
                    d && !(e = ga.exec(h)) || (e && (h = h.slice(e[0].length) || h), i.push(f = [])), d = !1, (e = ha.exec(h)) && (d = e.shift(), f.push({
                        value: d,
                        type: e[0].replace(fa, " ")
                    }), h = h.slice(d.length));
                    for (g in v.filter) !(e = la[g].exec(h)) || j[g] && !(e = j[g](e)) || (d = e.shift(), f.push({
                        value: d,
                        type: g,
                        matches: e
                    }), h = h.slice(d.length));
                    if (!d) break
                }
                return c ? h.length : h ? b.error(a) : R(a, i).slice(0)
            }, z = b.compile = function(a, b) {
                var c, d = [],
                    e = [],
                    f = S[a + " "];
                if (!f) {
                    for (b || (b = y(a)), c = b.length; c--;) f = r(b[c]), f[M] ? d.push(f) : e.push(f);
                    f = S(a, s(e, d)), f.selector = a
                }
                return f
            }, A = b.select = function(a, b, c, d) {
                var e, f, g, h, i, k = "function" == typeof a && a,
                    m = !d && y(a = k.selector || a);
                if (c = c || [], 1 === m.length) {
                    if (f = m[0] = m[0].slice(0), f.length > 2 && "ID" === (g = f[0]).type && 9 === b.nodeType && H && v.relative[f[1].type]) {
                        if (!(b = (v.find.ID(g.matches[0].replace(ra, sa), b) || [])[0])) return c;
                        k && (b = b.parentNode), a = a.slice(f.shift().value.length)
                    }
                    for (e = la.needsContext.test(a) ? 0 : f.length; e-- && (g = f[e], !v.relative[h = g.type]);)
                        if ((i = v.find[h]) && (d = i(g.matches[0].replace(ra, sa), qa.test(f[0].type) && j(b.parentNode) || b))) {
                            if (f.splice(e, 1), !(a = d.length && l(f))) return Y.apply(c, d), c;
                            break
                        }
                }
                return (k || z(a, m))(d, b, !H, c, !b || qa.test(a) && j(b.parentNode) || b), c
            }, u.sortStable = M.split("").sort(T).join("") === M, u.detectDuplicates = !!D, E(), u.sortDetached = e(function(a) {
                return 1 & a.compareDocumentPosition(F.createElement("fieldset"))
            }), e(function(a) {
                return a.innerHTML = "<a href='#'></a>", "#" === a.firstChild.getAttribute("href")
            }) || f("type|href|height|width", function(a, b, c) {
                if (!c) return a.getAttribute(b, "type" === b.toLowerCase() ? 1 : 2)
            }), u.attributes && e(function(a) {
                return a.innerHTML = "<input/>", a.firstChild.setAttribute("value", ""), "" === a.firstChild.getAttribute("value")
            }) || f("value", function(a, b, c) {
                if (!c && "input" === a.nodeName.toLowerCase()) return a.defaultValue
            }), e(function(a) {
                return null == a.getAttribute("disabled")
            }) || f(_, function(a, b, c) {
                var d;
                if (!c) return !0 === a[b] ? b.toLowerCase() : (d = a.getAttributeNode(b)) && d.specified ? d.value : null
            }), b
        }(a);
        oa.find = ta, oa.expr = ta.selectors, oa.expr[":"] = oa.expr.pseudos, oa.uniqueSort = oa.unique = ta.uniqueSort, oa.text = ta.getText, oa.isXMLDoc = ta.isXML, oa.contains = ta.contains, oa.escapeSelector = ta.escape;
        var ua = function(a, b, c) {
                for (var d = [], e = void 0 !== c;
                    (a = a[b]) && 9 !== a.nodeType;)
                    if (1 === a.nodeType) {
                        if (e && oa(a).is(c)) break;
                        d.push(a)
                    }
                return d
            },
            va = function(a, b) {
                for (var c = []; a; a = a.nextSibling) 1 === a.nodeType && a !== b && c.push(a);
                return c
            },
            wa = oa.expr.match.needsContext,
            xa = /^<([a-z][^\/\0>:\x20\t\r\n\f]*)[\x20\t\r\n\f]*\/?>(?:<\/\1>|)$/i,
            ya = /^.[^:#\[\.,]*$/;
        oa.filter = function(a, b, c) {
            var d = b[0];
            return c && (a = ":not(" + a + ")"), 1 === b.length && 1 === d.nodeType ? oa.find.matchesSelector(d, a) ? [d] : [] : oa.find.matches(a, oa.grep(b, function(a) {
                return 1 === a.nodeType
            }))
        }, oa.fn.extend({
            find: function(a) {
                var b, c, d = this.length,
                    e = this;
                if ("string" != typeof a) return this.pushStack(oa(a).filter(function() {
                    for (b = 0; b < d; b++)
                        if (oa.contains(e[b], this)) return !0
                }));
                for (c = this.pushStack([]), b = 0; b < d; b++) oa.find(a, e[b], c);
                return d > 1 ? oa.uniqueSort(c) : c
            },
            filter: function(a) {
                return this.pushStack(e(this, a || [], !1))
            },
            not: function(a) {
                return this.pushStack(e(this, a || [], !0))
            },
            is: function(a) {
                return !!e(this, "string" == typeof a && wa.test(a) ? oa(a) : a || [], !1).length
            }
        });
        var za, Aa = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]+))$/;
        (oa.fn.init = function(a, b, c) {
            var d, e;
            if (!a) return this;
            if (c = c || za, "string" == typeof a) {
                if (!(d = "<" === a[0] && ">" === a[a.length - 1] && a.length >= 3 ? [null, a, null] : Aa.exec(a)) || !d[1] && b) return !b || b.jquery ? (b || c).find(a) : this.constructor(b).find(a);
                if (d[1]) {
                    if (b = b instanceof oa ? b[0] : b, oa.merge(this, oa.parseHTML(d[1], b && b.nodeType ? b.ownerDocument || b : ba, !0)), xa.test(d[1]) && oa.isPlainObject(b))
                        for (d in b) oa.isFunction(this[d]) ? this[d](b[d]) : this.attr(d, b[d]);
                    return this
                }
                return e = ba.getElementById(d[2]), e && (this[0] = e, this.length = 1), this
            }
            return a.nodeType ? (this[0] = a, this.length = 1, this) : oa.isFunction(a) ? void 0 !== c.ready ? c.ready(a) : a(oa) : oa.makeArray(a, this)
        }).prototype = oa.fn, za = oa(ba);
        var Ba = /^(?:parents|prev(?:Until|All))/,
            Ca = {
                children: !0,
                contents: !0,
                next: !0,
                prev: !0
            };
        oa.fn.extend({
            has: function(a) {
                var b = oa(a, this),
                    c = b.length;
                return this.filter(function() {
                    for (var a = 0; a < c; a++)
                        if (oa.contains(this, b[a])) return !0
                })
            },
            closest: function(a, b) {
                var c, d = 0,
                    e = this.length,
                    f = [],
                    g = "string" != typeof a && oa(a);
                if (!wa.test(a))
                    for (; d < e; d++)
                        for (c = this[d]; c && c !== b; c = c.parentNode)
                            if (c.nodeType < 11 && (g ? g.index(c) > -1 : 1 === c.nodeType && oa.find.matchesSelector(c, a))) {
                                f.push(c);
                                break
                            }
                return this.pushStack(f.length > 1 ? oa.uniqueSort(f) : f)
            },
            index: function(a) {
                return a ? "string" == typeof a ? ga.call(oa(a), this[0]) : ga.call(this, a.jquery ? a[0] : a) : this[0] && this[0].parentNode ? this.first().prevAll().length : -1
            },
            add: function(a, b) {
                return this.pushStack(oa.uniqueSort(oa.merge(this.get(), oa(a, b))))
            },
            addBack: function(a) {
                return this.add(null == a ? this.prevObject : this.prevObject.filter(a))
            }
        }), oa.each({
            parent: function(a) {
                var b = a.parentNode;
                return b && 11 !== b.nodeType ? b : null
            },
            parents: function(a) {
                return ua(a, "parentNode")
            },
            parentsUntil: function(a, b, c) {
                return ua(a, "parentNode", c)
            },
            next: function(a) {
                return f(a, "nextSibling")
            },
            prev: function(a) {
                return f(a, "previousSibling")
            },
            nextAll: function(a) {
                return ua(a, "nextSibling")
            },
            prevAll: function(a) {
                return ua(a, "previousSibling")
            },
            nextUntil: function(a, b, c) {
                return ua(a, "nextSibling", c)
            },
            prevUntil: function(a, b, c) {
                return ua(a, "previousSibling", c)
            },
            siblings: function(a) {
                return va((a.parentNode || {}).firstChild, a)
            },
            children: function(a) {
                return va(a.firstChild)
            },
            contents: function(a) {
                return a.contentDocument || oa.merge([], a.childNodes)
            }
        }, function(a, b) {
            oa.fn[a] = function(c, d) {
                var e = oa.map(this, b, c);
                return "Until" !== a.slice(-5) && (d = c), d && "string" == typeof d && (e = oa.filter(d, e)), this.length > 1 && (Ca[a] || oa.uniqueSort(e), Ba.test(a) && e.reverse()), this.pushStack(e)
            }
        });
        var Da = /[^\x20\t\r\n\f]+/g;
        oa.Callbacks = function(a) {
            a = "string" == typeof a ? g(a) : oa.extend({}, a);
            var b, c, d, e, f = [],
                h = [],
                i = -1,
                j = function() {
                    for (e = a.once, d = b = !0; h.length; i = -1)
                        for (c = h.shift(); ++i < f.length;) !1 === f[i].apply(c[0], c[1]) && a.stopOnFalse && (i = f.length, c = !1);
                    a.memory || (c = !1), b = !1, e && (f = c ? [] : "")
                },
                k = {
                    add: function() {
                        return f && (c && !b && (i = f.length - 1, h.push(c)), function b(c) {
                            oa.each(c, function(c, d) {
                                oa.isFunction(d) ? a.unique && k.has(d) || f.push(d) : d && d.length && "string" !== oa.type(d) && b(d)
                            })
                        }(arguments), c && !b && j()), this
                    },
                    remove: function() {
                        return oa.each(arguments, function(a, b) {
                            for (var c;
                                (c = oa.inArray(b, f, c)) > -1;) f.splice(c, 1), c <= i && i--
                        }), this
                    },
                    has: function(a) {
                        return a ? oa.inArray(a, f) > -1 : f.length > 0
                    },
                    empty: function() {
                        return f && (f = []), this
                    },
                    disable: function() {
                        return e = h = [], f = c = "", this
                    },
                    disabled: function() {
                        return !f
                    },
                    lock: function() {
                        return e = h = [], c || b || (f = c = ""), this
                    },
                    locked: function() {
                        return !!e
                    },
                    fireWith: function(a, c) {
                        return e || (c = c || [], c = [a, c.slice ? c.slice() : c], h.push(c), b || j()), this
                    },
                    fire: function() {
                        return k.fireWith(this, arguments), this
                    },
                    fired: function() {
                        return !!d
                    }
                };
            return k
        }, oa.extend({
            Deferred: function(b) {
                var c = [
                        ["notify", "progress", oa.Callbacks("memory"), oa.Callbacks("memory"), 2],
                        ["resolve", "done", oa.Callbacks("once memory"), oa.Callbacks("once memory"), 0, "resolved"],
                        ["reject", "fail", oa.Callbacks("once memory"), oa.Callbacks("once memory"), 1, "rejected"]
                    ],
                    d = "pending",
                    e = {
                        state: function() {
                            return d
                        },
                        always: function() {
                            return f.done(arguments).fail(arguments), this
                        },
                        catch: function(a) {
                            return e.then(null, a)
                        },
                        pipe: function() {
                            var a = arguments;
                            return oa.Deferred(function(b) {
                                oa.each(c, function(c, d) {
                                    var e = oa.isFunction(a[d[4]]) && a[d[4]];
                                    f[d[1]](function() {
                                        var a = e && e.apply(this, arguments);
                                        a && oa.isFunction(a.promise) ? a.promise().progress(b.notify).done(b.resolve).fail(b.reject) : b[d[0] + "With"](this, e ? [a] : arguments)
                                    })
                                }), a = null
                            }).promise()
                        },
                        then: function(b, d, e) {
                            function f(b, c, d, e) {
                                return function() {
                                    var j = this,
                                        k = arguments,
                                        l = function() {
                                            var a, l;
                                            if (!(b < g)) {
                                                if ((a = d.apply(j, k)) === c.promise()) throw new TypeError("Thenable self-resolution");
                                                l = a && ("object" == typeof a || "function" == typeof a) && a.then, oa.isFunction(l) ? e ? l.call(a, f(g, c, h, e), f(g, c, i, e)) : (g++, l.call(a, f(g, c, h, e), f(g, c, i, e), f(g, c, h, c.notifyWith))) : (d !== h && (j = void 0, k = [a]), (e || c.resolveWith)(j, k))
                                            }
                                        },
                                        m = e ? l : function() {
                                            try {
                                                l()
                                            } catch (a) {
                                                oa.Deferred.exceptionHook && oa.Deferred.exceptionHook(a, m.stackTrace), b + 1 >= g && (d !== i && (j = void 0, k = [a]), c.rejectWith(j, k))
                                            }
                                        };
                                    b ? m() : (oa.Deferred.getStackHook && (m.stackTrace = oa.Deferred.getStackHook()), a.setTimeout(m))
                                }
                            }
                            var g = 0;
                            return oa.Deferred(function(a) {
                                c[0][3].add(f(0, a, oa.isFunction(e) ? e : h, a.notifyWith)), c[1][3].add(f(0, a, oa.isFunction(b) ? b : h)), c[2][3].add(f(0, a, oa.isFunction(d) ? d : i))
                            }).promise()
                        },
                        promise: function(a) {
                            return null != a ? oa.extend(a, e) : e
                        }
                    },
                    f = {};
                return oa.each(c, function(a, b) {
                    var g = b[2],
                        h = b[5];
                    e[b[1]] = g.add, h && g.add(function() {
                        d = h
                    }, c[3 - a][2].disable, c[0][2].lock), g.add(b[3].fire), f[b[0]] = function() {
                        return f[b[0] + "With"](this === f ? void 0 : this, arguments), this
                    }, f[b[0] + "With"] = g.fireWith
                }), e.promise(f), b && b.call(f, f), f
            },
            when: function(a) {
                var b = arguments.length,
                    c = b,
                    d = Array(c),
                    e = da.call(arguments),
                    f = oa.Deferred(),
                    g = function(a) {
                        return function(c) {
                            d[a] = this, e[a] = arguments.length > 1 ? da.call(arguments) : c, --b || f.resolveWith(d, e)
                        }
                    };
                if (b <= 1 && (j(a, f.done(g(c)).resolve, f.reject), "pending" === f.state() || oa.isFunction(e[c] && e[c].then))) return f.then();
                for (; c--;) j(e[c], g(c), f.reject);
                return f.promise()
            }
        });
        var Ea = /^(Eval|Internal|Range|Reference|Syntax|Type|URI)Error$/;
        oa.Deferred.exceptionHook = function(b, c) {
            a.console && a.console.warn && b && Ea.test(b.name) && a.console.warn("jQuery.Deferred exception: " + b.message, b.stack, c)
        }, oa.readyException = function(b) {
            a.setTimeout(function() {
                throw b
            })
        };
        var Fa = oa.Deferred();
        oa.fn.ready = function(a) {
            return Fa.then(a).catch(function(a) {
                oa.readyException(a)
            }), this
        }, oa.extend({
            isReady: !1,
            readyWait: 1,
            holdReady: function(a) {
                a ? oa.readyWait++ : oa.ready(!0)
            },
            ready: function(a) {
                (!0 === a ? --oa.readyWait : oa.isReady) || (oa.isReady = !0, !0 !== a && --oa.readyWait > 0 || Fa.resolveWith(ba, [oa]))
            }
        }), oa.ready.then = Fa.then, "complete" === ba.readyState || "loading" !== ba.readyState && !ba.documentElement.doScroll ? a.setTimeout(oa.ready) : (ba.addEventListener("DOMContentLoaded", k), a.addEventListener("load", k));
        var Ga = function(a, b, c, d, e, f, g) {
                var h = 0,
                    i = a.length,
                    j = null == c;
                if ("object" === oa.type(c)) {
                    e = !0;
                    for (h in c) Ga(a, b, h, c[h], !0, f, g)
                } else if (void 0 !== d && (e = !0, oa.isFunction(d) || (g = !0), j && (g ? (b.call(a, d), b = null) : (j = b, b = function(a, b, c) {
                        return j.call(oa(a), c)
                    })), b))
                    for (; h < i; h++) b(a[h], c, g ? d : d.call(a[h], h, b(a[h], c)));
                return e ? a : j ? b.call(a) : i ? b(a[0], c) : f
            },
            Ha = function(a) {
                return 1 === a.nodeType || 9 === a.nodeType || !+a.nodeType
            };
        l.uid = 1, l.prototype = {
            cache: function(a) {
                var b = a[this.expando];
                return b || (b = {}, Ha(a) && (a.nodeType ? a[this.expando] = b : Object.defineProperty(a, this.expando, {
                    value: b,
                    configurable: !0
                }))), b
            },
            set: function(a, b, c) {
                var d, e = this.cache(a);
                if ("string" == typeof b) e[oa.camelCase(b)] = c;
                else
                    for (d in b) e[oa.camelCase(d)] = b[d];
                return e
            },
            get: function(a, b) {
                return void 0 === b ? this.cache(a) : a[this.expando] && a[this.expando][oa.camelCase(b)]
            },
            access: function(a, b, c) {
                return void 0 === b || b && "string" == typeof b && void 0 === c ? this.get(a, b) : (this.set(a, b, c), void 0 !== c ? c : b)
            },
            remove: function(a, b) {
                var c, d = a[this.expando];
                if (void 0 !== d) {
                    if (void 0 !== b) {
                        oa.isArray(b) ? b = b.map(oa.camelCase) : (b = oa.camelCase(b), b = b in d ? [b] : b.match(Da) || []), c = b.length;
                        for (; c--;) delete d[b[c]]
                    }(void 0 === b || oa.isEmptyObject(d)) && (a.nodeType ? a[this.expando] = void 0 : delete a[this.expando])
                }
            },
            hasData: function(a) {
                var b = a[this.expando];
                return void 0 !== b && !oa.isEmptyObject(b)
            }
        };
        var Ia = new l,
            Ja = new l,
            Ka = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,
            La = /[A-Z]/g;
        oa.extend({
            hasData: function(a) {
                return Ja.hasData(a) || Ia.hasData(a)
            },
            data: function(a, b, c) {
                return Ja.access(a, b, c)
            },
            removeData: function(a, b) {
                Ja.remove(a, b)
            },
            _data: function(a, b, c) {
                return Ia.access(a, b, c)
            },
            _removeData: function(a, b) {
                Ia.remove(a, b)
            }
        }), oa.fn.extend({
            data: function(a, b) {
                var c, d, e, f = this[0],
                    g = f && f.attributes;
                if (void 0 === a) {
                    if (this.length && (e = Ja.get(f), 1 === f.nodeType && !Ia.get(f, "hasDataAttrs"))) {
                        for (c = g.length; c--;) g[c] && (d = g[c].name, 0 === d.indexOf("data-") && (d = oa.camelCase(d.slice(5)), n(f, d, e[d])));
                        Ia.set(f, "hasDataAttrs", !0)
                    }
                    return e
                }
                return "object" == typeof a ? this.each(function() {
                    Ja.set(this, a)
                }) : Ga(this, function(b) {
                    var c;
                    if (f && void 0 === b) {
                        if (void 0 !== (c = Ja.get(f, a))) return c;
                        if (void 0 !== (c = n(f, a))) return c
                    } else this.each(function() {
                        Ja.set(this, a, b)
                    })
                }, null, b, arguments.length > 1, null, !0)
            },
            removeData: function(a) {
                return this.each(function() {
                    Ja.remove(this, a)
                })
            }
        }), oa.extend({
            queue: function(a, b, c) {
                var d;
                if (a) return b = (b || "fx") + "queue", d = Ia.get(a, b), c && (!d || oa.isArray(c) ? d = Ia.access(a, b, oa.makeArray(c)) : d.push(c)), d || []
            },
            dequeue: function(a, b) {
                b = b || "fx";
                var c = oa.queue(a, b),
                    d = c.length,
                    e = c.shift(),
                    f = oa._queueHooks(a, b),
                    g = function() {
                        oa.dequeue(a, b)
                    };
                "inprogress" === e && (e = c.shift(), d--), e && ("fx" === b && c.unshift("inprogress"), delete f.stop, e.call(a, g, f)), !d && f && f.empty.fire()
            },
            _queueHooks: function(a, b) {
                var c = b + "queueHooks";
                return Ia.get(a, c) || Ia.access(a, c, {
                    empty: oa.Callbacks("once memory").add(function() {
                        Ia.remove(a, [b + "queue", c])
                    })
                })
            }
        }), oa.fn.extend({
            queue: function(a, b) {
                var c = 2;
                return "string" != typeof a && (b = a, a = "fx", c--), arguments.length < c ? oa.queue(this[0], a) : void 0 === b ? this : this.each(function() {
                    var c = oa.queue(this, a, b);
                    oa._queueHooks(this, a), "fx" === a && "inprogress" !== c[0] && oa.dequeue(this, a)
                })
            },
            dequeue: function(a) {
                return this.each(function() {
                    oa.dequeue(this, a)
                })
            },
            clearQueue: function(a) {
                return this.queue(a || "fx", [])
            },
            promise: function(a, b) {
                var c, d = 1,
                    e = oa.Deferred(),
                    f = this,
                    g = this.length,
                    h = function() {
                        --d || e.resolveWith(f, [f])
                    };
                for ("string" != typeof a && (b = a, a = void 0), a = a || "fx"; g--;)(c = Ia.get(f[g], a + "queueHooks")) && c.empty && (d++, c.empty.add(h));
                return h(), e.promise(b)
            }
        });
        var Ma = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,
            Na = new RegExp("^(?:([+-])=|)(" + Ma + ")([a-z%]*)$", "i"),
            Oa = ["Top", "Right", "Bottom", "Left"],
            Pa = function(a, b) {
                return a = b || a, "none" === a.style.display || "" === a.style.display && oa.contains(a.ownerDocument, a) && "none" === oa.css(a, "display")
            },
            Qa = function(a, b, c, d) {
                var e, f, g = {};
                for (f in b) g[f] = a.style[f], a.style[f] = b[f];
                e = c.apply(a, d || []);
                for (f in b) a.style[f] = g[f];
                return e
            },
            Ra = {};
        oa.fn.extend({
            show: function() {
                return q(this, !0)
            },
            hide: function() {
                return q(this)
            },
            toggle: function(a) {
                return "boolean" == typeof a ? a ? this.show() : this.hide() : this.each(function() {
                    Pa(this) ? oa(this).show() : oa(this).hide()
                })
            }
        });
        var Sa = /^(?:checkbox|radio)$/i,
            Ta = /<([a-z][^\/\0>\x20\t\r\n\f]+)/i,
            Ua = /^$|\/(?:java|ecma)script/i,
            Va = {
                option: [1, "<select multiple='multiple'>", "</select>"],
                thead: [1, "<table>", "</table>"],
                col: [2, "<table><colgroup>", "</colgroup></table>"],
                tr: [2, "<table><tbody>", "</tbody></table>"],
                td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
                _default: [0, "", ""]
            };
        Va.optgroup = Va.option, Va.tbody = Va.tfoot = Va.colgroup = Va.caption = Va.thead, Va.th = Va.td;
        var Wa = /<|&#?\w+;/;
        ! function() {
            var a = ba.createDocumentFragment(),
                b = a.appendChild(ba.createElement("div")),
                c = ba.createElement("input");
            c.setAttribute("type", "radio"), c.setAttribute("checked", "checked"), c.setAttribute("name", "t"), b.appendChild(c), ma.checkClone = b.cloneNode(!0).cloneNode(!0).lastChild.checked, b.innerHTML = "<textarea>x</textarea>", ma.noCloneChecked = !!b.cloneNode(!0).lastChild.defaultValue
        }();
        var Xa = ba.documentElement,
            Ya = /^key/,
            Za = /^(?:mouse|pointer|contextmenu|drag|drop)|click/,
            $a = /^([^.]*)(?:\.(.+)|)/;
        oa.event = {
            global: {},
            add: function(a, b, c, d, e) {
                var f, g, h, i, j, k, l, m, n, o, p, q = Ia.get(a);
                if (q)
                    for (c.handler && (f = c, c = f.handler, e = f.selector), e && oa.find.matchesSelector(Xa, e), c.guid || (c.guid = oa.guid++), (i = q.events) || (i = q.events = {}), (g = q.handle) || (g = q.handle = function(b) {
                            return void 0 !== oa && oa.event.triggered !== b.type ? oa.event.dispatch.apply(a, arguments) : void 0
                        }), b = (b || "").match(Da) || [""], j = b.length; j--;) h = $a.exec(b[j]) || [], n = p = h[1], o = (h[2] || "").split(".").sort(), n && (l = oa.event.special[n] || {}, n = (e ? l.delegateType : l.bindType) || n, l = oa.event.special[n] || {}, k = oa.extend({
                        type: n,
                        origType: p,
                        data: d,
                        handler: c,
                        guid: c.guid,
                        selector: e,
                        needsContext: e && oa.expr.match.needsContext.test(e),
                        namespace: o.join(".")
                    }, f), (m = i[n]) || (m = i[n] = [], m.delegateCount = 0, l.setup && !1 !== l.setup.call(a, d, o, g) || a.addEventListener && a.addEventListener(n, g)), l.add && (l.add.call(a, k), k.handler.guid || (k.handler.guid = c.guid)), e ? m.splice(m.delegateCount++, 0, k) : m.push(k), oa.event.global[n] = !0)
            },
            remove: function(a, b, c, d, e) {
                var f, g, h, i, j, k, l, m, n, o, p, q = Ia.hasData(a) && Ia.get(a);
                if (q && (i = q.events)) {
                    for (b = (b || "").match(Da) || [""], j = b.length; j--;)
                        if (h = $a.exec(b[j]) || [], n = p = h[1], o = (h[2] || "").split(".").sort(), n) {
                            for (l = oa.event.special[n] || {}, n = (d ? l.delegateType : l.bindType) || n, m = i[n] || [], h = h[2] && new RegExp("(^|\\.)" + o.join("\\.(?:.*\\.|)") + "(\\.|$)"), g = f = m.length; f--;) k = m[f], !e && p !== k.origType || c && c.guid !== k.guid || h && !h.test(k.namespace) || d && d !== k.selector && ("**" !== d || !k.selector) || (m.splice(f, 1), k.selector && m.delegateCount--, l.remove && l.remove.call(a, k));
                            g && !m.length && (l.teardown && !1 !== l.teardown.call(a, o, q.handle) || oa.removeEvent(a, n, q.handle), delete i[n])
                        } else
                            for (n in i) oa.event.remove(a, n + b[j], c, d, !0);
                    oa.isEmptyObject(i) && Ia.remove(a, "handle events")
                }
            },
            dispatch: function(a) {
                var b, c, d, e, f, g, h = oa.event.fix(a),
                    i = new Array(arguments.length),
                    j = (Ia.get(this, "events") || {})[h.type] || [],
                    k = oa.event.special[h.type] || {};
                for (i[0] = h, b = 1; b < arguments.length; b++) i[b] = arguments[b];
                if (h.delegateTarget = this, !k.preDispatch || !1 !== k.preDispatch.call(this, h)) {
                    for (g = oa.event.handlers.call(this, h, j), b = 0;
                        (e = g[b++]) && !h.isPropagationStopped();)
                        for (h.currentTarget = e.elem, c = 0;
                            (f = e.handlers[c++]) && !h.isImmediatePropagationStopped();) h.rnamespace && !h.rnamespace.test(f.namespace) || (h.handleObj = f, h.data = f.data, void 0 !== (d = ((oa.event.special[f.origType] || {}).handle || f.handler).apply(e.elem, i)) && !1 === (h.result = d) && (h.preventDefault(), h.stopPropagation()));
                    return k.postDispatch && k.postDispatch.call(this, h), h.result
                }
            },
            handlers: function(a, b) {
                var c, d, e, f, g, h = [],
                    i = b.delegateCount,
                    j = a.target;
                if (i && j.nodeType && !("click" === a.type && a.button >= 1))
                    for (; j !== this; j = j.parentNode || this)
                        if (1 === j.nodeType && ("click" !== a.type || !0 !== j.disabled)) {
                            for (f = [], g = {}, c = 0; c < i; c++) d = b[c], e = d.selector + " ", void 0 === g[e] && (g[e] = d.needsContext ? oa(e, this).index(j) > -1 : oa.find(e, this, null, [j]).length), g[e] && f.push(d);
                            f.length && h.push({
                                elem: j,
                                handlers: f
                            })
                        }
                return j = this, i < b.length && h.push({
                    elem: j,
                    handlers: b.slice(i)
                }), h
            },
            addProp: function(a, b) {
                Object.defineProperty(oa.Event.prototype, a, {
                    enumerable: !0,
                    configurable: !0,
                    get: oa.isFunction(b) ? function() {
                        if (this.originalEvent) return b(this.originalEvent)
                    } : function() {
                        if (this.originalEvent) return this.originalEvent[a]
                    },
                    set: function(b) {
                        Object.defineProperty(this, a, {
                            enumerable: !0,
                            configurable: !0,
                            writable: !0,
                            value: b
                        })
                    }
                })
            },
            fix: function(a) {
                return a[oa.expando] ? a : new oa.Event(a)
            },
            special: {
                load: {
                    noBubble: !0
                },
                focus: {
                    trigger: function() {
                        if (this !== w() && this.focus) return this.focus(), !1
                    },
                    delegateType: "focusin"
                },
                blur: {
                    trigger: function() {
                        if (this === w() && this.blur) return this.blur(), !1
                    },
                    delegateType: "focusout"
                },
                click: {
                    trigger: function() {
                        if ("checkbox" === this.type && this.click && oa.nodeName(this, "input")) return this.click(), !1
                    },
                    _default: function(a) {
                        return oa.nodeName(a.target, "a")
                    }
                },
                beforeunload: {
                    postDispatch: function(a) {
                        void 0 !== a.result && a.originalEvent && (a.originalEvent.returnValue = a.result)
                    }
                }
            }
        }, oa.removeEvent = function(a, b, c) {
            a.removeEventListener && a.removeEventListener(b, c)
        }, oa.Event = function(a, b) {
            return this instanceof oa.Event ? (a && a.type ? (this.originalEvent = a, this.type = a.type, this.isDefaultPrevented = a.defaultPrevented || void 0 === a.defaultPrevented && !1 === a.returnValue ? u : v, this.target = a.target && 3 === a.target.nodeType ? a.target.parentNode : a.target, this.currentTarget = a.currentTarget, this.relatedTarget = a.relatedTarget) : this.type = a, b && oa.extend(this, b), this.timeStamp = a && a.timeStamp || oa.now(), void(this[oa.expando] = !0)) : new oa.Event(a, b)
        }, oa.Event.prototype = {
            constructor: oa.Event,
            isDefaultPrevented: v,
            isPropagationStopped: v,
            isImmediatePropagationStopped: v,
            isSimulated: !1,
            preventDefault: function() {
                var a = this.originalEvent;
                this.isDefaultPrevented = u, a && !this.isSimulated && a.preventDefault()
            },
            stopPropagation: function() {
                var a = this.originalEvent;
                this.isPropagationStopped = u, a && !this.isSimulated && a.stopPropagation()
            },
            stopImmediatePropagation: function() {
                var a = this.originalEvent;
                this.isImmediatePropagationStopped = u, a && !this.isSimulated && a.stopImmediatePropagation(), this.stopPropagation()
            }
        }, oa.each({
            altKey: !0,
            bubbles: !0,
            cancelable: !0,
            changedTouches: !0,
            ctrlKey: !0,
            detail: !0,
            eventPhase: !0,
            metaKey: !0,
            pageX: !0,
            pageY: !0,
            shiftKey: !0,
            view: !0,
            char: !0,
            charCode: !0,
            key: !0,
            keyCode: !0,
            button: !0,
            buttons: !0,
            clientX: !0,
            clientY: !0,
            offsetX: !0,
            offsetY: !0,
            pointerId: !0,
            pointerType: !0,
            screenX: !0,
            screenY: !0,
            targetTouches: !0,
            toElement: !0,
            touches: !0,
            which: function(a) {
                var b = a.button;
                return null == a.which && Ya.test(a.type) ? null != a.charCode ? a.charCode : a.keyCode : !a.which && void 0 !== b && Za.test(a.type) ? 1 & b ? 1 : 2 & b ? 3 : 4 & b ? 2 : 0 : a.which
            }
        }, oa.event.addProp), oa.each({
            mouseenter: "mouseover",
            mouseleave: "mouseout",
            pointerenter: "pointerover",
            pointerleave: "pointerout"
        }, function(a, b) {
            oa.event.special[a] = {
                delegateType: b,
                bindType: b,
                handle: function(a) {
                    var c, d = this,
                        e = a.relatedTarget,
                        f = a.handleObj;
                    return e && (e === d || oa.contains(d, e)) || (a.type = f.origType, c = f.handler.apply(this, arguments), a.type = b), c
                }
            }
        }), oa.fn.extend({
            on: function(a, b, c, d) {
                return x(this, a, b, c, d)
            },
            one: function(a, b, c, d) {
                return x(this, a, b, c, d, 1)
            },
            off: function(a, b, c) {
                var d, e;
                if (a && a.preventDefault && a.handleObj) return d = a.handleObj, oa(a.delegateTarget).off(d.namespace ? d.origType + "." + d.namespace : d.origType, d.selector, d.handler), this;
                if ("object" == typeof a) {
                    for (e in a) this.off(e, b, a[e]);
                    return this
                }
                return !1 !== b && "function" != typeof b || (c = b, b = void 0), !1 === c && (c = v), this.each(function() {
                    oa.event.remove(this, a, c, b)
                })
            }
        });
        var _a = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([a-z][^\/\0>\x20\t\r\n\f]*)[^>]*)\/>/gi,
            ab = /<script|<style|<link/i,
            bb = /checked\s*(?:[^=]|=\s*.checked.)/i,
            cb = /^true\/(.*)/,
            db = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g;
        oa.extend({
            htmlPrefilter: function(a) {
                return a.replace(_a, "<$1></$2>")
            },
            clone: function(a, b, c) {
                var d, e, f, g, h = a.cloneNode(!0),
                    i = oa.contains(a.ownerDocument, a);
                if (!(ma.noCloneChecked || 1 !== a.nodeType && 11 !== a.nodeType || oa.isXMLDoc(a)))
                    for (g = r(h), f = r(a), d = 0, e = f.length; d < e; d++) C(f[d], g[d]);
                if (b)
                    if (c)
                        for (f = f || r(a), g = g || r(h), d = 0, e = f.length; d < e; d++) B(f[d], g[d]);
                    else B(a, h);
                return g = r(h, "script"), g.length > 0 && s(g, !i && r(a, "script")), h
            },
            cleanData: function(a) {
                for (var b, c, d, e = oa.event.special, f = 0; void 0 !== (c = a[f]); f++)
                    if (Ha(c)) {
                        if (b = c[Ia.expando]) {
                            if (b.events)
                                for (d in b.events) e[d] ? oa.event.remove(c, d) : oa.removeEvent(c, d, b.handle);
                            c[Ia.expando] = void 0
                        }
                        c[Ja.expando] && (c[Ja.expando] = void 0)
                    }
            }
        }), oa.fn.extend({
            detach: function(a) {
                return E(this, a, !0)
            },
            remove: function(a) {
                return E(this, a)
            },
            text: function(a) {
                return Ga(this, function(a) {
                    return void 0 === a ? oa.text(this) : this.empty().each(function() {
                        1 !== this.nodeType && 11 !== this.nodeType && 9 !== this.nodeType || (this.textContent = a)
                    })
                }, null, a, arguments.length)
            },
            append: function() {
                return D(this, arguments, function(a) {
                    if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                        y(this, a).appendChild(a)
                    }
                })
            },
            prepend: function() {
                return D(this, arguments, function(a) {
                    if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                        var b = y(this, a);
                        b.insertBefore(a, b.firstChild)
                    }
                })
            },
            before: function() {
                return D(this, arguments, function(a) {
                    this.parentNode && this.parentNode.insertBefore(a, this)
                })
            },
            after: function() {
                return D(this, arguments, function(a) {
                    this.parentNode && this.parentNode.insertBefore(a, this.nextSibling)
                })
            },
            empty: function() {
                for (var a, b = 0; null != (a = this[b]); b++) 1 === a.nodeType && (oa.cleanData(r(a, !1)), a.textContent = "");
                return this
            },
            clone: function(a, b) {
                return a = null != a && a, b = null == b ? a : b, this.map(function() {
                    return oa.clone(this, a, b)
                })
            },
            html: function(a) {
                return Ga(this, function(a) {
                    var b = this[0] || {},
                        c = 0,
                        d = this.length;
                    if (void 0 === a && 1 === b.nodeType) return b.innerHTML;
                    if ("string" == typeof a && !ab.test(a) && !Va[(Ta.exec(a) || ["", ""])[1].toLowerCase()]) {
                        a = oa.htmlPrefilter(a);
                        try {
                            for (; c < d; c++) b = this[c] || {}, 1 === b.nodeType && (oa.cleanData(r(b, !1)), b.innerHTML = a);
                            b = 0
                        } catch (a) {}
                    }
                    b && this.empty().append(a)
                }, null, a, arguments.length)
            },
            replaceWith: function() {
                var a = [];
                return D(this, arguments, function(b) {
                    var c = this.parentNode;
                    oa.inArray(this, a) < 0 && (oa.cleanData(r(this)), c && c.replaceChild(b, this))
                }, a)
            }
        }), oa.each({
            appendTo: "append",
            prependTo: "prepend",
            insertBefore: "before",
            insertAfter: "after",
            replaceAll: "replaceWith"
        }, function(a, b) {
            oa.fn[a] = function(a) {
                for (var c, d = [], e = oa(a), f = e.length - 1, g = 0; g <= f; g++) c = g === f ? this : this.clone(!0), oa(e[g])[b](c), fa.apply(d, c.get());
                return this.pushStack(d)
            }
        });
        var eb = /^margin/,
            fb = new RegExp("^(" + Ma + ")(?!px)[a-z%]+$", "i"),
            gb = function(b) {
                var c = b.ownerDocument.defaultView;
                return c && c.opener || (c = a), c.getComputedStyle(b)
            };
        ! function() {
            function b() {
                if (h) {
                    h.style.cssText = "box-sizing:border-box;position:relative;display:block;margin:auto;border:1px;padding:1px;top:1%;width:50%", h.innerHTML = "", Xa.appendChild(g);
                    var b = a.getComputedStyle(h);
                    c = "1%" !== b.top, f = "2px" === b.marginLeft, d = "4px" === b.width, h.style.marginRight = "50%", e = "4px" === b.marginRight, Xa.removeChild(g), h = null
                }
            }
            var c, d, e, f, g = ba.createElement("div"),
                h = ba.createElement("div");
            h.style && (h.style.backgroundClip = "content-box", h.cloneNode(!0).style.backgroundClip = "", ma.clearCloneStyle = "content-box" === h.style.backgroundClip, g.style.cssText = "border:0;width:8px;height:0;top:0;left:-9999px;padding:0;margin-top:1px;position:absolute", g.appendChild(h), oa.extend(ma, {
                pixelPosition: function() {
                    return b(), c
                },
                boxSizingReliable: function() {
                    return b(), d
                },
                pixelMarginRight: function() {
                    return b(), e
                },
                reliableMarginLeft: function() {
                    return b(), f
                }
            }))
        }();
        var hb = /^(none|table(?!-c[ea]).+)/,
            ib = {
                position: "absolute",
                visibility: "hidden",
                display: "block"
            },
            jb = {
                letterSpacing: "0",
                fontWeight: "400"
            },
            kb = ["Webkit", "Moz", "ms"],
            lb = ba.createElement("div").style;
        oa.extend({
            cssHooks: {
                opacity: {
                    get: function(a, b) {
                        if (b) {
                            var c = F(a, "opacity");
                            return "" === c ? "1" : c
                        }
                    }
                }
            },
            cssNumber: {
                animationIterationCount: !0,
                columnCount: !0,
                fillOpacity: !0,
                flexGrow: !0,
                flexShrink: !0,
                fontWeight: !0,
                lineHeight: !0,
                opacity: !0,
                order: !0,
                orphans: !0,
                widows: !0,
                zIndex: !0,
                zoom: !0
            },
            cssProps: {
                float: "cssFloat"
            },
            style: function(a, b, c, d) {
                if (a && 3 !== a.nodeType && 8 !== a.nodeType && a.style) {
                    var e, f, g, h = oa.camelCase(b),
                        i = a.style;
                    return b = oa.cssProps[h] || (oa.cssProps[h] = H(h) || h), g = oa.cssHooks[b] || oa.cssHooks[h], void 0 === c ? g && "get" in g && void 0 !== (e = g.get(a, !1, d)) ? e : i[b] : (f = typeof c, "string" === f && (e = Na.exec(c)) && e[1] && (c = o(a, b, e), f = "number"), void(null != c && c === c && ("number" === f && (c += e && e[3] || (oa.cssNumber[h] ? "" : "px")), ma.clearCloneStyle || "" !== c || 0 !== b.indexOf("background") || (i[b] = "inherit"), g && "set" in g && void 0 === (c = g.set(a, c, d)) || (i[b] = c))))
                }
            },
            css: function(a, b, c, d) {
                var e, f, g, h = oa.camelCase(b);
                return b = oa.cssProps[h] || (oa.cssProps[h] = H(h) || h), g = oa.cssHooks[b] || oa.cssHooks[h], g && "get" in g && (e = g.get(a, !0, c)), void 0 === e && (e = F(a, b, d)), "normal" === e && b in jb && (e = jb[b]), "" === c || c ? (f = parseFloat(e), !0 === c || isFinite(f) ? f || 0 : e) : e
            }
        }), oa.each(["height", "width"], function(a, b) {
            oa.cssHooks[b] = {
                get: function(a, c, d) {
                    if (c) return !hb.test(oa.css(a, "display")) || a.getClientRects().length && a.getBoundingClientRect().width ? K(a, b, d) : Qa(a, ib, function() {
                        return K(a, b, d)
                    })
                },
                set: function(a, c, d) {
                    var e, f = d && gb(a),
                        g = d && J(a, b, d, "border-box" === oa.css(a, "boxSizing", !1, f), f);
                    return g && (e = Na.exec(c)) && "px" !== (e[3] || "px") && (a.style[b] = c, c = oa.css(a, b)), I(a, c, g)
                }
            }
        }), oa.cssHooks.marginLeft = G(ma.reliableMarginLeft, function(a, b) {
            if (b) return (parseFloat(F(a, "marginLeft")) || a.getBoundingClientRect().left - Qa(a, {
                marginLeft: 0
            }, function() {
                return a.getBoundingClientRect().left
            })) + "px"
        }), oa.each({
            margin: "",
            padding: "",
            border: "Width"
        }, function(a, b) {
            oa.cssHooks[a + b] = {
                expand: function(c) {
                    for (var d = 0, e = {}, f = "string" == typeof c ? c.split(" ") : [c]; d < 4; d++) e[a + Oa[d] + b] = f[d] || f[d - 2] || f[0];
                    return e
                }
            }, eb.test(a) || (oa.cssHooks[a + b].set = I)
        }), oa.fn.extend({
            css: function(a, b) {
                return Ga(this, function(a, b, c) {
                    var d, e, f = {},
                        g = 0;
                    if (oa.isArray(b)) {
                        for (d = gb(a), e = b.length; g < e; g++) f[b[g]] = oa.css(a, b[g], !1, d);
                        return f
                    }
                    return void 0 !== c ? oa.style(a, b, c) : oa.css(a, b)
                }, a, b, arguments.length > 1)
            }
        }), oa.Tween = L, L.prototype = {
            constructor: L,
            init: function(a, b, c, d, e, f) {
                this.elem = a, this.prop = c, this.easing = e || oa.easing._default, this.options = b, this.start = this.now = this.cur(), this.end = d, this.unit = f || (oa.cssNumber[c] ? "" : "px")
            },
            cur: function() {
                var a = L.propHooks[this.prop];
                return a && a.get ? a.get(this) : L.propHooks._default.get(this)
            },
            run: function(a) {
                var b, c = L.propHooks[this.prop];
                return this.options.duration ? this.pos = b = oa.easing[this.easing](a, this.options.duration * a, 0, 1, this.options.duration) : this.pos = b = a, this.now = (this.end - this.start) * b + this.start, this.options.step && this.options.step.call(this.elem, this.now, this), c && c.set ? c.set(this) : L.propHooks._default.set(this), this
            }
        }, L.prototype.init.prototype = L.prototype, L.propHooks = {
            _default: {
                get: function(a) {
                    var b;
                    return 1 !== a.elem.nodeType || null != a.elem[a.prop] && null == a.elem.style[a.prop] ? a.elem[a.prop] : (b = oa.css(a.elem, a.prop, ""), b && "auto" !== b ? b : 0)
                },
                set: function(a) {
                    oa.fx.step[a.prop] ? oa.fx.step[a.prop](a) : 1 !== a.elem.nodeType || null == a.elem.style[oa.cssProps[a.prop]] && !oa.cssHooks[a.prop] ? a.elem[a.prop] = a.now : oa.style(a.elem, a.prop, a.now + a.unit)
                }
            }
        }, L.propHooks.scrollTop = L.propHooks.scrollLeft = {
            set: function(a) {
                a.elem.nodeType && a.elem.parentNode && (a.elem[a.prop] = a.now)
            }
        }, oa.easing = {
            linear: function(a) {
                return a
            },
            swing: function(a) {
                return .5 - Math.cos(a * Math.PI) / 2
            },
            _default: "swing"
        }, oa.fx = L.prototype.init, oa.fx.step = {};
        var mb, nb, ob = /^(?:toggle|show|hide)$/,
            pb = /queueHooks$/;
        oa.Animation = oa.extend(S, {
                tweeners: {
                    "*": [function(a, b) {
                        var c = this.createTween(a, b);
                        return o(c.elem, a, Na.exec(b), c), c
                    }]
                },
                tweener: function(a, b) {
                    oa.isFunction(a) ? (b = a, a = ["*"]) : a = a.match(Da);
                    for (var c, d = 0, e = a.length; d < e; d++) c = a[d], S.tweeners[c] = S.tweeners[c] || [], S.tweeners[c].unshift(b)
                },
                prefilters: [Q],
                prefilter: function(a, b) {
                    b ? S.prefilters.unshift(a) : S.prefilters.push(a)
                }
            }), oa.speed = function(a, b, c) {
                var d = a && "object" == typeof a ? oa.extend({}, a) : {
                    complete: c || !c && b || oa.isFunction(a) && a,
                    duration: a,
                    easing: c && b || b && !oa.isFunction(b) && b
                };
                return oa.fx.off || ba.hidden ? d.duration = 0 : "number" != typeof d.duration && (d.duration in oa.fx.speeds ? d.duration = oa.fx.speeds[d.duration] : d.duration = oa.fx.speeds._default), null != d.queue && !0 !== d.queue || (d.queue = "fx"), d.old = d.complete, d.complete = function() {
                    oa.isFunction(d.old) && d.old.call(this), d.queue && oa.dequeue(this, d.queue)
                }, d
            }, oa.fn.extend({
                fadeTo: function(a, b, c, d) {
                    return this.filter(Pa).css("opacity", 0).show().end().animate({
                        opacity: b
                    }, a, c, d)
                },
                animate: function(a, b, c, d) {
                    var e = oa.isEmptyObject(a),
                        f = oa.speed(b, c, d),
                        g = function() {
                            var b = S(this, oa.extend({}, a), f);
                            (e || Ia.get(this, "finish")) && b.stop(!0)
                        };
                    return g.finish = g, e || !1 === f.queue ? this.each(g) : this.queue(f.queue, g)
                },
                stop: function(a, b, c) {
                    var d = function(a) {
                        var b = a.stop;
                        delete a.stop, b(c)
                    };
                    return "string" != typeof a && (c = b, b = a, a = void 0), b && !1 !== a && this.queue(a || "fx", []), this.each(function() {
                        var b = !0,
                            e = null != a && a + "queueHooks",
                            f = oa.timers,
                            g = Ia.get(this);
                        if (e) g[e] && g[e].stop && d(g[e]);
                        else
                            for (e in g) g[e] && g[e].stop && pb.test(e) && d(g[e]);
                        for (e = f.length; e--;) f[e].elem !== this || null != a && f[e].queue !== a || (f[e].anim.stop(c), b = !1, f.splice(e, 1));
                        !b && c || oa.dequeue(this, a)
                    })
                },
                finish: function(a) {
                    return !1 !== a && (a = a || "fx"), this.each(function() {
                        var b, c = Ia.get(this),
                            d = c[a + "queue"],
                            e = c[a + "queueHooks"],
                            f = oa.timers,
                            g = d ? d.length : 0;
                        for (c.finish = !0, oa.queue(this, a, []), e && e.stop && e.stop.call(this, !0), b = f.length; b--;) f[b].elem === this && f[b].queue === a && (f[b].anim.stop(!0), f.splice(b, 1));
                        for (b = 0; b < g; b++) d[b] && d[b].finish && d[b].finish.call(this);
                        delete c.finish
                    })
                }
            }), oa.each(["toggle", "show", "hide"], function(a, b) {
                var c = oa.fn[b];
                oa.fn[b] = function(a, d, e) {
                    return null == a || "boolean" == typeof a ? c.apply(this, arguments) : this.animate(O(b, !0), a, d, e)
                }
            }), oa.each({
                slideDown: O("show"),
                slideUp: O("hide"),
                slideToggle: O("toggle"),
                fadeIn: {
                    opacity: "show"
                },
                fadeOut: {
                    opacity: "hide"
                },
                fadeToggle: {
                    opacity: "toggle"
                }
            }, function(a, b) {
                oa.fn[a] = function(a, c, d) {
                    return this.animate(b, a, c, d)
                }
            }), oa.timers = [], oa.fx.tick = function() {
                var a, b = 0,
                    c = oa.timers;
                for (mb = oa.now(); b < c.length; b++)(a = c[b])() || c[b] !== a || c.splice(b--, 1);
                c.length || oa.fx.stop(), mb = void 0
            }, oa.fx.timer = function(a) {
                oa.timers.push(a), a() ? oa.fx.start() : oa.timers.pop()
            }, oa.fx.interval = 13, oa.fx.start = function() {
                nb || (nb = a.requestAnimationFrame ? a.requestAnimationFrame(M) : a.setInterval(oa.fx.tick, oa.fx.interval))
            }, oa.fx.stop = function() {
                a.cancelAnimationFrame ? a.cancelAnimationFrame(nb) : a.clearInterval(nb), nb = null
            }, oa.fx.speeds = {
                slow: 600,
                fast: 200,
                _default: 400
            }, oa.fn.delay = function(b, c) {
                return b = oa.fx ? oa.fx.speeds[b] || b : b, c = c || "fx", this.queue(c, function(c, d) {
                    var e = a.setTimeout(c, b);
                    d.stop = function() {
                        a.clearTimeout(e)
                    }
                })
            },
            function() {
                var a = ba.createElement("input"),
                    b = ba.createElement("select"),
                    c = b.appendChild(ba.createElement("option"));
                a.type = "checkbox", ma.checkOn = "" !== a.value, ma.optSelected = c.selected, a = ba.createElement("input"), a.value = "t", a.type = "radio", ma.radioValue = "t" === a.value
            }();
        var qb, rb = oa.expr.attrHandle;
        oa.fn.extend({
            attr: function(a, b) {
                return Ga(this, oa.attr, a, b, arguments.length > 1)
            },
            removeAttr: function(a) {
                return this.each(function() {
                    oa.removeAttr(this, a)
                })
            }
        }), oa.extend({
            attr: function(a, b, c) {
                var d, e, f = a.nodeType;
                if (3 !== f && 8 !== f && 2 !== f) return void 0 === a.getAttribute ? oa.prop(a, b, c) : (1 === f && oa.isXMLDoc(a) || (e = oa.attrHooks[b.toLowerCase()] || (oa.expr.match.bool.test(b) ? qb : void 0)), void 0 !== c ? null === c ? void oa.removeAttr(a, b) : e && "set" in e && void 0 !== (d = e.set(a, c, b)) ? d : (a.setAttribute(b, c + ""), c) : e && "get" in e && null !== (d = e.get(a, b)) ? d : (d = oa.find.attr(a, b), null == d ? void 0 : d))
            },
            attrHooks: {
                type: {
                    set: function(a, b) {
                        if (!ma.radioValue && "radio" === b && oa.nodeName(a, "input")) {
                            var c = a.value;
                            return a.setAttribute("type", b), c && (a.value = c), b
                        }
                    }
                }
            },
            removeAttr: function(a, b) {
                var c, d = 0,
                    e = b && b.match(Da);
                if (e && 1 === a.nodeType)
                    for (; c = e[d++];) a.removeAttribute(c)
            }
        }), qb = {
            set: function(a, b, c) {
                return !1 === b ? oa.removeAttr(a, c) : a.setAttribute(c, c), c
            }
        }, oa.each(oa.expr.match.bool.source.match(/\w+/g), function(a, b) {
            var c = rb[b] || oa.find.attr;
            rb[b] = function(a, b, d) {
                var e, f, g = b.toLowerCase();
                return d || (f = rb[g], rb[g] = e, e = null != c(a, b, d) ? g : null, rb[g] = f), e
            }
        });
        var sb = /^(?:input|select|textarea|button)$/i,
            tb = /^(?:a|area)$/i;
        oa.fn.extend({
            prop: function(a, b) {
                return Ga(this, oa.prop, a, b, arguments.length > 1)
            },
            removeProp: function(a) {
                return this.each(function() {
                    delete this[oa.propFix[a] || a]
                })
            }
        }), oa.extend({
            prop: function(a, b, c) {
                var d, e, f = a.nodeType;
                if (3 !== f && 8 !== f && 2 !== f) return 1 === f && oa.isXMLDoc(a) || (b = oa.propFix[b] || b, e = oa.propHooks[b]), void 0 !== c ? e && "set" in e && void 0 !== (d = e.set(a, c, b)) ? d : a[b] = c : e && "get" in e && null !== (d = e.get(a, b)) ? d : a[b]
            },
            propHooks: {
                tabIndex: {
                    get: function(a) {
                        var b = oa.find.attr(a, "tabindex");
                        return b ? parseInt(b, 10) : sb.test(a.nodeName) || tb.test(a.nodeName) && a.href ? 0 : -1
                    }
                }
            },
            propFix: {
                for: "htmlFor",
                class: "className"
            }
        }), ma.optSelected || (oa.propHooks.selected = {
            get: function(a) {
                var b = a.parentNode;
                return b && b.parentNode && b.parentNode.selectedIndex, null
            },
            set: function(a) {
                var b = a.parentNode;
                b && (b.selectedIndex, b.parentNode && b.parentNode.selectedIndex)
            }
        }), oa.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"], function() {
            oa.propFix[this.toLowerCase()] = this
        }), oa.fn.extend({
            addClass: function(a) {
                var b, c, d, e, f, g, h, i = 0;
                if (oa.isFunction(a)) return this.each(function(b) {
                    oa(this).addClass(a.call(this, b, U(this)))
                });
                if ("string" == typeof a && a)
                    for (b = a.match(Da) || []; c = this[i++];)
                        if (e = U(c), d = 1 === c.nodeType && " " + T(e) + " ") {
                            for (g = 0; f = b[g++];) d.indexOf(" " + f + " ") < 0 && (d += f + " ");
                            h = T(d), e !== h && c.setAttribute("class", h)
                        }
                return this
            },
            removeClass: function(a) {
                var b, c, d, e, f, g, h, i = 0;
                if (oa.isFunction(a)) return this.each(function(b) {
                    oa(this).removeClass(a.call(this, b, U(this)))
                });
                if (!arguments.length) return this.attr("class", "");
                if ("string" == typeof a && a)
                    for (b = a.match(Da) || []; c = this[i++];)
                        if (e = U(c), d = 1 === c.nodeType && " " + T(e) + " ") {
                            for (g = 0; f = b[g++];)
                                for (; d.indexOf(" " + f + " ") > -1;) d = d.replace(" " + f + " ", " ");
                            h = T(d), e !== h && c.setAttribute("class", h)
                        }
                return this
            },
            toggleClass: function(a, b) {
                var c = typeof a;
                return "boolean" == typeof b && "string" === c ? b ? this.addClass(a) : this.removeClass(a) : oa.isFunction(a) ? this.each(function(c) {
                    oa(this).toggleClass(a.call(this, c, U(this), b), b)
                }) : this.each(function() {
                    var b, d, e, f;
                    if ("string" === c)
                        for (d = 0, e = oa(this), f = a.match(Da) || []; b = f[d++];) e.hasClass(b) ? e.removeClass(b) : e.addClass(b);
                    else void 0 !== a && "boolean" !== c || (b = U(this), b && Ia.set(this, "__className__", b), this.setAttribute && this.setAttribute("class", b || !1 === a ? "" : Ia.get(this, "__className__") || ""))
                })
            },
            hasClass: function(a) {
                var b, c, d = 0;
                for (b = " " + a + " "; c = this[d++];)
                    if (1 === c.nodeType && (" " + T(U(c)) + " ").indexOf(b) > -1) return !0;
                return !1
            }
        });
        var ub = /\r/g;
        oa.fn.extend({
            val: function(a) {
                var b, c, d, e = this[0];
                return arguments.length ? (d = oa.isFunction(a), this.each(function(c) {
                    var e;
                    1 === this.nodeType && (e = d ? a.call(this, c, oa(this).val()) : a, null == e ? e = "" : "number" == typeof e ? e += "" : oa.isArray(e) && (e = oa.map(e, function(a) {
                        return null == a ? "" : a + ""
                    })), (b = oa.valHooks[this.type] || oa.valHooks[this.nodeName.toLowerCase()]) && "set" in b && void 0 !== b.set(this, e, "value") || (this.value = e))
                })) : e ? (b = oa.valHooks[e.type] || oa.valHooks[e.nodeName.toLowerCase()], b && "get" in b && void 0 !== (c = b.get(e, "value")) ? c : (c = e.value, "string" == typeof c ? c.replace(ub, "") : null == c ? "" : c)) : void 0
            }
        }), oa.extend({
            valHooks: {
                option: {
                    get: function(a) {
                        var b = oa.find.attr(a, "value");
                        return null != b ? b : T(oa.text(a))
                    }
                },
                select: {
                    get: function(a) {
                        var b, c, d, e = a.options,
                            f = a.selectedIndex,
                            g = "select-one" === a.type,
                            h = g ? null : [],
                            i = g ? f + 1 : e.length;
                        for (d = f < 0 ? i : g ? f : 0; d < i; d++)
                            if (c = e[d], (c.selected || d === f) && !c.disabled && (!c.parentNode.disabled || !oa.nodeName(c.parentNode, "optgroup"))) {
                                if (b = oa(c).val(), g) return b;
                                h.push(b)
                            }
                        return h
                    },
                    set: function(a, b) {
                        for (var c, d, e = a.options, f = oa.makeArray(b), g = e.length; g--;) d = e[g], (d.selected = oa.inArray(oa.valHooks.option.get(d), f) > -1) && (c = !0);
                        return c || (a.selectedIndex = -1), f
                    }
                }
            }
        }), oa.each(["radio", "checkbox"], function() {
            oa.valHooks[this] = {
                set: function(a, b) {
                    if (oa.isArray(b)) return a.checked = oa.inArray(oa(a).val(), b) > -1
                }
            }, ma.checkOn || (oa.valHooks[this].get = function(a) {
                return null === a.getAttribute("value") ? "on" : a.value
            })
        });
        var vb = /^(?:focusinfocus|focusoutblur)$/;
        oa.extend(oa.event, {
            trigger: function(b, c, d, e) {
                var f, g, h, i, j, k, l, m = [d || ba],
                    n = ja.call(b, "type") ? b.type : b,
                    o = ja.call(b, "namespace") ? b.namespace.split(".") : [];
                if (g = h = d = d || ba, 3 !== d.nodeType && 8 !== d.nodeType && !vb.test(n + oa.event.triggered) && (n.indexOf(".") > -1 && (o = n.split("."), n = o.shift(), o.sort()), j = n.indexOf(":") < 0 && "on" + n, b = b[oa.expando] ? b : new oa.Event(n, "object" == typeof b && b), b.isTrigger = e ? 2 : 3, b.namespace = o.join("."), b.rnamespace = b.namespace ? new RegExp("(^|\\.)" + o.join("\\.(?:.*\\.|)") + "(\\.|$)") : null, b.result = void 0, b.target || (b.target = d), c = null == c ? [b] : oa.makeArray(c, [b]), l = oa.event.special[n] || {}, e || !l.trigger || !1 !== l.trigger.apply(d, c))) {
                    if (!e && !l.noBubble && !oa.isWindow(d)) {
                        for (i = l.delegateType || n, vb.test(i + n) || (g = g.parentNode); g; g = g.parentNode) m.push(g), h = g;
                        h === (d.ownerDocument || ba) && m.push(h.defaultView || h.parentWindow || a)
                    }
                    for (f = 0;
                        (g = m[f++]) && !b.isPropagationStopped();) b.type = f > 1 ? i : l.bindType || n, k = (Ia.get(g, "events") || {})[b.type] && Ia.get(g, "handle"), k && k.apply(g, c), (k = j && g[j]) && k.apply && Ha(g) && (b.result = k.apply(g, c), !1 === b.result && b.preventDefault());
                    return b.type = n, e || b.isDefaultPrevented() || l._default && !1 !== l._default.apply(m.pop(), c) || !Ha(d) || j && oa.isFunction(d[n]) && !oa.isWindow(d) && (h = d[j], h && (d[j] = null), oa.event.triggered = n, d[n](), oa.event.triggered = void 0, h && (d[j] = h)), b.result
                }
            },
            simulate: function(a, b, c) {
                var d = oa.extend(new oa.Event, c, {
                    type: a,
                    isSimulated: !0
                });
                oa.event.trigger(d, null, b)
            }
        }), oa.fn.extend({
            trigger: function(a, b) {
                return this.each(function() {
                    oa.event.trigger(a, b, this)
                })
            },
            triggerHandler: function(a, b) {
                var c = this[0];
                if (c) return oa.event.trigger(a, b, c, !0)
            }
        }), oa.each("blur focus focusin focusout resize scroll click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup contextmenu".split(" "), function(a, b) {
            oa.fn[b] = function(a, c) {
                return arguments.length > 0 ? this.on(b, null, a, c) : this.trigger(b)
            }
        }), oa.fn.extend({
            hover: function(a, b) {
                return this.mouseenter(a).mouseleave(b || a)
            }
        }), ma.focusin = "onfocusin" in a, ma.focusin || oa.each({
            focus: "focusin",
            blur: "focusout"
        }, function(a, b) {
            var c = function(a) {
                oa.event.simulate(b, a.target, oa.event.fix(a))
            };
            oa.event.special[b] = {
                setup: function() {
                    var d = this.ownerDocument || this,
                        e = Ia.access(d, b);
                    e || d.addEventListener(a, c, !0), Ia.access(d, b, (e || 0) + 1)
                },
                teardown: function() {
                    var d = this.ownerDocument || this,
                        e = Ia.access(d, b) - 1;
                    e ? Ia.access(d, b, e) : (d.removeEventListener(a, c, !0), Ia.remove(d, b))
                }
            }
        });
        var wb = a.location,
            xb = oa.now(),
            yb = /\?/;
        oa.parseXML = function(b) {
            var c;
            if (!b || "string" != typeof b) return null;
            try {
                c = (new a.DOMParser).parseFromString(b, "text/xml")
            } catch (a) {
                c = void 0
            }
            return c && !c.getElementsByTagName("parsererror").length || oa.error("Invalid XML: " + b), c
        };
        var zb = /\[\]$/,
            Ab = /\r?\n/g,
            Bb = /^(?:submit|button|image|reset|file)$/i,
            Cb = /^(?:input|select|textarea|keygen)/i;
        oa.param = function(a, b) {
            var c, d = [],
                e = function(a, b) {
                    var c = oa.isFunction(b) ? b() : b;
                    d[d.length] = encodeURIComponent(a) + "=" + encodeURIComponent(null == c ? "" : c)
                };
            if (oa.isArray(a) || a.jquery && !oa.isPlainObject(a)) oa.each(a, function() {
                e(this.name, this.value)
            });
            else
                for (c in a) V(c, a[c], b, e);
            return d.join("&")
        }, oa.fn.extend({
            serialize: function() {
                return oa.param(this.serializeArray())
            },
            serializeArray: function() {
                return this.map(function() {
                    var a = oa.prop(this, "elements");
                    return a ? oa.makeArray(a) : this
                }).filter(function() {
                    var a = this.type;
                    return this.name && !oa(this).is(":disabled") && Cb.test(this.nodeName) && !Bb.test(a) && (this.checked || !Sa.test(a))
                }).map(function(a, b) {
                    var c = oa(this).val();
                    return null == c ? null : oa.isArray(c) ? oa.map(c, function(a) {
                        return {
                            name: b.name,
                            value: a.replace(Ab, "\r\n")
                        }
                    }) : {
                        name: b.name,
                        value: c.replace(Ab, "\r\n")
                    }
                }).get()
            }
        });
        var Db = /%20/g,
            Eb = /#.*$/,
            Fb = /([?&])_=[^&]*/,
            Gb = /^(.*?):[ \t]*([^\r\n]*)$/gm,
            Hb = /^(?:about|app|app-storage|.+-extension|file|res|widget):$/,
            Ib = /^(?:GET|HEAD)$/,
            Jb = /^\/\//,
            Kb = {},
            Lb = {},
            Mb = "*/".concat("*"),
            Nb = ba.createElement("a");
        Nb.href = wb.href, oa.extend({
            active: 0,
            lastModified: {},
            etag: {},
            ajaxSettings: {
                url: wb.href,
                type: "GET",
                isLocal: Hb.test(wb.protocol),
                global: !0,
                processData: !0,
                async: !0,
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                accepts: {
                    "*": Mb,
                    text: "text/plain",
                    html: "text/html",
                    xml: "application/xml, text/xml",
                    json: "application/json, text/javascript"
                },
                contents: {
                    xml: /\bxml\b/,
                    html: /\bhtml/,
                    json: /\bjson\b/
                },
                responseFields: {
                    xml: "responseXML",
                    text: "responseText",
                    json: "responseJSON"
                },
                converters: {
                    "* text": String,
                    "text html": !0,
                    "text json": JSON.parse,
                    "text xml": oa.parseXML
                },
                flatOptions: {
                    url: !0,
                    context: !0
                }
            },
            ajaxSetup: function(a, b) {
                return b ? Y(Y(a, oa.ajaxSettings), b) : Y(oa.ajaxSettings, a)
            },
            ajaxPrefilter: W(Kb),
            ajaxTransport: W(Lb),
            ajax: function(b, c) {
                function d(b, c, d, h) {
                    var j, m, n, u, v, w = c;
                    k || (k = !0, i && a.clearTimeout(i), e = void 0, g = h || "", x.readyState = b > 0 ? 4 : 0, j = b >= 200 && b < 300 || 304 === b, d && (u = Z(o, x, d)), u = $(o, u, x, j), j ? (o.ifModified && (v = x.getResponseHeader("Last-Modified"), v && (oa.lastModified[f] = v), (v = x.getResponseHeader("etag")) && (oa.etag[f] = v)), 204 === b || "HEAD" === o.type ? w = "nocontent" : 304 === b ? w = "notmodified" : (w = u.state, m = u.data, n = u.error, j = !n)) : (n = w, !b && w || (w = "error", b < 0 && (b = 0))), x.status = b, x.statusText = (c || w) + "", j ? r.resolveWith(p, [m, w, x]) : r.rejectWith(p, [x, w, n]), x.statusCode(t), t = void 0, l && q.trigger(j ? "ajaxSuccess" : "ajaxError", [x, o, j ? m : n]), s.fireWith(p, [x, w]), l && (q.trigger("ajaxComplete", [x, o]), --oa.active || oa.event.trigger("ajaxStop")))
                }
                "object" == typeof b && (c = b, b = void 0), c = c || {};
                var e, f, g, h, i, j, k, l, m, n, o = oa.ajaxSetup({}, c),
                    p = o.context || o,
                    q = o.context && (p.nodeType || p.jquery) ? oa(p) : oa.event,
                    r = oa.Deferred(),
                    s = oa.Callbacks("once memory"),
                    t = o.statusCode || {},
                    u = {},
                    v = {},
                    w = "canceled",
                    x = {
                        readyState: 0,
                        getResponseHeader: function(a) {
                            var b;
                            if (k) {
                                if (!h)
                                    for (h = {}; b = Gb.exec(g);) h[b[1].toLowerCase()] = b[2];
                                b = h[a.toLowerCase()]
                            }
                            return null == b ? null : b
                        },
                        getAllResponseHeaders: function() {
                            return k ? g : null
                        },
                        setRequestHeader: function(a, b) {
                            return null == k && (a = v[a.toLowerCase()] = v[a.toLowerCase()] || a, u[a] = b), this
                        },
                        overrideMimeType: function(a) {
                            return null == k && (o.mimeType = a), this
                        },
                        statusCode: function(a) {
                            var b;
                            if (a)
                                if (k) x.always(a[x.status]);
                                else
                                    for (b in a) t[b] = [t[b], a[b]];
                            return this
                        },
                        abort: function(a) {

                            var b = a || w;
                            return e && e.abort(b), d(0, b), this
                        }
                    };
                if (r.promise(x), o.url = ((b || o.url || wb.href) + "").replace(Jb, wb.protocol + "//"), o.type = c.method || c.type || o.method || o.type, o.dataTypes = (o.dataType || "*").toLowerCase().match(Da) || [""], null == o.crossDomain) {
                    j = ba.createElement("a");
                    try {
                        j.href = o.url, j.href = j.href, o.crossDomain = Nb.protocol + "//" + Nb.host != j.protocol + "//" + j.host
                    } catch (a) {
                        o.crossDomain = !0
                    }
                }
                if (o.data && o.processData && "string" != typeof o.data && (o.data = oa.param(o.data, o.traditional)), X(Kb, o, c, x), k) return x;
                l = oa.event && o.global, l && 0 == oa.active++ && oa.event.trigger("ajaxStart"), o.type = o.type.toUpperCase(), o.hasContent = !Ib.test(o.type), f = o.url.replace(Eb, ""), o.hasContent ? o.data && o.processData && 0 === (o.contentType || "").indexOf("application/x-www-form-urlencoded") && (o.data = o.data.replace(Db, "+")) : (n = o.url.slice(f.length), o.data && (f += (yb.test(f) ? "&" : "?") + o.data, delete o.data), !1 === o.cache && (f = f.replace(Fb, "$1"), n = (yb.test(f) ? "&" : "?") + "_=" + xb++ + n), o.url = f + n), o.ifModified && (oa.lastModified[f] && x.setRequestHeader("If-Modified-Since", oa.lastModified[f]), oa.etag[f] && x.setRequestHeader("If-None-Match", oa.etag[f])), (o.data && o.hasContent && !1 !== o.contentType || c.contentType) && x.setRequestHeader("Content-Type", o.contentType), x.setRequestHeader("Accept", o.dataTypes[0] && o.accepts[o.dataTypes[0]] ? o.accepts[o.dataTypes[0]] + ("*" !== o.dataTypes[0] ? ", " + Mb + "; q=0.01" : "") : o.accepts["*"]);
                for (m in o.headers) x.setRequestHeader(m, o.headers[m]);
                if (o.beforeSend && (!1 === o.beforeSend.call(p, x, o) || k)) return x.abort();
                if (w = "abort", s.add(o.complete), x.done(o.success), x.fail(o.error), e = X(Lb, o, c, x)) {
                    if (x.readyState = 1, l && q.trigger("ajaxSend", [x, o]), k) return x;
                    o.async && o.timeout > 0 && (i = a.setTimeout(function() {
                        x.abort("timeout")
                    }, o.timeout));
                    try {
                        k = !1, e.send(u, d)
                    } catch (a) {
                        if (k) throw a;
                        d(-1, a)
                    }
                } else d(-1, "No Transport");
                return x
            },
            getJSON: function(a, b, c) {
                return oa.get(a, b, c, "json")
            },
            getScript: function(a, b) {
                return oa.get(a, void 0, b, "script")
            }
        }), oa.each(["get", "post"], function(a, b) {
            oa[b] = function(a, c, d, e) {
                return oa.isFunction(c) && (e = e || d, d = c, c = void 0), oa.ajax(oa.extend({
                    url: a,
                    type: b,
                    dataType: e,
                    data: c,
                    success: d
                }, oa.isPlainObject(a) && a))
            }
        }), oa._evalUrl = function(a) {
            return oa.ajax({
                url: a,
                type: "GET",
                dataType: "script",
                cache: !0,
                async: !1,
                global: !1,
                throws: !0
            })
        }, oa.fn.extend({
            wrapAll: function(a) {
                var b;
                return this[0] && (oa.isFunction(a) && (a = a.call(this[0])), b = oa(a, this[0].ownerDocument).eq(0).clone(!0), this[0].parentNode && b.insertBefore(this[0]), b.map(function() {
                    for (var a = this; a.firstElementChild;) a = a.firstElementChild;
                    return a
                }).append(this)), this
            },
            wrapInner: function(a) {
                return oa.isFunction(a) ? this.each(function(b) {
                    oa(this).wrapInner(a.call(this, b))
                }) : this.each(function() {
                    var b = oa(this),
                        c = b.contents();
                    c.length ? c.wrapAll(a) : b.append(a)
                })
            },
            wrap: function(a) {
                var b = oa.isFunction(a);
                return this.each(function(c) {
                    oa(this).wrapAll(b ? a.call(this, c) : a)
                })
            },
            unwrap: function(a) {
                return this.parent(a).not("body").each(function() {
                    oa(this).replaceWith(this.childNodes)
                }), this
            }
        }), oa.expr.pseudos.hidden = function(a) {
            return !oa.expr.pseudos.visible(a)
        }, oa.expr.pseudos.visible = function(a) {
            return !!(a.offsetWidth || a.offsetHeight || a.getClientRects().length)
        }, oa.ajaxSettings.xhr = function() {
            try {
                return new a.XMLHttpRequest
            } catch (a) {}
        };
        var Ob = {
                0: 200,
                1223: 204
            },
            Pb = oa.ajaxSettings.xhr();
        ma.cors = !!Pb && "withCredentials" in Pb, ma.ajax = Pb = !!Pb, oa.ajaxTransport(function(b) {
            var c, d;
            if (ma.cors || Pb && !b.crossDomain) return {
                send: function(e, f) {
                    var g, h = b.xhr();
                    if (h.open(b.type, b.url, b.async, b.username, b.password), b.xhrFields)
                        for (g in b.xhrFields) h[g] = b.xhrFields[g];
                    b.mimeType && h.overrideMimeType && h.overrideMimeType(b.mimeType), b.crossDomain || e["X-Requested-With"] || (e["X-Requested-With"] = "XMLHttpRequest");
                    for (g in e) h.setRequestHeader(g, e[g]);
                    c = function(a) {
                        return function() {
                            c && (c = d = h.onload = h.onerror = h.onabort = h.onreadystatechange = null, "abort" === a ? h.abort() : "error" === a ? "number" != typeof h.status ? f(0, "error") : f(h.status, h.statusText) : f(Ob[h.status] || h.status, h.statusText, "text" !== (h.responseType || "text") || "string" != typeof h.responseText ? {
                                binary: h.response
                            } : {
                                text: h.responseText
                            }, h.getAllResponseHeaders()))
                        }
                    }, h.onload = c(), d = h.onerror = c("error"), void 0 !== h.onabort ? h.onabort = d : h.onreadystatechange = function() {
                        4 === h.readyState && a.setTimeout(function() {
                            c && d()
                        })
                    }, c = c("abort");
                    try {
                        h.send(b.hasContent && b.data || null)
                    } catch (a) {
                        if (c) throw a
                    }
                },
                abort: function() {
                    c && c()
                }
            }
        }), oa.ajaxPrefilter(function(a) {
            a.crossDomain && (a.contents.script = !1)
        }), oa.ajaxSetup({
            accepts: {
                script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"
            },
            contents: {
                script: /\b(?:java|ecma)script\b/
            },
            converters: {
                "text script": function(a) {
                    return oa.globalEval(a), a
                }
            }
        }), oa.ajaxPrefilter("script", function(a) {
            void 0 === a.cache && (a.cache = !1), a.crossDomain && (a.type = "GET")
        }), oa.ajaxTransport("script", function(a) {
            if (a.crossDomain) {
                var b, c;
                return {
                    send: function(d, e) {
                        b = oa("<script>").prop({
                            charset: a.scriptCharset,
                            src: a.url
                        }).on("load error", c = function(a) {
                            b.remove(), c = null, a && e("error" === a.type ? 404 : 200, a.type)
                        }), ba.head.appendChild(b[0])
                    },
                    abort: function() {
                        c && c()
                    }
                }
            }
        });
        var Qb = [],
            Rb = /(=)\?(?=&|$)|\?\?/;
        oa.ajaxSetup({
            jsonp: "callback",
            jsonpCallback: function() {
                var a = Qb.pop() || oa.expando + "_" + xb++;
                return this[a] = !0, a
            }
        }), oa.ajaxPrefilter("json jsonp", function(b, c, d) {
            var e, f, g, h = !1 !== b.jsonp && (Rb.test(b.url) ? "url" : "string" == typeof b.data && 0 === (b.contentType || "").indexOf("application/x-www-form-urlencoded") && Rb.test(b.data) && "data");
            if (h || "jsonp" === b.dataTypes[0]) return e = b.jsonpCallback = oa.isFunction(b.jsonpCallback) ? b.jsonpCallback() : b.jsonpCallback, h ? b[h] = b[h].replace(Rb, "$1" + e) : !1 !== b.jsonp && (b.url += (yb.test(b.url) ? "&" : "?") + b.jsonp + "=" + e), b.converters["script json"] = function() {
                return g || oa.error(e + " was not called"), g[0]
            }, b.dataTypes[0] = "json", f = a[e], a[e] = function() {
                g = arguments
            }, d.always(function() {
                void 0 === f ? oa(a).removeProp(e) : a[e] = f, b[e] && (b.jsonpCallback = c.jsonpCallback, Qb.push(e)), g && oa.isFunction(f) && f(g[0]), g = f = void 0
            }), "script"
        }), ma.createHTMLDocument = function() {
            var a = ba.implementation.createHTMLDocument("").body;
            return a.innerHTML = "<form></form><form></form>", 2 === a.childNodes.length
        }(), oa.parseHTML = function(a, b, c) {
            if ("string" != typeof a) return [];
            "boolean" == typeof b && (c = b, b = !1);
            var d, e, f;
            return b || (ma.createHTMLDocument ? (b = ba.implementation.createHTMLDocument(""), d = b.createElement("base"), d.href = ba.location.href, b.head.appendChild(d)) : b = ba), e = xa.exec(a), f = !c && [], e ? [b.createElement(e[1])] : (e = t([a], b, f), f && f.length && oa(f).remove(), oa.merge([], e.childNodes))
        }, oa.fn.load = function(a, b, c) {
            var d, e, f, g = this,
                h = a.indexOf(" ");
            return h > -1 && (d = T(a.slice(h)), a = a.slice(0, h)), oa.isFunction(b) ? (c = b, b = void 0) : b && "object" == typeof b && (e = "POST"), g.length > 0 && oa.ajax({
                url: a,
                type: e || "GET",
                dataType: "html",
                data: b
            }).done(function(a) {
                f = arguments, g.html(d ? oa("<div>").append(oa.parseHTML(a)).find(d) : a)
            }).always(c && function(a, b) {
                g.each(function() {
                    c.apply(this, f || [a.responseText, b, a])
                })
            }), this
        }, oa.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], function(a, b) {
            oa.fn[b] = function(a) {
                return this.on(b, a)
            }
        }), oa.expr.pseudos.animated = function(a) {
            return oa.grep(oa.timers, function(b) {
                return a === b.elem
            }).length
        }, oa.offset = {
            setOffset: function(a, b, c) {
                var d, e, f, g, h, i, j, k = oa.css(a, "position"),
                    l = oa(a),
                    m = {};
                "static" === k && (a.style.position = "relative"), h = l.offset(), f = oa.css(a, "top"), i = oa.css(a, "left"), j = ("absolute" === k || "fixed" === k) && (f + i).indexOf("auto") > -1, j ? (d = l.position(), g = d.top, e = d.left) : (g = parseFloat(f) || 0, e = parseFloat(i) || 0), oa.isFunction(b) && (b = b.call(a, c, oa.extend({}, h))), null != b.top && (m.top = b.top - h.top + g), null != b.left && (m.left = b.left - h.left + e), "using" in b ? b.using.call(a, m) : l.css(m)
            }
        }, oa.fn.extend({
            offset: function(a) {
                if (arguments.length) return void 0 === a ? this : this.each(function(b) {
                    oa.offset.setOffset(this, a, b)
                });
                var b, c, d, e, f = this[0];
                return f ? f.getClientRects().length ? (d = f.getBoundingClientRect(), d.width || d.height ? (e = f.ownerDocument, c = _(e), b = e.documentElement, {
                    top: d.top + c.pageYOffset - b.clientTop,
                    left: d.left + c.pageXOffset - b.clientLeft
                }) : d) : {
                    top: 0,
                    left: 0
                } : void 0
            },
            position: function() {
                if (this[0]) {
                    var a, b, c = this[0],
                        d = {
                            top: 0,
                            left: 0
                        };
                    return "fixed" === oa.css(c, "position") ? b = c.getBoundingClientRect() : (a = this.offsetParent(), b = this.offset(), oa.nodeName(a[0], "html") || (d = a.offset()), d = {
                        top: d.top + oa.css(a[0], "borderTopWidth", !0),
                        left: d.left + oa.css(a[0], "borderLeftWidth", !0)
                    }), {
                        top: b.top - d.top - oa.css(c, "marginTop", !0),
                        left: b.left - d.left - oa.css(c, "marginLeft", !0)
                    }
                }
            },
            offsetParent: function() {
                return this.map(function() {
                    for (var a = this.offsetParent; a && "static" === oa.css(a, "position");) a = a.offsetParent;
                    return a || Xa
                })
            }
        }), oa.each({
            scrollLeft: "pageXOffset",
            scrollTop: "pageYOffset"
        }, function(a, b) {
            var c = "pageYOffset" === b;
            oa.fn[a] = function(d) {
                return Ga(this, function(a, d, e) {
                    var f = _(a);
                    return void 0 === e ? f ? f[b] : a[d] : void(f ? f.scrollTo(c ? f.pageXOffset : e, c ? e : f.pageYOffset) : a[d] = e)
                }, a, d, arguments.length)
            }
        }), oa.each(["top", "left"], function(a, b) {
            oa.cssHooks[b] = G(ma.pixelPosition, function(a, c) {
                if (c) return c = F(a, b), fb.test(c) ? oa(a).position()[b] + "px" : c
            })
        }), oa.each({
            Height: "height",
            Width: "width"
        }, function(a, b) {
            oa.each({
                padding: "inner" + a,
                content: b,
                "": "outer" + a
            }, function(c, d) {
                oa.fn[d] = function(e, f) {
                    var g = arguments.length && (c || "boolean" != typeof e),
                        h = c || (!0 === e || !0 === f ? "margin" : "border");
                    return Ga(this, function(b, c, e) {
                        var f;
                        return oa.isWindow(b) ? 0 === d.indexOf("outer") ? b["inner" + a] : b.document.documentElement["client" + a] : 9 === b.nodeType ? (f = b.documentElement, Math.max(b.body["scroll" + a], f["scroll" + a], b.body["offset" + a], f["offset" + a], f["client" + a])) : void 0 === e ? oa.css(b, c, h) : oa.style(b, c, e, h)
                    }, b, g ? e : void 0, g)
                }
            })
        }), oa.fn.extend({
            bind: function(a, b, c) {
                return this.on(a, null, b, c)
            },
            unbind: function(a, b) {
                return this.off(a, null, b)
            },
            delegate: function(a, b, c, d) {
                return this.on(b, a, c, d)
            },
            undelegate: function(a, b, c) {
                return 1 === arguments.length ? this.off(a, "**") : this.off(b, a || "**", c)
            }
        }), oa.parseJSON = JSON.parse, "function" == typeof define && define.amd && define("jquery", [], function() {
            return oa
        });
        var Sb = a.jQuery,
            Tb = a.$;
        return oa.noConflict = function(b) {
            return a.$ === oa && (a.$ = Tb), b && a.jQuery === oa && (a.jQuery = Sb), oa
        }, b || (a.jQuery = a.$ = oa), oa
    }),
    function(a, b) {
        "object" == typeof exports && "object" == typeof module ? module.exports = b() : "function" == typeof define && define.amd ? define([], b) : "object" == typeof exports ? exports.AOS = b() : a.AOS = b()
    }(this, function() {
        return function(a) {
            function b(d) {
                if (c[d]) return c[d].exports;
                var e = c[d] = {
                    exports: {},
                    id: d,
                    loaded: !1
                };
                return a[d].call(e.exports, e, e.exports, b), e.loaded = !0, e.exports
            }
            var c = {};
            return b.m = a, b.c = c, b.p = "dist/", b(0)
        }([function(c, d, e) {
            "use strict";

            function f(a) {
                return a && a.__esModule ? a : {
                    default: a
                }
            }
            var g = Object.assign || function(a) {
                    for (var b = 1; b < arguments.length; b++) {
                        var c = arguments[b];
                        for (var d in c) Object.prototype.hasOwnProperty.call(c, d) && (a[d] = c[d])
                    }
                    return a
                },
                h = e(1),
                i = (f(h), e(6)),
                j = f(i),
                k = e(7),
                l = f(k),
                m = e(8),
                n = f(m),
                o = e(9),
                p = f(o),
                q = e(10),
                r = f(q),
                s = e(11),
                t = f(s),
                u = e(14),
                v = f(u),
                w = [],
                x = !1,
                y = b.all && !a.atob,
                z = {
                    offset: 120,
                    delay: 0,
                    easing: "ease",
                    duration: 400,
                    disable: !1,
                    once: !1,
                    startEvent: "DOMContentLoaded"
                },
                A = function() {
                    if (arguments.length > 0 && void 0 !== arguments[0] && arguments[0] && (x = !0), x) return w = (0, t.default)(w, z), (0, r.default)(w, z.once), w
                },
                B = function() {
                    w = (0, v.default)(), A()
                },
                C = function() {
                    w.forEach(function(a, b) {
                        a.node.removeAttribute("data-aos"), a.node.removeAttribute("data-aos-easing"), a.node.removeAttribute("data-aos-duration"), a.node.removeAttribute("data-aos-delay")
                    })
                },
                D = function(a) {
                    return !0 === a || "mobile" === a && p.default.mobile() || "phone" === a && p.default.phone() || "tablet" === a && p.default.tablet() || "function" == typeof a && !0 === a()
                },
                E = function(c) {
                    return z = g(z, c), w = (0, v.default)(), D(z.disable) || y ? C() : (b.querySelector("body").setAttribute("data-aos-easing", z.easing), b.querySelector("body").setAttribute("data-aos-duration", z.duration), b.querySelector("body").setAttribute("data-aos-delay", z.delay), "DOMContentLoaded" === z.startEvent && ["complete", "interactive"].indexOf(b.readyState) > -1 ? A(!0) : "load" === z.startEvent ? a.addEventListener(z.startEvent, function() {
                        A(!0)
                    }) : b.addEventListener(z.startEvent, function() {
                        A(!0)
                    }), a.addEventListener("resize", (0, l.default)(A, 50, !0)), a.addEventListener("orientationchange", (0, l.default)(A, 50, !0)), a.addEventListener("scroll", (0, j.default)(function() {
                        (0, r.default)(w, z.once)
                    }, 99)), b.addEventListener("DOMNodeRemoved", function(a) {
                        var b = a.target;
                        b && 1 === b.nodeType && b.hasAttribute && b.hasAttribute("data-aos") && (0, l.default)(B, 50, !0)
                    }), (0, n.default)("[data-aos]", B), w)
                };
            c.exports = {
                init: E,
                refresh: A,
                refreshHard: B
            }
        }, function(a, b) {}, , , , , function(a, b) {
            (function(b) {
                "use strict";

                function c(a, b, c) {
                    function d(b) {
                        var c = p,
                            d = q;
                        return p = q = void 0, v = b, s = a.apply(d, c)
                    }

                    function f(a) {
                        return v = a, t = setTimeout(k, b), z ? d(a) : s
                    }

                    function g(a) {
                        var c = a - u,
                            d = a - v,
                            e = b - c;
                        return A ? x(e, r - d) : e
                    }

                    function i(a) {
                        var c = a - u,
                            d = a - v;
                        return void 0 === u || c >= b || c < 0 || A && d >= r
                    }

                    function k() {
                        var a = y();
                        return i(a) ? l(a) : void(t = setTimeout(k, g(a)))
                    }

                    function l(a) {
                        return t = void 0, B && p ? d(a) : (p = q = void 0, s)
                    }

                    function m() {
                        void 0 !== t && clearTimeout(t), v = 0, p = u = q = t = void 0
                    }

                    function n() {
                        return void 0 === t ? s : l(y())
                    }

                    function o() {
                        var a = y(),
                            c = i(a);
                        if (p = arguments, q = this, u = a, c) {
                            if (void 0 === t) return f(u);
                            if (A) return t = setTimeout(k, b), d(u)
                        }
                        return void 0 === t && (t = setTimeout(k, b)), s
                    }
                    var p, q, r, s, t, u, v = 0,
                        z = !1,
                        A = !1,
                        B = !0;
                    if ("function" != typeof a) throw new TypeError(j);
                    return b = h(b) || 0, e(c) && (z = !!c.leading, A = "maxWait" in c, r = A ? w(h(c.maxWait) || 0, b) : r, B = "trailing" in c ? !!c.trailing : B), o.cancel = m, o.flush = n, o
                }

                function d(a, b, d) {
                    var f = !0,
                        g = !0;
                    if ("function" != typeof a) throw new TypeError(j);
                    return e(d) && (f = "leading" in d ? !!d.leading : f, g = "trailing" in d ? !!d.trailing : g), c(a, b, {
                        leading: f,
                        maxWait: b,
                        trailing: g
                    })
                }

                function e(a) {
                    var b = void 0 === a ? "undefined" : i(a);
                    return !!a && ("object" == b || "function" == b)
                }

                function f(a) {
                    return !!a && "object" == (void 0 === a ? "undefined" : i(a))
                }

                function g(a) {
                    return "symbol" == (void 0 === a ? "undefined" : i(a)) || f(a) && v.call(a) == l
                }

                function h(a) {
                    if ("number" == typeof a) return a;
                    if (g(a)) return k;
                    if (e(a)) {
                        var b = "function" == typeof a.valueOf ? a.valueOf() : a;
                        a = e(b) ? b + "" : b
                    }
                    if ("string" != typeof a) return 0 === a ? a : +a;
                    a = a.replace(m, "");
                    var c = o.test(a);
                    return c || p.test(a) ? q(a.slice(2), c ? 2 : 8) : n.test(a) ? k : +a
                }
                var i = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(a) {
                        return typeof a
                    } : function(a) {
                        return a && "function" == typeof Symbol && a.constructor === Symbol && a !== Symbol.prototype ? "symbol" : typeof a
                    },
                    j = "Expected a function",
                    k = NaN,
                    l = "[object Symbol]",
                    m = /^\s+|\s+$/g,
                    n = /^[-+]0x[0-9a-f]+$/i,
                    o = /^0b[01]+$/i,
                    p = /^0o[0-7]+$/i,
                    q = parseInt,
                    r = "object" == (void 0 === b ? "undefined" : i(b)) && b && b.Object === Object && b,
                    s = "object" == ("undefined" == typeof self ? "undefined" : i(self)) && self && self.Object === Object && self,
                    t = r || s || Function("return this")(),
                    u = Object.prototype,
                    v = u.toString,
                    w = Math.max,
                    x = Math.min,
                    y = function() {
                        return t.Date.now()
                    };
                a.exports = d
            }).call(b, function() {
                return this
            }())
        }, function(a, b) {
            (function(b) {
                "use strict";

                function c(a, b, c) {
                    function e(b) {
                        var c = p,
                            d = q;
                        return p = q = void 0, y = b, s = a.apply(d, c)
                    }

                    function f(a) {
                        return y = a, t = setTimeout(k, b), z ? e(a) : s
                    }

                    function h(a) {
                        var c = a - u,
                            d = a - y,
                            e = b - c;
                        return A ? w(e, r - d) : e
                    }

                    function j(a) {
                        var c = a - u,
                            d = a - y;
                        return void 0 === u || c >= b || c < 0 || A && d >= r
                    }

                    function k() {
                        var a = x();
                        return j(a) ? l(a) : void(t = setTimeout(k, h(a)))
                    }

                    function l(a) {
                        return t = void 0, B && p ? e(a) : (p = q = void 0, s)
                    }

                    function m() {
                        void 0 !== t && clearTimeout(t), y = 0, p = u = q = t = void 0
                    }

                    function n() {
                        return void 0 === t ? s : l(x())
                    }

                    function o() {
                        var a = x(),
                            c = j(a);
                        if (p = arguments, q = this, u = a, c) {
                            if (void 0 === t) return f(u);
                            if (A) return t = setTimeout(k, b), e(u)
                        }
                        return void 0 === t && (t = setTimeout(k, b)), s
                    }
                    var p, q, r, s, t, u, y = 0,
                        z = !1,
                        A = !1,
                        B = !0;
                    if ("function" != typeof a) throw new TypeError(i);
                    return b = g(b) || 0, d(c) && (z = !!c.leading, A = "maxWait" in c, r = A ? v(g(c.maxWait) || 0, b) : r, B = "trailing" in c ? !!c.trailing : B), o.cancel = m, o.flush = n, o
                }

                function d(a) {
                    var b = void 0 === a ? "undefined" : h(a);
                    return !!a && ("object" == b || "function" == b)
                }

                function e(a) {
                    return !!a && "object" == (void 0 === a ? "undefined" : h(a))
                }

                function f(a) {
                    return "symbol" == (void 0 === a ? "undefined" : h(a)) || e(a) && u.call(a) == k
                }

                function g(a) {
                    if ("number" == typeof a) return a;
                    if (f(a)) return j;
                    if (d(a)) {
                        var b = "function" == typeof a.valueOf ? a.valueOf() : a;
                        a = d(b) ? b + "" : b
                    }
                    if ("string" != typeof a) return 0 === a ? a : +a;
                    a = a.replace(l, "");
                    var c = n.test(a);
                    return c || o.test(a) ? p(a.slice(2), c ? 2 : 8) : m.test(a) ? j : +a
                }
                var h = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(a) {
                        return typeof a
                    } : function(a) {
                        return a && "function" == typeof Symbol && a.constructor === Symbol && a !== Symbol.prototype ? "symbol" : typeof a
                    },
                    i = "Expected a function",
                    j = NaN,
                    k = "[object Symbol]",
                    l = /^\s+|\s+$/g,
                    m = /^[-+]0x[0-9a-f]+$/i,
                    n = /^0b[01]+$/i,
                    o = /^0o[0-7]+$/i,
                    p = parseInt,
                    q = "object" == (void 0 === b ? "undefined" : h(b)) && b && b.Object === Object && b,
                    r = "object" == ("undefined" == typeof self ? "undefined" : h(self)) && self && self.Object === Object && self,
                    s = q || r || Function("return this")(),
                    t = Object.prototype,
                    u = t.toString,
                    v = Math.max,
                    w = Math.min,
                    x = function() {
                        return s.Date.now()
                    };
                a.exports = c
            }).call(b, function() {
                return this
            }())
        }, function(b, c) {
            "use strict";

            function d(a, b) {
                h.push({
                    selector: a,
                    fn: b
                }), !i && g && (i = new g(e), i.observe(f.documentElement, {
                    childList: !0,
                    subtree: !0,
                    removedNodes: !0
                })), e()
            }

            function e() {
                for (var a, b, c = 0, d = h.length; c < d; c++) {
                    a = h[c], b = f.querySelectorAll(a.selector);
                    for (var e, g = 0, i = b.length; g < i; g++) e = b[g], e.ready || (e.ready = !0, a.fn.call(e, e))
                }
            }
            Object.defineProperty(c, "__esModule", {
                value: !0
            });
            var f = a.document,
                g = a.MutationObserver || a.WebKitMutationObserver,
                h = [],
                i = void 0;
            c.default = d
        }, function(b, c) {
            "use strict";

            function d(a, b) {
                if (!(a instanceof b)) throw new TypeError("Cannot call a class as a function")
            }

            function e() {
                return navigator.userAgent || navigator.vendor || a.opera || ""
            }
            Object.defineProperty(c, "__esModule", {
                value: !0
            });
            var f = function() {
                    function a(a, b) {
                        for (var c = 0; c < b.length; c++) {
                            var d = b[c];
                            d.enumerable = d.enumerable || !1, d.configurable = !0, "value" in d && (d.writable = !0), Object.defineProperty(a, d.key, d)
                        }
                    }
                    return function(b, c, d) {
                        return c && a(b.prototype, c), d && a(b, d), b
                    }
                }(),
                g = /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i,
                h = /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i,
                i = /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i,
                j = /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i,
                k = function() {
                    function a() {
                        d(this, a)
                    }
                    return f(a, [{
                        key: "phone",
                        value: function() {
                            var a = e();
                            return !(!g.test(a) && !h.test(a.substr(0, 4)))
                        }
                    }, {
                        key: "mobile",
                        value: function() {
                            var a = e();
                            return !(!i.test(a) && !j.test(a.substr(0, 4)))
                        }
                    }, {
                        key: "tablet",
                        value: function() {
                            return this.mobile() && !this.phone()
                        }
                    }]), a
                }();
            c.default = new k
        }, function(b, c) {
            "use strict";
            Object.defineProperty(c, "__esModule", {
                value: !0
            });
            var d = function(a, b, c) {
                    var d = a.node.getAttribute("data-aos-once");
                    b > a.position ? a.node.classList.add("aos-animate") : void 0 !== d && ("false" === d || !c && "true" !== d) && a.node.classList.remove("aos-animate")
                },
                e = function(b, c) {
                    var e = a.pageYOffset,
                        f = a.innerHeight;
                    b.forEach(function(a, b) {
                        d(a, f + e, c)
                    })
                };
            c.default = e
        }, function(a, b, c) {
            "use strict";
            Object.defineProperty(b, "__esModule", {
                value: !0
            });
            var d = c(12),
                e = function(a) {
                    return a && a.__esModule ? a : {
                        default: a
                    }
                }(d),
                f = function(a, b) {
                    return a.forEach(function(a, c) {
                        a.node.classList.add("aos-init"), a.position = (0, e.default)(a.node, b.offset)
                    }), a
                };
            b.default = f
        }, function(c, d, e) {
            "use strict";
            Object.defineProperty(d, "__esModule", {
                value: !0
            });
            var f = e(13),
                g = function(a) {
                    return a && a.__esModule ? a : {
                        default: a
                    }
                }(f),
                h = function(c, d) {
                    var e = 0,
                        f = 0,
                        h = a.innerHeight,
                        i = {
                            offset: c.getAttribute("data-aos-offset"),
                            anchor: c.getAttribute("data-aos-anchor"),
                            anchorPlacement: c.getAttribute("data-aos-anchor-placement")
                        };
                    switch (i.offset && !isNaN(i.offset) && (f = parseInt(i.offset)), i.anchor && b.querySelectorAll(i.anchor) && (c = b.querySelectorAll(i.anchor)[0]), e = (0, g.default)(c).top, i.anchorPlacement) {
                        case "top-bottom":
                            break;
                        case "center-bottom":
                            e += c.offsetHeight / 2;
                            break;
                        case "bottom-bottom":
                            e += c.offsetHeight;
                            break;
                        case "top-center":
                            e += h / 2;
                            break;
                        case "bottom-center":
                            e += h / 2 + c.offsetHeight;
                            break;
                        case "center-center":
                            e += h / 2 + c.offsetHeight / 2;
                            break;
                        case "top-top":
                            e += h;
                            break;
                        case "bottom-top":
                            e += c.offsetHeight + h;
                            break;
                        case "center-top":
                            e += c.offsetHeight / 2 + h
                    }
                    return i.anchorPlacement || i.offset || isNaN(d) || (f = d), e + f
                };
            d.default = h
        }, function(a, b) {
            "use strict";
            Object.defineProperty(b, "__esModule", {
                value: !0
            });
            var c = function(a) {
                for (var b = 0, c = 0; a && !isNaN(a.offsetLeft) && !isNaN(a.offsetTop);) b += a.offsetLeft - ("BODY" != a.tagName ? a.scrollLeft : 0), c += a.offsetTop - ("BODY" != a.tagName ? a.scrollTop : 0), a = a.offsetParent;
                return {
                    top: c,
                    left: b
                }
            };
            b.default = c
        }, function(a, c) {
            "use strict";
            Object.defineProperty(c, "__esModule", {
                value: !0
            });
            var d = function(a) {
                a = a || b.querySelectorAll("[data-aos]");
                var c = [];
                return [].forEach.call(a, function(a, b) {
                    c.push({
                        node: a
                    })
                }), c
            };
            c.default = d
        }])
    }),
    function(a) {
        "function" == typeof define && define.amd ? define(["jquery"], function(b) {
            return a(b)
        }) : "object" == typeof module && "object" == typeof module.exports ? exports = a(require("jquery")) : a(jQuery)
    }(function(a) {
        function b(a) {
            var b = 7.5625,
                c = 2.75;
            return a < 1 / c ? b * a * a : a < 2 / c ? b * (a -= 1.5 / c) * a + .75 : a < 2.5 / c ? b * (a -= 2.25 / c) * a + .9375 : b * (a -= 2.625 / c) * a + .984375
        }
        a.easing.jswing = a.easing.swing;
        var c = Math.pow,
            d = Math.sqrt,
            e = Math.sin,
            f = Math.cos,
            g = Math.PI,
            h = 1.70158,
            i = 1.525 * h,
            j = 2 * g / 3,
            k = 2 * g / 4.5;
        a.extend(a.easing, {
            def: "easeOutQuad",
            swing: function(b) {
                return a.easing[a.easing.def](b)
            },
            easeInQuad: function(a) {
                return a * a
            },
            easeOutQuad: function(a) {
                return 1 - (1 - a) * (1 - a)
            },
            easeInOutQuad: function(a) {
                return a < .5 ? 2 * a * a : 1 - c(-2 * a + 2, 2) / 2
            },
            easeInCubic: function(a) {
                return a * a * a
            },
            easeOutCubic: function(a) {
                return 1 - c(1 - a, 3)
            },
            easeInOutCubic: function(a) {
                return a < .5 ? 4 * a * a * a : 1 - c(-2 * a + 2, 3) / 2
            },
            easeInQuart: function(a) {
                return a * a * a * a
            },
            easeOutQuart: function(a) {
                return 1 - c(1 - a, 4)
            },
            easeInOutQuart: function(a) {
                return a < .5 ? 8 * a * a * a * a : 1 - c(-2 * a + 2, 4) / 2
            },
            easeInQuint: function(a) {
                return a * a * a * a * a
            },
            easeOutQuint: function(a) {
                return 1 - c(1 - a, 5)
            },
            easeInOutQuint: function(a) {
                return a < .5 ? 16 * a * a * a * a * a : 1 - c(-2 * a + 2, 5) / 2
            },
            easeInSine: function(a) {
                return 1 - f(a * g / 2)
            },
            easeOutSine: function(a) {
                return e(a * g / 2)
            },
            easeInOutSine: function(a) {
                return -(f(g * a) - 1) / 2
            },
            easeInExpo: function(a) {
                return 0 === a ? 0 : c(2, 10 * a - 10)
            },
            easeOutExpo: function(a) {
                return 1 === a ? 1 : 1 - c(2, -10 * a)
            },
            easeInOutExpo: function(a) {
                return 0 === a ? 0 : 1 === a ? 1 : a < .5 ? c(2, 20 * a - 10) / 2 : (2 - c(2, -20 * a + 10)) / 2
            },
            easeInCirc: function(a) {
                return 1 - d(1 - c(a, 2))
            },
            easeOutCirc: function(a) {
                return d(1 - c(a - 1, 2))
            },
            easeInOutCirc: function(a) {
                return a < .5 ? (1 - d(1 - c(2 * a, 2))) / 2 : (d(1 - c(-2 * a + 2, 2)) + 1) / 2
            },
            easeInElastic: function(a) {
                return 0 === a ? 0 : 1 === a ? 1 : -c(2, 10 * a - 10) * e((10 * a - 10.75) * j)
            },
            easeOutElastic: function(a) {
                return 0 === a ? 0 : 1 === a ? 1 : c(2, -10 * a) * e((10 * a - .75) * j) + 1
            },
            easeInOutElastic: function(a) {
                return 0 === a ? 0 : 1 === a ? 1 : a < .5 ? -c(2, 20 * a - 10) * e((20 * a - 11.125) * k) / 2 : c(2, -20 * a + 10) * e((20 * a - 11.125) * k) / 2 + 1
            },
            easeInBack: function(a) {
                return 2.70158 * a * a * a - h * a * a
            },
            easeOutBack: function(a) {
                return 1 + 2.70158 * c(a - 1, 3) + h * c(a - 1, 2)
            },
            easeInOutBack: function(a) {
                return a < .5 ? c(2 * a, 2) * (7.189819 * a - i) / 2 : (c(2 * a - 2, 2) * ((i + 1) * (2 * a - 2) + i) + 2) / 2
            },
            easeInBounce: function(a) {
                return 1 - b(1 - a)
            },
            easeOutBounce: b,
            easeInOutBounce: function(a) {
                return a < .5 ? (1 - b(1 - 2 * a)) / 2 : (1 + b(2 * a - 1)) / 2
            }
        })
    }),
    function(a) {
        a.expander = {
            version: "1.4",
            defaults: {
                slicePoint: 100,
                preserveWords: !0,
                widow: 4,
                expandText: "read more",
                expandPrefix: "&hellip; ",
                expandAfterSummary: !1,
                summaryClass: "summary",
                detailClass: "details",
                moreClass: "read-more",
                lessClass: "read-less",
                collapseTimer: 0,
                expandEffect: "fadeIn",
                expandSpeed: 250,
                collapseEffect: "fadeOut",
                collapseSpeed: 200,
                userCollapse: !0,
                userCollapseText: "read less",
                userCollapsePrefix: " ",
                onSlice: null,
                beforeExpand: null,
                afterExpand: null,
                onCollapse: null
            }
        }, a.fn.expander = function(b) {
            function c(a, b) {
                var c = "span",
                    d = a.summary;
                return b ? (c = "div", p.test(d) && !a.expandAfterSummary ? d = d.replace(p, a.moreLabel + "$1") : d += a.moreLabel, d = '<div class="' + a.summaryClass + '">' + d + "</div>") : d += a.moreLabel, [d, "<", c + ' class="' + a.detailClass + '"', ">", a.details, "</" + c + ">"].join("")
            }

            function d(a) {
                var b = '<span class="' + a.moreClass + '">' + a.expandPrefix;
                return b += '<a href="#">' + a.expandText + "</a></span>"
            }

            function e(a, b) {
                return a.lastIndexOf("<") > a.lastIndexOf(">") && (a = a.slice(0, a.lastIndexOf("<"))), b && (a = a.replace(l, "")), a
            }

            function f(a, b) {
                b.stop(!0, !0)[a.collapseEffect](a.collapseSpeed, function() {
                    b.prev("span." + a.moreClass).show().length || b.parent().children("div." + a.summaryClass).show().find("span." + a.moreClass).show()
                })
            }

            function g(b, c, d) {
                b.collapseTimer && (i = setTimeout(function() {
                    f(b, c), a.isFunction(b.onCollapse) && b.onCollapse.call(d, !1)
                }, b.collapseTimer))
            }
            var h = "init";
            "string" == typeof b && (h = b, b = {});
            var i, j = a.extend({}, a.expander.defaults, b),
                k = /^<(?:area|br|col|embed|hr|img|input|link|meta|param).*>$/i,
                l = /(&(?:[^;]+;)?|\w+)$/,
                m = /<\/?(\w+)[^>]*>/g,
                n = /<(\w+)[^>]*>/g,
                o = /<\/(\w+)>/g,
                p = /(<\/[^>]+>)\s*$/,
                q = /^<[^>]+>.?/;
            return b = {
                init: function() {
                    this.each(function() {
                        var b, h, l, p, r, s, t, u = [],
                            v = [],
                            w = {},
                            x = this,
                            y = a(this),
                            z = a([]),
                            A = a.meta ? a.extend({}, j, y.data()) : j,
                            B = !!y.find("." + A.detailClass).length,
                            C = !!y.find("*").filter(function() {
                                return /^block|table|list/.test(a(this).css("display"))
                            }).length,
                            D = (C ? "div" : "span") + "." + A.detailClass,
                            E = "span." + A.moreClass,
                            F = A.expandSpeed || 0,
                            G = a.trim(y.html());
                        a.trim(y.text());
                        var H = G.slice(0, A.slicePoint);
                        if (!a.data(this, "expander")) {
                            for (a.data(this, "expander", !0), a.each(["onSlice", "beforeExpand", "afterExpand", "onCollapse"], function(b, c) {
                                    w[c] = a.isFunction(A[c])
                                }), H = e(H), summTagless = H.replace(m, "").length; summTagless < A.slicePoint;) newChar = G.charAt(H.length), "<" == newChar && (newChar = G.slice(H.length).match(q)[0]), H += newChar, summTagless++;
                            for (H = e(H, A.preserveWords), p = H.match(n) || [], r = H.match(o) || [], l = [], a.each(p, function(a, b) {
                                    k.test(b) || l.push(b)
                                }), p = l, h = r.length, b = 0; b < h; b++) r[b] = r[b].replace(o, "$1");
                            if (a.each(p, function(b, c) {
                                    var d = c.replace(n, "$1"),
                                        e = a.inArray(d, r); - 1 === e ? (u.push(c), v.push("</" + d + ">")) : r.splice(e, 1)
                                }), v.reverse(), B) h = y.find(D).remove().html(), H = y.html(), G = H + h, b = "";
                            else {
                                if ("" === (h = G.slice(H.length)) || h.split(/\s+/).length < A.widow) return;
                                b = v.pop() || "", H += v.join(""), h = u.join("") + h
                            }
                            A.moreLabel = y.find(E).length ? "" : d(A), C && (h = G), H += b, A.summary = H, A.details = h, A.lastCloseTag = b, w.onSlice && (A = (l = A.onSlice.call(x, A)) && l.details ? l : A), C = c(A, C), y.html(C), s = y.find(D), t = y.find(E), s.hide(), t.find("a").unbind("click.expander").bind("click.expander", function(a) {
                                a.preventDefault(), t.hide(), z.hide(), w.beforeExpand && A.beforeExpand.call(x), s.stop(!1, !0)[A.expandEffect](F, function() {
                                    s.css({
                                        zoom: ""
                                    }), w.afterExpand && A.afterExpand.call(x), g(A, s, x)
                                })
                            }), z = y.find("div." + A.summaryClass), A.userCollapse && !y.find("span." + A.lessClass).length && y.find(D).append('<span class="' + A.lessClass + '">' + A.userCollapsePrefix + '<a href="#">' + A.userCollapseText + "</a></span>"), y.find("span." + A.lessClass + " a").unbind("click.expander").bind("click.expander", function(b) {
                                b.preventDefault(), clearTimeout(i), b = a(this).closest(D), f(A, b), w.onCollapse && A.onCollapse.call(x, !0)
                            })
                        }
                    })
                },
                destroy: function() {
                    this.data("expander") && (this.removeData("expander"), this.each(function() {
                        var b = a(this),
                            c = a.meta ? a.extend({}, j, b.data()) : j,
                            d = b.find("." + c.detailClass).contents();
                        b.find("." + c.moreClass).remove(), b.find("." + c.summaryClass).remove(), b.find("." + c.detailClass).after(d).remove(), b.find("." + c.lessClass).remove()
                    }))
                }
            }, b[h] && b[h].call(this), this
        }, a.fn.expander.defaults = a.expander.defaults
    }(jQuery), $(function() {
            function b() {
                i = d.width() - 10, j = d.children().length, k = h[j - 1], k > i ? (d.children().last().prependTo(e), j -= 1, b()) : i > h[j] && (e.children().first().appendTo(d), j += 1, b()), c.attr("count", f - j), j === f ? c.addClass("hidden") : c.removeClass("hidden")
            }
            var c = $("nav.greedy button"),
                d = $("nav.greedy .links"),
                e = $("nav.greedy .hidden-links"),
                f = 0,
                g = 0,
                h = [];
            d.children().outerWidth(function(a, b) {
                g += b, f += 1, h.push(g)
            });
            var i, j, k, l;
            $(a).on("resize", function() {
                b()
            }), c.on("click", function() {
                e.toggleClass("hidden"), c.toggleClass("clicked"), clearTimeout(l)
            }), e.on("mouseleave", function() {
                l = setTimeout(function() {
                    e.addClass("hidden")
                }, 1e3)
            }).on("mouseenter", function() {
                clearTimeout(l)
            }), b(), $(a).on("load", function() {
                b()
            })
        }),
        function(a, b) {
            "use strict";
            "function" == typeof define && define.amd ? define([], b) : "object" == typeof exports ? module.exports = b() : a.Headroom = b()
        }(this, function() {
            "use strict";

            function c(a) {
                this.callback = a, this.ticking = !1
            }

            function d(b) {
                return b && void 0 !== a && (b === a || b.nodeType)
            }

            function e(a) {
                if (arguments.length <= 0) throw new Error("Missing arguments in extend function");
                var b, c, f = a || {};
                for (c = 1; c < arguments.length; c++) {
                    var g = arguments[c] || {};
                    for (b in g) "object" != typeof f[b] || d(f[b]) ? f[b] = f[b] || g[b] : f[b] = e(f[b], g[b])
                }
                return f
            }

            function f(a) {
                return a === Object(a) ? a : {
                    down: a,
                    up: a
                }
            }

            function g(a, b) {
                b = e(b, g.options), this.lastKnownScrollY = 0, this.elem = a, this.tolerance = f(b.tolerance), this.classes = b.classes, this.offset = b.offset, this.scroller = b.scroller, this.initialised = !1, this.onPin = b.onPin, this.onUnpin = b.onUnpin, this.onTop = b.onTop, this.onNotTop = b.onNotTop, this.onBottom = b.onBottom, this.onNotBottom = b.onNotBottom
            }
            var h = {
                bind: !! function() {}.bind,
                classList: "classList" in b.documentElement,
                rAF: !!(a.requestAnimationFrame || a.webkitRequestAnimationFrame || a.mozRequestAnimationFrame)
            };
            return a.requestAnimationFrame = a.requestAnimationFrame || a.webkitRequestAnimationFrame || a.mozRequestAnimationFrame, c.prototype = {
                constructor: c,
                update: function() {
                    this.callback && this.callback(), this.ticking = !1
                },
                requestTick: function() {
                    this.ticking || (requestAnimationFrame(this.rafCallback || (this.rafCallback = this.update.bind(this))), this.ticking = !0)
                },
                handleEvent: function() {
                    this.requestTick()
                }
            }, g.prototype = {
                constructor: g,
                init: function() {
                    return g.cutsTheMustard ? (this.debouncer = new c(this.update.bind(this)), this.elem.classList.add(this.classes.initial), setTimeout(this.attachEvent.bind(this), 100), this) : void 0
                },
                destroy: function() {
                    var a = this.classes;
                    this.initialised = !1, this.elem.classList.remove(a.unpinned, a.pinned, a.top, a.notTop, a.initial), this.scroller.removeEventListener("scroll", this.debouncer, !1)
                },
                attachEvent: function() {
                    this.initialised || (this.lastKnownScrollY = this.getScrollY(), this.initialised = !0, this.scroller.addEventListener("scroll", this.debouncer, !1), this.debouncer.handleEvent())
                },
                unpin: function() {
                    var a = this.elem.classList,
                        b = this.classes;
                    !a.contains(b.pinned) && a.contains(b.unpinned) || (a.add(b.unpinned), a.remove(b.pinned), this.onUnpin && this.onUnpin.call(this))
                },
                pin: function() {
                    var a = this.elem.classList,
                        b = this.classes;
                    a.contains(b.unpinned) && (a.remove(b.unpinned), a.add(b.pinned), this.onPin && this.onPin.call(this))
                },
                top: function() {
                    var a = this.elem.classList,
                        b = this.classes;
                    a.contains(b.top) || (a.add(b.top), a.remove(b.notTop), this.onTop && this.onTop.call(this))
                },
                notTop: function() {
                    var a = this.elem.classList,
                        b = this.classes;
                    a.contains(b.notTop) || (a.add(b.notTop), a.remove(b.top), this.onNotTop && this.onNotTop.call(this))
                },
                bottom: function() {
                    var a = this.elem.classList,
                        b = this.classes;
                    a.contains(b.bottom) || (a.add(b.bottom), a.remove(b.notBottom), this.onBottom && this.onBottom.call(this))
                },
                notBottom: function() {
                    var a = this.elem.classList,
                        b = this.classes;
                    a.contains(b.notBottom) || (a.add(b.notBottom), a.remove(b.bottom), this.onNotBottom && this.onNotBottom.call(this))
                },
                getScrollY: function() {
                    return void 0 !== this.scroller.pageYOffset ? this.scroller.pageYOffset : void 0 !== this.scroller.scrollTop ? this.scroller.scrollTop : (b.documentElement || b.body.parentNode || b.body).scrollTop
                },
                getViewportHeight: function() {
                    return a.innerHeight || b.documentElement.clientHeight || b.body.clientHeight
                },
                getElementPhysicalHeight: function(a) {
                    return Math.max(a.offsetHeight, a.clientHeight)
                },
                getScrollerPhysicalHeight: function() {
                    return this.scroller === a || this.scroller === b.body ? this.getViewportHeight() : this.getElementPhysicalHeight(this.scroller)
                },
                getDocumentHeight: function() {
                    var a = b.body,
                        c = b.documentElement;
                    return Math.max(a.scrollHeight, c.scrollHeight, a.offsetHeight, c.offsetHeight, a.clientHeight, c.clientHeight)
                },
                getElementHeight: function(a) {
                    return Math.max(a.scrollHeight, a.offsetHeight, a.clientHeight)
                },
                getScrollerHeight: function() {
                    return this.scroller === a || this.scroller === b.body ? this.getDocumentHeight() : this.getElementHeight(this.scroller)
                },
                isOutOfBounds: function(a) {
                    var b = 0 > a,
                        c = a + this.getScrollerPhysicalHeight() > this.getScrollerHeight();
                    return b || c
                },
                toleranceExceeded: function(a, b) {
                    return Math.abs(a - this.lastKnownScrollY) >= this.tolerance[b]
                },
                shouldUnpin: function(a, b) {
                    var c = a > this.lastKnownScrollY,
                        d = a >= this.offset;
                    return c && d && b
                },
                shouldPin: function(a, b) {
                    var c = a < this.lastKnownScrollY,
                        d = a <= this.offset;
                    return c && b || d
                },
                update: function() {
                    var a = this.getScrollY(),
                        b = a > this.lastKnownScrollY ? "down" : "up",
                        c = this.toleranceExceeded(a, b);
                    this.isOutOfBounds(a) || (a <= this.offset ? this.top() : this.notTop(), a + this.getViewportHeight() >= this.getScrollerHeight() ? this.bottom() : this.notBottom(), this.shouldUnpin(a, c) ? this.unpin() : this.shouldPin(a, c) && this.pin(), this.lastKnownScrollY = a)
                }
            }, g.options = {
                tolerance: {
                    up: 0,
                    down: 0
                },
                offset: 0,
                scroller: a,
                classes: {
                    pinned: "headroom--pinned",
                    unpinned: "headroom--unpinned",
                    top: "headroom--top",
                    notTop: "headroom--not-top",
                    bottom: "headroom--bottom",
                    notBottom: "headroom--not-bottom",
                    initial: "headroom"
                }
            }, g.cutsTheMustard = void 0 !== h && h.rAF && h.bind && h.classList, g
        }),
        function(a) {
            "use strict";
            "function" == typeof define && define.amd ? define(["jquery"], a) : jQuery && !jQuery.fn.hoverIntent && a(jQuery)
        }(function(a) {
            "use strict";
            var b, c, d = {
                    interval: 100,
                    sensitivity: 6,
                    timeout: 0
                },
                e = 0,
                f = function(a) {
                    b = a.pageX, c = a.pageY
                },
                g = function(a, d, e, h) {
                    if (Math.sqrt((e.pX - b) * (e.pX - b) + (e.pY - c) * (e.pY - c)) < h.sensitivity) return d.off(e.event, f), delete e.timeoutId, e.isActive = !0, a.pageX = b, a.pageY = c, delete e.pX, delete e.pY, h.over.apply(d[0], [a]);
                    e.pX = b, e.pY = c, e.timeoutId = setTimeout(function() {
                        g(a, d, e, h)
                    }, h.interval)
                },
                h = function(a, b, c, d) {
                    return delete b.data("hoverIntent")[c.id], d.apply(b[0], [a])
                };
            a.fn.hoverIntent = function(b, c, i) {
                var j = e++,
                    k = a.extend({}, d);
                a.isPlainObject(b) ? (k = a.extend(k, b), a.isFunction(k.out) || (k.out = k.over)) : k = a.isFunction(c) ? a.extend(k, {
                    over: b,
                    out: c,
                    selector: i
                }) : a.extend(k, {
                    over: b,
                    out: b,
                    selector: c
                });
                var l = function(b) {
                    var c = a.extend({}, b),
                        d = a(this),
                        e = d.data("hoverIntent");
                    e || d.data("hoverIntent", e = {});
                    var i = e[j];
                    i || (e[j] = i = {
                        id: j
                    }), i.timeoutId && (i.timeoutId = clearTimeout(i.timeoutId));
                    var l = i.event = "mousemove.hoverIntent.hoverIntent" + j;
                    if ("mouseenter" === b.type) {
                        if (i.isActive) return;
                        i.pX = c.pageX, i.pY = c.pageY, d.off(l, f).on(l, f), i.timeoutId = setTimeout(function() {
                            g(c, d, i, k)
                        }, k.interval)
                    } else {
                        if (!i.isActive) return;
                        d.off(l, f), i.timeoutId = setTimeout(function() {
                            h(c, d, i, k.out)
                        }, k.timeout)
                    }
                };
                return this.on({
                    "mouseenter.hoverIntent": l,
                    "mouseleave.hoverIntent": l
                }, k.selector)
            }
        }),
        function(a, b, c, d) {
            function e(b, c) {
                this.settings = null, this.options = a.extend({}, e.Defaults, c), this.$element = a(b), this._handlers = {}, this._plugins = {}, this._supress = {}, this._current = null, this._speed = null, this._coordinates = [], this._breakpoint = null, this._width = null, this._items = [], this._clones = [], this._mergers = [], this._widths = [], this._invalidated = {}, this._pipe = [], this._drag = {
                    time: null,
                    target: null,
                    pointer: null,
                    stage: {
                        start: null,
                        current: null
                    },
                    direction: null
                }, this._states = {
                    current: {},
                    tags: {
                        initializing: ["busy"],
                        animating: ["busy"],
                        dragging: ["interacting"]
                    }
                }, a.each(["onResize", "onThrottledResize"], a.proxy(function(b, c) {
                    this._handlers[c] = a.proxy(this[c], this)
                }, this)), a.each(e.Plugins, a.proxy(function(a, b) {
                    this._plugins[a.charAt(0).toLowerCase() + a.slice(1)] = new b(this)
                }, this)), a.each(e.Workers, a.proxy(function(b, c) {
                    this._pipe.push({
                        filter: c.filter,
                        run: a.proxy(c.run, this)
                    })
                }, this)), this.setup(), this.initialize()
            }
            e.Defaults = {
                items: 3,
                loop: !1,
                center: !1,
                rewind: !1,
                mouseDrag: !0,
                touchDrag: !0,
                pullDrag: !0,
                freeDrag: !1,
                margin: 0,
                stagePadding: 0,
                merge: !1,
                mergeFit: !0,
                autoWidth: !1,
                startPosition: 0,
                rtl: !1,
                smartSpeed: 250,
                fluidSpeed: !1,
                dragEndSpeed: !1,
                responsive: {},
                responsiveRefreshRate: 200,
                responsiveBaseElement: b,
                fallbackEasing: "swing",
                info: !1,
                nestedItemSelector: !1,
                itemElement: "div",
                stageElement: "div",
                refreshClass: "owl-refresh",
                loadedClass: "owl-loaded",
                loadingClass: "owl-loading",
                rtlClass: "owl-rtl",
                responsiveClass: "owl-responsive",
                dragClass: "owl-drag",
                itemClass: "owl-item",
                stageClass: "owl-stage",
                stageOuterClass: "owl-stage-outer",
                grabClass: "owl-grab"
            }, e.Width = {
                Default: "default",
                Inner: "inner",
                Outer: "outer"
            }, e.Type = {
                Event: "event",
                State: "state"
            }, e.Plugins = {}, e.Workers = [{
                filter: ["width", "settings"],
                run: function() {
                    this._width = this.$element.width()
                }
            }, {
                filter: ["width", "items", "settings"],
                run: function(a) {
                    a.current = this._items && this._items[this.relative(this._current)]
                }
            }, {
                filter: ["items", "settings"],
                run: function() {
                    this.$stage.children(".cloned").remove()
                }
            }, {
                filter: ["width", "items", "settings"],
                run: function(a) {
                    var b = this.settings.margin || "",
                        c = !this.settings.autoWidth,
                        d = this.settings.rtl,
                        e = {
                            width: "auto",
                            "margin-left": d ? b : "",
                            "margin-right": d ? "" : b
                        };
                    !c && this.$stage.children().css(e), a.css = e
                }
            }, {
                filter: ["width", "items", "settings"],
                run: function(a) {
                    var b = (this.width() / this.settings.items).toFixed(3) - this.settings.margin,
                        c = null,
                        d = this._items.length,
                        e = !this.settings.autoWidth,
                        f = [];
                    for (a.items = {
                            merge: !1,
                            width: b
                        }; d--;) c = this._mergers[d], c = this.settings.mergeFit && Math.min(c, this.settings.items) || c, a.items.merge = c > 1 || a.items.merge, f[d] = e ? b * c : this._items[d].width();
                    this._widths = f
                }
            }, {
                filter: ["items", "settings"],
                run: function() {
                    var b = [],
                        c = this._items,
                        d = this.settings,
                        e = Math.max(2 * d.items, 4),
                        f = 2 * Math.ceil(c.length / 2),
                        g = d.loop && c.length ? d.rewind ? e : Math.max(e, f) : 0,
                        h = "",
                        i = "";
                    for (g /= 2; g > 0;) b.push(this.normalize(b.length / 2, !0)), h += c[b[b.length - 1]][0].outerHTML, b.push(this.normalize(c.length - 1 - (b.length - 1) / 2, !0)), i = c[b[b.length - 1]][0].outerHTML + i, g -= 1;
                    this._clones = b, a(h).addClass("cloned").appendTo(this.$stage), a(i).addClass("cloned").prependTo(this.$stage)
                }
            }, {
                filter: ["width", "items", "settings"],
                run: function() {
                    for (var a = this.settings.rtl ? 1 : -1, b = this._clones.length + this._items.length, c = -1, d = 0, e = 0, f = []; ++c < b;) d = f[c - 1] || 0, e = this._widths[this.relative(c)] + this.settings.margin, f.push(d + e * a);
                    this._coordinates = f
                }
            }, {
                filter: ["width", "items", "settings"],
                run: function() {
                    var a = this.settings.stagePadding,
                        b = this._coordinates,
                        c = {
                            width: Math.ceil(Math.abs(b[b.length - 1])) + 2 * a,
                            "padding-left": a || "",
                            "padding-right": a || ""
                        };
                    this.$stage.css(c)
                }
            }, {
                filter: ["width", "items", "settings"],
                run: function(a) {
                    var b = this._coordinates.length,
                        c = !this.settings.autoWidth,
                        d = this.$stage.children();
                    if (c && a.items.merge)
                        for (; b--;) a.css.width = this._widths[this.relative(b)], d.eq(b).css(a.css);
                    else c && (a.css.width = a.items.width, d.css(a.css))
                }
            }, {
                filter: ["items"],
                run: function() {
                    this._coordinates.length < 1 && this.$stage.removeAttr("style")
                }
            }, {
                filter: ["width", "items", "settings"],
                run: function(a) {
                    a.current = a.current ? this.$stage.children().index(a.current) : 0, a.current = Math.max(this.minimum(), Math.min(this.maximum(), a.current)), this.reset(a.current)
                }
            }, {
                filter: ["position"],
                run: function() {
                    this.animate(this.coordinates(this._current))
                }
            }, {
                filter: ["width", "position", "items", "settings"],
                run: function() {
                    var a, b, c, d, e = this.settings.rtl ? 1 : -1,
                        f = 2 * this.settings.stagePadding,
                        g = this.coordinates(this.current()) + f,
                        h = g + this.width() * e,
                        i = [];
                    for (c = 0, d = this._coordinates.length; c < d; c++) a = this._coordinates[c - 1] || 0, b = Math.abs(this._coordinates[c]) + f * e, (this.op(a, "<=", g) && this.op(a, ">", h) || this.op(b, "<", g) && this.op(b, ">", h)) && i.push(c);
                    this.$stage.children(".active").removeClass("active"), this.$stage.children(":eq(" + i.join("), :eq(") + ")").addClass("active"), this.$stage.children(".center").removeClass("center"), this.settings.center && this.$stage.children().eq(this.current()).addClass("center")
                }
            }], e.prototype.initialize = function() {
                if (this.enter("initializing"), this.trigger("initialize"), this.$element.toggleClass(this.settings.rtlClass, this.settings.rtl), this.settings.autoWidth && !this.is("pre-loading")) {
                    var b, c, d;
                    b = this.$element.find("img"), c = this.settings.nestedItemSelector ? "." + this.settings.nestedItemSelector : void 0, d = this.$element.children(c).width(), b.length && d <= 0 && this.preloadAutoWidthImages(b)
                }
                this.$element.addClass(this.options.loadingClass), this.$stage = a("<" + this.settings.stageElement + ' class="' + this.settings.stageClass + '"/>').wrap('<div class="' + this.settings.stageOuterClass + '"/>'), this.$element.append(this.$stage.parent()), this.replace(this.$element.children().not(this.$stage.parent())), this.$element.is(":visible") ? this.refresh() : this.invalidate("width"), this.$element.removeClass(this.options.loadingClass).addClass(this.options.loadedClass), this.registerEventHandlers(), this.leave("initializing"), this.trigger("initialized")
            }, e.prototype.setup = function() {
                var b = this.viewport(),
                    c = this.options.responsive,
                    d = -1,
                    e = null;
                c ? (a.each(c, function(a) {
                    a <= b && a > d && (d = Number(a))
                }), e = a.extend({}, this.options, c[d]), "function" == typeof e.stagePadding && (e.stagePadding = e.stagePadding()), delete e.responsive, e.responsiveClass && this.$element.attr("class", this.$element.attr("class").replace(new RegExp("(" + this.options.responsiveClass + "-)\\S+\\s", "g"), "$1" + d))) : e = a.extend({}, this.options), this.trigger("change", {
                    property: {
                        name: "settings",
                        value: e
                    }
                }), this._breakpoint = d, this.settings = e, this.invalidate("settings"), this.trigger("changed", {
                    property: {
                        name: "settings",
                        value: this.settings
                    }
                })
            }, e.prototype.optionsLogic = function() {
                this.settings.autoWidth && (this.settings.stagePadding = !1, this.settings.merge = !1)
            }, e.prototype.prepare = function(b) {
                var c = this.trigger("prepare", {
                    content: b
                });
                return c.data || (c.data = a("<" + this.settings.itemElement + "/>").addClass(this.options.itemClass).append(b)), this.trigger("prepared", {
                    content: c.data
                }), c.data
            }, e.prototype.update = function() {
                for (var b = 0, c = this._pipe.length, d = a.proxy(function(a) {
                        return this[a]
                    }, this._invalidated), e = {}; b < c;)(this._invalidated.all || a.grep(this._pipe[b].filter, d).length > 0) && this._pipe[b].run(e), b++;
                this._invalidated = {}, !this.is("valid") && this.enter("valid")
            }, e.prototype.width = function(a) {
                switch (a = a || e.Width.Default) {
                    case e.Width.Inner:
                    case e.Width.Outer:
                        return this._width;
                    default:
                        return this._width - 2 * this.settings.stagePadding + this.settings.margin
                }
            }, e.prototype.refresh = function() {
                this.enter("refreshing"), this.trigger("refresh"), this.setup(), this.optionsLogic(), this.$element.addClass(this.options.refreshClass), this.update(), this.$element.removeClass(this.options.refreshClass), this.leave("refreshing"), this.trigger("refreshed")
            }, e.prototype.onThrottledResize = function() {
                b.clearTimeout(this.resizeTimer), this.resizeTimer = b.setTimeout(this._handlers.onResize, this.settings.responsiveRefreshRate)
            }, e.prototype.onResize = function() {
                return !!this._items.length && (this._width !== this.$element.width() && (!!this.$element.is(":visible") && (this.enter("resizing"), this.trigger("resize").isDefaultPrevented() ? (this.leave("resizing"), !1) : (this.invalidate("width"), this.refresh(), this.leave("resizing"), void this.trigger("resized")))))
            }, e.prototype.registerEventHandlers = function() {
                a.support.transition && this.$stage.on(a.support.transition.end + ".owl.core", a.proxy(this.onTransitionEnd, this)), !1 !== this.settings.responsive && this.on(b, "resize", this._handlers.onThrottledResize), this.settings.mouseDrag && (this.$element.addClass(this.options.dragClass), this.$stage.on("mousedown.owl.core", a.proxy(this.onDragStart, this)), this.$stage.on("dragstart.owl.core selectstart.owl.core", function() {
                    return !1
                })), this.settings.touchDrag && (this.$stage.on("touchstart.owl.core", a.proxy(this.onDragStart, this)), this.$stage.on("touchcancel.owl.core", a.proxy(this.onDragEnd, this)))
            }, e.prototype.onDragStart = function(b) {
                var d = null;
                3 !== b.which && (a.support.transform ? (d = this.$stage.css("transform").replace(/.*\(|\)| /g, "").split(","), d = {
                    x: d[16 === d.length ? 12 : 4],
                    y: d[16 === d.length ? 13 : 5]
                }) : (d = this.$stage.position(), d = {
                    x: this.settings.rtl ? d.left + this.$stage.width() - this.width() + this.settings.margin : d.left,
                    y: d.top
                }), this.is("animating") && (a.support.transform ? this.animate(d.x) : this.$stage.stop(), this.invalidate("position")), this.$element.toggleClass(this.options.grabClass, "mousedown" === b.type), this.speed(0), this._drag.time = (new Date).getTime(), this._drag.target = a(b.target), this._drag.stage.start = d, this._drag.stage.current = d, this._drag.pointer = this.pointer(b), a(c).on("mouseup.owl.core touchend.owl.core", a.proxy(this.onDragEnd, this)), a(c).one("mousemove.owl.core touchmove.owl.core", a.proxy(function(b) {
                    var d = this.difference(this._drag.pointer, this.pointer(b));
                    a(c).on("mousemove.owl.core touchmove.owl.core", a.proxy(this.onDragMove, this)), Math.abs(d.x) < Math.abs(d.y) && this.is("valid") || (b.preventDefault(), this.enter("dragging"), this.trigger("drag"))
                }, this)))
            }, e.prototype.onDragMove = function(a) {
                var b = null,
                    c = null,
                    d = null,
                    e = this.difference(this._drag.pointer, this.pointer(a)),
                    f = this.difference(this._drag.stage.start, e);
                this.is("dragging") && (a.preventDefault(), this.settings.loop ? (b = this.coordinates(this.minimum()), c = this.coordinates(this.maximum() + 1) - b, f.x = ((f.x - b) % c + c) % c + b) : (b = this.settings.rtl ? this.coordinates(this.maximum()) : this.coordinates(this.minimum()), c = this.settings.rtl ? this.coordinates(this.minimum()) : this.coordinates(this.maximum()), d = this.settings.pullDrag ? -1 * e.x / 5 : 0, f.x = Math.max(Math.min(f.x, b + d), c + d)), this._drag.stage.current = f, this.animate(f.x))
            }, e.prototype.onDragEnd = function(b) {
                var d = this.difference(this._drag.pointer, this.pointer(b)),
                    e = this._drag.stage.current,
                    f = d.x > 0 ^ this.settings.rtl ? "left" : "right";
                a(c).off(".owl.core"), this.$element.removeClass(this.options.grabClass), (0 !== d.x && this.is("dragging") || !this.is("valid")) && (this.speed(this.settings.dragEndSpeed || this.settings.smartSpeed), this.current(this.closest(e.x, 0 !== d.x ? f : this._drag.direction)), this.invalidate("position"), this.update(), this._drag.direction = f, (Math.abs(d.x) > 3 || (new Date).getTime() - this._drag.time > 300) && this._drag.target.one("click.owl.core", function() {
                    return !1
                })), this.is("dragging") && (this.leave("dragging"), this.trigger("dragged"))
            }, e.prototype.closest = function(b, c) {
                var d = -1,
                    e = this.width(),
                    f = this.coordinates();
                return this.settings.freeDrag || a.each(f, a.proxy(function(a, g) {
                    return "left" === c && b > g - 30 && b < g + 30 ? d = a : "right" === c && b > g - e - 30 && b < g - e + 30 ? d = a + 1 : this.op(b, "<", g) && this.op(b, ">", f[a + 1] || g - e) && (d = "left" === c ? a + 1 : a), -1 === d
                }, this)), this.settings.loop || (this.op(b, ">", f[this.minimum()]) ? d = b = this.minimum() : this.op(b, "<", f[this.maximum()]) && (d = b = this.maximum())), d
            }, e.prototype.animate = function(b) {
                var c = this.speed() > 0;
                this.is("animating") && this.onTransitionEnd(), c && (this.enter("animating"), this.trigger("translate")), a.support.transform3d && a.support.transition ? this.$stage.css({
                    transform: "translate3d(" + b + "px,0px,0px)",
                    transition: this.speed() / 1e3 + "s"
                }) : c ? this.$stage.animate({
                    left: b + "px"
                }, this.speed(), this.settings.fallbackEasing, a.proxy(this.onTransitionEnd, this)) : this.$stage.css({
                    left: b + "px"
                })
            }, e.prototype.is = function(a) {
                return this._states.current[a] && this._states.current[a] > 0
            }, e.prototype.current = function(a) {
                if (void 0 === a) return this._current;
                if (0 !== this._items.length) {
                    if (a = this.normalize(a), this._current !== a) {
                        var b = this.trigger("change", {
                            property: {
                                name: "position",
                                value: a
                            }
                        });
                        void 0 !== b.data && (a = this.normalize(b.data)), this._current = a, this.invalidate("position"), this.trigger("changed", {
                            property: {
                                name: "position",
                                value: this._current
                            }
                        })
                    }
                    return this._current
                }
            }, e.prototype.invalidate = function(b) {
                return "string" === a.type(b) && (this._invalidated[b] = !0, this.is("valid") && this.leave("valid")), a.map(this._invalidated, function(a, b) {
                    return b
                })
            }, e.prototype.reset = function(a) {
                void 0 !== (a = this.normalize(a)) && (this._speed = 0, this._current = a, this.suppress(["translate", "translated"]), this.animate(this.coordinates(a)), this.release(["translate", "translated"]))
            }, e.prototype.normalize = function(a, b) {
                var c = this._items.length,
                    d = b ? 0 : this._clones.length;
                return !this.isNumeric(a) || c < 1 ? a = void 0 : (a < 0 || a >= c + d) && (a = ((a - d / 2) % c + c) % c + d / 2), a
            }, e.prototype.relative = function(a) {
                return a -= this._clones.length / 2, this.normalize(a, !0)
            }, e.prototype.maximum = function(a) {
                var b, c, d, e = this.settings,
                    f = this._coordinates.length;
                if (e.loop) f = this._clones.length / 2 + this._items.length - 1;
                else if (e.autoWidth || e.merge) {
                    if (b = this._items.length)
                        for (c = this._items[--b].width(), d = this.$element.width(); b-- && !((c += this._items[b].width() + this.settings.margin) > d););
                    f = b + 1
                } else f = e.center ? this._items.length - 1 : this._items.length - e.items;
                return a && (f -= this._clones.length / 2), Math.max(f, 0)
            }, e.prototype.minimum = function(a) {
                return a ? 0 : this._clones.length / 2
            }, e.prototype.items = function(a) {
                return void 0 === a ? this._items.slice() : (a = this.normalize(a, !0), this._items[a])
            }, e.prototype.mergers = function(a) {
                return void 0 === a ? this._mergers.slice() : (a = this.normalize(a, !0), this._mergers[a])
            }, e.prototype.clones = function(b) {
                var c = this._clones.length / 2,
                    d = c + this._items.length,
                    e = function(a) {
                        return a % 2 == 0 ? d + a / 2 : c - (a + 1) / 2
                    };
                return void 0 === b ? a.map(this._clones, function(a, b) {
                    return e(b)
                }) : a.map(this._clones, function(a, c) {
                    return a === b ? e(c) : null
                })
            }, e.prototype.speed = function(a) {
                return void 0 !== a && (this._speed = a), this._speed
            }, e.prototype.coordinates = function(b) {
                var c, d = 1,
                    e = b - 1;
                return void 0 === b ? a.map(this._coordinates, a.proxy(function(a, b) {
                    return this.coordinates(b)
                }, this)) : (this.settings.center ? (this.settings.rtl && (d = -1, e = b + 1), c = this._coordinates[b], c += (this.width() - c + (this._coordinates[e] || 0)) / 2 * d) : c = this._coordinates[e] || 0, c = Math.ceil(c))
            }, e.prototype.duration = function(a, b, c) {
                return 0 === c ? 0 : Math.min(Math.max(Math.abs(b - a), 1), 6) * Math.abs(c || this.settings.smartSpeed)
            }, e.prototype.to = function(a, b) {
                var c = this.current(),
                    d = null,
                    e = a - this.relative(c),
                    f = (e > 0) - (e < 0),
                    g = this._items.length,
                    h = this.minimum(),
                    i = this.maximum();
                this.settings.loop ? (!this.settings.rewind && Math.abs(e) > g / 2 && (e += -1 * f * g), a = c + e, (d = ((a - h) % g + g) % g + h) !== a && d - e <= i && d - e > 0 && (c = d - e, a = d, this.reset(c))) : this.settings.rewind ? (i += 1, a = (a % i + i) % i) : a = Math.max(h, Math.min(i, a)), this.speed(this.duration(c, a, b)), this.current(a), this.$element.is(":visible") && this.update()
            }, e.prototype.next = function(a) {
                a = a || !1, this.to(this.relative(this.current()) + 1, a)
            }, e.prototype.prev = function(a) {
                a = a || !1, this.to(this.relative(this.current()) - 1, a)
            }, e.prototype.onTransitionEnd = function(a) {
                if (void 0 !== a && (a.stopPropagation(), (a.target || a.srcElement || a.originalTarget) !== this.$stage.get(0))) return !1;
                this.leave("animating"), this.trigger("translated")
            }, e.prototype.viewport = function() {
                var d;
                return this.options.responsiveBaseElement !== b ? d = a(this.options.responsiveBaseElement).width() : b.innerWidth ? d = b.innerWidth : c.documentElement && c.documentElement.clientWidth ? d = c.documentElement.clientWidth : console.warn("Can not detect viewport width."), d
            }, e.prototype.replace = function(b) {
                this.$stage.empty(), this._items = [], b && (b = b instanceof jQuery ? b : a(b)), this.settings.nestedItemSelector && (b = b.find("." + this.settings.nestedItemSelector)), b.filter(function() {
                    return 1 === this.nodeType
                }).each(a.proxy(function(a, b) {
                    b = this.prepare(b), this.$stage.append(b), this._items.push(b), this._mergers.push(1 * b.find("[data-merge]").addBack("[data-merge]").attr("data-merge") || 1)
                }, this)), this.reset(this.isNumeric(this.settings.startPosition) ? this.settings.startPosition : 0), this.invalidate("items")
            }, e.prototype.add = function(b, c) {
                var d = this.relative(this._current);
                c = void 0 === c ? this._items.length : this.normalize(c, !0), b = b instanceof jQuery ? b : a(b), this.trigger("add", {
                    content: b,
                    position: c
                }), b = this.prepare(b), 0 === this._items.length || c === this._items.length ? (0 === this._items.length && this.$stage.append(b), 0 !== this._items.length && this._items[c - 1].after(b), this._items.push(b), this._mergers.push(1 * b.find("[data-merge]").addBack("[data-merge]").attr("data-merge") || 1)) : (this._items[c].before(b), this._items.splice(c, 0, b), this._mergers.splice(c, 0, 1 * b.find("[data-merge]").addBack("[data-merge]").attr("data-merge") || 1)), this._items[d] && this.reset(this._items[d].index()), this.invalidate("items"), this.trigger("added", {
                    content: b,
                    position: c
                })
            }, e.prototype.remove = function(a) {
                void 0 !== (a = this.normalize(a, !0)) && (this.trigger("remove", {
                    content: this._items[a],
                    position: a
                }), this._items[a].remove(), this._items.splice(a, 1), this._mergers.splice(a, 1), this.invalidate("items"), this.trigger("removed", {
                    content: null,
                    position: a
                }))
            }, e.prototype.preloadAutoWidthImages = function(b) {
                b.each(a.proxy(function(b, c) {
                    this.enter("pre-loading"), c = a(c), a(new Image).one("load", a.proxy(function(a) {
                        c.attr("src", a.target.src), c.css("opacity", 1), this.leave("pre-loading"), !this.is("pre-loading") && !this.is("initializing") && this.refresh()
                    }, this)).attr("src", c.attr("src") || c.attr("data-src") || c.attr("data-src-retina"))
                }, this))
            }, e.prototype.destroy = function() {
                this.$element.off(".owl.core"), this.$stage.off(".owl.core"), a(c).off(".owl.core"), !1 !== this.settings.responsive && (b.clearTimeout(this.resizeTimer), this.off(b, "resize", this._handlers.onThrottledResize));
                for (var d in this._plugins) this._plugins[d].destroy();
                this.$stage.children(".cloned").remove(), this.$stage.unwrap(), this.$stage.children().contents().unwrap(), this.$stage.children().unwrap(), this.$stage.remove(), this.$element.removeClass(this.options.refreshClass).removeClass(this.options.loadingClass).removeClass(this.options.loadedClass).removeClass(this.options.rtlClass).removeClass(this.options.dragClass).removeClass(this.options.grabClass).attr("class", this.$element.attr("class").replace(new RegExp(this.options.responsiveClass + "-\\S+\\s", "g"), "")).removeData("owl.carousel")
            }, e.prototype.op = function(a, b, c) {
                var d = this.settings.rtl;
                switch (b) {
                    case "<":
                        return d ? a > c : a < c;
                    case ">":
                        return d ? a < c : a > c;
                    case ">=":
                        return d ? a <= c : a >= c;
                    case "<=":
                        return d ? a >= c : a <= c
                }
            }, e.prototype.on = function(a, b, c, d) {
                a.addEventListener ? a.addEventListener(b, c, d) : a.attachEvent && a.attachEvent("on" + b, c)
            }, e.prototype.off = function(a, b, c, d) {
                a.removeEventListener ? a.removeEventListener(b, c, d) : a.detachEvent && a.detachEvent("on" + b, c)
            }, e.prototype.trigger = function(b, c, d, f, g) {
                var h = {
                        item: {
                            count: this._items.length,
                            index: this.current()
                        }
                    },
                    i = a.camelCase(a.grep(["on", b, d], function(a) {
                        return a
                    }).join("-").toLowerCase()),
                    j = a.Event([b, "owl", d || "carousel"].join(".").toLowerCase(), a.extend({
                        relatedTarget: this
                    }, h, c));
                return this._supress[b] || (a.each(this._plugins, function(a, b) {
                    b.onTrigger && b.onTrigger(j)
                }), this.register({
                    type: e.Type.Event,
                    name: b
                }), this.$element.trigger(j), this.settings && "function" == typeof this.settings[i] && this.settings[i].call(this, j)), j
            }, e.prototype.enter = function(b) {
                a.each([b].concat(this._states.tags[b] || []), a.proxy(function(a, b) {
                    void 0 === this._states.current[b] && (this._states.current[b] = 0), this._states.current[b]++
                }, this))
            }, e.prototype.leave = function(b) {
                a.each([b].concat(this._states.tags[b] || []), a.proxy(function(a, b) {
                    this._states.current[b]--
                }, this))
            }, e.prototype.register = function(b) {
                if (b.type === e.Type.Event) {
                    if (a.event.special[b.name] || (a.event.special[b.name] = {}), !a.event.special[b.name].owl) {
                        var c = a.event.special[b.name]._default;
                        a.event.special[b.name]._default = function(a) {
                            return !c || !c.apply || a.namespace && -1 !== a.namespace.indexOf("owl") ? a.namespace && a.namespace.indexOf("owl") > -1 : c.apply(this, arguments)
                        }, a.event.special[b.name].owl = !0
                    }
                } else b.type === e.Type.State && (this._states.tags[b.name] ? this._states.tags[b.name] = this._states.tags[b.name].concat(b.tags) : this._states.tags[b.name] = b.tags, this._states.tags[b.name] = a.grep(this._states.tags[b.name], a.proxy(function(c, d) {
                    return a.inArray(c, this._states.tags[b.name]) === d
                }, this)))
            }, e.prototype.suppress = function(b) {
                a.each(b, a.proxy(function(a, b) {
                    this._supress[b] = !0
                }, this))
            }, e.prototype.release = function(b) {
                a.each(b, a.proxy(function(a, b) {
                    delete this._supress[b]
                }, this))
            }, e.prototype.pointer = function(a) {
                var c = {
                    x: null,
                    y: null
                };
                return a = a.originalEvent || a || b.event, a = a.touches && a.touches.length ? a.touches[0] : a.changedTouches && a.changedTouches.length ? a.changedTouches[0] : a, a.pageX ? (c.x = a.pageX, c.y = a.pageY) : (c.x = a.clientX, c.y = a.clientY), c
            }, e.prototype.isNumeric = function(a) {
                return !isNaN(parseFloat(a))
            }, e.prototype.difference = function(a, b) {
                return {
                    x: a.x - b.x,
                    y: a.y - b.y
                }
            }, a.fn.owlCarousel = function(b) {
                var c = Array.prototype.slice.call(arguments, 1);
                return this.each(function() {
                    var d = a(this),
                        f = d.data("owl.carousel");
                    f || (f = new e(this, "object" == typeof b && b), d.data("owl.carousel", f), a.each(["next", "prev", "to", "destroy", "refresh", "replace", "add", "remove"], function(b, c) {
                        f.register({
                            type: e.Type.Event,
                            name: c
                        }), f.$element.on(c + ".owl.carousel.core", a.proxy(function(a) {
                            a.namespace && a.relatedTarget !== this && (this.suppress([c]), f[c].apply(this, [].slice.call(arguments, 1)), this.release([c]))
                        }, f))
                    })), "string" == typeof b && "_" !== b.charAt(0) && f[b].apply(f, c)
                })
            }, a.fn.owlCarousel.Constructor = e
        }(a.Zepto || a.jQuery, a, b),
        function(a, b, c, d) {
            var e = function(b) {
                this._core = b, this._interval = null, this._visible = null, this._handlers = {
                    "initialized.owl.carousel": a.proxy(function(a) {
                        a.namespace && this._core.settings.autoRefresh && this.watch()
                    }, this)
                }, this._core.options = a.extend({}, e.Defaults, this._core.options), this._core.$element.on(this._handlers)
            };
            e.Defaults = {
                autoRefresh: !0,
                autoRefreshInterval: 500
            }, e.prototype.watch = function() {
                this._interval || (this._visible = this._core.$element.is(":visible"), this._interval = b.setInterval(a.proxy(this.refresh, this), this._core.settings.autoRefreshInterval))
            }, e.prototype.refresh = function() {
                this._core.$element.is(":visible") !== this._visible && (this._visible = !this._visible, this._core.$element.toggleClass("owl-hidden", !this._visible), this._visible && this._core.invalidate("width") && this._core.refresh())
            }, e.prototype.destroy = function() {
                var a, c;
                b.clearInterval(this._interval);
                for (a in this._handlers) this._core.$element.off(a, this._handlers[a]);
                for (c in Object.getOwnPropertyNames(this)) "function" != typeof this[c] && (this[c] = null)
            }, a.fn.owlCarousel.Constructor.Plugins.AutoRefresh = e
        }(a.Zepto || a.jQuery, a),
        function(a, b, c, d) {
            var e = function(b) {
                this._core = b, this._loaded = [], this._handlers = {
                    "initialized.owl.carousel change.owl.carousel resized.owl.carousel": a.proxy(function(b) {
                        if (b.namespace && this._core.settings && this._core.settings.lazyLoad && (b.property && "position" == b.property.name || "initialized" == b.type))
                            for (var c = this._core.settings, d = c.center && Math.ceil(c.items / 2) || c.items, e = c.center && -1 * d || 0, f = (b.property && void 0 !== b.property.value ? b.property.value : this._core.current()) + e, g = this._core.clones().length, h = a.proxy(function(a, b) {
                                    this.load(b)
                                }, this); e++ < d;) this.load(g / 2 + this._core.relative(f)), g && a.each(this._core.clones(this._core.relative(f)), h), f++
                    }, this)
                }, this._core.options = a.extend({}, e.Defaults, this._core.options), this._core.$element.on(this._handlers)
            };
            e.Defaults = {
                lazyLoad: !1
            }, e.prototype.load = function(c) {
                var d = this._core.$stage.children().eq(c),
                    e = d && d.find(".owl-lazy");
                !e || a.inArray(d.get(0), this._loaded) > -1 || (e.each(a.proxy(function(c, d) {
                    var e, f = a(d),
                        g = b.devicePixelRatio > 1 && f.attr("data-src-retina") || f.attr("data-src");
                    this._core.trigger("load", {
                        element: f,
                        url: g
                    }, "lazy"), f.is("img") ? f.one("load.owl.lazy", a.proxy(function() {
                        f.css("opacity", 1), this._core.trigger("loaded", {
                            element: f,
                            url: g
                        }, "lazy")
                    }, this)).attr("src", g) : (e = new Image, e.onload = a.proxy(function() {
                        f.css({
                            "background-image": 'url("' + g + '")',
                            opacity: "1"
                        }), this._core.trigger("loaded", {
                            element: f,
                            url: g
                        }, "lazy")
                    }, this), e.src = g)
                }, this)), this._loaded.push(d.get(0)))
            }, e.prototype.destroy = function() {
                var a, b;
                for (a in this.handlers) this._core.$element.off(a, this.handlers[a]);
                for (b in Object.getOwnPropertyNames(this)) "function" != typeof this[b] && (this[b] = null)
            }, a.fn.owlCarousel.Constructor.Plugins.Lazy = e
        }(a.Zepto || a.jQuery, a),
        function(a, b, c, d) {
            var e = function(b) {
                this._core = b, this._handlers = {
                    "initialized.owl.carousel refreshed.owl.carousel": a.proxy(function(a) {
                        a.namespace && this._core.settings.autoHeight && this.update()
                    }, this),
                    "changed.owl.carousel": a.proxy(function(a) {
                        a.namespace && this._core.settings.autoHeight && "position" == a.property.name && this.update()
                    }, this),
                    "loaded.owl.lazy": a.proxy(function(a) {
                        a.namespace && this._core.settings.autoHeight && a.element.closest("." + this._core.settings.itemClass).index() === this._core.current() && this.update()
                    }, this)
                }, this._core.options = a.extend({}, e.Defaults, this._core.options), this._core.$element.on(this._handlers)
            };
            e.Defaults = {
                autoHeight: !1,
                autoHeightClass: "owl-height"
            }, e.prototype.update = function() {
                var b = this._core._current,
                    c = b + this._core.settings.items,
                    d = this._core.$stage.children().toArray().slice(b, c),
                    e = [],
                    f = 0;
                a.each(d, function(b, c) {
                    e.push(a(c).height())
                }), f = Math.max.apply(null, e), this._core.$stage.parent().height(f).addClass(this._core.settings.autoHeightClass)
            }, e.prototype.destroy = function() {
                var a, b;
                for (a in this._handlers) this._core.$element.off(a, this._handlers[a]);
                for (b in Object.getOwnPropertyNames(this)) "function" != typeof this[b] && (this[b] = null)
            }, a.fn.owlCarousel.Constructor.Plugins.AutoHeight = e
        }(a.Zepto || a.jQuery),
        function(a, b, c, d) {
            var e = function(b) {
                this._core = b, this._videos = {}, this._playing = null, this._handlers = {
                    "initialized.owl.carousel": a.proxy(function(a) {
                        a.namespace && this._core.register({
                            type: "state",
                            name: "playing",
                            tags: ["interacting"]
                        })
                    }, this),
                    "resize.owl.carousel": a.proxy(function(a) {
                        a.namespace && this._core.settings.video && this.isInFullScreen() && a.preventDefault()
                    }, this),
                    "refreshed.owl.carousel": a.proxy(function(a) {
                        a.namespace && this._core.is("resizing") && this._core.$stage.find(".cloned .owl-video-frame").remove()
                    }, this),
                    "changed.owl.carousel": a.proxy(function(a) {
                        a.namespace && "position" === a.property.name && this._playing && this.stop()
                    }, this),
                    "prepared.owl.carousel": a.proxy(function(b) {
                        if (b.namespace) {
                            var c = a(b.content).find(".owl-video");
                            c.length && (c.css("display", "none"), this.fetch(c, a(b.content)))
                        }
                    }, this)
                }, this._core.options = a.extend({}, e.Defaults, this._core.options), this._core.$element.on(this._handlers), this._core.$element.on("click.owl.video", ".owl-video-play-icon", a.proxy(function(a) {
                    this.play(a)
                }, this))
            };
            e.Defaults = {
                video: !1,
                videoHeight: !1,
                videoWidth: !1
            }, e.prototype.fetch = function(a, b) {
                var c = function() {
                        return a.attr("data-vimeo-id") ? "vimeo" : a.attr("data-vzaar-id") ? "vzaar" : "youtube"
                    }(),
                    d = a.attr("data-vimeo-id") || a.attr("data-youtube-id") || a.attr("data-vzaar-id"),
                    e = a.attr("data-width") || this._core.settings.videoWidth,
                    f = a.attr("data-height") || this._core.settings.videoHeight,
                    g = a.attr("href");
                if (!g) throw new Error("Missing video URL.");
                if (d = g.match(/(http:|https:|)\/\/(player.|www.|app.)?(vimeo\.com|youtu(be\.com|\.be|be\.googleapis\.com)|vzaar\.com)\/(video\/|videos\/|embed\/|channels\/.+\/|groups\/.+\/|watch\?v=|v\/)?([A-Za-z0-9._%-]*)(\&\S+)?/), d[3].indexOf("youtu") > -1) c = "youtube";
                else if (d[3].indexOf("vimeo") > -1) c = "vimeo";
                else {
                    if (!(d[3].indexOf("vzaar") > -1)) throw new Error("Video URL not supported.");
                    c = "vzaar"
                }
                d = d[6], this._videos[g] = {
                    type: c,
                    id: d,
                    width: e,
                    height: f
                }, b.attr("data-video", g), this.thumbnail(a, this._videos[g])
            }, e.prototype.thumbnail = function(b, c) {
                var d, e, f, g = c.width && c.height ? 'style="width:' + c.width + "px;height:" + c.height + 'px;"' : "",
                    h = b.find("img"),
                    i = "src",
                    j = "",
                    k = this._core.settings,
                    l = function(a) {
                        e = '<div class="owl-video-play-icon"></div>', d = k.lazyLoad ? '<div class="owl-video-tn ' + j + '" ' + i + '="' + a + '"></div>' : '<div class="owl-video-tn" style="opacity:1;background-image:url(' + a + ')"></div>', b.after(d), b.after(e)
                    };
                if (b.wrap('<div class="owl-video-wrapper"' + g + "></div>"), this._core.settings.lazyLoad && (i = "data-src", j = "owl-lazy"), h.length) return l(h.attr(i)), h.remove(), !1;
                "youtube" === c.type ? (f = "//img.youtube.com/vi/" + c.id + "/hqdefault.jpg", l(f)) : "vimeo" === c.type ? a.ajax({
                    type: "GET",
                    url: "//vimeo.com/api/v2/video/" + c.id + ".json",
                    jsonp: "callback",
                    dataType: "jsonp",
                    success: function(a) {
                        f = a[0].thumbnail_large, l(f)
                    }
                }) : "vzaar" === c.type && a.ajax({
                    type: "GET",
                    url: "//vzaar.com/api/videos/" + c.id + ".json",
                    jsonp: "callback",
                    dataType: "jsonp",
                    success: function(a) {
                        f = a.framegrab_url, l(f)
                    }
                })
            }, e.prototype.stop = function() {
                this._core.trigger("stop", null, "video"), this._playing.find(".owl-video-frame").remove(), this._playing.removeClass("owl-video-playing"), this._playing = null, this._core.leave("playing"), this._core.trigger("stopped", null, "video")
            }, e.prototype.play = function(b) {
                var c, d = a(b.target),
                    e = d.closest("." + this._core.settings.itemClass),
                    f = this._videos[e.attr("data-video")],
                    g = f.width || "100%",
                    h = f.height || this._core.$stage.height();
                this._playing || (this._core.enter("playing"), this._core.trigger("play", null, "video"), e = this._core.items(this._core.relative(e.index())), this._core.reset(e.index()), "youtube" === f.type ? c = '<iframe width="' + g + '" height="' + h + '" src="//www.youtube.com/embed/' + f.id + "?autoplay=1&rel=0&v=" + f.id + '" frameborder="0" allowfullscreen></iframe>' : "vimeo" === f.type ? c = '<iframe src="//player.vimeo.com/video/' + f.id + '?autoplay=1" width="' + g + '" height="' + h + '" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>' : "vzaar" === f.type && (c = '<iframe frameborder="0"height="' + h + '"width="' + g + '" allowfullscreen mozallowfullscreen webkitAllowFullScreen src="//view.vzaar.com/' + f.id + '/player?autoplay=true"></iframe>'), a('<div class="owl-video-frame">' + c + "</div>").insertAfter(e.find(".owl-video")), this._playing = e.addClass("owl-video-playing"))
            }, e.prototype.isInFullScreen = function() {
                var b = c.fullscreenElement || c.mozFullScreenElement || c.webkitFullscreenElement;
                return b && a(b).parent().hasClass("owl-video-frame")
            }, e.prototype.destroy = function() {
                var a, b;
                this._core.$element.off("click.owl.video");
                for (a in this._handlers) this._core.$element.off(a, this._handlers[a]);
                for (b in Object.getOwnPropertyNames(this)) "function" != typeof this[b] && (this[b] = null)
            }, a.fn.owlCarousel.Constructor.Plugins.Video = e
        }(a.Zepto || a.jQuery, 0, b),
        function(a, b, c, d) {
            var e = function(b) {
                this.core = b, this.core.options = a.extend({}, e.Defaults, this.core.options), this.swapping = !0, this.previous = void 0, this.next = void 0, this.handlers = {
                    "change.owl.carousel": a.proxy(function(a) {
                        a.namespace && "position" == a.property.name && (this.previous = this.core.current(), this.next = a.property.value)
                    }, this),
                    "drag.owl.carousel dragged.owl.carousel translated.owl.carousel": a.proxy(function(a) {
                        a.namespace && (this.swapping = "translated" == a.type)
                    }, this),
                    "translate.owl.carousel": a.proxy(function(a) {
                        a.namespace && this.swapping && (this.core.options.animateOut || this.core.options.animateIn) && this.swap()
                    }, this)
                }, this.core.$element.on(this.handlers)
            };
            e.Defaults = {
                animateOut: !1,
                animateIn: !1
            }, e.prototype.swap = function() {
                if (1 === this.core.settings.items && a.support.animation && a.support.transition) {
                    this.core.speed(0);
                    var b, c = a.proxy(this.clear, this),
                        d = this.core.$stage.children().eq(this.previous),
                        e = this.core.$stage.children().eq(this.next),
                        f = this.core.settings.animateIn,
                        g = this.core.settings.animateOut;
                    this.core.current() !== this.previous && (g && (b = this.core.coordinates(this.previous) - this.core.coordinates(this.next), d.one(a.support.animation.end, c).css({
                        left: b + "px"
                    }).addClass("animated owl-animated-out").addClass(g)), f && e.one(a.support.animation.end, c).addClass("animated owl-animated-in").addClass(f))
                }
            }, e.prototype.clear = function(b) {
                a(b.target).css({
                    left: ""
                }).removeClass("animated owl-animated-out owl-animated-in").removeClass(this.core.settings.animateIn).removeClass(this.core.settings.animateOut), this.core.onTransitionEnd()
            }, e.prototype.destroy = function() {
                var a, b;
                for (a in this.handlers) this.core.$element.off(a, this.handlers[a]);
                for (b in Object.getOwnPropertyNames(this)) "function" != typeof this[b] && (this[b] = null)
            }, a.fn.owlCarousel.Constructor.Plugins.Animate = e
        }(a.Zepto || a.jQuery),
        function(a, b, c, d) {
            var e = function(b) {
                this._core = b, this._call = null, this._time = 0, this._timeout = 0, this._paused = !0, this._handlers = {
                    "changed.owl.carousel": a.proxy(function(a) {
                        a.namespace && "settings" === a.property.name ? this._core.settings.autoplay ? this.play() : this.stop() : a.namespace && "position" === a.property.name && this._paused && (this._time = 0)
                    }, this),
                    "initialized.owl.carousel": a.proxy(function(a) {
                        a.namespace && this._core.settings.autoplay && this.play()
                    }, this),
                    "play.owl.autoplay": a.proxy(function(a, b, c) {
                        a.namespace && this.play(b, c)
                    }, this),
                    "stop.owl.autoplay": a.proxy(function(a) {
                        a.namespace && this.stop()
                    }, this),
                    "mouseover.owl.autoplay": a.proxy(function() {
                        this._core.settings.autoplayHoverPause && this._core.is("rotating") && this.pause()
                    }, this),
                    "mouseleave.owl.autoplay": a.proxy(function() {
                        this._core.settings.autoplayHoverPause && this._core.is("rotating") && this.play()
                    }, this),
                    "touchstart.owl.core": a.proxy(function() {
                        this._core.settings.autoplayHoverPause && this._core.is("rotating") && this.pause()
                    }, this),
                    "touchend.owl.core": a.proxy(function() {
                        this._core.settings.autoplayHoverPause && this.play()
                    }, this)
                }, this._core.$element.on(this._handlers), this._core.options = a.extend({}, e.Defaults, this._core.options)
            };
            e.Defaults = {
                autoplay: !1,
                autoplayTimeout: 5e3,
                autoplayHoverPause: !1,
                autoplaySpeed: !1
            }, e.prototype._next = function(d) {
                this._call = b.setTimeout(a.proxy(this._next, this, d), this._timeout * (Math.round(this.read() / this._timeout) + 1) - this.read()), this._core.is("busy") || this._core.is("interacting") || c.hidden || this._core.next(d || this._core.settings.autoplaySpeed)
            }, e.prototype.read = function() {
                return (new Date).getTime() - this._time
            }, e.prototype.play = function(c, d) {
                var e;
                this._core.is("rotating") || this._core.enter("rotating"), c = c || this._core.settings.autoplayTimeout, e = Math.min(this._time % (this._timeout || c), c), this._paused ? (this._time = this.read(), this._paused = !1) : b.clearTimeout(this._call), this._time += this.read() % c - e, this._timeout = c, this._call = b.setTimeout(a.proxy(this._next, this, d), c - e)
            }, e.prototype.stop = function() {
                this._core.is("rotating") && (this._time = 0, this._paused = !0, b.clearTimeout(this._call), this._core.leave("rotating"))
            }, e.prototype.pause = function() {
                this._core.is("rotating") && !this._paused && (this._time = this.read(), this._paused = !0, b.clearTimeout(this._call))
            }, e.prototype.destroy = function() {
                var a, b;
                this.stop();
                for (a in this._handlers) this._core.$element.off(a, this._handlers[a]);
                for (b in Object.getOwnPropertyNames(this)) "function" != typeof this[b] && (this[b] = null)
            }, a.fn.owlCarousel.Constructor.Plugins.autoplay = e
        }(a.Zepto || a.jQuery, a, b),
        function(a, b, c, d) {
            "use strict";
            var e = function(b) {
                this._core = b, this._initialized = !1, this._pages = [], this._controls = {}, this._templates = [], this.$element = this._core.$element, this._overrides = {
                    next: this._core.next,
                    prev: this._core.prev,
                    to: this._core.to
                }, this._handlers = {
                    "prepared.owl.carousel": a.proxy(function(b) {
                        b.namespace && this._core.settings.dotsData && this._templates.push('<div class="' + this._core.settings.dotClass + '">' + a(b.content).find("[data-dot]").addBack("[data-dot]").attr("data-dot") + "</div>")
                    }, this),
                    "added.owl.carousel": a.proxy(function(a) {
                        a.namespace && this._core.settings.dotsData && this._templates.splice(a.position, 0, this._templates.pop())
                    }, this),
                    "remove.owl.carousel": a.proxy(function(a) {
                        a.namespace && this._core.settings.dotsData && this._templates.splice(a.position, 1)
                    }, this),
                    "changed.owl.carousel": a.proxy(function(a) {
                        a.namespace && "position" == a.property.name && this.draw()
                    }, this),
                    "initialized.owl.carousel": a.proxy(function(a) {
                        a.namespace && !this._initialized && (this._core.trigger("initialize", null, "navigation"), this.initialize(), this.update(), this.draw(), this._initialized = !0, this._core.trigger("initialized", null, "navigation"))
                    }, this),
                    "refreshed.owl.carousel": a.proxy(function(a) {
                        a.namespace && this._initialized && (this._core.trigger("refresh", null, "navigation"), this.update(), this.draw(), this._core.trigger("refreshed", null, "navigation"))
                    }, this)
                }, this._core.options = a.extend({}, e.Defaults, this._core.options), this.$element.on(this._handlers)
            };
            e.Defaults = {
                nav: !1,
                navText: ['<span aria-label="prev">&#x2039;</span>', '<span aria-label="next">&#x203a;</span>'],
                navSpeed: !1,
                navElement: 'button role="presentation"',
                navContainer: !1,
                navContainerClass: "owl-nav",
                navClass: ["owl-prev", "owl-next"],
                slideBy: 1,
                dotClass: "owl-dot",
                dotsClass: "owl-dots",
                dots: !0,
                dotsEach: !1,
                dotsData: !1,
                dotsSpeed: !1,
                dotsContainer: !1
            }, e.prototype.initialize = function() {
                var b, c = this._core.settings;
                this._controls.$relative = (c.navContainer ? a(c.navContainer) : a("<div>").addClass(c.navContainerClass).appendTo(this.$element)).addClass("disabled"), this._controls.$previous = a("<" + c.navElement + ">").addClass(c.navClass[0]).html(c.navText[0]).prependTo(this._controls.$relative).on("click", a.proxy(function(a) {
                    this.prev(c.navSpeed)
                }, this)), this._controls.$next = a("<" + c.navElement + ">").addClass(c.navClass[1]).html(c.navText[1]).appendTo(this._controls.$relative).on("click", a.proxy(function(a) {
                    this.next(c.navSpeed)
                }, this)), c.dotsData || (this._templates = [a("<button>").addClass(c.dotClass).append(a("<span>")).prop("outerHTML")]), this._controls.$absolute = (c.dotsContainer ? a(c.dotsContainer) : a("<div>").addClass(c.dotsClass).appendTo(this.$element)).addClass("disabled"), this._controls.$absolute.on("click", "button", a.proxy(function(b) {
                    var d = a(b.target).parent().is(this._controls.$absolute) ? a(b.target).index() : a(b.target).parent().index();
                    b.preventDefault(), this.to(d, c.dotsSpeed)
                }, this));
                for (b in this._overrides) this._core[b] = a.proxy(this[b], this)
            }, e.prototype.destroy = function() {
                var a, b, c, d;
                for (a in this._handlers) this.$element.off(a, this._handlers[a]);
                for (b in this._controls) "$relative" === b && settings.navContainer ? this._controls[b].html("") : this._controls[b].remove();
                for (d in this.overides) this._core[d] = this._overrides[d];
                for (c in Object.getOwnPropertyNames(this)) "function" != typeof this[c] && (this[c] = null)
            }, e.prototype.update = function() {
                var a, b, c, d = this._core.clones().length / 2,
                    e = d + this._core.items().length,
                    f = this._core.maximum(!0),
                    g = this._core.settings,
                    h = g.center || g.autoWidth || g.dotsData ? 1 : g.dotsEach || g.items;
                if ("page" !== g.slideBy && (g.slideBy = Math.min(g.slideBy, g.items)), g.dots || "page" == g.slideBy)
                    for (this._pages = [], a = d, b = 0, c = 0; a < e; a++) {
                        if (b >= h || 0 === b) {
                            if (this._pages.push({
                                    start: Math.min(f, a - d),
                                    end: a - d + h - 1
                                }), Math.min(f, a - d) === f) break;
                            b = 0, ++c
                        }
                        b += this._core.mergers(this._core.relative(a))
                    }
            }, e.prototype.draw = function() {
                var b, c = this._core.settings,
                    d = this._core.items().length <= c.items,
                    e = this._core.relative(this._core.current()),
                    f = c.loop || c.rewind;
                this._controls.$relative.toggleClass("disabled", !c.nav || d), c.nav && (this._controls.$previous.toggleClass("disabled", !f && e <= this._core.minimum(!0)), this._controls.$next.toggleClass("disabled", !f && e >= this._core.maximum(!0))), this._controls.$absolute.toggleClass("disabled", !c.dots || d), c.dots && (b = this._pages.length - this._controls.$absolute.children().length, c.dotsData && 0 !== b ? this._controls.$absolute.html(this._templates.join("")) : b > 0 ? this._controls.$absolute.append(new Array(b + 1).join(this._templates[0])) : b < 0 && this._controls.$absolute.children().slice(b).remove(), this._controls.$absolute.find(".active").removeClass("active"), this._controls.$absolute.children().eq(a.inArray(this.current(), this._pages)).addClass("active"))
            }, e.prototype.onTrigger = function(b) {
                var c = this._core.settings;
                b.page = {
                    index: a.inArray(this.current(), this._pages),
                    count: this._pages.length,
                    size: c && (c.center || c.autoWidth || c.dotsData ? 1 : c.dotsEach || c.items)
                }
            }, e.prototype.current = function() {
                var b = this._core.relative(this._core.current());
                return a.grep(this._pages, a.proxy(function(a, c) {
                    return a.start <= b && a.end >= b
                }, this)).pop()
            }, e.prototype.getPosition = function(b) {
                var c, d, e = this._core.settings;
                return "page" == e.slideBy ? (c = a.inArray(this.current(), this._pages), d = this._pages.length, b ? ++c : --c, c = this._pages[(c % d + d) % d].start) : (c = this._core.relative(this._core.current()), d = this._core.items().length, b ? c += e.slideBy : c -= e.slideBy), c
            }, e.prototype.next = function(b) {
                a.proxy(this._overrides.to, this._core)(this.getPosition(!0), b)
            }, e.prototype.prev = function(b) {
                a.proxy(this._overrides.to, this._core)(this.getPosition(!1), b)
            }, e.prototype.to = function(b, c, d) {
                var e;
                !d && this._pages.length ? (e = this._pages.length, a.proxy(this._overrides.to, this._core)(this._pages[(b % e + e) % e].start, c)) : a.proxy(this._overrides.to, this._core)(b, c)
            }, a.fn.owlCarousel.Constructor.Plugins.Navigation = e
        }(a.Zepto || a.jQuery),
        function(a, b, c, d) {
            "use strict";
            var e = function(c) {
                this._core = c, this._hashes = {}, this.$element = this._core.$element, this._handlers = {
                    "initialized.owl.carousel": a.proxy(function(c) {
                        c.namespace && "URLHash" === this._core.settings.startPosition && a(b).trigger("hashchange.owl.navigation")
                    }, this),
                    "prepared.owl.carousel": a.proxy(function(b) {
                        if (b.namespace) {
                            var c = a(b.content).find("[data-hash]").addBack("[data-hash]").attr("data-hash");
                            if (!c) return;
                            this._hashes[c] = b.content
                        }
                    }, this),
                    "changed.owl.carousel": a.proxy(function(c) {
                        if (c.namespace && "position" === c.property.name) {
                            var d = this._core.items(this._core.relative(this._core.current())),
                                e = a.map(this._hashes, function(a, b) {
                                    return a === d ? b : null
                                }).join();
                            if (!e || b.location.hash.slice(1) === e) return;
                            b.location.hash = e
                        }
                    }, this)
                }, this._core.options = a.extend({}, e.Defaults, this._core.options), this.$element.on(this._handlers), a(b).on("hashchange.owl.navigation", a.proxy(function(a) {
                    var c = b.location.hash.substring(1),
                        d = this._core.$stage.children(),
                        e = this._hashes[c] && d.index(this._hashes[c]);
                    void 0 !== e && e !== this._core.current() && this._core.to(this._core.relative(e), !1, !0)
                }, this))
            };
            e.Defaults = {
                URLhashListener: !1
            }, e.prototype.destroy = function() {
                var c, d;
                a(b).off("hashchange.owl.navigation");
                for (c in this._handlers) this._core.$element.off(c, this._handlers[c]);
                for (d in Object.getOwnPropertyNames(this)) "function" != typeof this[d] && (this[d] = null)
            }, a.fn.owlCarousel.Constructor.Plugins.Hash = e
        }(a.Zepto || a.jQuery, a),
        function(a, b, c, d) {
            function e(b, c) {
                var e = !1,
                    f = b.charAt(0).toUpperCase() + b.slice(1);
                return a.each((b + " " + h.join(f + " ") + f).split(" "), function(a, b) {
                    if (g[b] !== d) return e = !c || b, !1
                }), e
            }

            function f(a) {
                return e(a, !0)
            }
            var g = a("<support>").get(0).style,
                h = "Webkit Moz O ms".split(" "),
                i = {
                    transition: {
                        end: {
                            WebkitTransition: "webkitTransitionEnd",
                            MozTransition: "transitionend",
                            OTransition: "oTransitionEnd",
                            transition: "transitionend"
                        }
                    },
                    animation: {
                        end: {
                            WebkitAnimation: "webkitAnimationEnd",
                            MozAnimation: "animationend",
                            OAnimation: "oAnimationEnd",
                            animation: "animationend"
                        }
                    }
                },
                j = {
                    csstransforms: function() {
                        return !!e("transform")
                    },
                    csstransforms3d: function() {
                        return !!e("perspective")
                    },
                    csstransitions: function() {
                        return !!e("transition")
                    },
                    cssanimations: function() {
                        return !!e("animation")
                    }
                };
            j.csstransitions() && (a.support.transition = new String(f("transition")), a.support.transition.end = i.transition.end[a.support.transition]), j.cssanimations() && (a.support.animation = new String(f("animation")), a.support.animation.end = i.animation.end[a.support.animation]), j.csstransforms() && (a.support.transform = new String(f("transform")), a.support.transform3d = j.csstransforms3d())
        }(a.Zepto || a.jQuery),
        function(a, b, c) {
            function d(b, c) {
                this.element = b, this.$element = a(b), this.tabs = [], this.state = "", this.rotateInterval = 0, this.$queue = a({}), this.options = a.extend({}, e, c), this.init()
            }
            var e = {
                active: null,
                event: "click",
                disabled: [],
                collapsible: "accordion",
                startCollapsed: !1,
                rotate: !1,
                setHash: !1,
                animation: "default",
                animationQueue: !1,
                duration: 500,
                fluidHeight: !0,
                scrollToAccordion: !1,
                scrollToAccordionOnLoad: !0,
                scrollToAccordionOffset: 0,
                accordionTabElement: "<div></div>",
                click: function() {},
                activate: function() {},
                deactivate: function() {},
                load: function() {},
                activateState: function() {},
                classes: {
                    stateDefault: "r-tabs-state-default",
                    stateActive: "r-tabs-state-active",
                    stateDisabled: "r-tabs-state-disabled",
                    stateExcluded: "r-tabs-state-excluded",
                    container: "r-tabs",
                    ul: "r-tabs-nav",
                    tab: "r-tabs-tab",
                    anchor: "r-tabs-anchor",
                    panel: "r-tabs-panel",
                    accordionTitle: "r-tabs-accordion-title"
                }
            };
            d.prototype.init = function() {
                var c = this;
                this.tabs = this._loadElements(), this._loadClasses(), this._loadEvents(), a(b).on("resize", function(a) {
                    c._setState(a), !0 !== c.options.fluidHeight && c._equaliseHeights()
                }), a(b).on("hashchange", function(a) {
                    var d = c._getTabRefBySelector(b.location.hash),
                        e = c._getTab(d);
                    d >= 0 && !e._ignoreHashChange && !e.disabled && c._openTab(a, c._getTab(d), !0)
                }), !1 !== this.options.rotate && this.startRotation(), !0 !== this.options.fluidHeight && c._equaliseHeights(), this.$element.bind("tabs-click", function(a, b) {
                    c.options.click.call(this, a, b)
                }), this.$element.bind("tabs-activate", function(a, b) {
                    c.options.activate.call(this, a, b)
                }), this.$element.bind("tabs-deactivate", function(a, b) {
                    c.options.deactivate.call(this, a, b)
                }), this.$element.bind("tabs-activate-state", function(a, b) {
                    c.options.activateState.call(this, a, b)
                }), this.$element.bind("tabs-load", function(a) {
                    var b;
                    c._setState(a), !0 === c.options.startCollapsed || "accordion" === c.options.startCollapsed && "accordion" === c.state || (b = c._getStartTab(), c._openTab(a, b), c.options.load.call(this, a, b))
                }), this.$element.trigger("tabs-load")
            }, d.prototype._loadElements = function() {
                var b = this,
                    c = this.$element.children("ul:first"),
                    d = [],
                    e = 0;
                return this.$element.addClass(b.options.classes.container), c.addClass(b.options.classes.ul), a("li", c).each(function() {
                    var c, f, g, h, i, j = a(this),
                        k = j.hasClass(b.options.classes.stateExcluded);
                    if (!k) {
                        c = a("a", j), i = c.attr("href"), f = a(i), g = a(b.options.accordionTabElement).insertBefore(f), h = a("<a></a>").attr("href", i).html(c.html()).appendTo(g);
                        var l = {
                            _ignoreHashChange: !1,
                            id: e,
                            disabled: -1 !== a.inArray(e, b.options.disabled),
                            tab: a(this),
                            anchor: a("a", j),
                            panel: f,
                            selector: i,
                            accordionTab: g,
                            accordionAnchor: h,
                            active: !1
                        };
                        e++, d.push(l)
                    }
                }), d
            }, d.prototype._loadClasses = function() {
                for (var a = 0; a < this.tabs.length; a++) this.tabs[a].tab.addClass(this.options.classes.stateDefault).addClass(this.options.classes.tab), this.tabs[a].anchor.addClass(this.options.classes.anchor), this.tabs[a].panel.addClass(this.options.classes.stateDefault).addClass(this.options.classes.panel), this.tabs[a].accordionTab.addClass(this.options.classes.accordionTitle), this.tabs[a].accordionAnchor.addClass(this.options.classes.anchor), this.tabs[a].disabled && (this.tabs[a].tab.removeClass(this.options.classes.stateDefault).addClass(this.options.classes.stateDisabled), this.tabs[a].accordionTab.removeClass(this.options.classes.stateDefault).addClass(this.options.classes.stateDisabled))
            }, d.prototype._loadEvents = function() {
                for (var a = this, c = function(c) {
                        var d = a._getCurrentTab(),
                            e = c.data.tab;
                        c.preventDefault(), e.tab.trigger("tabs-click", e), e.disabled || (a.options.setHash && (history.pushState ? (b.location.origin || (b.location.origin = b.location.protocol + "//" + b.location.hostname + (b.location.port ? ":" + b.location.port : "")), history.pushState(null, null, b.location.origin + b.location.pathname + b.location.search + e.selector)) : b.location.hash = e.selector), c.data.tab._ignoreHashChange = !0, (d !== e || a._isCollapisble()) && (a._closeTab(c, d), d === e && a._isCollapisble() || a._openTab(c, e, !1, !0)))
                    }, d = 0; d < this.tabs.length; d++) this.tabs[d].anchor.on(a.options.event, {
                    tab: a.tabs[d]
                }, c), this.tabs[d].accordionAnchor.on(a.options.event, {
                    tab: a.tabs[d]
                }, c)
            }, d.prototype._getStartTab = function() {
                var a = this._getTabRefBySelector(b.location.hash);
                return a >= 0 && !this._getTab(a).disabled ? this._getTab(a) : this.options.active > 0 && !this._getTab(this.options.active).disabled ? this._getTab(this.options.active) : this._getTab(0)
            }, d.prototype._setState = function(b) {
                var c, d = a("ul:first", this.$element),
                    e = this.state,
                    f = "string" == typeof this.options.startCollapsed;
                d.is(":visible") ? this.state = "tabs" : this.state = "accordion", this.state !== e && (this.$element.trigger("tabs-activate-state", {
                    oldState: e,
                    newState: this.state
                }), e && f && this.options.startCollapsed !== this.state && void 0 === this._getCurrentTab() && (c = this._getStartTab(b), this._openTab(b, c)))
            }, d.prototype._openTab = function(b, c, d, e) {
                var f, g = this;
                d && this._closeTab(b, this._getCurrentTab()), e && this.rotateInterval > 0 && this.stopRotation(), c.active = !0, c.tab.removeClass(g.options.classes.stateDefault).addClass(g.options.classes.stateActive), c.accordionTab.removeClass(g.options.classes.stateDefault).addClass(g.options.classes.stateActive), g._doTransition(c.panel, g.options.animation, "open", function() {
                    var d = "tabs-load" !== b.type || g.options.scrollToAccordionOnLoad;
                    c.panel.removeClass(g.options.classes.stateDefault).addClass(g.options.classes.stateActive), "accordion" !== g.getState() || !g.options.scrollToAccordion || g._isInView(c.accordionTab) && "default" === g.options.animation || !d || (f = c.accordionTab.offset().top - g.options.scrollToAccordionOffset, "default" !== g.options.animation && g.options.duration > 0 ? a("html, body").animate({
                        scrollTop: f
                    }, g.options.duration) : a("html, body").scrollTop(f))
                }), this.$element.trigger("tabs-activate", c)
            }, d.prototype._closeTab = function(a, b) {
                var c, d = this,
                    e = "string" == typeof d.options.animationQueue;
                void 0 !== b && (c = !(!e || d.getState() !== d.options.animationQueue) || !e && d.options.animationQueue, b.active = !1, b.tab.removeClass(d.options.classes.stateActive).addClass(d.options.classes.stateDefault), d._doTransition(b.panel, d.options.animation, "close", function() {
                    b.accordionTab.removeClass(d.options.classes.stateActive).addClass(d.options.classes.stateDefault), b.panel.removeClass(d.options.classes.stateActive).addClass(d.options.classes.stateDefault)
                }, !c), this.$element.trigger("tabs-deactivate", b))
            }, d.prototype._doTransition = function(a, b, c, d, e) {
                var f, g = this;
                switch (b) {
                    case "slide":
                        f = "open" === c ? "slideDown" : "slideUp";
                        break;
                    case "fade":
                        f = "open" === c ? "fadeIn" : "fadeOut";
                        break;
                    default:
                        f = "open" === c ? "show" : "hide", g.options.duration = 0
                }
                this.$queue.queue("responsive-tabs", function(e) {
                    a[f]({
                        duration: g.options.duration,
                        complete: function() {
                            d.call(a, b, c), e()
                        }
                    })
                }), ("open" === c || e) && this.$queue.dequeue("responsive-tabs")
            }, d.prototype._isCollapisble = function() {
                return "boolean" == typeof this.options.collapsible && this.options.collapsible || "string" == typeof this.options.collapsible && this.options.collapsible === this.getState()
            }, d.prototype._getTab = function(a) {
                return this.tabs[a]
            }, d.prototype._getTabRefBySelector = function(a) {
                for (var b = 0; b < this.tabs.length; b++)
                    if (this.tabs[b].selector === a) return b;
                return -1
            }, d.prototype._getCurrentTab = function() {
                return this._getTab(this._getCurrentTabRef())
            }, d.prototype._getNextTabRef = function(a) {
                var b = a || this._getCurrentTabRef(),
                    c = b === this.tabs.length - 1 ? 0 : b + 1;
                return this._getTab(c).disabled ? this._getNextTabRef(c) : c
            }, d.prototype._getPreviousTabRef = function() {
                return 0 === this._getCurrentTabRef() ? this.tabs.length - 1 : this._getCurrentTabRef() - 1
            }, d.prototype._getCurrentTabRef = function() {
                for (var a = 0; a < this.tabs.length; a++)
                    if (this.tabs[a].active) return a;
                return -1
            }, d.prototype._equaliseHeights = function() {
                var b = 0;
                a.each(a.map(this.tabs, function(a) {
                    return b = Math.max(b, a.panel.css("minHeight", "").height()), a.panel
                }), function() {
                    this.css("minHeight", b)
                })
            }, d.prototype._isInView = function(c) {
                var d = a(b).scrollTop(),
                    e = d + a(b).height(),
                    f = c.offset().top;
                return f + c.height() <= e && f >= d
            }, d.prototype.activate = function(a, b) {
                var c = jQuery.Event("tabs-activate"),
                    d = this._getTab(a);
                d.disabled || this._openTab(c, d, !0, b || !0)
            }, d.prototype.deactivate = function(a) {
                var b = jQuery.Event("tabs-dectivate"),
                    c = this._getTab(a);
                c.disabled || this._closeTab(b, c)
            }, d.prototype.enable = function(a) {
                var b = this._getTab(a);
                b && (b.disabled = !1, b.tab.addClass(this.options.classes.stateDefault).removeClass(this.options.classes.stateDisabled), b.accordionTab.addClass(this.options.classes.stateDefault).removeClass(this.options.classes.stateDisabled))
            }, d.prototype.disable = function(a) {
                var b = this._getTab(a);
                b && (b.disabled = !0, b.tab.removeClass(this.options.classes.stateDefault).addClass(this.options.classes.stateDisabled), b.accordionTab.removeClass(this.options.classes.stateDefault).addClass(this.options.classes.stateDisabled))
            }, d.prototype.getState = function() {
                return this.state
            }, d.prototype.startRotation = function(b) {
                var c = this;
                if (!(this.tabs.length > this.options.disabled.length)) throw new Error("Rotation is not possible if all tabs are disabled");
                this.rotateInterval = setInterval(function() {
                    var a = jQuery.Event("rotate");
                    c._openTab(a, c._getTab(c._getNextTabRef()), !0)
                }, b || (a.isNumeric(c.options.rotate) ? c.options.rotate : 4e3))
            }, d.prototype.stopRotation = function() {
                b.clearInterval(this.rotateInterval), this.rotateInterval = 0
            }, d.prototype.option = function(a, b) {
                return b && (this.options[a] = b), this.options[a]
            }, a.fn.responsiveTabs = function(b) {
                var c, e = arguments;
                return void 0 === b || "object" == typeof b ? this.each(function() {
                    a.data(this, "responsivetabs") || a.data(this, "responsivetabs", new d(this, b))
                }) : "string" == typeof b && "_" !== b[0] && "init" !== b ? (c = a.data(this[0], "responsivetabs"), "destroy" === b && a.data(this, "responsivetabs", null), c instanceof d && "function" == typeof c[b] ? c[b].apply(c, Array.prototype.slice.call(e, 1)) : this) : void 0
            }
        }(jQuery, a),
        function(a) {
            var c = {
                url: !1,
                callback: !1,
                target: !1,
                duration: 120,
                on: "mouseover",
                touch: !0,
                onZoomIn: !1,
                onZoomOut: !1,
                magnify: 1
            };
            a.zoom = function(b, c, d, e) {
                var f, g, h, i, j, k, l, m = a(b),
                    n = m.css("position"),
                    o = a(c);
                return b.style.position = /(absolute|fixed)/.test(n) ? n : "relative", b.style.overflow = "hidden", d.style.width = d.style.height = "", a(d).addClass("zoomImg").css({
                    position: "absolute",
                    top: 0,
                    left: 0,
                    opacity: 0,
                    width: d.width * e,
                    height: d.height * e,
                    border: "none",
                    maxWidth: "none",
                    maxHeight: "none"
                }).appendTo(b), {
                    init: function() {
                        g = m.outerWidth(), f = m.outerHeight(), c === b ? (i = g, h = f) : (i = o.outerWidth(), h = o.outerHeight()), j = (d.width - g) / i, k = (d.height - f) / h, l = o.offset()
                    },
                    move: function(a) {
                        var b = a.pageX - l.left,
                            c = a.pageY - l.top;
                        c = Math.max(Math.min(c, h), 0), b = Math.max(Math.min(b, i), 0), d.style.left = b * -j + "px", d.style.top = c * -k + "px"
                    }
                }
            }, a.fn.zoom = function(d) {
                return this.each(function() {
                    var e = a.extend({}, c, d || {}),
                        f = e.target && a(e.target)[0] || this,
                        g = this,
                        h = a(g),
                        i = b.createElement("img"),
                        j = a(i),
                        k = "mousemove.zoom",
                        l = !1,
                        m = !1;
                    if (!e.url) {
                        var n = g.querySelector("img");
                        if (n && (e.url = n.getAttribute("data-src") || n.currentSrc || n.src), !e.url) return
                    }
                    h.one("zoom.destroy", function(a, b) {
                        h.off(".zoom"), f.style.position = a, f.style.overflow = b, i.onload = null, j.remove()
                    }.bind(this, f.style.position, f.style.overflow)), i.onload = function() {
                        function c(b) {
                            n.init(), n.move(b), j.stop().fadeTo(a.support.opacity ? e.duration : 0, 1, !!a.isFunction(e.onZoomIn) && e.onZoomIn.call(i))
                        }

                        function d() {
                            j.stop().fadeTo(e.duration, 0, !!a.isFunction(e.onZoomOut) && e.onZoomOut.call(i))
                        }
                        var n = a.zoom(f, g, i, e.magnify);
                        "grab" === e.on ? h.on("mousedown.zoom", function(e) {
                            1 === e.which && (a(b).one("mouseup.zoom", function() {
                                d(), a(b).off(k, n.move)
                            }), c(e), a(b).on(k, n.move), e.preventDefault())
                        }) : "click" === e.on ? h.on("click.zoom", function(e) {
                            return l ? void 0 : (l = !0, c(e), a(b).on(k, n.move), a(b).one("click.zoom", function() {
                                d(), l = !1, a(b).off(k, n.move)
                            }), !1)
                        }) : "toggle" === e.on ? h.on("click.zoom", function(a) {
                            l ? d() : c(a), l = !l
                        }) : "mouseover" === e.on && (n.init(), h.on("mouseenter.zoom", c).on("mouseleave.zoom", d).on(k, n.move)), e.touch && h.on("touchstart.zoom", function(a) {
                            a.preventDefault(), m ? (m = !1, d()) : (m = !0, c(a.originalEvent.touches[0] || a.originalEvent.changedTouches[0]))
                        }).on("touchmove.zoom", function(a) {
                            a.preventDefault(), n.move(a.originalEvent.touches[0] || a.originalEvent.changedTouches[0])
                        }).on("touchend.zoom", function(a) {
                            a.preventDefault(), m && (m = !1, d())
                        }), a.isFunction(e.callback) && e.callback.call(i)
                    }, i.setAttribute("role", "presentation"), i.src = e.url
                })
            }, a.fn.zoom.defaults = c
        }(a.jQuery);
    var c = {
        constructors: {},
        instances: {},
        properties: {},
        methods: {
            invokeContainer: function(a, b) {
                a.elements = {}, a.properties = {}, a.ready = !1, b ? (a.class_name = "jet-" + b.toLowerCase(), a.$element = $("." + a.class_name), a.$element.length && (a.ready = !0)) : a.ready = !0
            },
            isSet: function(a) {
                return void 0 !== a
            }
        }
    };
    ! function(a, b) {
        var c = function() {
            var b = this;
            a.methods.invokeContainer(b, "basket"), b.initiate()
        };
        c.prototype.initiate = function() {
            this.$element.length
        }, a.constructors.Basket = c
    }(c, jQuery),
    function(a, c) {
        var d = function() {
            var b = this;
            a.methods.invokeContainer(b, "cat"), b.initiate()
        };
        d.prototype.initiate = function() {
            var a = this;
            a.$element.length && (a.elements.$cat_filter_drop_down = a.$element.find(".filter-drop-down"), a.attachFilters())
        }, d.prototype.attachFilters = function() {
            var a = this;
            if (a.$element.length) {
                c(this).hasClass("products");
                a.elements.$cat_filter_drop_down.find(".title").on("click", function(b) {
                    var d = c(this);
                    d.hasClass("is-active") ? closeFilter() : (closeFilter(), d.toggleClass("is-active"), d.next("ul").toggleClass("is-active tdFadeInUp"), d.closest(a.elements.$cat_filter_drop_down).toggleClass("is-active")), b.preventDefault(), b.stopPropagation()
                }), c(b).on("click", function(b) {
                    a.elements.$cat_filter_drop_down.hasClass("is-active") && 0 == c(b.target).closest(a.elements.$cat_filter_drop_down).length && closeFilter()
                }), closeFilter = function() {
                    a.elements.$cat_filter_drop_down.removeClass("is-active"), a.elements.$cat_filter_drop_down.find(".title").removeClass("is-active"), a.elements.$cat_filter_drop_down.find(".title").next("ul").removeClass("is-active tdFadeInUp")
                }
            }
        }, a.constructors.Cat = d
    }(c, jQuery),
    function(a, b) {
        var c = function() {
            var b = this;
            a.methods.invokeContainer(b, "checkout"), b.initiate()
        };
        c.prototype.initiate = function() {
            this.$element.length
        }, a.constructors.Checkout = c
    }(c, jQuery),
    function(a, b) {
        var c = function() {
            var b = this;
            a.methods.invokeContainer(b, "contact"), b.initiate()
        };
        c.prototype.initiate = function() {
            this.$element.length
        }, a.constructors.Contact = c
    }(c, jQuery),
    function(c, d) {
        var e = function() {
            var a = this;
            c.methods.invokeContainer(a, "global"), a.initiate()
        };
        e.prototype.initiate = function() {
            var c = this;
            c.elements.$window = d(a), c.elements.$document = d(b), c.elements.$html = d("html"), c.elements.$body = d("body"), c.elements.$html_body = d("html,body"), c.elements.$top_offset_element = d(".l-header"), c.attachDeviceClasses(), c.preLoader(), c.attachAnchorSmoothScroll(), c.attachFormField(), c.attachResponsiveAccordion()
        }, e.prototype.attachDeviceClasses = function() {
            var a = [];
            navigator.userAgent.match(/(iPad|iPhone|iPod)/i) && a.push("device-ios"), navigator.userAgent.match(/android/i) && a.push("device-android"), navigator.userAgent.match(/safari/i) && !navigator.userAgent.match(/chrome/i) && a.push("browser-safari"), navigator.userAgent.match(/firefox/i) && a.push("browser-firefox");
            var c = b.getElementsByTagName("html")[0];
            a.length && (a.push("on-device"), c.classList && c.classList.add.apply(c.classList, a))
        }, e.prototype.preLoader = function() {
            d(a).on("load", function() {
                d("html, body").animate({
                    scrollTop: 0
                }, "normal"), d("#loader").fadeOut("slow", function() {
                    d("#preloader").delay(300).fadeOut("slow", function() {
                        AOS.init()
                    })
                })
            })
        }, e.prototype.scrollToElement = function(a) {
            var b = this,
                c = (b.elements.$top_offset_element.length && "fixed" == b.elements.$top_offset_element.css("position") && b.elements.$top_offset_element.outerHeight(!1), b.elements.$document.outerHeight(!0) - b.elements.$window.height()),
                d = a.offset().top - 200;
            c > 0 && (d > c && (d = c), b.elements.$html_body.stop(!0, !1).animate({
                scrollTop: d
            }, 300, "easeInOutCirc"))
        }, e.prototype.attachAnchorSmoothScroll = function() {
            var a = this;
            a.elements.$document.off("click.anchor_smooth_scroll").on("click.anchor_smooth_scroll", 'a[href^="#"]', function(b) {
                var c = d(this).attr("href"),
                    e = d(this);
                if ("#" == c) b.preventDefault();
                else {
                    var f = d('a[name="' + c.replace(/^#/, "") + '"]').eq(0),
                        g = d(c).eq(0);
                    e.hasClass("no-scroll") || (f.length ? (a.scrollToElement(f), b.preventDefault()) : g.length && (a.scrollToElement(g), b.preventDefault()))
                }
            })
        }, e.prototype.swapSVGIcon = function(a, b) {
            a && a.length && a.replaceWith('<svg class="' + b + '"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#' + b + '"></use></svg>')
        }, e.prototype.attachFormField = function() {
            d("input,textarea").focus(function() {
                d(this).closest(".m-form-field").addClass("m-form-field--active")
            }).blur(function() {
                d(this).closest(".m-form-field").removeClass("m-form-field--active")
            }).on("keyup paste change focus blur keydown", function() {
                0 != d(this).val().length ? d(this).closest(".m-form-field").addClass("m-form-field--show-floating-label") : d(this).closest(".m-form-field").removeClass("m-form-field--show-floating-label")
            })
        }, e.prototype.attachResponsiveAccordion = function() {
            function a() {
                var a = c.width();
                a <= h ? e.removeClass("no-accordion") : a >= h && setRespAccordionDesktop()
            }
            var b = this,
                c = b.elements.$window,
                e = d(".resp-accordion"),
                f = d(".resp-accordion-item"),
                g = d(".resp-accordion-item-title"),
                h = e.data("resp-max-width");
            e.length && (setRespAccordion = function() {
                g.on("click", function(a) {
                    d(this).hasClass("is-active") ? closeRespAccordion() : e.hasClass("no-accordion") || (closeRespAccordion(), b.swapSVGIcon(d(this).find("svg.svg-icon-arrow-down"), "svg-icon-arrow-up"), d(this).closest(f).addClass("is-active"), d(this).addClass("is-active"), d(this).closest(f).find(".resp-accordion-item-content").slideDown({
                        duration: 300,
                        easing: "easeInOutCirc"
                    })), a.preventDefault()
                })
            }, closeRespAccordion = function() {
                f.removeClass("is-active"), g.removeClass("is-active"), b.swapSVGIcon(g.find("svg.svg-icon-arrow-up"), "svg-icon-arrow-down"), f.find(".resp-accordion-item-content").slideUp({
                    duration: 300,
                    easing: "easeInOutCirc"
                })
            }, setRespAccordionDesktop = function() {
                e.addClass("no-accordion"), f.removeClass("is-active"), g.removeClass("is-active"), b.swapSVGIcon(g.find("svg.svg-icon-arrow-up"), "svg-icon-arrow-down"), f.find(".resp-accordion-item-content").attr("style", "")
            }, setRespAccordion(), a(), c.off("resize.responsive_accordion", a).on("resize.responsive_accordion", a))
        }, c.constructors.Global = e
    }(c, jQuery),
    function(c, d) {
        var e = function() {
            var a = this;
            c.methods.invokeContainer(a, "header"), a.initiate()
        };
        e.prototype.initiate = function() {
            var a = this;
            a.$element.length && (a.elements.$html = d("html"), a.elements.$header = a.$element.find(".l-header"), a.elements.$header_height = 152, a.elements.$main_nav = a.$element.find(".l-header-nav-main"), a.elements.$navigation_data_ref = a.$element.find(".l-header-nav-main li > a[data-ref]"), a.elements.$navigation_drop_down = a.$element.find(".l-header-dropdown"), a.elements.$footer_link_groups = d(".l-footer-links--group"), a.elements.$search_form = d(".m-search-form"), a.elements.$search_link = a.$element.find(".l-header-search-link"), a.elements.$account_menu = a.$element.find(".l-header-account-menu"), a.elements.$account_link = a.$element.find(".l-header-account-link"), a.elements.$basket = a.$element.find(".l-header-basket"), a.elements.$basket_link = a.$element.find(".l-header-basket-link"), a.elements.$basket_slider = d(".m-basket-slider"), a.elements.$nav_slider_link = a.$element.find(".m-nav-slider-link"), a.elements.$nav_slider = d(".m-nav-slider"), a.elements.$site_overlay = d(".l-site-overlay"), a.setThemeMainMargin(), a.attachHeadroom(), a.hideShowAccount(), a.hideShowSearch(), a.setNavSlide(), a.hideShowNavSlide(), a.setBasketSlide(), a.hideShowBasketSlide(), a.attachMegaMenu())
        }, e.prototype.setThemeMainMargin = function() {
            function b() {
                var a = d(".l-main"),
                    b = c.$element.height();
                c.$element.height(), c.elements.$header_height, a.css("margin-top", b + "px")
            }
            var c = this;
            c.$element.length && (b(), d(a).off("resize.theme_main_resize", b).on("resize.theme_main_resize", b))
        }, e.prototype.attachHeadroom = function() {
            var a = this;
            if (a.$element.length) {
                var c = b.querySelector("header"),
                    d = new Headroom(c, {
                        tolerance: 0,
                        offset: 0,
                        classes: {
                            initial: "animated"
                        },
                        onTop: function() {
                            setTimeout(function() {
                                a.setThemeMainMargin()
                            }, 400)
                        }
                    });
                d.init(), d.destroy()
            }
        }, e.prototype.hideShowAccount = function() {
            var a = this;
            a.elements.$account_link.on("click", function(b) {
                a.elements.$search_form.removeClass("is-active bounceInRight"), a.elements.$account_menu.toggleClass("is-active tdFadeInUp"), a.elements.$account_link.toggleClass("is-active"), b.preventDefault(), b.stopPropagation()
            }), d(b).on("click", function(b) {
                a.elements.$account_menu.hasClass("is-active tdFadeInUp") && 0 == d(b.target).closest(a.elements.$account_menu).length && (a.elements.$account_menu.removeClass("is-active tdFadeInUp"), a.elements.$account_link.removeClass("is-active"))
            })
        }, e.prototype.hideShowSearch = function() {
            var a = this;
            a.elements.$search_link.on("click", function(b) {
                a.elements.$site_overlay.addClass("is-active slider-left"), a.elements.$search_form.toggleClass("is-active"), a.elements.$search_link.toggleClass("is-active"), a.elements.$search_form.find('input[name="q"]').focus(), b.preventDefault(), b.stopPropagation()
            }), d(b).on("click", function(b) {
                a.elements.$search_form.hasClass("is-active") && 0 == d(b.target).closest(a.elements.$search_form).length && (a.elements.$search_form.removeClass("is-active"), a.elements.$search_link.removeClass("is-active"), a.fadeSiteOverlay())
            })
        }, e.prototype.setNavSlide = function() {
            var a = this;
            ! function(b) {
                var c = "",
                    e = "";
                a.elements.$footer_link_groups.each(function() {
                    d(this).hasClass("l-footer-links--group--nopushy") || (c += d(this).html())
                }), e += "<ul><li>" + c + "</li></ul>", b.append(e)
            }(a.elements.$nav_slider)
        }, e.prototype.hideShowNavSlide = function() {
            var a = this;
            a.elements.$nav_slider_link.on("click", function(b) {
                d(this).addClass("is-active"), a.elements.$nav_slider.addClass("is-active"), a.elements.$site_overlay.addClass("is-active slider-left"), a.elements.$html.css("overflow", "hidden"), b.preventDefault(), b.stopPropagation()
            }), d(b).on("click", function(b) {
                a.elements.$nav_slider.hasClass("is-active") && 0 == d(b.target).closest(a.elements.$nav_slider).length && (a.elements.$nav_slider.animate({
                    left: "-" + a.elements.$nav_slider.width() + "px"
                }, 200, function() {
                    a.elements.$nav_slider.removeClass("is-active"), a.elements.$nav_slider.removeAttr("style"), a.elements.$nav_slider_link.removeClass("is-active"), a.elements.$html.removeAttr("style")
                }), a.fadeSiteOverlay())
            })
        }, e.prototype.setBasketSlide = function() {
            var a = this;
            ! function(a) {
                var b = "";
                b += "<ul><li>", b += '<div class="m-slider-basket--empty"><h3>Shopping Bag</h3><div><p>Your shopping bag is currently empty.</p></div></div>', b += '<div class="m-slider-basket--totals"><ul><li>Subtotal</li><li>&pound;0.00</li><li>Shipping</li><li>&pound;0.00</li></ul></div>', b += '<div class="m-slider-basket--actions"><a class="btn-primary" href="">Checkout</a><a class="btn-outline-white" href="">Shopping Bag</a></div>', b += "</li></ul>", a.append(b)
            }(a.elements.$basket_slider)
        }, e.prototype.hideShowBasketSlide = function() {
            var a = this;
            a.elements.$basket_link.on("click", function(b) {
                a.elements.$basket_slider.addClass("is-active"), a.elements.$site_overlay.addClass("is-active slider-right"), a.elements.$html.css("overflow", "hidden"), b.preventDefault(), b.stopPropagation()
            }), d(b).on("click", function(b) {
                a.elements.$basket_slider.hasClass("is-active") && 0 == d(b.target).closest(a.elements.$basket_slider).length && (a.elements.$basket_slider.animate({
                    right: "-" + a.elements.$basket_slider.width() + "px"
                }, 200, function() {
                    a.elements.$basket_slider.removeAttr("style"), a.elements.$basket_slider.removeClass("is-active"), a.elements.$html.removeAttr("style")
                }), a.fadeSiteOverlay())
            })
        }, e.prototype.fadeSiteOverlay = function() {
            var a = this;
            a.elements.$site_overlay.fadeOut(200, function() {
                a.elements.$site_overlay.removeAttr("style"), a.elements.$site_overlay.removeClass("is-active slider-left slider-right")
            })
        }, e.prototype.attachMegaMenu = function() {
            var a = this;
            ! function(a, b) {
                var c = !1,
                    e = !1,
                    f = !1,
                    g = !1;
                a.click(function(a) {
                    return e == this || (e = this, a.preventDefault(), !1)
                }).mouseleave(function(a) {
                    e = !1
                }), b.mouseleave(function() {
                    c = !1, g = setTimeout(function() {
                        a.each(function() {
                            d(this).parent().removeClass("hover")
                        }), b.addClass("hide"), e = !1, f = !1
                    }, 50)
                }).mouseenter(function() {
                    c = !0, !1 !== g && (clearTimeout(g), g = !1)
                }), a.hoverIntent({
                    over: function() {
                        var e = d(this);
                        if (a.each(function() {
                                d(this).parent().removeClass("hover")
                            }), e.parent().addClass("hover"), !c) {
                            var h = b.find('>.l-header-dropdown-links[data-ref="' + e.attr("data-ref") + '"]');
                            h.length && (b.find(">.l-header-dropdown-links").addClass("hide"), h.removeClass("hide"), b.removeClass("hide"), f = this, !1 !== g && (clearTimeout(g), g = !1))
                        }
                    },
                    timeout: 50,
                    out: function() {
                        var a = d(this);
                        c || (a.parent().removeClass("hover"), f == this && (b.addClass("hide"), e = !1, f = !1))
                    }
                })
            }(a.elements.$navigation_data_ref, a.elements.$navigation_drop_down)
        }, c.constructors.Header = e
    }(c, jQuery),
    function(a, b) {
        var c = function() {
            var b = this;
            a.methods.invokeContainer(b, "home"), b.initiate()
        };
        c.prototype.initiate = function() {
            var a = this;
            a.$element.length && a.attachFeaturedSlider()
        }, c.prototype.attachFeaturedSlider = function() {
            b(".m-featured").owlCarousel({
                items: 1,
                loop: !0,
                nav: !0,
                navText: ['<svg class="svg-icon-arrow-left"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-arrow-left"></use></svg>', '<svg class="svg-icon-arrow-right"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-icon-arrow-right"></use></svg>'],
                dots: !1,
                margin: 0,
                autoplay: !0,
                autoplayTimeout: 6e3,
                autoplayHoverPause: !0
            })
        }, a.constructors.Home = c
    }(c, jQuery),
    function(a, b) {
        var c = function() {
            var b = this;
            a.methods.invokeContainer(b, "product"), b.initiate()
        };
        c.prototype.initiate = function() {
            var a = this;
            a.attachProductTabs(), a.attachProductSlider()
        }, c.prototype.attachProductTabs = function() {
            var a = b("#product-tabs");
            a.length && (a.responsiveTabs({
                active: 0,
                startCollapsed: !1,
                scrollToAccordion: !0,
                classes: {
                    stateDefault: "r-tabs-state-default",
                    stateActive: "r-tabs-state-active",
                    stateDisabled: "r-tabs-state-disabled",
                    stateExcluded: "r-tabs-state-excluded",
                    container: "r-tabs",
                    ul: "r-tabs-nav",
                    tab: "r-tabs-tab",
                    anchor: "r-tabs-anchor no-scroll",
                    panel: "r-tabs-panel",
                    accordionTitle: "r-tabs-accordion-title"
                }
            }), b(".tablink").on("click", function(a) {
                a.preventDefault();
                var c = b(this).data("tablink"),
                    d = b(".m-tab-link-" + c);
                return d.length && (d.trigger("click"), b("html, body").animate({
                    scrollTop: b("#product-" + c).offset().top - 200
                }, 500)), !1
            }))
        }, c.prototype.attachProductSlider = function() {
            function a() {
                setTimeout(function() {
                    var a = b(".js-carousel-1 .owl-item.active").index();
                    b(".js-carousel-2 .owl-item").removeClass("current");
                    var c = b(".js-carousel-2 .owl-item:nth-child(" + (a + 1) + ")");
                    c.addClass("current"), c.hasClass("active") || (c.prevAll(".active").length > 0 && d.trigger("next.owl.carousel"), c.nextAll(".active").length && d.trigger("prev.owl.carousel"))
                }, 100)
            }
            var c = b(".js-carousel-1").owlCarousel({
                    items: 1
                }),
                d = b(".js-carousel-2").owlCarousel({
                    items: 3,
                    margin: 10
                });
            a(), c.on("changed.owl.carousel", function() {
                a()
            }), d.on("changed.owl.carousel", function(b) {
                a()
            }), d.find(".item").click(function() {
                var d = b(this).parent().index();
                c.trigger("to.owl.carousel", d), a()
            }), b(".image-zoom").wrap('<span style="display:inline-block"></span>').css("display", "block").parent().zoom({
                url: b(this).find("img").attr("data-zoom")
            })
        }, a.constructors.Product = c
    }(c, jQuery),
    function(a) {
        a.instances.global = new a.constructors.Global, a.instances.header = new a.constructors.Header, a.instances.home = new a.constructors.Home, a.instances.cat = new a.constructors.Cat, a.instances.product = new a.constructors.Product, a.instances.basket = new a.constructors.Basket, a.instances.checkout = new a.constructors.Checkout, a.instances.contact = new a.constructors.Contact
    }(c)
}(window, document);