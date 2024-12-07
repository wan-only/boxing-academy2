// Fungsi untuk menampilkan dan menyembunyikan dropdown
document
  .getElementById("profile-img")
  .addEventListener("click", function (event) {
    var dropdown = document.getElementById("dropdown-menu");
    // Toggle dropdown visibility
    dropdown.style.display =
      dropdown.style.display === "none" || dropdown.style.display === ""
        ? "block"
        : "none";

    // Prevent the click event from propagating to the body
    event.stopPropagation();
  });

// Close dropdown jika mengklik di luar dropdown atau gambar profil
window.addEventListener("click", function (event) {
  var dropdown = document.getElementById("dropdown-menu");
  var profileImg = document.getElementById("profile-img");

  // Jika klik di luar profil atau dropdown, dropdown akan disembunyikan
  if (!profileImg.contains(event.target)) {
    dropdown.style.display = "none";
  }
});

// Fungsi untuk menangani efek scroll pada elemen dengan kelas "fade-text"
window.addEventListener("scroll", function () {
  const scrollPosition = window.scrollY;
  const heroText = document.querySelectorAll(".fade-text");

  if (scrollPosition > 100) {
    heroText.forEach((text) => text.classList.add("hidden"));
  } else {
    heroText.forEach((text) => text.classList.remove("hidden"));
  }
});
