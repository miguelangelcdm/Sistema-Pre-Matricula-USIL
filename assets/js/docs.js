"use strict";
let isRtl = window.Helpers.isRtl(),
  isDarkStyle = window.Helpers.isDarkStyle(),
  menu,
  animate,
  isHorizontalLayout = !1;
document.getElementById("layout-menu") &&
  (isHorizontalLayout = document
    .getElementById("layout-menu")
    .classList.contains("menu-horizontal")),
  (function () {
    document.querySelectorAll("#layout-menu").forEach(function (e) {
      (menu = new Menu(e, {
        orientation: isHorizontalLayout ? "horizontal" : "vertical",
        closeChildren: !!isHorizontalLayout,
        showDropdownOnHover: localStorage.getItem(
          "templateCustomizer-" + templateName + "--ShowDropdownOnHover"
        )
          ? "true" ===
            localStorage.getItem(
              "templateCustomizer-" + templateName + "--ShowDropdownOnHover"
            )
          : void 0 === window.templateCustomizer ||
            window.templateCustomizer.settings.defaultShowDropdownOnHover,
      })),
        window.Helpers.scrollToActive((animate = !1)),
        (window.Helpers.mainMenu = menu);
    }),
      document.querySelectorAll(".layout-menu-toggle").forEach((e) => {
        e.addEventListener("click", (e) => {
          if (
            (e.preventDefault(),
            window.Helpers.toggleCollapsed(),
            config.enableMenuLocalStorage && !window.Helpers.isSmallScreen())
          )
            try {
              localStorage.setItem(
                "templateCustomizer-" + templateName + "--LayoutCollapsed",
                String(window.Helpers.isCollapsed())
              );
            } catch (e) {}
        });
      }),
      window.Helpers.swipeIn(".drag-target", function (e) {
        window.Helpers.setCollapsed(!1);
      }),
      window.Helpers.swipeOut("#layout-menu", function (e) {
        window.Helpers.isSmallScreen() && window.Helpers.setCollapsed(!0);
      }),
      [].slice
        .call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        .map(function (e) {
          return new bootstrap.Tooltip(e);
        });
    function t(e) {
      "show.bs.collapse" == e.type || "show.bs.collapse" == e.type
        ? e.target.closest(".accordion-item").classList.add("active")
        : e.target.closest(".accordion-item").classList.remove("active");
    }
    [].slice.call(document.querySelectorAll(".accordion")).map(function (e) {
      e.addEventListener("show.bs.collapse", t),
        e.addEventListener("hide.bs.collapse", t);
    });
    isRtl &&
      Helpers._addClass(
        "dropdown-menu-end",
        document.querySelectorAll("#layout-navbar .dropdown-menu")
      ),
      window.Helpers.setAutoUpdate(!0),
      window.Helpers.initPasswordToggle(),
      window.Helpers.initSpeechToText(),
      window.Helpers.initNavbarDropdownScrollbar(),
      window.addEventListener(
        "resize",
        function (e) {
          window.outerWidth >= window.Helpers.LAYOUT_BREAKPOINT &&
            document.querySelector(".search-input-wrapper") &&
            (document
              .querySelector(".search-input-wrapper")
              .classList.add("d-none"),
            (document.querySelector(".search-input").value = "")),
            document.querySelector(
              "[data-template='horizontal-menu-template']"
            ) &&
              (window.outerWidth < window.Helpers.LAYOUT_BREAKPOINT
                ? document
                    .getElementById("layout-menu")
                    .classList.contains("menu-horizontal") &&
                  menu.switchMenu("vertical")
                : document
                    .getElementById("layout-menu")
                    .classList.contains("menu-vertical") &&
                  menu.switchMenu("horizontal"));
        },
        !0
      ),
      isHorizontalLayout ||
        window.Helpers.isSmallScreen() ||
        ("undefined" != typeof TemplateCustomizer &&
          (window.templateCustomizer.settings.defaultMenuCollapsed
            ? window.Helpers.setCollapsed(!0, !1)
            : window.Helpers.setCollapsed(!1, !1)),
        document.getElementById("vertical-nav") &&
          new bootstrap.ScrollSpy(document.body, { target: "#vertical-nav" }));
  })(),
  $(function () {
    function e(e) {
      var t;
      void 0 !== this
        ? location.pathname.replace(/^\//, "") ==
            this.pathname.replace(/^\//, "") &&
          location.hostname == this.hostname &&
          (t = (t = $(this.hash)).length
            ? t
            : $("[name=" + this.hash.slice(1) + "]")).length &&
          $("html, body").animate({ scrollTop: t.offset().top - 100 }, 500)
        : (t = (t = $(location.hash)).length
            ? t
            : $("[name=" + location.hash.slice(1) + "]")).length &&
          $("html, body").animate({ scrollTop: t.offset().top - 100 }, 500);
    }
    $("pre.docs-code > code").each(function (e, t) {
      hljs.highlightElement(t);
    }),
      $('.doc-sidebar a[href*="#"]')
        .not('[href="#"]')
        .not('[href="#0"]')
        .click(e),
      $(".anchorjs-link").click(e),
      location.hash && e();
    var t = new ClipboardJS(".btn-clipboard", {
      target: function (e) {
        return e.parentNode.nextElementSibling;
      },
    });
    t.on("success", function (e) {
      var t = $(e.trigger);
      e.trigger.setAttribute("title", "Copied!"),
        t.tooltip("dispose"),
        t.tooltip("show"),
        e.trigger.setAttribute("title", "Copy to clipboard"),
        e.trigger.setAttribute("title", "Copy to clipboard"),
        e.clearSelection();
    }),
      t.on("error", function (e) {
        var t =
            "Press " +
            (/Mac/i.test(navigator.userAgent) ? "⌘" : "Ctrl-") +
            "C to copy",
          o = $(e.trigger);
        e.trigger.setAttribute("title", t),
          o.tooltip("dispose"),
          o.tooltip("show"),
          e.trigger.setAttribute("title", "Copy to clipboard"),
          e.trigger.setAttribute("title", "Copy to clipboard"),
          e.clearSelection();
      });
  }),
  document.querySelectorAll(".anchor-heading").forEach((e) => {
    var t = e.getAttribute("id");
    e.innerHTML += `<a href="#${t}" class="anchorjs-link ps-2">#</a>`;
  });
