(function() {
  const menu = document.getElementById("js-menu-button");
  menu.addEventListener("click", function(){mobileMenuClickHandeler(this)});

  function mobileMenuClickHandeler(that) {
    that.classList.toggle('is-open');
    document.getElementById(that.dataset.menu).classList.toggle('is-open');
  }

  const dropdowns = document.querySelectorAll(".dropbtn")
  for (i=0; i < dropdowns.length; i++){
    dropdowns.forEach(item => {
      item.addEventListener("click", function(){dropdownClickHandler(item)});
    });
  }

  function dropdownClickHandler(that){
    if (!that){
      return;
    }
    that.parentElement.classList.toggle('is-open');
    
  }
})();
