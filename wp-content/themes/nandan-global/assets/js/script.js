// Burger menus
document.addEventListener("DOMContentLoaded", function () {
  // open
  const burger = document.querySelectorAll(".navbar-burger");
  const menu = document.querySelectorAll(".navbar-menu");

  if (burger.length && menu.length) {
    for (var i = 0; i < burger.length; i++) {
      burger[i].addEventListener("click", function () {
        for (var j = 0; j < menu.length; j++) {
          menu[j].classList.toggle("hidden");
        }
      });
    }
  }

  // close
  const close = document.querySelectorAll(".navbar-close");
  const backdrop = document.querySelectorAll(".navbar-backdrop");

  if (close.length) {
    for (var i = 0; i < close.length; i++) {
      close[i].addEventListener("click", function () {
        for (var j = 0; j < menu.length; j++) {
          menu[j].classList.toggle("hidden");
        }
      });
    }
  }

  if (backdrop.length) {
    for (var i = 0; i < backdrop.length; i++) {
      backdrop[i].addEventListener("click", function () {
        for (var j = 0; j < menu.length; j++) {
          menu[j].classList.toggle("hidden");
        }
      });
    }
  }
});

/* Navbar user droupdown */
const droupdownBtn = document.getElementById("user-droupdown");
const droupdown = document.getElementById("droupdown");
if(droupdownBtn) {
  droupdownBtn.addEventListener("click", function () {
    droupdown.classList.toggle("hidden");
  });
}


/* Tip Modal */
document.addEventListener("DOMContentLoaded", function () {
  const tipModal = document.getElementById("tipModal");
  const closeTipButton = document.getElementById("closeTipPopup");

  // Show the tip modal when the page loads
  tipModal.style.display = "block";

  closeTipButton.addEventListener("click", function () {
    tipModal.style.display = "none";
  });
});
