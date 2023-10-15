<?php

view("user.layout.header");
?>

<div>
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-lg font-semibold leading-6 text-gray-900">Features</h1>
        </div>
    </div>
    <div class="flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <?php foreach($features as $feature): ?>
                    <div class="mb-3">
                        <h1 class="text-base font-medium"><?php echo $feature["FeatureName"] ?></h1>
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