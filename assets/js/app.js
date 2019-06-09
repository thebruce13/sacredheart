(function() {
  var menu = document.getElementById("js-menu-button");
  menu.addEventListener("click", function(){mobileMenuClickHandeler(this)});
  function mobileMenuClickHandeler(that) {
    console.log(that.dataset.menu);
    document.getElementById(that.dataset.menu).classList.toggle('is-open');
  }
})();
