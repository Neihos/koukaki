/******* Animations des nuages **********/

function nuages_mouvements() {
  const containerPlace = document.querySelector(".story #place");

  // Création et ajout des nuages
  const grosNuage = document.createElement("img");
  grosNuage.src = "../assets/images/big_cloud.png";
  grosNuage.className = "gros_nuage";
  containerPlace.appendChild(grosNuage);

  const petitNuage = document.createElement("img");
  petitNuage.src = "../assets/images/little_cloud.png";
  petitNuage.className = "petit_nuage";
  containerPlace.appendChild(petitNuage);

  // Configuration de l'Intersection Observer pour détecter la visibilité de la section
  const observerOptions = {
    root: null,
    threshold: Array.from({ length: 81 }, (_, i) => i / 100), // Seuils de 0% à 100%
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.intersectionRatio > 0.2) {
        // La section est visible à partir de 20%
        window.addEventListener("scroll", handleScroll);
      } else {
        // Section plus visible, on stoppe l'animation
        window.removeEventListener("scroll", handleScroll);
        resetNuagesPosition();
      }
    });
  }, observerOptions);

  observer.observe(containerPlace);

  function handleScroll() {
    const windowHeight = window.innerHeight;
    const sectionTop =
      containerPlace.getBoundingClientRect().top + window.scrollY;
    const sectionHeight = containerPlace.offsetHeight;

    // Calcul du pourcentage de la section visible dans la fenêtre
    const scrollTop = window.scrollY;
    const sectionVisibleHeight = Math.min(
      Math.max(scrollTop + windowHeight - sectionTop, 0),
      sectionHeight
    );

    const visibilityProgress = sectionVisibleHeight / sectionHeight;

    // Déplacer les nuages selon la progression
    const maxTranslation = 700; // 700px de déplacement maximal
    const grosNuageTranslation = -maxTranslation * visibilityProgress; // Déplacement linéaire complet sur 100%
    const petitNuageTranslation = -maxTranslation * 0.5 * visibilityProgress; // Déplacement à moitié pour le petit nuage

    grosNuage.style.transform = `translateX(${grosNuageTranslation}px)`;
    petitNuage.style.transform = `translateX(${petitNuageTranslation}px)`;
  }

  function resetNuagesPosition() {
    grosNuage.style.transform = "translateX(0)";
    petitNuage.style.transform = "translateX(0)";
  }
}

nuages_mouvements();
