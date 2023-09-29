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
                <form action="/admin/sites/store" method="POST">
                    <div class="mb-3">
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 flex items-center">
                                <label for="country" class="sr-only">Country</label>
                                <select id="country" name="country" autocomplete="country" class="h-full rounded-md border-0 bg-transparent py-0 pl-3 pr-7 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm">
                                    <option>Cravan Pitch</option>
                                    <option>Motorhome Pitch</option>
                                    <option>Tent Pitch</option>
                                </select>
                            </div>
                            <input type="text" name="phone-number" id="phone-number" class="block w-full rounded-md border-0 py-1.5 pl-40 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Campsite name">
                        </div>
                    </div>
                    <button class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Search</button>
                </form>
                <div class="flex flex-wrap justify-between">
                    <a href="#" class="flex flex-col p-8 rounded hover:shadow hover:bg-gray-50 w-full md:w-1/2">
                        <img class="mx-auto w-full flex-shrink-0 rounded" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=512&h=512&q=60" alt="">
                        <h3 class="mt-6 text-sm font-medium text-gray-900">Jane Cooper</h3>
                        <div class="mt-1 flex flex-grow flex-col justify-between">
                            <div class="sr-only">Title</div>
                            <p class="text-sm text-gray-500">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam nisi neque earum qui fugiat asperiores eum eveniet reprehenderit. Blanditiis laudantium odio repellat corrupti optio excepturi illum deserunt eos illo consectetur?
                            </p>
                        </div>
                    </a>
                    <a href="#" class="flex flex-col p-8 rounded hover:shadow hover:bg-gray-50 w-full md:w-1/2">
                        <img class="mx-auto w-full flex-shrink-0 rounded" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=512&h=512&q=60" alt="">
                        <h3 class="mt-6 text-sm font-medium text-gray-900">Jane Cooper</h3>
                        <div class="mt-1 flex flex-grow flex-col justify-between">
                            <div class="sr-only">Title</div>
                            <p class="text-sm text-gray-500">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam nisi neque earum qui fugiat asperiores eum eveniet reprehenderit. Blanditiis laudantium odio repellat corrupti optio excepturi illum deserunt eos illo consectetur?
                            </p>
                        </div>
                    </a>
                    <a href="#" class="flex flex-col p-8 rounded hover:shadow hover:bg-gray-50 w-full md:w-1/2">
                        <img class="mx-auto w-full flex-shrink-0 rounded" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=512&h=512&q=60" alt="">
                        <h3 class="mt-6 text-sm font-medium text-gray-900">Jane Cooper</h3>
                        <div class="mt-1 flex flex-grow flex-col justify-between">
                            <div class="sr-only">Title</div>
                            <p class="text-sm text-gray-500">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam nisi neque earum qui fugiat asperiores eum eveniet reprehenderit. Blanditiis laudantium odio repellat corrupti optio excepturi illum deserunt eos illo consectetur?
                            </p>
                        </div>
                    </a>
                    <a href="#" class="flex flex-col p-8 rounded hover:shadow hover:bg-gray-50 w-full md:w-1/2">
                        <img class="mx-auto w-full flex-shrink-0 rounded" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=512&h=512&q=60" alt="">
                        <h3 class="mt-6 text-sm font-medium text-gray-900">Jane Cooper</h3>
                        <div class="mt-1 flex flex-grow flex-col justify-between">
                            <div class="sr-only">Title</div>
                            <p class="text-sm text-gray-500">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam nisi neque earum qui fugiat asperiores eum eveniet reprehenderit. Blanditiis laudantium odio repellat corrupti optio excepturi illum deserunt eos illo consectetur?
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
view("user.layout.header");
?>