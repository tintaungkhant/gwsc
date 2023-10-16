<?php
view("admin.layout.header");
?>

<div>
    <div class="sm:flex sm:items-center mb-4">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Create Admin</h1>
        </div>
    </div>
    <?php echo showErrorBlock()?>
    <div class="flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden p-4 shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                    <form action="/admin/admins/store" method="POST">
                        <div class="mb-3">
                            <label for="AdminUsername" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                            <div class="mt-2">
                                <input type="text" name="AdminUsername" id="AdminUsername" class="input-box">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="AdminPassword" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                            <div class="mt-2">
                                <input type="password" name="AdminPassword" id="AdminPassword" class="input-box">
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn-default">Create Admin</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
view("admin.layout.footer");
?>