$("[data-toggle=tooltip]").tooltip(), $(document).ready(function() {
  $(".search").keyup(function() {
      var t = $(".search").val(),
          e = ($(".results tbody").children("tr"), t.replace(/ /g, "'):containsi('"));
      $.extend($.expr[":"], {
          containsi: function(t, e, n, o) {
              return (t.textContent || t.innerText || "").toLowerCase().indexOf((n[3] || "").toLowerCase()) >= 0
          }
      }), $(".results tbody tr").not(":containsi('" + e + "')").each(function(t) {
          $(this).attr("visible", "false")
      }), $(".results tbody tr:containsi('" + e + "')").each(function(t) {
          $(this).attr("visible", "true")
      });
      var n = $('.results tbody tr[visible="true"]').length;
      $(".counter").text(n + " item"), "0" == n ? $(".no-result").show() : $(".no-result").hide()
  })
});