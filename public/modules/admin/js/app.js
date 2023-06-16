function windowScroll() {
    var e = document.getElementById("navbar-custom");
    50 <= document.body.scrollTop || 50 <= document.documentElement.scrollTop ? e?.classList.add("nav-sticky") : e?.classList.remove("nav-sticky")
}
feather.replace(), window.addEventListener("scroll", (e => {
    e.preventDefault(), windowScroll()
}));
var triggerTabList = [].slice.call(document.querySelectorAll("#tab-menu a")),
    collapses = (triggerTabList.forEach((function(e) {
        var t = new bootstrap.Tab(e);
        e.addEventListener("click", (function(e) {
            e.preventDefault(), t.show(), document.body.classList.remove("enlarge-menu")
        }))
    })), document.querySelectorAll(".navbar-nav .collapse"));
collapses.forEach((e => {
    var t = new bootstrap.Collapse(e, {
        toggle: !1
    });
    e.addEventListener("show.bs.collapse", (a => {
        a.stopPropagation(), null != (a = e.parentElement.closest(".collapse")) && a.querySelectorAll(".collapse").forEach((e => {
            (e = bootstrap.Collapse.getInstance(e)) !== t && e.hide()
        }))
    })), e.addEventListener("hide.bs.collapse", (t => {
        t.stopPropagation(), e.querySelectorAll(".collapse").forEach((e => {
            bootstrap.Collapse.getInstance(e).hide()
        }))
    }))
}));
try {
    document.getElementById("togglemenu").addEventListener("click", (function(e) {
        e.preventDefault(), document.body.classList.toggle("enlarge-menu")
    }))
} catch (e) {}
window.screen.width < 1025 ? document.getElementsByTagName("body")[0].classList.add("enlarge-menu", "enlarge-menu-all") : window.screen.width < 1340 && (document.getElementsByTagName("body")[0].classList.remove("enlarge-menu-all"), document.getElementsByTagName("body")[0].classList.add("enlarge-menu")), window.addEventListener("resize", (function() {
    window.screen.width < 1025 ? document.getElementsByTagName("body")[0].classList.add("enlarge-menu", "enlarge-menu-all") : window.screen.width < 1340 && (document.getElementsByTagName("body")[0].classList.remove("enlarge-menu-all"), document.getElementsByTagName("body")[0].classList.add("enlarge-menu"))
})), document.querySelectorAll(".leftbar-tab-menu a").forEach((function(e, t) {
    var a, n, o = window.location.href.split(/[?#]/)[0];
    e.href == o && (e.classList.add("active"), e.parentElement.parentElement.classList.contains("navbar-nav") || (o = e.closest(".collapse")) && (o.classList.add("show"), (a = o.parentElement.querySelector("a")).classList.remove("collapsed"), a.setAttribute("aria-expanded", "true"), (a = o.parentElement.closest(".collapse")) && (a.classList.add("show"), a.parentElement.querySelector("a").classList.remove("collapsed"), a.parentElement.childNodes[1].setAttribute("aria-expanded", "true"))), (n = e.closest(".tab-pane")) && (n.classList.add("active"), document.querySelectorAll("a").forEach((function(e, t) {
        e.href.includes(n.id) && e.classList.add("active")
    }))))
}));
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')),
    tooltipList = tooltipTriggerList.map((function(e) {
        return new bootstrap.Tooltip(e)
    })),
    dropdowns = document.querySelectorAll(".dropup, .dropend, .dropdown, .dropstart"),
    events = ["click"];

function toggleDropdown(e, t) {
    var a, n = t.closest(".dropdown-menu");
    n && (e.preventDefault(), e.stopPropagation(), a = t.querySelector(".dropdown-menu"), e = n.querySelectorAll(".dropdown-menu"), [].forEach.call(e, (function(e) {
        e !== a && e.classList.remove("show")
    })), a.classList.add("show"))
}

function hideDropdowns(e) {
    (e = e.querySelector(".dropdown-menu").querySelectorAll(".dropdown-menu")) && [].forEach.call(e, (function(e) {
        e.classList.remove("show")
    }))
}

function toggleMenu() {
    document.getElementById("mobileToggle").classList.toggle("open");
    var e = document.getElementById("navigation");
    "block" === e.style.display ? e.style.display = "none" : e.style.display = "block"
}

function activateMenu() {
    var e = document.getElementsByClassName("sub-menu-item");
    if (e) {
        for (var t, a, n = null, o = 0; o < e.length; o++) e[o].href === window.location.href && (n = e[o]);
        n && (n.classList.add("active"), (t = getClosest(n, "li")) && t.classList.add("active"), (t = getClosest(n, ".parent-menu-item")) ? (t.classList.add("active"), (a = t.querySelector(".menu-item")) && a.classList.add("active"), (a = getClosest(t, ".parent-parent-menu-item")) && a.classList.add("active")) : (a = getClosest(n, ".parent-parent-menu-item")) && a.classList.add("active"))
    }
} [].forEach.call(dropdowns, (function(e) {
    var t = e.querySelector('[data-bs-toggle="dropdown"]');
    t ? t.addEventListener(events[0], (function(t) {
        toggleDropdown(t, e)
    })) : hideDropdowns(e)
})), document.querySelectorAll(".menu-body a").forEach((function(e, t) {
    var a = window.location.href.split(/[?#]/)[0];
    const n = e;
    e.href == a && (n.classList.add("active"), n.parentNode.classList.add("menuitem-active"), n.parentNode.querySelector(".nav-link")?.setAttribute("aria-expanded", "true"), n.parentNode.parentNode.parentNode.classList.add("show"), n.parentNode.parentNode.parentNode.parentNode.classList.add("menuitem-active"), n.parentNode.parentNode.parentNode.parentNode.querySelector(".nav-link")?.setAttribute("aria-expanded", "true"), "sidebar-menu" !== (e = n.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode).getAttribute("id") && e.classList.add("show"), n.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.classList.add("menuitem-active"), n.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.querySelector(".nav-link")?.setAttribute("aria-expanded", "true"), (a = n.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode) && a instanceof HTMLElement && "wrapper" !== a.getAttribute("id") && a.classList.add("show"), (e = (e = n.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode) && e.parentNode) && e.classList.add("menuitem-active"))
})), document.querySelectorAll("#navigation").length && (document.querySelectorAll("#navigation li a").forEach((function(e, t) {
    var a = window.location.href.split(/[?#]/)[0];
    if (e.href == a) {
        const t = e;
        t.classList.add("active");
        for (var n = t.getAttribute("aria-labelledby");;) {
            var o = document.querySelector("#" + n);
            if (o?.classList.add("active"), n = o?.getAttribute("aria-labelledby"), o?.setAttribute("aria-expanded", "true"), !n) break
        }
        t.parentNode.parentNode.classList.add("active"), t.parentNode.parentNode.parentElement.querySelector(".nav-link")?.classList.add("active"), t.parentNode.parentNode.parentNode.parentNode.classList.add("active"), t.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.classList.add("active")
    }
})), document.querySelector(".navbar-toggle").addEventListener("click", (function(e) {
    e.target.classList.toggle("open")
})));
