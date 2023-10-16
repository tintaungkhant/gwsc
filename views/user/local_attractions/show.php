<?php

view("user.layout.header");
?>

<div>
    <div class="sm:flex sm:items-center mb-4">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Local Attraction</h1>
        </div>
    </div>
    <div class="flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="flex flex-col p-8">
                    <img class="mx-auto w-full flex-shrink-0 rounded" src="/<?php echo $local_attraction["LocalAttractionImage"] ?>" alt="">
                    <h3 class="mt-6 text-lg font-medium text-gray-900"><?php echo $local_attraction["LocalAttractionName"] ?></h3>
                    <div class="mt-1 flex flex-grow flex-col justify-between">
                        <p class="text-sm text-gray-500">
                            <?php echo $local_attraction["LocalAttractionDescription"] ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
view("user.layout.footer");
?>