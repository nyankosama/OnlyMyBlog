(function ()
{
    if (typeof __noDomainCheck__ == "undefined" || !__noDomainCheck__)
    {
        try {
            top != self && location.host != "www.diandian.com" && top.location.toString() 
        }
        catch (a) {
            top.location = "http://www.diandian.com";
        }
    }
})(), function (a, b)
{
    var c = this, d = 
    {
        mix : function (a, c, d, f, g)
        {
            if (!c || !a) {
                return a;
            }
            d === b && (d = !0);
            var h, i, j;
            if (f && (j = f.length)) {
                for (h = 0; h < j; h++) {
                    i = f[h], i in c && e(i, a, c, d, g);
                }
            }
            else {
                for (i in c) {
                    e(i, a, c, d, g);
                }
            }
            return a;
        }
    },
    e = function (c, d, e, f, g)
    {
        if (f || !(c in d))
        {
            var h = d[c], i = e[c];
            if (h === i) {
                return;
            }
            if (g && i && (a.isArray(i) || a.isPlainObject(i)))
            {
                var j = h && (a.isArray(h) || a.isPlainObject(h)) ? h : a.isArray(i) ? [] : {};
                d[c] = a.mix(j, i, f, b, !0)
            }
            else {
                i !== b && (d[c] = e[c]);
            }
        }
    },
    f = c && c[a] || {}, g = 0, h = "";
    return c = f.__HOST || (f.__HOST = c || {}), a = c[a] = d.mix(f, d), a.mix(a, 
    {
        __APP_MEMBERS : ["namespace"], __APP_INIT_METHODS : ["__init"], version : "1.20", buildTime : "20120703155558", 
        merge : function ()
        {
            var b = {}, c, d = arguments.length;
            for (c = 0; c < d; c++) {
                a.mix(b, arguments[c]);
            }
            return b;
        },
        augment : function ()
        {
            var c = a.makeArray(arguments), d = c.length - 2, e = c[0], f = c[d], g = c[d + 1], h = 1;
            a.isArray(g) || (f = g, g = b, d++), a.isBoolean(f) || (f = b, d++);
            for (; h < d; h++) {
                a.mix(e.prototype, c[h].prototype || c[h], f, g);
            }
            return e;
        },
        extend : function (b, c, d, e)
        {
            if (!c || !b) {
                return b;
            }
            var f = Object.create ? function (a, b)
            {
                return Object.create(a, 
                {
                    constructor : {
                        value : b
                    }
                })
            }
             : function (a, b)
            {
                function c() {}
                c.prototype = a;
                var d = new c;
                return d.constructor = b, d;
            },
            g = c.prototype, h;
            return h = f(g, b), b.prototype = a.mix(h, b.prototype), b.superclass = f(g, c), d && a.mix(h, 
            d), e && a.mix(b, e), b;
        },
        __init : function ()
        {
            this.Config = this.Config || {}, this.Env = this.Env || {}, this.Config.debug = "@DEBUG@";
        },
        namespace : function ()
        {
            var b = a.makeArray(arguments), d = b.length, e = null, f, g, i, j = b[d - 1] === !0 && d--;
            for (f = 0; f < d; f++)
            {
                i = (h + b[f]).split("."), e = j ? c : this;
                for (g = c[i[0]] === e ? 1 : 0; g < i.length; ++g) e = e[i[g]] = e[i[g]] || {}
            }
            return e;
        },
        app : function (b, d)
        {
            var e = a.isString(b), f = e ? c[b] || {} : b, g = 0, h = a.__APP_INIT_METHODS.length;
            a.mix(f, this, !0, a.__APP_MEMBERS);
            for (; g < h; g++) {
                a[a.__APP_INIT_METHODS[g]].call(f);
            }
            return a.mix(f, a.isFunction(d) ? d() : d), e && (c[b] = f), f;
        },
        config : function (a)
        {
            for (var b in a) {
                this ["_" + b] && this ["_" + b](a[b]);
            }
        },
        log : function (d, e, f)
        {
            a.Config.debug && (f && (d = f + ": " + d), c.console !== b && console.log && console[e && console[e] ? e : "log"](d));
        },
        error : function (b)
        {
            if (a.Config.debug) {
                throw b;
            }
        },
        guid : function (a)
        {
            return (a || h) + g++;
        }
    }), a.__init(), a
}
("KISSY", undefined), function (a, b)
{
    function G()
    {
        if (D) {
            return D;
        }
        var b = q;
        return a.each(B, function (a)
        {
            b += a + "|"
        }), b = b.slice(0, - 1), D = new RegExp(b, "g")
    }
    function H()
    {
        if (E) {
            return E;
        }
        var b = q;
        return a.each(C, function (a)
        {
            b += a + "|"
        }), b += "&#(\\d{1,5});", E = new RegExp(b, "g")
    }
    function I(a)
    {
        var b = typeof a;
        return J(a) || b !== "object" && b !== "function"
    }
    function J(b)
    {
        return a.isNull(b) || a.isUndefined(b)
    }
    function K(b, c, d)
    {
        var f = b, g, h, i, j;
        if (!b) {
            return f;
        }
        if (b[s]) {
            return d[b[s]].destination;
        }
        if (typeof b == "object")
        {
            var k = b.constructor;
            if (a.inArray(k, [Boolean, String, Number, Date, RegExp])) {
                f = new k(b.valueOf());
            }
            else if (g = a.isArray(b)) {
                f = c ? a.filter(b, c) : b.concat();
            }
            else if (h = a.isPlainObject(b)) {
                f = {};
            }
            b[s] = j = a.guid(), d[j] = {
                destination : f, input : b
            }
        }
        if (g) {
            for (var l = 0; l < f.length; l++) {
                f[l] = K(f[l], c, d);
            }
        }
        else if (h)
        {
            for (i in b) {
                i !== s && b.hasOwnProperty(i) && (!c || c.call(b, b[i], i, b) !== e) && (f[i] = K(b[i], 
                c, d));
            }
        }
        return f
    }
    function L(c, e, f, g)
    {
        if (c[t] === e && e[t] === c) {
            return d;
        }
        c[t] = e, e[t] = c;
        var h = function (a, c)
        {
            return a !== null && a !== b && a[c] !== b;
        };
        for (var i in e) {
            !h(c, i) && h(e, i) && f.push("expected has key '" + i + "', but missing from actual.");
        }
        for (i in c) {
            !h(e, i) && h(c, i) && f.push("expected missing key '" + i + "', but present in actual.");
        }
        for (i in e)
        {
            if (i == t) {
                continue;
            }
            a.equals(c[i], e[i], f, g) || g.push("'" + i + "' was '" + (e[i] ? e[i].toString() : e[i]) + "' in expected, but was '" + (c[i] ? c[i].toString() : c[i]) + "' in actual.")
        }
        return a.isArray(c) && a.isArray(e) && c.length != e.length && g.push("arrays were not the same length"), 
        delete c[t], delete e[t], f.length === 0 && g.length === 0
    }
    var c = a.__HOST, d = !0, e = !1, f = Object.prototype, g = f.toString, h = f.hasOwnProperty, i = Array.prototype, 
    j = i.indexOf, k = i.lastIndexOf, l = i.filter, m = i.every, n = i.some, o = String.prototype.trim, 
    p = i.map, q = "", r = 16, s = "__~ks_cloned", t = "__~ks_compared", u = "__~ks_stamped", v = /^[\s\xa0]+|[\s\xa0]+$/g, 
    w = encodeURIComponent, x = decodeURIComponent, y = "&", z = "=", A = {}, B = 
    {
        "&amp;" : "&", "&gt;" : ">", "&lt;" : "<", "&#x60;" : "`", "&#x2F;" : "/", "&quot;" : '"', "&#x27;" : "'"
    },
    C = {}, D, E, F = /[\-#$\^*()+\[\]{}|\\,.?\s]/g;
    (function ()
    {
        for (var a in B) {
            C[B[a]] = a;
        }
    })(), a.mix(a, 
    {
        stamp : function (c, d, e)
        {
            if (!c) {
                return c;
            }
            e = e || u;
            var f = c[e];
            if (f) {
                return f;
            }
            if (!d) {
                try {
                    f = c[e] = a.guid(e) 
                }
                catch (g) {
                    f = b ;
                }
            }
            return f;
        },
        noop : function () {},
        type : function (a)
        {
            return J(a) ? String(a) : A[g.call(a)] || "object";
        },
        isNullOrUndefined : J,
        isNull : function (a)
        {
            return a === null;
        },
        isUndefined : function (a)
        {
            return a === b;
        },
        isEmptyObject : function (a)
        {
            for (var c in a) {
                if (c !== b) {
                    return e;
                }
                return d;
            }
        },
        isPlainObject : function (a)
        {
            return a && g.call(a) === "[object Object]" && "isPrototypeOf"in a;
        },
        equals : function (c, e, f, g)
        {
            return f = f || [], g = g || [], c === e ? d : c === b || c === null || e === b || e === null ? J(c) && J(e) : c instanceof Date && e instanceof Date ? c.getTime() == e.getTime() : a.isString(c) && a.isString(e) ? c == e : a.isNumber(c) && a.isNumber(e) ? c == e : typeof c == "object" && typeof e == "object" ? L(c, 
            e, f, g) : c === e;
        },
        clone : function (c, d)
        {
            var e = {}, f = K(c, d, e);
            return a.each(e, function (c)
            {
                c = c.input;
                if (c[s]) {
                    try {
                        delete c[s] 
                    }
                    catch (d) {
                        a.log("delete CLONE_MARKER error : "), c[s] = b;
                    }
                }
            }), e = b, f;
        },
        trim : o ? function (a)
        {
            return J(a) ? q : o.call(a)
        }
         : function (a)
        {
            return J(a) ? q : a.toString().replace(v, q);
        },
        substitute : function (c, d, e)
        {
            return!a.isString(c) || !a.isPlainObject(d) ? c : c.replace(e ||/\\?\{([^{}]+)\}/g, function (a, 
            c) {
                return a.charAt(0) === "\\" ? a.slice(1) : d[c] === b ? q : d[c];
            })
        },
        format : function (a, b)
        {
            a = String(a);
            if ("undefined" != typeof b)
            {
                if ("[object Object]" == Object.prototype.toString.call(b))
                {
                    return a.replace(/\{(.+?)\}/g, function (a, c) 
                    {
                        var d = b[c];
                        return "function" == typeof d && (d = d(c)), "undefined" == typeof d ? "" : d;
                    });
                }
                var c = Array.prototype.slice.call(arguments, 1), d = c.length;
                return a.replace(/\{(\d+)\}/g, function (a, b)
                {
                    return b = parseInt(b, 10), b >= d ? a : c[b];
                })
            }
            return a;
        },
        each : function (d, f, g)
        {
            if (d)
            {
                var h, i, j = 0, k = d && d.length, l = k === b || a.type(d) === "function";
                g = g || c;
                if (l) {
                    for (h in d) {
                        if (f.call(g, d[h], h, d) === e) {
                            break;
                        }
                    }
                }
                else {
                    for (i = d[0]; j < k && f.call(g, i, j, d) !== e; i = d[++j]); }
            }
            return d;
        },
        indexOf : j ? function (a, b)
        {
            return j.call(b, a)
        }
         : function (a, b)
        {
            for (var c = 0, d = b.length; c < d; ++c) {
                if (b[c] === a) {
                    return c;
                }
                return - 1;
            }
        },
        lastIndexOf : k ? function (a, b)
        {
            return k.call(b, a)
        }
         : function (a, b)
        {
            for (var c = b.length - 1; c >= 0; c--) {
                if (b[c] === a) {
                    break;
                }
                return c;
            }
        },
        unique : function (b, c)
        {
            var d = b.slice();
            c && d.reverse();
            var e = 0, f, g;
            while (e < d.length) {
                g = d[e];
                while ((f = a.lastIndexOf(g, d)) !== e) {
                    d.splice(f, 1);
                }
                e += 1
            }
            return c && d.reverse(), d;
        },
        inArray : function (b, c)
        {
            return a.indexOf(b, c) > -1;
        },
        filter : l ? function (a, b, c)
        {
            return l.call(a, b, c || this)
        }
         : function (b, c, d)
        {
            var e = [];
            return a.each(b, function (a, b, f)
            {
                c.call(d || this, a, b, f) && e.push(a)
            }), e
        },
        map : p ? function (a, b, c)
        {
            return p.call(a, b, c || this)
        }
         : function (b, c, d)
        {
            var e = b.length, f = new Array(e);
            for (var g = 0; g < e; g++) {
                var h = a.isString(b) ? b.charAt(g) : b[g];
                if (h || g in b) {
                    f[g] = c.call(d || this, h, g, b);
                }
            }
            return f;
        },
        reduce : function (a, c, e)
        {
            var f = a.length;
            if (typeof c != "function")
            {
                throw new TypeError("callback is not function!");
            }
            if (f === 0 && arguments.length == 2) {
                throw new TypeError("arguments invalid");
            }
            var g = 0, h;
            if (arguments.length >= 3) {
                h = arguments[2];
            }
            else {
                do {
                    if (g in a) {
                        h = a[g++];
                        break 
                    }
                    g += 1;
                    if (g >= f) {
                        throw new TypeError ;
                    }
                }
                while (d);
            }
            while (g < f) {
                g in a && (h = c.call(b, h, a[g], g, a)), g++;
            }
            return h;
        },
        every : m ? function (a, b, c)
        {
            return m.call(a, b, c || this)
        }
         : function (a, b, c)
        {
            var f = a && a.length || 0;
            for (var g = 0; g < f; g++) {
                if (g in a && !b.call(c, a[g], g, a)) {
                    return e;
                }
                return d;
            }
        },
        some : n ? function (a, b, c)
        {
            return n.call(a, b, c || this)
        }
         : function (a, b, c)
        {
            var f = a && a.length || 0;
            for (var g = 0; g < f; g++) {
                if (g in a && b.call(c, a[g], g, a)) {
                    return d;
                }
                return e;
            }
        },
        bind : function (a, b)
        {
            var c = [].slice, d = c.call(arguments, 2), e = function () {}, f = function ()
            {
                return a.apply(this instanceof e ? this : b, d.concat(c.call(arguments)));
            };
            return e.prototype = a.prototype, f.prototype = new e, f;
        },
        now : Date.now || function ()
        {
            return + (new Date);
        },
        fromUnicode : function (a)
        {
            return a.replace(/\\u([a-f\d]{4})/ig, function (a, b)
            {
                return String.fromCharCode(parseInt(b, r));
            })
        },
        escapeHTML : function (a)
        {
            return a.replace(G(), function (a)
            {
                return C[a];
            })
        },
        escapeRegExp : function (a)
        {
            return a.replace(F, "\\$&");
        },
        unEscapeHTML : function (a)
        {
            return a.replace(H(), function (a, b)
            {
                return B[a] || String.fromCharCode(+b);
            })
        },
        makeArray : function (b)
        {
            if (J(b)) {
                return [];
            }
            if (a.isArray(b)) {
                return b;
            }
            if (typeof b.length != "number" || a.isString(b) || a.isFunction(b)) {
                return [b];
            }
            var c = [];
            for (var d = 0, e = b.length; d < e; d++) {
                c[d] = b[d];
            }
            return c;
        },
        param : function (b, c, e, f)
        {
            if (!a.isPlainObject(b)) {
                return q;
            }
            c = c || y, e = e || z, a.isUndefined(f) && (f = d);
            var g = [], h, i;
            for (h in b)
            {
                i = b[h], h = w(h);
                if (I(i)) {
                    g.push(h, e, w(i + q), c);
                }
                else if (a.isArray(i) && i.length) {
                    for (var j = 0, k = i.length; j < k; ++j) {
                        I(i[j]) && g.push(h, f ? w("[]") : q, e, w(i[j] + q), c);
                    }
                }
            }
            return g.pop(), g.join(q);
        },
        unparam : function (b, c, d)
        {
            if (typeof b != "string" || (b = a.trim(b)).length === 0) {
                return{};
            }
            c = c || y, d = d || z;
            var e = {}, f = b.split(c), g, i, j, k = 0, l = f.length;
            for (; k < l; ++k)
            {
                g = f[k].split(d), i = x(g[0]);
                try {
                    j = x(g[1] || q)
                }
                catch (m) {
                    a.log(m + "decodeURIComponent error : " + g[1], "error"), j = g[1] || q
                }
                a.endsWith(i, "[]") && (i = i.substring(0, i.length - 2)), h.call(e, i) ? a.isArray(e[i]) ? e[i].push(j) : e[i] = [e[i], 
                j] : e[i] = j
            }
            return e;
        },
        later : function (b, c, d, e, f)
        {
            c = c || 0;
            var g = b, h = a.makeArray(f), i, j;
            return a.isString(b) && (g = e[b]), g || a.error("method undefined"), i = function ()
            {
                g.apply(e, h)
            },
            j = d ? setInterval(i, c) : setTimeout(i, c), {
                id : j, interval : d,
                cancel : function ()
                {
                    this.interval ? clearInterval(j) : clearTimeout(j)
                }
            }
        },
        startsWith : function (a, b)
        {
            return a.lastIndexOf(b, 0) === 0;
        },
        endsWith : function (a, b)
        {
            var c = a.length - b.length;
            return c >= 0 && a.indexOf(b, c) == c;
        },
        throttle : function (b, c, d)
        {
            c = c || 150;
            if (c ===- 1) {
                return function () 
                {
                    b.apply(d || this, arguments) 
                };
            }
            var e = a.now();
            return function ()
            {
                var f = a.now();
                f - e > c && (e = f, b.apply(d || this, arguments));
            }
        },
        buffer : function (b, c, d)
        {
            function g()
            {
                g.stop(), f = a.later(b, c, e, d || this)
            }
            c = c || 150;
            if (c ===- 1) {
                return function () 
                {
                    b.apply(d || this, arguments) 
                };
            }
            var f = null;
            return g.stop = function ()
            {
                f && (f.cancel(), f = 0);
            },
            g
        }
    }), a.mix(a, 
    {
        isBoolean : I, isNumber : I, isString : I, isFunction : I, isArray : I, isDate : I, isRegExp : I, 
        isObject : I
    }), a.each("Boolean Number String Function Array Date RegExp Object".split(" "), function (b, c)
    {
        A["[object " + b + "]"] = c = b.toLowerCase(), a["is" + b] = function (b)
        {
            return a.type(b) == c;
        }
    })
}
(KISSY, undefined), function (a)
{
    if ("require"in this) {
        return;
    }
    a.__loader = {}, a.__loaderUtils = {}, a.__loaderData = {}
}
(KISSY), function (a, b)
{
    if ("require"in this) {
        return;
    }
    a.mix(b, {
        INIT : 0, LOADING : 1, LOADED : 2, ERROR : 3, ATTACHED : 4
    })
}
(KISSY, KISSY.__loaderData), function (a, b, c)
{
    if ("require"in this) {
        return;
    }
    var d = navigator.userAgent, e = document, f = {}, g = /\.(\$\d+)\.?/;
    a.mix(c, 
    {
        docHead : function ()
        {
            return e.getElementsByTagName("head")[0] || e.documentElement;
        },
        isWebKit :!!d.match(/AppleWebKit/), IE :!!d.match(/MSIE/),
        isCss : function (a)
        {
            return / \.css(?: \ ?| $) / i.test(a);
        },
        isLinkNode : function (a)
        {
            return a.nodeName.toLowerCase() == "link";
        },
        normalizePath : function (a)
        {
            var b = a.split("/"), c = [], d;
            for (var e = 0; e < b.length; e++) {
                d = b[e], d != "." && (d == ".." ? c.pop() : c.push(d));
            }
            return c.join("/");
        },
        normalDepModuleName : function j(b, c)
        {
            if (!c) {
                return c;
            }
            if (a.isArray(c)) {
                for (var d = 0; d < c.length; d++) {
                    c[d] = j(b, c[d]);
                }
                return c
            }
            if (h(c, "../") || h(c, "./")) {
                var e = "", f;
                return (f = b.lastIndexOf("/")) !=- 1 && (e = b.substring(0, f + 1)), i(e + c)
            }
            return c.indexOf("./") !=- 1 || c.indexOf("../") !=- 1 ? i(c) : c;
        },
        removePostfix : function (a)
        {
            return a.replace(/(-min)?\.js[^/] * $/i,"")},normalBasePath:function(c){return c=a.trim(c),c&&c.charAt(c.length-1)!="/"&&(c+="/"),!c.match(/^(http(s) ? ) | (file) : /i)&&!h(c,"/")&&(c=b.__pagePath+c),i(c)},absoluteFilePath:function(a){return a=c.normalBasePath(a),a.substring(0,a.length-1)},indexMapping:function(a){for(var b=0;b<a.length;b++)a[b].match(/\/$/)&&(a[b]+="index");return a},normalModuleName:function(b){if(a.isArray(b))return a.map(b,function(a){return c.normalModuleName(a)});var d;return(d=b.match(g))&&(d=d[1])&&(b=b.replace("."+d,""),f[b]=d),b},getModuleVersion:function(a){return f[a]||""}});var h=a.startsWith,i=c.normalizePath}(KISSY,KISSY.__loader,KISSY.__loaderUtils),function(a,b){function f(){d||(a.log("start css polling"),g())}function g(){for(var f in e){var h=e[f],i=h.node,j=0;if(b.isWebKit)i.sheet&&(a.log("webkit loaded : "+f),j=1);else if(i.sheet)try{var k;if(k=i.sheet.cssRules)a.log("firefox "+k+" loaded : "+f),j=1}catch(l){l.code===1e3&&(a.log("firefox "+l.name+" loaded : "+f),j=1)}if(j){for(var m=0;m<h.length;m++)h[m].call(i);delete e[f]}}a.isEmptyObject(e)?(d=0,a.log("end css polling")):d=setTimeout(g,c)}if("require"in this)return;var c=30,d=0,e={};a.mix(b,{scriptOnload:document.addEventListener?function(a,c){if(b.isLinkNode(a))return b.styleOnload(a,c);a.addEventListener("load",c,!1)}:function(a,c){if(b.isLinkNode(a))return b.styleOnload(a,c);var d=a.onreadystatechange;a.onreadystatechange=function(){var b=a.readyState;/loaded|complete/i.test(b)&&(a.onreadystatechange=null,d&&d(),c.call(this))}},styleOnload:window.attachEvent?function(b,c){function d(){b.detachEvent("onload",d),a.log("ie / opera loaded : "+b.href),c.call(b)}b.attachEvent("onload",d)}:function(a,b){var c=a.href,d;d=e[c]=e[c]||[],d.node=a,d.push(b),f()}})}(KISSY,KISSY.__loaderUtils),function(a,b){if("require"in this)return;var c=1e3,d=b.scriptOnload;a.mix(a,{getStyle:function(c,d,e){var f=document,g=b.docHead(),h=f.createElement("link"),i=d;return a.isPlainObject(i)&&(d=i.success,e=i.charset),h.href=c,h.rel="stylesheet",e&&(h.charset=e),d&&b.scriptOnload(h,d),g.appendChild(h),h},getScript:function(e,f,g){function o(){n&&(n.cancel(),n=undefined)}if(b.isCss(e))return a.getStyle(e,f,g);var h=document,i=h.head||h.getElementsByTagName("head")[0],j=h.createElement("script"),k=f,l,m,n;a.isPlainObject(k)&&(f=k.success,l=k.error,m=k.timeout,g=k.charset),j.src=e,j.async=!0,g&&(j.charset=g);if(f||l)d(j,function(){o(),a.isFunction(f)&&f.call(j)}),a.isFunction(l)&&(h.addEventListener&&j.addEventListener("error",function(){o(),l.call(j)},!1),n=a.later(function(){n=undefined,l()},(m||this.Config.timeout)*c));return i.insertBefore(j,i.firstChild),j}})}(KISSY,KISSY.__loaderUtils),function(a,b,c,d){if("require"in this)return;var e=c.IE,f=d.ATTACHED,g=a.mix;g(b,{add:function(b,d,h){var i=this,j=i.Env.mods,k;a.isString(b)&&!h&&a.isPlainObject(d)&&(k={},k[b]=d,b=k);if(a.isPlainObject(b))return a.each(b,function(a,b){a.name=b,j[b]&&g(a,j[b],!1)}),g(j,b),i;if(a.isString(b)){var l;if(h&&(l=h.host)){var m=j[l];return m?(i.__isAttached(l)?d.call(i,i):(m.fns=m.fns||[],m.fns.push(d)),i):(a.log("module "+l+" can not be found !","error"),i)}i.__registerModule(b,d,h);if(h&&h.attach===!1)return i;var n=j[b],o=c.normalDepModuleName(b,n.requires);if(i.__isAttached(o))i.__attachMod(n);else if(this.Config.debug&&!n){var p,q;p=(q=a.makeArray(o)).length-1;for(;p>=0;p--){var r=q[p],s=j[r]||{};s.status!==f&&a.log(n.name+" not attached when added : depends "+r)}}return i}return a.isFunction(b)?(h=d,d=b,e?(b=i.__findModuleNameByInteractive(),a.log("old_ie get modname by interactive : "+b),i.__registerModule(b,d,h),i.__startLoadModuleName=null,i.__startLoadTime=0):i.__currentModule={def:d,config:h},i):(a.log("invalid format for KISSY.add !","error"),i)}})}(KISSY,KISSY.__loader,KISSY.__loaderUtils,KISSY.__loaderData),function(a,b,c,d){if("require"in this)return;a.mix(b,{__buildPath:function(a,b){function g(d,e){!a[d]&&a[e]&&(a[e]=c.normalDepModuleName(a.name,a[e]),a[d]=b+a[e]),a[d]&&f.debug&&(a[d]=a[d].replace(/-min/ig,"")),a[d]&&!a[d].match(/\?t=/)&&a.tag&&(a[d]+=" ? t = "+a.tag)}var e=this,f=e.Config;b=b||f.base,g("fullpath","path"),a.cssfullpath!==d.LOADED&&g("cssfullpath","csspath")}})}(KISSY,KISSY.__loader,KISSY.__loaderUtils,KISSY.__loaderData),function(a,b){if("require"in this)return;a.mix(b,{__mixMod:function(b,c){var d=this,e=d.Env.mods,f=c.Env.mods,g=e[b]||{},h=g.status;f[b]&&(a.mix(g,a.clone(f[b])),h&&(g.status=h)),d.__buildPath(g,c.Config.base),e[b]=g}})}(KISSY,KISSY.__loader),function(a,b,c){if("require"in this)return;a.mix(b,{__findModuleNameByInteractive:function(){var b=this,d=document.getElementsByTagName("script"),e,f;for(var g=0;g<d.length;g++){f=d[g];if(f.readyState=="interactive"){e=f;break}}if(!e)return a.log("can not find interactive script, 
            time diff : "+(+(new Date)-b.__startLoadTime),"error"),a.log("old_ie get modname from cache : "+b.__startLoadModuleName),b.__startLoadModuleName;var h=c.absoluteFilePath(e.src);b.Config.base=c.normalBasePath(b.Config.base);if(h.lastIndexOf(b.Config.base,0)===0)return c.removePostfix(h.substring(b.Config.base.length));var i=b.__packages;for(var j in i){var k=i[j].path;if(i.hasOwnProperty(j)&&h.lastIndexOf(k,0)===0)return c.removePostfix(h.substring(k.length))}a.log("interactive script does not have package config \uff1a"+h,"error")}})}(KISSY,KISSY.__loader,KISSY.__loaderUtils),function(a,b,c,d){if("require"in this)return;var e=c.IE,f=d.LOADING,g=d.LOADED,h=d.ERROR,i=d.ATTACHED;a.mix(b,{__load:function(b,d,j){function q(){a.log(b.name+" is not loaded! can not find module in path : "+b.fullpath,"error"),b.status=h}function r(){j.global&&k.__mixMod(b.name,j.global)}function s(){n[l]=g,b.status!==h&&(b.status!==i&&(b.status=g),d())}var k=this,l=b.fullpath,m=c.isCss(l),n=a.Env._loadQueue,o=n[l],p=o;b.status=b.status||0,b.status<f&&o&&(b.status=o===g?g:f),a.isString(b.cssfullpath)&&(a.getScript(b.cssfullpath),b.cssfullpath=b.csspath=g),b.status<f&&l?(b.status=f,e&&!m&&(k.__startLoadModuleName=b.name,k.__startLoadTime=Number(+(new Date))),p=a.getScript(l,{success:function(){m||(k.__currentModule&&(a.log("standard browser get modname after load : "+b.name),k.__registerModule(b.name,k.__currentModule.def,k.__currentModule.config),k.__currentModule=null),r(),b.fns&&b.fns.length>0||q()),b.status!=h&&a.log(b.name+" is loaded.","info"),s()},error:function(){q(),s()},charset:b.charset}),n[l]=p):b.status===f?c.scriptOnload(p,function(){r(),s()}):(r(),d())}})}(KISSY,KISSY.__loader,KISSY.__loaderUtils,KISSY.__loaderData),function(a,b,c){if("require"in this)return;var d=c.ATTACHED,e=a.mix;e(b,{__pagePath:location.href.replace(location.hash,"").replace(/[^/]*$/i,""),__currentModule:null,__startLoadTime:0,__startLoadModuleName:null,__isAttached:function(b){var c=this.Env.mods,e=!0;return a.each(b,function(a){var b=c[a];if(!b||b.status!==d)return e=!1,e}),e}})}(KISSY,KISSY.__loader,KISSY.__loaderData),function(a,b,c){if("require"in this)return;a.mix(b,{_packages:function(b){var d=this,e;e=d.__packages=d.__packages||{},a.each(b,function(b){e[b.name]=b,a.startsWith(b.path,"http")||(b.path=a.Config.baseHost+b.path),b.path=b.path&&c.normalBasePath(b.path),b.tag=b.tag&&encodeURIComponent(b.tag)})},__getPackagePath:function(b){if(b.packagepath)return b.packagepath;var c=this,d=c._combine(b.name),e=c.__packages||{},f="",g;for(var h in e)e.hasOwnProperty(h)&&a.startsWith(d,h)&&h.length>f&&(f=h);return g=e[f],b.charset=g&&g.charset||b.charset,g?b.tag=g.tag:b.tag=encodeURIComponent(a.Config.tag||a.buildTime),b.packagepath=g&&g.path||c.Config.base},_combine:function(b,c){var d=this,e;if(a.isObject(b)){a.each(b,function(b,c){a.each(b,function(a){d._combine(a,c)})});return}e=d.__combines=d.__combines||{};if(!c)return e[b]||b;e[b]=c}})}(KISSY,KISSY.__loader,KISSY.__loaderUtils),function(a,b,c){if("require"in this)return;var d=c.LOADED,e=a.mix;e(b,{__registerModule:function(b,c,f){f=f||{};var g=this,h=g.Env.mods,i=h[b]||{};e(i,{name:b,status:d}),i.fns&&i.fns.length&&a.log(b+" is defined more than once"),i.fns=i.fns||[],i.fns.push(c),e(h[b]=i,f)}})}(KISSY,KISSY.__loader,KISSY.__loaderData),function(a,b,c,d){if("require"in this)return;var e=d.LOADED,f=d.ATTACHED;a.mix(b,{use:function(b,d,e){b=b.replace(/\s+/g,"").split(", 
            "),c.indexMapping(b),b=c.normalModuleName(b),e=e||{};var f=this,g;if(f.__isAttached(b)){var h=f.__getModules(b);d&&d.apply(f,h);return}return a.each(b,function(a){f.__attachModByName(a,function(){if(!g&&f.__isAttached(b)){g=!0;var a=f.__getModules(b);d&&d.apply(f,a)}},e)}),f},__getModules:function(b){var d=this,e=[d];return a.each(b,function(a){c.isCss(a)||e.push(d.require(a))}),e},require:function(a){var b=this,c=b.Env.mods,d=c[a],e=b.onRequire&&b.onRequire(d);return e!==undefined?e:d&&d.value},__attachModByName:function(b,d,e){var g=this,h=g.Env.mods,i=h[b];if(!i){var j=g.Config.componentJsName||function(a){var b="js",d,e=c.getModuleVersion(a);if(d=a.match(/(.+)\.(js|css)$/i))b=d[2],a=d[1];return a+"."+(e?e+".":"")+b},k=a.isFunction(j)?j(g._combine(b)):j;i={path:k,charset:"utf - 8"},h[b]=i}i.name=b;if(i&&i.status===f)return;e.global&&g.__mixMod(b,e.global),g.__attach(i,d,e)},__attach:function(b,d,g){function p(){var c,d=b.name,e,f,g,h,i,j=b.requires;c=b.__allRequires=b.__allRequires||{};for(var k=0;k<j.length;k++){e=j[k],g=n[e],c[e]=1;if(g&&(i=g.__allRequires))for(f in i)c[f]=1}if(c[d]){var l=[];for(e in c)l.push(e);a.error("find cyclic dependency by mod "+d+" between mods : "+l.join(", 
            "))}}function q(){!m&&h.__isAttached(b.requires)&&(b.status===e&&h.__attachMod(b),b.status===f&&(m=1,d()))}var h=this,i,j,k,l,m=0,n=h.Env.mods,o=(b.requires||[]).concat();b.requires=o,a.Config.debug&&p();for(k=0;k<o.length;k++)rname=c.normalDepModuleName(b.name,o[k]),i=o[k]=c.normalModuleName(rname),j=n[i],(!j||j.status!==f)&&h.__attachModByName(i,q,g);h.__buildPath(b,h.__getPackagePath(b)),h.__load(b,function(){b.requires=b.requires||[];var d=b.requires,e=[];!a.Config.debug;for(k=0;k<d.length;k++){l=c.normalDepModuleName(b.name,d[k]),i=d[k]=c.normalModuleName(l);var j=n[i],m=a.inArray(i,o);j&&j.status===f||m||e.push(i)}if(e.length)for(k=0;k<e.length;k++)h.__attachModByName(e[k],q,g);else q()},g)},__attachMod:function(b){var c=this,d=b.fns;d&&a.each(d,function(d){var e;a.isFunction(d)?e=d.apply(c,c.__getModules(b.requires)):e=d,b.value=b.value||e}),b.status=f}})}(KISSY,KISSY.__loader,KISSY.__loaderUtils,KISSY.__loaderData),function(a,b,c){function f(b){var f=c.absoluteFilePath(b.src),g=b.getAttribute("data - combo - prefix")||" ?? ",h=b.getAttribute("data - combo - sep")||", 
            ",i=f.split(h),j,k=i[0],l=k.indexOf(g);if(l==-1)j=f.replace(d,"$1");else{j=k.substring(0,l);var m=k.substring(l+2,k.length);m.match(e)?j+=m.replace(d,"$1"):a.each(i,function(a){if(a.match(e))return j+=a.replace(d,"$1"),!1})}return j}if("require"in this)return;a.mix(a,b);var d=/^(.*)(seed|kissy)(-aio)?(-min)?(\.\$\d+)?\.js[^/]*/i,e=/(seed|kissy)(-aio)?(-min)?(\.\$\d+)?\.js/i;a.__initLoader=function(){var a=this;a.Env.mods=a.Env.mods||{}},a.Env._loadQueue={},a.__initLoader(),function(){var b=document.getElementsByTagName("script"),d=b[b.length-1],e=f(d);a.Config.base=c.normalBasePath(e),a.Config.baseHost=a.Config.base.match(/https?:\/\/([^\/]+)/)[0],a.Config.timeout=10}(),a.each(b,function(b,c){a.__APP_MEMBERS.push(c)}),a.__APP_INIT_METHODS.push("__initLoader")}(KISSY,KISSY.__loader,KISSY.__loaderUtils),function(a,b){function m(){var b=e.doScroll,f=b?"onreadystatechange":"DOMContentLoaded",g="complete",h=function(){n()};if(d.readyState===g)return h();if(d.addEventListener){function i(){d.removeEventListener(f,i,!1),h()}d.addEventListener(f,i,!1),c.addEventListener("load",h,!1)}else{function k(){d.readyState===g&&(d.detachEvent(f,k),h())}d.attachEvent(f,k),c.attachEvent("onload",h);var l=!1;try{l=c.frameElement===null}catch(m){a.log("frameElement error : "),a.log(m)}if(b&&l){function o(){try{b("left"),h()}catch(a){setTimeout(o,j)}}o()}}return 0}function n(){if(g)return;g=!0;if(h){var b,d=0;while(b=h[d++])b.call(c,a);h=null}}var c=a.__HOST,d=c.document,e=d.documentElement,f="",g=!1,h=[],i=500,j=40,k=/^#?([\w-]+)$/,l=/\S/;a.mix(a,{isWindow:function(b){return a.type(b)==="object"&&"setInterval"in b&&"document"in b&&b.document.nodeType==9},parseXML:function(c){var d;try{window.DOMParser?d=(new DOMParser).parseFromString(c,"text / xml"):(d=new ActiveXObject("Microsoft.XMLDOM"),d.async="false ",d.loadXML(c))}catch(e){a.log("parseXML error : "),a.log(e),d=b}return(!d||!d.documentElement||d.getElementsByTagName("parsererror").length)&&a.error("Invalid XML : "+c),d},globalEval:function(a){a&&l.test(a)&&(window.execScript||function(a){window.eval.call(window,a)})(a)},ready:function(a){return g?a.call(c,this):h.push(a),this},available:function(b,c){b=(b+f).match(k)[1];if(!b||!a.isFunction(c))return;var e=1,g,h=a.later(function(){((g=d.getElementById(b))&&(c(g)||1)||++e>i)&&h.cancel()},j,!0)}}),location&&(location.search||f).indexOf("ks - debug")!==-1&&(a.Config.debug=!0),m()}(KISSY,undefined),function(a){a.config({combine:{core:["dom","ua","event","node","json","ajax","anim","base","cookie"]}})}(KISSY);var ENV={};(function(a){var b=new function(){var a=this;a.hasSmoothing=function(){if(typeof screen.fontSmoothingEnabled!="undefined")return screen.fontSmoothingEnabled;try{var a=document.createElement("canvas");a.width="35",a.height="35",a.style.display="none",document.body.appendChild(a);var b=a.getContext("2d");b.textBaseline="top",b.font="32px Arial",b.fillStyle="black",b.strokeStyle="black",b.fillText("E",0,0);for(var c=8;c<=32;c++)for(var d=1;d<=32;d++){var e=b.getImageData(d,c,1,1).data,f=e[3];if(f!=255&&f!=0)return document.body.removeChild(a),!0}return document.body.removeChild(a),!1}catch(g){return null}},a.insertClasses=function(){var b=navigator.userAgent.indexOf("Windows NT 5.1")>-1,c=b?a.hasSmoothing():!0,d=document.getElementsByTagName("html")[0];c===!0?d.className+=" hasFontSmoothing - true ":c===!1?d.className+=" hasFontSmoothing - false ":d.className+=" hasFontSmoothing - unknown"}};a.ready(function(a){b.insertClasses()})})(KISSY),KISSY.config({packages:[{name:"util",path:"/js/"},{name:"lib",path:"/js/"},{name:"app",path:"/js/"},{name:"api",path:"/js/"},{name:"act",path:"/"},{name:"sky",path:"/sky / build / "}]});