<div class=" bg-white  shadow-md text-gray-500 h-screen p-5 pt-5 relative transition-all duration-500 dark:bg-gray-900 dark:text-slate-100" x-data="{ open: true, sub:false}"  :class="open ? 'w-72' : 'w-20'">

    <i  @click="open = ! open" :class="open ? '' : 'rotate-180'"
          class="ri-arrow-left-fill text-2xl px-1 bg-white text-gray-700 rounded-full absolute -right-4 top-5 border border-gray-700 dark:bg-gray-900 dark:border-white dark:text-white cursor-pointer">
    </i>

    <div class="inline-flex">
        <img :class="open ? 'rotate-[360deg]' : 'rotate-0'" class="w-8 mr-2 duration-500"  src="/logo.png" alt="kunjol Logo">
        <h2 x-show="open" class="text-xl font-bold transition duration-300">Kunjol Fashion </h2>
    </div>

    <ul class="pt-2">
        <x-side-nav-list  href="{{ route(getenv('ADMIN_BASE_NAME').'.dashboard') }}" class="{{ request()->routeIs(getenv('ADMIN_BASE_NAME').'.dashboard') ? ' bg-slate-400':'' }}"  txt="Dashboard" iconL="ri-dashboard-fill text-2xl float-left block" />

       {{-- sub menu start --}}
       <div  x-data="{sub:false}">
        <x-side-nav-list  class=""  txt="Products" iconL="ri-box-3-fill" iconR="ri-arrow-drop-down-line text-2xl block" @click="sub = ! sub"      ::class="sub==true && open==true ? 'bg-slate-200 dark:bg-gray-700 pb-5' : ''" />

        <ul x-show="sub" x-init=" {{ request()->routeIs(getenv('ADMIN_BASE_NAME').'.product.*') ? 'sub=true':'' }} "  x-transition:enter.duration.500ms x-transition:leave.duration.400ms  :class="sub?'bg-slate-200 dark:bg-gray-700 -mt-3':''">

            <x-side-nav-list  x-show="open" href="{{ route(getenv('ADMIN_BASE_NAME').'.product.products') }}" class="px-5 {{ request()->routeIs(getenv('ADMIN_BASE_NAME').'.product.products') ? ' bg-slate-400':'' }}"  txt="Products List" iconL="ri-circle-line" />

            <x-side-nav-list x-show="open" href="{{ route(getenv('ADMIN_BASE_NAME').'.product.create') }}" class="px-5 {{ request()->routeIs(getenv('ADMIN_BASE_NAME').'.product.create') ? ' bg-slate-400':'' }}"  txt="Add Product" iconL="ri-circle-line" />

        </ul>
      </div>
       {{-- sub menu end --}}

       <x-side-nav-list href="{{ route(getenv('ADMIN_BASE_NAME').'.category.category') }}" class="{{ request()->routeIs(getenv('ADMIN_BASE_NAME').'.category.category') ? ' bg-slate-400':'' }}"    txt="Categories" iconL="ri-pages-fill float-left block" />

       <x-side-nav-list  href="{{ route(getenv('ADMIN_BASE_NAME').'.brand.brand') }}" class="{{ request()->routeIs(getenv('ADMIN_BASE_NAME').'.brand.brand') ? ' bg-slate-400':'' }}"   txt="Brands" iconL="ri-price-tag-3-line  float-left block" />

       {{-- sub menu start --}}

       <div  x-data="{sub:false}">
            <x-side-nav-list    txt="Users" iconL="ri-group-fill" iconR="ri-arrow-drop-down-line text-2xl block" @click="sub = ! sub"    ::class="sub==true && open==true ? 'bg-slate-200 dark:bg-gray-700 pb-5' : ''" />

            <ul x-show="sub" x-init=" {{ request()->routeIs(getenv('ADMIN_BASE_NAME').'.user.*') ? 'sub=true':'' }} " x-transition:enter.duration.500ms x-transition:leave.duration.400ms  :class="sub?'bg-slate-200 dark:bg-gray-700 -mt-3':''">

                <x-side-nav-list x-show="open" href="{{ route(getenv('ADMIN_BASE_NAME').'.user.users') }}" class="px-5 {{ request()->routeIs(getenv('ADMIN_BASE_NAME').'.user.users') ? ' bg-slate-400':'' }}"   txt="Users List" iconL="ri-circle-line" />

                <x-side-nav-list x-show="open" href="{{ route(getenv('ADMIN_BASE_NAME').'.user.create') }}" class="px-5 {{ request()->routeIs(getenv('ADMIN_BASE_NAME').'.user.create') ? ' bg-slate-400':'' }}"  txt="Add User" iconL="ri-circle-line" />
            </ul>
       </div>
       {{-- sub menu end --}}


        {{-- sub menu start --}}
        <div  x-data="{sub:false}">
            <x-side-nav-list    txt="Role" iconL="ri-git-repository-private-fill" iconR="ri-arrow-drop-down-line text-2xl block" @click="sub = ! sub"    ::class="sub==true && open==true ? 'bg-slate-200 dark:bg-gray-700 pb-5' : ''" />

            <ul x-show="sub" x-init=" {{ request()->routeIs(getenv('ADMIN_BASE_NAME').'.role.*') ? 'sub=true':'' }} " x-transition:enter.duration.500ms x-transition:leave.duration.400ms  :class="sub?'bg-slate-200 dark:bg-gray-700 -mt-3':''">

                <x-side-nav-list href="{{ route(getenv('ADMIN_BASE_NAME').'.role.role') }}" class="px-5 {{ request()->routeIs(getenv('ADMIN_BASE_NAME').'.role.role') ? ' bg-slate-400':'' }}" x-show="open"  txt="Role List" iconL="ri-circle-line" />
            </ul>
       </div>
       {{-- sub menu end --}}


       {{-- sub menu start --}}
       <div  x-data="{sub:false}">
        <x-side-nav-list    txt="Permissions" iconL="ri-rotate-lock-line" iconR="ri-arrow-drop-down-line text-2xl block" @click="sub = ! sub"    ::class="sub==true && open==true ? 'bg-slate-200 dark:bg-gray-700 pb-5' : ''" />

        <ul x-show="sub" x-init=" {{ request()->routeIs(getenv('ADMIN_BASE_NAME').'.permission.*') ? 'sub=true':'' }} " x-transition:enter.duration.500ms x-transition:leave.duration.400ms  :class="sub?'bg-slate-200 dark:bg-gray-700 -mt-3':''">

            <x-side-nav-list x-show="open" href="{{ route(getenv('ADMIN_BASE_NAME').'.permission.permission') }}" class="px-5 {{ request()->routeIs(getenv('ADMIN_BASE_NAME').'.permission.permission') ? ' bg-slate-400':'' }}"  txt="Permission List" iconL="ri-circle-line" />
        </ul>
     </div>
   {{-- sub menu end --}}


       <x-side-nav-list href="{{ route(getenv('ADMIN_BASE_NAME').'.logout') }}"   txt="Logout" iconL="ri-login-circle-line text-2xl float-left block" />


    </ul>
</div>
