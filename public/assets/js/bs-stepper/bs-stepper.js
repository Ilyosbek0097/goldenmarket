/*! For license information please see bs-stepper.js.LICENSE.txt */
!function (e, t) {
    if ("object" == typeof exports && "object" == typeof module) module.exports = t(); else if ("function" == typeof define && define.amd) define([], t); else {
        var n = t();
        for (var s in n) ("object" == typeof exports ? exports : e)[s] = n[s]
    }
}(self, (function () {
    return function () {
        var e = {
            7082: function (e) {
                e.exports = function () {
                    "use strict";

                    function e() {
                        return e = Object.assign || function (e) {
                            for (var t = 1; t < arguments.length; t++) {
                                var n = arguments[t];
                                for (var s in n) Object.prototype.hasOwnProperty.call(n, s) && (e[s] = n[s])
                            }
                            return e
                        }, e.apply(this, arguments)
                    }

                    var t = window.Element.prototype.matches, n = function (e, t) {
                        return e.closest(t)
                    }, s = function (e, t) {
                        return new window.Event(e, t)
                    }, i = function (e, t) {
                        return new window.CustomEvent(e, t)
                    };
                    !function () {
                        if (window.Element.prototype.matches || (t = window.Element.prototype.msMatchesSelector || window.Element.prototype.webkitMatchesSelector), window.Element.prototype.closest || (n = function (e, n) {
                            if (!document.documentElement.contains(e)) return null;
                            do {
                                if (t.call(e, n)) return e;
                                e = e.parentElement || e.parentNode
                            } while (null !== e && 1 === e.nodeType);
                            return null
                        }), window.Event && "function" == typeof window.Event || (s = function (e, t) {
                            t = t || {};
                            var n = document.createEvent("Event");
                            return n.initEvent(e, Boolean(t.bubbles), Boolean(t.cancelable)), n
                        }), "function" != typeof window.CustomEvent) {
                            var e = window.Event.prototype.preventDefault;
                            i = function (t, n) {
                                var s = document.createEvent("CustomEvent");
                                return n = n || {
                                    bubbles: !1,
                                    cancelable: !1,
                                    detail: null
                                }, s.initCustomEvent(t, n.bubbles, n.cancelable, n.detail), s.preventDefault = function () {
                                    this.cancelable && (e.call(this), Object.defineProperty(this, "defaultPrevented", {
                                        get: function () {
                                            return !0
                                        }
                                    }))
                                }, s
                            }
                        }
                    }();
                    var r = "active", o = "linear", c = "dstepper-block", a = "dstepper-none", l = "fade",
                        u = "vertical", p = "transitionend", d = "bsStepper", f = function (e, t, n, s) {
                            var o = e[d];
                            if (!o._steps[t].classList.contains(r) && !o._stepsContents[t].classList.contains(r)) {
                                var a = i("show.bs-stepper", {
                                    cancelable: !0,
                                    detail: {from: o._currentIndex, to: t, indexStep: t}
                                });
                                e.dispatchEvent(a);
                                var l = o._steps.filter((function (e) {
                                    return e.classList.contains(r)
                                })), p = o._stepsContents.filter((function (e) {
                                    return e.classList.contains(r)
                                }));
                                a.defaultPrevented || (l.length && l[0].classList.remove(r), p.length && (p[0].classList.remove(r), e.classList.contains(u) || o.options.animation || p[0].classList.remove(c)), v(e, o._steps[t], o._steps, n), h(e, o._stepsContents[t], o._stepsContents, p, s))
                            }
                        }, v = function (e, t, n, s) {
                            n.forEach((function (t) {
                                var n = t.querySelector(s.selectors.trigger);
                                n.setAttribute("aria-selected", "false"), e.classList.contains(o) && n.setAttribute("disabled", "disabled")
                            })), t.classList.add(r);
                            var i = t.querySelector(s.selectors.trigger);
                            i.setAttribute("aria-selected", "true"), e.classList.contains(o) && i.removeAttribute("disabled")
                        }, h = function (e, t, n, s, o) {
                            var u = e[d], f = n.indexOf(t), v = i("shown.bs-stepper", {
                                cancelable: !0,
                                detail: {from: u._currentIndex, to: f, indexStep: f}
                            });
                            if (t.classList.contains(l)) {
                                t.classList.remove(a);
                                var h = _(t);
                                t.addEventListener(p, (function n() {
                                    t.classList.add(c), t.removeEventListener(p, n), e.dispatchEvent(v), o()
                                })), s.length && s[0].classList.add(a), t.classList.add(r), m(t, h)
                            } else t.classList.add(r), t.classList.add(c), e.dispatchEvent(v), o()
                        }, _ = function (e) {
                            if (!e) return 0;
                            var t = window.getComputedStyle(e).transitionDuration;
                            return parseFloat(t) ? (t = t.split(",")[0], 1e3 * parseFloat(t)) : 0
                        }, m = function (e, t) {
                            var n = !1, i = t + 5;

                            function r() {
                                n = !0, e.removeEventListener(p, r)
                            }

                            e.addEventListener(p, r), window.setTimeout((function () {
                                n || e.dispatchEvent(s(p)), e.removeEventListener(p, r)
                            }), i)
                        }, L = {
                            linear: !0,
                            animation: !1,
                            selectors: {steps: ".step", trigger: ".step-trigger", stepper: ".bs-stepper"}
                        };
                    return function () {
                        function t(t, n) {
                            var s, i = this;
                            void 0 === n && (n = {}), this._element = t, this._currentIndex = 0, this._stepsContents = [], this.options = e({}, L, {}, n), this.options.selectors = e({}, L.selectors, {}, this.options.selectors), this.options.linear && this._element.classList.add(o), this._steps = [].slice.call(this._element.querySelectorAll(this.options.selectors.steps)), this._steps.filter((function (e) {
                                return e.hasAttribute("data-target")
                            })).forEach((function (e) {
                                i._stepsContents.push(i._element.querySelector(e.getAttribute("data-target")))
                            })), s = this._stepsContents, this.options.animation && s.forEach((function (e) {
                                e.classList.add(l), e.classList.add(a)
                            })), this._setLinkListeners(), Object.defineProperty(this._element, d, {
                                value: this,
                                writable: !0
                            }), this._steps.length && f(this._element, this._currentIndex, this.options, (function () {
                            }))
                        }

                        var s = t.prototype;
                        return s._setLinkListeners = function () {
                            var e = this;
                            this._steps.forEach((function (t) {
                                var s, i = t.querySelector(e.options.selectors.trigger);
                                e.options.linear ? (e._clickStepLinearListener = (e.options, function (e) {
                                    e.preventDefault()
                                }), i.addEventListener("click", e._clickStepLinearListener)) : (e._clickStepNonLinearListener = (s = e.options, function (e) {
                                    e.preventDefault();
                                    var t = n(e.target, s.selectors.steps), i = n(t, s.selectors.stepper), r = i[d],
                                        o = r._steps.indexOf(t);
                                    f(i, o, s, (function () {
                                        r._currentIndex = o
                                    }))
                                }), i.addEventListener("click", e._clickStepNonLinearListener))
                            }))
                        }, s.next = function () {
                            var e = this,
                                t = this._currentIndex + 1 <= this._steps.length - 1 ? this._currentIndex + 1 : this._steps.length - 1;
                            f(this._element, t, this.options, (function () {
                                e._currentIndex = t
                            }))
                        }, s.previous = function () {
                            var e = this, t = this._currentIndex - 1 >= 0 ? this._currentIndex - 1 : 0;
                            f(this._element, t, this.options, (function () {
                                e._currentIndex = t
                            }))
                        }, s.to = function (e) {
                            var t = this, n = e - 1, s = n >= 0 && n < this._steps.length ? n : 0;
                            f(this._element, s, this.options, (function () {
                                t._currentIndex = s
                            }))
                        }, s.reset = function () {
                            var e = this;
                            f(this._element, 0, this.options, (function () {
                                e._currentIndex = 0
                            }))
                        }, s.destroy = function () {
                            var e = this;
                            this._steps.forEach((function (t) {
                                var n = t.querySelector(e.options.selectors.trigger);
                                e.options.linear ? n.removeEventListener("click", e._clickStepLinearListener) : n.removeEventListener("click", e._clickStepNonLinearListener)
                            })), this._element[d] = void 0, this._element = void 0, this._currentIndex = void 0, this._steps = void 0, this._stepsContents = void 0, this._clickStepLinearListener = void 0, this._clickStepNonLinearListener = void 0
                        }, t
                    }()
                }()
            }
        }, t = {};

        function n(s) {
            var i = t[s];
            if (void 0 !== i) return i.exports;
            var r = t[s] = {exports: {}};
            return e[s].call(r.exports, r, r.exports, n), r.exports
        }

        n.n = function (e) {
            var t = e && e.__esModule ? function () {
                return e.default
            } : function () {
                return e
            };
            return n.d(t, {a: t}), t
        }, n.d = function (e, t) {
            for (var s in t) n.o(t, s) && !n.o(e, s) && Object.defineProperty(e, s, {enumerable: !0, get: t[s]})
        }, n.o = function (e, t) {
            return Object.prototype.hasOwnProperty.call(e, t)
        }, n.r = function (e) {
            "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {value: "Module"}), Object.defineProperty(e, "__esModule", {value: !0})
        };
        var s = {};
        return function () {
            "use strict";
            n.r(s), n.d(s, {
                Stepper: function () {
                    return t.a
                }
            });
            var e = n(7082), t = n.n(e);
            document.querySelectorAll(".bs-stepper").forEach((function (e) {
                e.addEventListener("show.bs-stepper", (function (t) {
                    for (var n = t.detail.indexStep, s = e.querySelectorAll(".line").length, i = e.querySelectorAll(".step"), r = 0; r < n; r++) {
                        i[r].classList.add("crossed");
                        for (var o = n; o < s; o++) i[o].classList.remove("crossed")
                    }
                    if (0 == t.detail.to) {
                        for (var c = n; c < s; c++) i[c].classList.remove("crossed");
                        i[0].classList.remove("crossed")
                    }
                }))
            }));
            try {
                window.Stepper = t()
            } catch (e) {
            }
        }(), s
    }()
}));
