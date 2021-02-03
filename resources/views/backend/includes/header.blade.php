<header class="main-header navbar navbar-expand navbar-white navbar-light rounded-0">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">@lang('Dashboard')</a>
        </li>
        @if(config('boilerplate.locale.status') && count(config('boilerplate.locale.languages')) > 1)
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link" id="navbarDropdownLanguageLink" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="d-md-down-none">@lang('Language') ({{ strtoupper(__(getLocaleName(app()->getLocale()))) }})</span>
                </a>

                @include('includes.partials.lang')
            </li>
        @endif
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <div class="user-panel d-flex" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <div class="image">
                    <img src="{{ $logged_in_user->avatar }}" class="img-circle" alt="{{ $logged_in_user->name }}">
                </div>
                <div class="info">
                    {{ $logged_in_user->name }}
                </div>
            </div>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-header">
                    <img src="{{ $logged_in_user->avatar }}" class="img-circle d-block mx-auto" alt="{{ $logged_in_user->name }}">
                    <span class="text-center d-block">{{ $logged_in_user->name }}</span>
                    <span class="text-center d-block">Joined {{ $logged_in_user->created_at->diffForHumans() }}</span>
                </span>
                <div class="dropdown-divider"></div>
                <span class="dropdown-footer d-flex justify-content-between">
                    <a href="{{ url('/') }}" class="btn btn-primary">Home</a>
                    <x-utils.link
                        class="btn btn-default"
                        icon="fas fa-logout"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <x-slot name="text">
                            @lang('Logout')
                            <x-forms.post :action="route('frontend.auth.logout')" id="logout-form" class="d-none" />
                        </x-slot>
                </x-utils.link>
                </span>
            </div>
        </li>
    </ul>
</header>
