<?php

view("user.layout.header");
?>

<div>
    <div class="rounded-md bg-green-50 p-4">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <i class="fa-regular fa-circle-check text-lg text-green-800"></i>
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium text-green-800">We have received your ticket. We will contact you ASAP.</p>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <a href="<?php echo route("sites") ?>" class="btn-default">Explore Sites</a>
    </div>
</div>

<?php
view("user.layout.footer");
?>