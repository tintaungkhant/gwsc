<?php
view("user.layout.header");
?>

<div>
    <div class="sm:flex sm:items-center mb-4">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Login</h1>
        </div>
    </div>
    <?php echo showErrorBlock() ?>
    <div class="flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden p-4 shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                    <form action="/post-login" method="POST">
                        <div class="mb-3">
                            <label for="UserEmail" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                            <div class="mt-2">
                                <input type="email" name="UserEmail" id="UserEmail" class="input-box" value="jeffreysarnold@teleworm.us">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="UserPassword" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                            <div class="mt-2">
                                <input type="password" name="UserPassword" id="UserPassword" class="input-box" value="password">
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn-default">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
view("user.layout.footer");
?>