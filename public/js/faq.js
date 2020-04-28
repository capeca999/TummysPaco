$("[data-toggle=tooltip]").tooltip();
var i, acc = document.getElementsByClassName("faq");
for (i = 0; i < acc.length; i++) acc[i].addEventListener("click", function() {
    this.classList.toggle("on");
    var t = this.nextElementSibling;
    t.style.maxHeight ? t.style.maxHeight = null : t.style.maxHeight = t.scrollHeight + "px"
});