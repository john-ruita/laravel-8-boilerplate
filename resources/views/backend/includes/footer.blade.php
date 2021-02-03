<footer class="main-footer">
    <div class="float-right">
        @lang('Made by')
        <x-utils.link href="https://eryxlabs.com" target="_blank" text="Eryxlabs" />
    </div>
    <div>
        <strong>
            @lang('Copyright') &copy; {{ date('Y') }}
            <x-utils.link :href="route(homeRoute())" target="_blank" :text="__(appName())" />
        </strong>

        @lang('All Rights Reserved')
    </div>
</footer>
