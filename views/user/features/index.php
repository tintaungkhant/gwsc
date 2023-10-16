<?php

view("user.layout.header");
?>

<div>
    <div class="flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <?php foreach ($features as $feature) : ?>
                    <div class="mb-3">
                        <div class="flex items-center">
                            <div class="text-2xl mr-2 text-gray-600"><?php echo $feature["FeatureIcon"] ?></div>
                            <h1 class="text-base font-medium"><?php echo $feature["FeatureName"] ?></h1>
                        </div>
                        <p class="text-sm"><?php echo $feature["FeatureDescription"] ?></p>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>

<?php
view("user.layout.footer");
?>