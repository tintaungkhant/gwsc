<?php

view("user.layout.header");
?>

<div>
    <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="flex flex-wrap justify-between">
                    <?php foreach($sites as $site): ?>
                    <a href="/sites/<?php echo $site["SiteID"] ?>" class="flex flex-col p-8 rounded hover:shadow hover:bg-gray-50 w-full md:w-1/2">
                        <img class="mx-auto w-full flex-shrink-0 rounded" src="<?php echo $site["SiteImage"] ?>" alt="">
                        <h3 class="mt-6 text-sm font-medium text-gray-900"><?php echo $site["SiteName"] ?> (<?php echo $site["PitchTypeName"] ?>)</h3>
                        <div class="mt-1 flex flex-grow flex-col justify-between">
                            <div class="sr-only">Title</div>
                            <p class="text-sm text-gray-500">
                                <?php echo truncateLongText($site["SiteDescription"]) ?>
                            </p>
                        </div>
                    </a>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
view("user.layout.header");
?>