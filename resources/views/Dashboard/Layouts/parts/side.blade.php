@use('App\Enums\Permission')
@use('App\Enums\Role')
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand" href="{{ route('dashboard.tasks.index') }}"><span
                        class="brand-logo">
                        </span>
                    <h2 class="brand-text">{{ ('Task Manager') }}</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i
                        class="d-block d-xl-none text-white toggle-icon font-medium-4" data-feather="x-circle"></i><i
                        class="d-none d-xl-block collapse-toggle-icon font-medium-4 text-white" data-feather="disc"
                        data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <x-side.naveItem name="Tasks"  data_fether="shopping-bag">
                <x-side.menuContent name="All Tasks"
                    routeName="dashboard.tasks.index" />
                    <x-side.menuContent name="Add Task" routeName="dashboard.tasks.create" />
                </x-side.naveItem>
            <x-side.naveItem name="Users"  data_fether="shopping-bag">
                <x-side.menuContent name="All Users"
                    routeName="dashboard.users.index" />
                    <x-side.menuContent name="Add User" routeName="dashboard.users.create" />
                </x-side.naveItem>
                {{--
                <x-side.naveItem name="Products"  data_fether="layers">
                    <x-side.menuContent name="All Products"
                        routeName="dashboard.products.index" />
                        <x-side.menuContent name="Products Archived" permission="{{ Permission::PRODUCT_VIEW->value }}"
                            routeName="dashboard.products.index.archived" />
                        <x-side.menuContent name="Add Product" permission="{{ Permission::PRODUCT_CREATE->value }}"
                            routeName="dashboard.products.create" />
                        </x-side.naveItem>



            <x-side.naveItem name="Categories" permission="{{ Permission::CATEGORY->value }}" data_fether="tag">
                <x-side.menuContent name="All Categories" permission="{{ Permission::CATEGORY_VIEW->value }}"
                    routeName="dashboard.categories.index" />
                <x-side.menuContent name="Add Category" permission="{{ Permission::CATEGORY_CREATE->value }}"
                    routeName="dashboard.categories.create" />
            </x-side.naveItem>

            <x-side.naveItem name="Banners" permission="{{ Permission::BANNER->value }}" data_fether="flag">
                <x-side.menuContent name="All Banners" permission="{{ Permission::BANNER_VIEW->value }}"
                    routeName="dashboard.banners.index" />
                <x-side.menuContent name="Add Banner" permission="{{ Permission::BANNER_CREATE->value }}"
                    routeName="dashboard.banners.create" />
            </x-side.naveItem>

            <x-side.naveItem name="Offers" permission="{{ Permission::OFFERS->value }}" data_fether="gift">
                <x-side.menuContent name="All Offers" permission="{{ Permission::OFFER_VIEW->value }}"
                    routeName="dashboard.offers.index" />
                <x-side.menuContent name="Add offer" permission="{{ Permission::OFFER_CREATE->value }}"
                    routeName="dashboard.offers.create" />
            </x-side.naveItem>

            <x-side.naveItem name="Coupons" permission="{{ Permission::COUPONS->value }}" data_fether="percent">
                <x-side.menuContent name="All coupons" permission="{{ Permission::COUPON_VIEW->value }}"
                    routeName="dashboard.coupons.index" />
                <x-side.menuContent name="Add coupon" permission="{{ Permission::COUPON_CREATE->value }}"
                    routeName="dashboard.coupons.create" />
            </x-side.naveItem>

            <x-side.naveItem name="Sellers" permission="{{ Permission::SELLER->value }}" data_fether="user-check">

                <x-side.menuContent name="All Sellers" permission="{{ Permission::ALL_SELLER_VIEW->value }}"
                    routeName="dashboard.sellers.index" />
                @cannot(Permission::ALL_SELLER_VIEW->value)
                    <x-side.menuContent name="Verified Sellers" permission="{{ Permission::VERIFIED_SELLER_VIEW->value }}"
                        routeName="dashboard.sellers.verified" />
                    <x-side.menuContent name="Pending Sellers" permission="{{ Permission::UNVERIFIED_SELLER_VIEW->value }}"
                        routeName="dashboard.sellers.pending" />
                    <x-side.menuContent name="Suspended Sellers"
                        permission="{{ Permission::SUSPENDED_SELLER_VIEW->value }}"
                        routeName="dashboard.sellers.suspended" />
                    <x-side.menuContent name="Rejected Sellers" permission="{{ Permission::REJECTED_SELLER_VIEW->value }}"
                        routeName="dashboard.sellers.rejected" />
                @endcannot
                <x-side.menuContent name="Add Seller" permission="{{ Permission::SELLER_CREATE->value }}"
                    routeName="dashboard.sellers.create" />
            </x-side.naveItem>

            <x-side.naveItem name="Users" permission="{{ Permission::USER->value }}" data_fether="users">
                <x-side.menuContent name="All users" permission="{{ Permission::USER_VIEW->value }}"
                    routeName="dashboard.users.index" />
                <x-side.menuContent name="Add user" permission="{{ Permission::USER_CREATE->value }}"
                    routeName="dashboard.users.create" />
            </x-side.naveItem>

            <x-side.naveItem name="Staffs" permission="{{ Permission::STAFF->value }}" data_fether="user-plus">
                <x-side.menuContent name="All staffs" permission="{{ Permission::STAFF_VIEW->value }}"
                    routeName="dashboard.staffs.index" />
                <x-side.menuContent name="Add staff" permission="{{ Permission::STAFF_CREATE->value }}"
                    routeName="dashboard.staffs.create" />
            </x-side.naveItem>

            <x-side.naveItem name="Withdraw Requests" permission="{{ Permission::WITHDRAW->value }}"
                data_fether="dollar-sign">
                <x-side.menuContent name="Pending Requests" permission="{{ Permission::WITHDRAW_PENDING->value }}"
                    routeName="dashboard.withdraw.requests.pending" />
                <x-side.menuContent name="Withdraws History" permission="{{ Permission::WITHDRAW_HISTORY->value }}"
                    routeName="dashboard.withdraw.requests.history" />
            </x-side.naveItem>

            {{-- <x-side.naveItem name="Orders" permission="{{ Permission::ORDERS->value }}" data_fether="shopping-cart">
                <x-side.menuContent name="All Orders" permission="{{ Permission::ORDERS_VIEW->value }}"
                    routeName="dashboard.orders.index" />
            </x-side.naveItem> --}}

          {{--
                data_fether="shopping-cart" routeName="dashboard.orders.index" />

            <x-side.naveSingelItem name="Messages" permission="{{ Permission::REPORT->value }}"
                data_fether="message-circle" routeName="dashboard.reports.index" />

            <x-side.naveSingelItem name="File Manager" permission="{{ Permission::FILES->value }}"
                data_fether="image" routeName="dashboard.files.index" />

            <x-side.naveSingelItem name="Variances" permission="{{ Permission::VARIANCE->value }}"
                data_fether="layers" routeName="dashboard.variances.index" />

            <x-side.naveSingelItem name="Tags" permission="{{ Permission::TAGS->value }}" data_fether="tag"
                routeName="dashboard.tags.index" />

            <x-side.naveSingelItem name="Roles & Permissions" permission="{{ Permission::ROLE->value }}"
                data_fether="shield" routeName="dashboard.roles.index" />

            <x-side.naveSingelItem name="Pages" permission="{{ Permission::PAGE->value }}" data_fether="bookmark"
                routeName="dashboard.pages.index" />

            <x-side.naveSingelItem name="Exports" permission="{{ Permission::EXPORT->value }}"
                data_fether="arrow-up-right" routeName="dashboard.exports.index" />

            <x-side.naveSingelItem name="Databse Backup" useRole="true" permission="{{ Role::SUPER_ADMIN->value }}"
                data_fether="copy" routeName="dashboard.backup.database" />

            <x-side.naveSingelItem name="New Stocks" permission="{{ Permission::NEW_STOCK->value }}"
                data_fether="plus-square" routeName="dashboard.newStocks.index" />

            <x-side.naveSingelItem name="Invoices" permission="{{ Permission::INVOICE->value }}" data_fether="file"
                routeName="dashboard.invoices.index" /> --}}

            {{-- <x-side.naveSingelItem name="versions" permission="{{ Permission::VERSION->value }}" data_fether="globe"
                routeName="dashboard.versions.index" /> --}}

        </ul>
    </div>
</div>
