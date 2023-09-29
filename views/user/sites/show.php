<?php

view("user.layout.header");
?>

<div>
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Homepage</h1>
        </div>
    </div>
    <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="flex flex-col p-8">
                    <img class="mx-auto w-full flex-shrink-0 rounded" src="<?php echo $site["SiteImage"]?>" alt="">
                    <h3 class="mt-6 text-lg font-medium text-gray-900"><?php echo $site["SiteName"] ?></h3>
                    <div class="mt-1 flex flex-grow flex-col justify-between">
                        <p class="text-sm text-gray-500">
                            <?php echo $site["SiteDescription"] ?>
                        </p>
                        <div class="mt-6">
                            <h4 class="text-md font-medium text-gray-900">Features</h4>
                            <ul class="list-disc">
                                <?php foreach ($site["features"] as $feature) : ?>
                                    <li><?php echo $feature["FeatureName"] ?></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                        <div class="mt-6">
                            <h4 class="text-md font-medium text-gray-900">Local Attractions</h4>
                            <div class="flex flex-wrap justify-between">
                                <?php foreach ($site["local_attractions"] as $local_attraction) : ?>
                                    <a href="#" class="flex flex-col p-8 rounded hover:shadow hover:bg-gray-50 w-full md:w-1/2">
                                        <img class="mx-auto w-full flex-shrink-0 rounded" src="<?php echo $local_attraction["LocalAttractionImage"]?>" alt="">
                                        <h3 class="mt-6 text-sm font-medium text-gray-900"><?php $local_attraction["LocalAttractionName"] ?></h3>
                                        <div class="mt-1 flex flex-grow flex-col justify-between">
                                            <div class="sr-only">Title</div>
                                            <p class="text-sm text-gray-500">
                                                <?php echo truncateLongText($local_attraction["LocalAttractionDescription"]) ?>
                                            </p>
                                        </div>
                                    </a>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <div class="mt-6">
                            <h4 class="text-md font-medium text-gray-900">Reviews</h4>
                            <ul role="list" class="divide-y divide-gray-100">
                                <li class="flex justify-between gap-x-6 py-5">
                                    <div class="flex min-w-0 gap-x-4">
                                        <div class="min-w-0 flex-auto">
                                            <p class="text-sm font-semibold leading-6 text-gray-900">Leslie Alexander</p>
                                            <p class="mt-1 text-xs leading-5 text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur ipsum enim impedit corrupti expedita nostrum modi delectus, laboriosam ad placeat adipisci temporibus iste quidem! Voluptatum velit quis tenetur sint atque?</p>
                                        </div>
                                    </div>
                                    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                        <p class="mt-1 text-xs leading-5 text-gray-500">Last seen <time datetime="2023-01-23T13:23Z">3h ago</time></p>
                                    </div>
                                </li>
                                <li class="flex justify-between gap-x-6 py-5">
                                    <div class="flex min-w-0 gap-x-4">
                                        <div class="min-w-0 flex-auto">
                                            <p class="text-sm font-semibold leading-6 text-gray-900">Leslie Alexander</p>
                                            <p class="mt-1 text-xs leading-5 text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur ipsum enim impedit corrupti expedita nostrum modi delectus, laboriosam ad placeat adipisci temporibus iste quidem! Voluptatum velit quis tenetur sint atque?</p>
                                        </div>
                                    </div>
                                    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                        <p class="mt-1 text-xs leading-5 text-gray-500">Last seen <time datetime="2023-01-23T13:23Z">3h ago</time></p>
                                    </div>
                                </li>
                            </ul>
                            <form action="/admin/sites/store" method="POST">
                                <div class="mb-3">
                                    <textarea rows="4" name="SiteDescription" id="SiteDescription" placeholder="What's on your mind?" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                                </div>
                                <div>
                                    <button class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
view("user.layout.header");
?>