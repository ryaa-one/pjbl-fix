// Ambil element hamburger icon dan navigation
const hamburger = document.getElementById("hamburger");
const nav = document.getElementById("nav");

/* FUNGSI 1: Toggle Menu (Buka/Tutup) */
// Ketika hamburger diklik, toggle class "active"
hamburger.addEventListener("click", function () {
  hamburger.classList.toggle("active"); // Animasi hamburger jadi X
  nav.classList.toggle("active"); // Tampilkan/sembunyikan menu
});

// FUNGSI 2: Auto Close saat Menu Diklik
// Ambil semua link di dalam navigation
const navLinks = nav.querySelectorAll("a");

// Loop setiap link dan tambahkan event listener
navLinks.forEach((link) => {
  link.addEventListener("click", function () {
    // Hapus class "active" untuk menutup menu
    hamburger.classList.remove("active");
    nav.classList.remove("active");
  });
});

// FUNGSI 3: Auto Close saat Klik di Luar Menu
document.addEventListener("click", function (event) {
  // Cek apakah klik di dalam nav
  const isClickInsideNav = nav.contains(event.target);

  // Cek apakah klik pada hamburger
  const isClickOnHamburger = hamburger.contains(event.target);

  // Jika klik di luar nav DAN bukan hamburger DAN menu sedang terbuka
  if (
    !isClickInsideNav &&
    !isClickOnHamburger &&
    nav.classList.contains("active")
  ) {
    // Tutup menu
    hamburger.classList.remove("active");
    nav.classList.remove("active");
  }
});
