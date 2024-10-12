/******* Chargement de la bibliothéque Skrollr *******/

document.addEventListener("DOMContentLoaded", function () {
  if (typeof skrollr !== "undefined") {
    var s = skrollr.init();
  } else {
    console.error("Skrollr n'est pas chargé.");
  }
});

/******* Apparitions des titres h2 ******/

document.addEventListener("DOMContentLoaded", function () {
  const h2Elements = document.querySelectorAll("h2");

  const observerOptions = {
    root: null,
    threshold: 0.1, // 10% du h2 visible
    rootMargin: "0px 0px -10% 0px", // On ajoute une marge pour éviter une détection trop rapide
  };

  const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        const h2 = entry.target;
        h2.classList.add("animated"); // Ajouter la classe "animated" au h2
        splitWordsAndAnimate(h2);
        observer.unobserve(h2); // On stoppe l'observation une fois l'animation déclenchée
      }
    });
  }, observerOptions);

  h2Elements.forEach((h2) => {
    observer.observe(h2);
  });
});

function splitWordsAndAnimate(h2) {
  const words = h2.innerText.split(" ");
  h2.innerHTML = ""; // On vide le h2

  words.forEach((word, index) => {
    const span = document.createElement("span");
    span.innerText = word;
    span.style.opacity = 0; // Initialement caché
    span.style.display = "inline-block";

    // Si c'est le premier mot, on ajoute un délai de 1s
    const delay = index === 0 ? 1 : 1 + index * 1; // 1s pour le premier mot, puis 1s pour les autres

    span.style.animation = `fadeInUp 0.5s ease forwards ${delay}s`; // Appliquer le délai
    h2.appendChild(span);
    h2.appendChild(document.createTextNode(" ")); // Espace entre les mots
  });
}

/******* Animation du buger menu *******/

jQuery(document).ready(function ($) {
  // Sélectionne le bouton du menu burger et son icône, le menu burger lui-même et tous les liens
  const $burgerMenuButton = $(".burgerMenu");
  const $burgerMenuButtonIcon = $(".burgerMenu i");
  const $burgerMenu = $(".burger-menu");
  const $menuLinks = $(".burger-menu a");

  // Ajoute un événement de clic sur le bouton du menu burger
  $burgerMenuButton.on("click", function () {
    $burgerMenu.toggleClass("open"); // Vérifie si le menu burger est ouvert
    const isOpen = $burgerMenu.hasClass("open");

    // Change l'icône du bouton en fonction de l'état du menu
    $burgerMenuButtonIcon.attr(
      "class",
      isOpen ? "fa-solid fa-xmark" : "fa-solid fa-bars"
    );
    // Désactive le défilement du corps de la page si le menu est ouvert
    $("body").css("overflow", isOpen ? "hidden" : "auto");
  });

  // Ajoute un événement de clic sur les liens du menu burger
  $menuLinks.on("click", function () {
    $burgerMenu.removeClass("open"); // Ferme le menu burger en retirant la classe "open"
    $burgerMenuButtonIcon.attr("class", "fa-solid fa-bars");
    // Réactive le défilement du corps de la page
    $("body").css("overflow", "auto");
  });
});