<div class="main_layout h-screen flex" x-data="{ sidebarOpen: false }" @keydown.window.escape="sidebarOpen = false"
    id="main-sidebar">

    @if ($settings && $settings->enable_client_portal)
        <!-- Off-canvas menu for mobile -->
        @include('portal.ninja2020.components.general.sidebar.mobile')

        <!-- Static sidebar for desktop -->
        @unless (request()->query('sidebar') === 'hidden')
            @include('portal.ninja2020.components.general.sidebar.desktop')
        @endunless
    @endif

    <div class="flex flex-col w-0 flex-1 p-8">
        @if ($settings && $settings->enable_client_portal)
            @include('portal.ninja2020.components.general.sidebar.header')
        @endif

        <main class="relative z-0 pt-6 focus:outline-none" tabindex="0" x-data x-init="$el.focus()">

            <div class="mx-auto">
                @yield('header')
            </div>

            <div class="mx-auto">
                <div class="">
                    @includeWhen(session()->has('success'),
                        'portal.ninja2020.components.general.messages.success')

                    {{ $slot }}
                </div>
            </div>
        </main>
        @include('portal.ninja2020.components.general.footer')
    </div>
</div>

<script></script>
