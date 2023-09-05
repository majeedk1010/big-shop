<nav class="bg-white border-gray-200 shadow-md dark:bg-gray-900 dark:border-gray-700 pl-10">
    <div class="w-full flex flex-wrap items-center justify-between mx-auto p-4">

        <div class="ml-10">
            <button id="darkMode">
                <i class="ri-moon-fill text-2xl -mt-4 text-gray-800"></i>
            </button>

            <button id="lightMode">
            <i class="ri-sun-fill text-2xl -mt-4 text-white"></i>
            </button>
        </div>

      <div class="w-full md:block md:w-auto">
        <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-900 md:dark:bg-gray-900 dark:border-gray-700">

          <li x-data="{open: false}"  class="relative">
              <button @click="open = ! open" class="flex items-center justify-between w-full py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-slate-200 md:p-0 md:w-28 dark:text-white  dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                   {{  Str::limit(Auth::user()->name, 7, '..') }}
                  <i  class="ri-arrow-drop-down-line float-right text-2xl ml-3 block" :class="open?' rotate-180':''"></i>
             </button>
              <!-- Dropdown menu -->
              <div x-show="open" x-transition @click.outside="open = false" class="z-10 absolute font-normal bg-white px-4 mt-6 -ml-10 divide-y divide-gray-100 rounded-lg shadow  dark:bg-gray-900 dark:divide-gray-600">
                  <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                    <li>
                      <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        <i class="ri-profile-line mr-1"></i> My Profile
                        </a>
                    </li>

                    <li class="flex">
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100  dark:hover:bg-gray-600 dark:hover:text-white">
                            <i class="ri-key-2-line"></i>  <span>Password</span>
                          </a>
                    </li>

                  </ul>
                  <div class="py-1">
                    <a href="{{ route(getenv('ADMIN_BASE_NAME').'.logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white"> <i class="ri-login-circle-line"></i> Logout</a>
                  </div>
              </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
