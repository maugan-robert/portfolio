<footer id="contact">
       <div class="footer-content">
       <img class="logo-footer" src="<?php echo get_template_directory_uri(); ?>/screenshot.jpg" alt="Logo">
        <div class="reseaux-sociaux">
          <h2 class="title-footer">Réseaux sociaux</h2>
          <div class="logo-reseau">
          <img class="logo-rs" src="<?php echo get_template_directory_uri(); ?>/logo-insta.jpg" alt="Logo">
          <a href="https://www.behance.net/mauganrobert1"><img  class="logo-rs" src="<?php echo get_template_directory_uri(); ?>/logo-behance.jpg" alt="Logo"></a>
          <a href="https://www.linkedin.com/in/maugan-robert-ab896329a/"><img class="logo-rs" src="<?php echo get_template_directory_uri(); ?>/logo-linkedin.jpg" alt="Logo"></a>
          </div>
        </div>
        <div class="mail">
          <h2 class="title-footer">Mail</h2>
          <a href="https://mail.google.com/mail/?view=cm&fs=1&to=robertmaugan@gmail.com" target="_blank" class="mail-text">robertmaugan@gmail.com</a>
        </div>
       </div>
     </footer>
   </div>
   <?php wp_footer(); ?>
 </body>
 <script>
  document.addEventListener('DOMContentLoaded', function () {
  const burgerMenu = document.querySelector('.burger-menu');
  const mobileMenu = document.querySelector('.mobile-menu');

  burgerMenu.addEventListener('click', function () {
    burgerMenu.classList.toggle('active');
    mobileMenu.classList.toggle('active');
  });
});
 </script>
</html>
 