<?php

view("admin.layout.header");
?>

<div>
    <div class="sm:flex sm:items-center mb-4">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Homepage</h1>
        </div>
    </div>
    <div class="flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                Welcome <?php echo authAdmin()["AdminUsername"] ?>!
            </div>
        </div>
    </div>
</div>

<?php
view("admin.layout.footer");
?>