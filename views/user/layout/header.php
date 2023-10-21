<html>

<head>
    <title>GWSC - Global Wild Swimming and Camping</title>

    <meta name="description" content="Explore the beauty of wild swimming and camping with GWSC. Discover breathtaking destinations and unforgettable adventures.">
    <meta name="keywords" content="wild swimming, camping, outdoor adventures, eco-friendly, nature enthusiasts">
    <meta name="author" content="Tint Aung Khant">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="https://www.gwsc.com">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo publicPath("css/slick-theme.css") ?>">
    <link rel="stylesheet" href="<?php echo publicPath("css/slick.css") ?>">
    <link rel="stylesheet" href="<?php echo publicPath("css/style.css") ?>">
    <link rel="stylesheet" href="<?php echo publicPath("css/custom.css") ?>">
</head>
<header class="bg-white">
    <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
        <a href="<?php echo route("") ?>" class="-m-1.5 p-1.5 flex items-center">
            <img class="h-8 w-auto" src="<?php echo publicPath("/images/logo.png") ?>" alt="">
            <h1 class="font-medium text-lg">GWSC</h1>
        </a>
        <div class="flex lg:hidden">
            <button type="button" onclick="showMobileNav()" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
        <div class="hidden lg:flex lg:gap-x-12">
            <a href="<?php echo route("sites") ?>" class="text-sm font-semibold leading-6 text-gray-900">Sites</a>
            <a href="<?php echo route("contact") ?>" class="text-sm font-semibold leading-6 text-gray-900">Contact Us</a>
            <a href="<?php echo route("privacy-policy") ?>" class="text-sm font-semibold leading-6 text-gray-900">Privacy Policy</a>
            <a href="<?php echo route("rss-feeds") ?>" class="text-sm font-semibold leading-6 text-gray-900">Rss Feed</a>
            <?php if (authUser()) : ?>
                <a href="<?php echo route("logout") ?>" class="text-sm font-semibold leading-6 text-gray-900">Logout</a>
            <?php else : ?>
                <a href="<?php echo route("login") ?>" class="text-sm font-semibold leading-6 text-gray-900">Log in <span aria-hidden="true">&rarr;</span></a>
                <a href="<?php echo route("register") ?>" class="text-sm font-semibold leading-6 text-gray-900">Register<span aria-hidden="true">&rarr;</span></a>
            <?php endif ?>
        </div>
    </nav>
    <!-- Mobile menu, show/hide based on menu open state. -->
    <div class="hidden" id="mobile_nav" role="dialog" aria-modal="true">
        <!-- Background backdrop, show/hide based on slide-over state. -->
        <div class="fixed inset-0 z-10"></div>
        <div class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
            <div class="flex items-center justify-between">
                <a href="<?php echo route("") ?>" class="-m-1.5 p-1.5 flex items-center">
                    <img class="h-8 w-auto" src="<?php echo publicPath("/images/logo.png") ?>" alt="">
                    <h1 class="font-medium text-lg">GWSC</h1>
                </a>
                <button type="button" onclick="hideMobileNav()" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="mt-6 flow-root">
                <div class="-my-6 divide-y divide-gray-500/10">
                    <div class="space-y-2 py-6">
                        <a href="<?php echo route("sites") ?>" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Sites</a>
                        <a href="<?php echo route("contact") ?>" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Contact Us</a>
                        <a href="<?php echo route("privacy-policy") ?>" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Privacy Policy</a>
                        <a href="<?php echo route("rss-feeds") ?>" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">RSS feed</a>
                        <?php if (authUser()) : ?>
                            <a href="<?php echo route("logout") ?>" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Logout</a>
                        <?php endif ?>
                    </div>
                    <?php if (!authUser()) : ?>
                        <div class="py-6">
                            <a href="<?php echo route("login") ?>" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Log in</a>
                            <a href="<?php echo route("register") ?>" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Register</a>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</header>

<body class="bg-white">
    <div class="mx-auto max-w-7xl px-6 py-12 lg:px-8">
        <div class="px-4 sm:px-6 lg:px-8">