<?php
view("user.layout.header");
?>

<div>
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Login</h1>
        </div>
    </div>
    <?php echo showErrorBlock() ?>
    <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden p-4 shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                    <form action="/post-login" method="POST">
                        <div class="mb-3">
                            <label for="UserEmail" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                            <div class="mt-2">
                                <input type="email" name="UserEmail" id="UserEmail" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="UserPassword" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                            <div class="mt-2">
                                <input type="password" name="UserPassword" id="UserPassword" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Login</button>
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