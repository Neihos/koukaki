<?php
$args = array(
  'post_type' => 'characters',
  'posts_per_page' => -1,
  'meta_key'  => '_main_char_field',
  'orderby'   => 'meta_value_num',
);

$characters_query = new WP_Query($args);
?>

<article id="characters">
  <div class="main-character">
    <h3>Les personnages</h3>
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <?php
        while ($characters_query->have_posts()) {
          $characters_query->the_post();
          echo "<div class='swiper-slide'>";
          echo get_the_post_thumbnail(get_the_ID(), 'full');
          echo "<figcaption>";
          echo the_title(); 
          echo "</figcaption>";
          echo "</div>";
        }
        ?>
      </div>
    </div>
    <div class="swiper-pagination"></div>
  </div>
</article>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".mySwiper", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",
    initialSlide: 0,
    coverflowEffect: {
      rotate: 50,
      stretch: 0,
      depth: 100,
      modifier: 1,
      slideShadows: true,
    },
    pagination: {
      el: ".swiper-pagination",
    },
  });
</script>