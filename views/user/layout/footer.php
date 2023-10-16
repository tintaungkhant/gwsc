</div>
</div>
</body>
<footer class="bg-white">
    <?php
    if (!isset($show_footer_map)) {
        $show_footer_map = false;
    }
    ?>
    <?php if ($show_footer_map) : ?>
        <div class="mt-8 mx-auto max-w-4xl px-6">
            <h1 class="text-lg text-center font-bold mb-6 text-gray-500">We Are Here</h1>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d4860.215876260537!2d-0.14980352728965599!3d51.50733437464766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2ssg!4v1697341052012!5m2!1sen!2ssg" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="mt-6 min-w-fit text-sm text-gray-500">
                <div><i class="fa-solid fa-location-dot"></i> Global Wild Swimming and Camping, United Kingdom</div>
                <div><i class="fa-solid fa-phone"></i> +01-12345678</div>
                <div><i class="fa-solid fa-envelope"></i> support@gwsc.com</div>
            </div>
        </div>
    <?php endif ?>
    <div class="mx-auto max-w-7xl px-6 py-12 flex-col md:flex items-center justify-center">
        <p class="text-center text-xs leading-5 text-gray-500">&copy; 2023 Global Wild Swimming and Camping, Inc. All rights reserved.</p>
        <div class="flex space-x-6 mt-2 justify-center">
            <a href="#" class="text-gray-400 hover:text-gray-500">
                <span class="sr-only">Facebook</span>
                <i class="fa-brands fa-square-facebook text-2xl"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-gray-500">
                <span class="sr-only">Instagram</span>
                <i class="fa-brands fa-square-instagram text-2xl"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-gray-500">
                <span class="sr-only">Twitter</span>
                <i class="fa-brands fa-square-twitter text-2xl"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-gray-500">
                <span class="sr-only">YouTube</span>
                <i class="fa-brands fa-square-YouTube text-2xl"></i>
            </a>
        </div>
    </div>
</footer>
<script src="<?php echo publicPath("js/jquery.js") ?>"></script>
<script src="<?php echo publicPath("js/slick.min.js") ?>"></script>
<script>
    $(document).ready(function() {
        $('.slider').slick({
            adaptiveHeight: false,
            arrows: true,
            dots: true,
            autoplay: true,
            adaptiveHeight: true,
            mobileFirst: true
        });
    });

    function showMobileNav() {
        document.querySelector("#mobile_nav").setAttribute("class", "block");
    }

    function hideMobileNav() {
        document.querySelector("#mobile_nav").setAttribute("class", "hidden");
    }
</script>

</html>