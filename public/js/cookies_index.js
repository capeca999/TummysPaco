var $animation_elements = $(".animation-element"),
    $window = $(window);

function check_if_in_view() {
    var e = $window.height(),
        t = $window.scrollTop(),
        o = t + e;
    $.each($animation_elements, function() {
        var e = $(this),
            n = e.outerHeight(),
            i = e.offset().top;
        i + n >= t && i <= o ? e.addClass("in-view") : e.removeClass("in-view")
    })
}
$window.on("scroll resize", check_if_in_view), $window.trigger("scroll"), $(window).on("load", function() {
        $("#contactModal").modal("show")
    }), $(window).on("load", function() {
        "use strict";
        (function(e) {
            for (var t = e + "=", o = document.cookie.split(";"), n = 0; n < o.length; n++) {
                for (var i = o[n];
                    " " == i.charAt(0);) i = i.substring(1);
                if (0 == i.indexOf(t)) return i.substring(t.length, i.length)
            }
            return ""
        })("cookie_aceptar") || $("#cookieModal").modal("show"), $("#cookieModalConsent").on("click", function() {
            ! function(e, t, o) {
                var n = new Date;
                n.setTime(n.getTime() + 24 * o * 60 * 60 * 1e3);
                var i = "expires=" + n.toUTCString();
                document.cookie = e + "=" + t + ";" + i + ";path=/"
            }("cookie_aceptar", 1, 365)
        })
    })(),
    function() {
        function e(e, t) {
            $(".alert").removeClass("display").removeClass("alert-info").removeClass("alert-success").removeClass("alert-danger").addClass(e), t && $(".alert").addClass("display"), "alert-success" === e ? $(".alert > span").text("Profile saved") : "alert-danger" === e && $(".alert > span").text("Profile reset")
        }
        $("input.form-control[name=avatar-file]").change(function() {
            ! function(e) {
                if (e.files && e.files[0]) {
                    var t = new FileReader;
                    t.onload = function(e) {
                        $(".avatar-bg").css({
                            background: "url(" + e.target.result + ")",
                            "background-size": "cover",
                            "background-position": "50% 50%"
                        })
                    }, t.readAsDataURL(e.files[0])
                }
            }(this)
        }), $("#profile").delegate("form", "submit", function(t) {
            var o = this;
            new FormData($(this)[0]);
            return $(o).find("button[type = submit]").addClass("loading").prop("disabled", !0), e("alert-success", !0), setTimeout(function() {
                $(o).find("button[type = submit]").removeClass("loading").prop("disabled", !1), e("alert-success")
            }, 1e3), !1
        }), $("#profile").delegate("form", "reset", function(t) {
            var o = this;
            new FormData($(this)[0]);
            return $(o).find("button[type = reset]").addClass("loading").prop("disabled", !0), e("alert-danger", !0), setTimeout(function() {
                $(o).find("button[type = reset]").removeClass("loading").prop("disabled", !1), e("alert-danger")
            }, 1e3), !1
        })
    }();