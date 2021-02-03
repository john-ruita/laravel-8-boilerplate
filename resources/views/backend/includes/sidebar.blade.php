<aside class="main-sidebar sidebar-dark-primary elevation-0">
    <a href="{{ route(homeRoute()) }}" class="brand-link">
        <i class="fas fa-globe-africa brand-image" style="float: none"></i>
        {{--<img src="" alt="logo" class="brand-image img-circle elevation-3" style="opacity: .8">--}}
        <span class="brand-text font-weight-light">{{ appName() }}</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ $logged_in_user->avatar }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ $logged_in_user->name }}</a>
            </div>
        </div>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header py-1">@lang('General')</li>
            <li class="nav-item">
                <x-utils.link
                    class="nav-link"
                    :href="route('admin.dashboard')"
                    :active="activeClass(Route::is('admin.dashboard'), 'active')"
                    icon="nav-icon fas fa-tachometer-alt"
                    :text="__('Dashboard')" />
            </li>
            @if (
                $logged_in_user->hasAllAccess() ||
                (
                    $logged_in_user->can('admin.access.user.list') ||
                    $logged_in_user->can('admin.access.user.deactivate') ||
                    $logged_in_user->can('admin.access.user.reactivate') ||
                    $logged_in_user->can('admin.access.user.clear-session') ||
                    $logged_in_user->can('admin.access.user.impersonate') ||
                    $logged_in_user->can('admin.access.user.change-password')
                )
            )
                <li class="nav-header py-1 pl-2">@lang('System')</li>

                <li class="nav-item has-treeview {{ activeClass(Route::is('admin.auth.user.*') || Route::is('admin.auth.role.*'), 'menu-open') }}">
                    <x-utils.link
                        href="#"
                        icon="nav-icon fas fa-users"
                        class="nav-link"
                        :active="activeClass(Route::is('admin.auth.user.*') || Route::is('admin.auth.role.*'))"
                        :text="__('Access')" />

                    <ul class="nav nav-treeview" style="display: {{ activeClass(Route::is('admin.auth.user.*') || Route::is('admin.auth.role.*'), 'block', 'none') }};">
                        @if (
                            $logged_in_user->hasAllAccess() ||
                            (
                                $logged_in_user->can('admin.access.user.list') ||
                                $logged_in_user->can('admin.access.user.deactivate') ||
                                $logged_in_user->can('admin.access.user.reactivate') ||
                                $logged_in_user->can('admin.access.user.clear-session') ||
                                $logged_in_user->can('admin.access.user.impersonate') ||
                                $logged_in_user->can('admin.access.user.change-password')
                            )
                        )
                            <li class="nav-item">
                                <x-utils.link
                                    :href="route('admin.auth.user.index')"
                                    class="nav-link"
                                    :text="__('User Management')"
                                    :active="activeClass(Route::is('admin.auth.user.*'), 'active')"
                                    icon="nav-icon fas fa-circle" />
                            </li>
                        @endif

                        @if ($logged_in_user->hasAllAccess())
                            <li class="nav-item">
                                <x-utils.link
                                    :href="route('admin.auth.role.index')"
                                    class="nav-link"
                                    :text="__('Role Management')"
                                    :active="activeClass(Route::is('admin.auth.role.*'), 'active')"
                                    icon="nav-icon fas fa-circle" />
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            @if ($logged_in_user->hasAllAccess())
                <li class="nav-item has-treeview {{ activeClass(Route::is('log-viewer::dashboard') || Route::is('log-viewer::logs.*'), 'menu-open') }}">
                    <x-utils.link
                        href="#"
                        icon="nav-icon fas fa-clipboard"
                        class="nav-link"
                        :active="activeClass(Route::is('log-viewer::dashboard') || Route::is('log-viewer::logs.*'))"
                        :text="__('Logs')" />

                    <ul class="nav nav-treeview" style="display: {{ activeClass(Route::is('log-viewer::dashboard') || Route::is('log-viewer::logs.*'), 'block', 'none') }};">
                        <li class="nav-item">
                            <x-utils.link
                                :href="route('log-viewer::dashboard')"
                                class="nav-link"
                                :text="__('Dashboard')"
                                :active="activeClass(Route::is('log-viewer::dashboard'))"
                                icon="nav-icon fas fa-circle"/>
                        </li>
                        <li class="nav-item">
                            <x-utils.link
                                :href="route('log-viewer::logs.list')"
                                class="nav-link"
                                :text="__('Logs')"
                                :active="activeClass(Route::is('log-viewer::logs.*'))"
                                icon="nav-icon fas fa-circle"/>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</aside><!--sidebar-->
