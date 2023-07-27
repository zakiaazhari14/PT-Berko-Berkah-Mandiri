// Toggle class active
const navbarNav = document.querySelector(".navbar-nav");
// ketika select menu di klik
document.querySelector("#select-menu").onclick = () => {
  navbarNav.classList.toggle("active");
};

// klik diluar sidebar untuk menghilangkan nav
const select = document.querySelector("#select-menu");

document.addEventListener("click", function (e) {
  if (!select.contains(e.target) && !navbarNav.contains(e.target)) {
    navbarNav.classList.remove("active");
  }
});

new DataTable("#example", {
  pagingType: "full_numbers",
});
