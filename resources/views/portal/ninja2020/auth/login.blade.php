@extends('portal.ninja2020.layout.clean')
@section('meta_title', ctrans('texts.login'))

@component('portal.ninja2020.components.test')
    <input type="hidden" id="test_email" value="{{ config('ninja.testvars.username') }}">
    <input type="hidden" id="test_password" value="{{ config('ninja.testvars.password') }}">
@endcomponent

@section('body')
    <div class="grid lg:grid-cols-2 h-screen">
        @if ($account && !$account->isPaid())
            <div class="bg-black text-center relative overflow-hidden">
                <div class="flex justify-center items-center h-full p-8 fixed lg:w-1/2 sm:text-2xl md:text-3xl text-white"
                    style="text-wrap: balance">Solo se llega más rápido pero acompañado se llega más lejos
                </div>
                <img src="{{ asset('images/client-portal-new-image.jpg') }}"
                    class="lg:w-1/2 h-screen object-cover fixed top-0 left-0 opacity-10" alt="Background image">
            </div>
        @endif

        <div class="flex flex-col gap-8 justify-center items-center py-16">
            <div>
                <img src="{{ $company->present()->logo() }}" class="mx-auto w-20 h-auto"
                    alt="{{ $company->present()->name() }} logo">
            </div>

            <div class="flex flex-col w-full px-8 sm:px-24">
                <h1 class="text-center text-4xl font-bold">{{ ctrans('texts.client_portal') }}</h1>

                <form action="{{ route('client.login') }}" method="post" class="mt-16 flex flex-col gap-8">
                    @csrf
                    <div class="flex flex-col relative">
                        <label for="email"
                            class="absolute top-2 left-4 text-gray-500 text-sm">{{ ctrans('texts.email_address') }}</label>
                        <input type="email" name="email" id="email"
                            class="w-full bg-gray-200 border-0 p-4 pt-8 transition duration-200 focus:outline-none focus:ring-4 focus:ring-purple-300"
                            value="{{ old('email') }}" autofocus>
                        @error('email')
                            <div class="text-red-700 text-sm font-semibold mt-2">
                                ▲ {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="flex flex-col relative">
                        <div class="absolute top-2 left-4 right-4 text-gray-500 text-sm flex items-center justify-between">
                            <label for="password" class="input-label">{{ ctrans('texts.password') }}</label>
                            <a class="text-xs text-purple-700 hover:text-black ease-in duration-100"
                                href="{{ route('client.password.request') }}">{{ trans('texts.forgot_password') }}</a>
                        </div>
                        @if (isset($company) && !is_null($company))
                            <input type="hidden" name="company_key" value="{{ $company->company_key }}">
                        @endif
                        <input type="password" name="password" id="password"
                            class="w-full bg-gray-200 border-0 p-4 pt-8 transition duration-200 focus:outline-none focus:ring-4 focus:ring-purple-300"
                            autofocus>
                        @error('password')
                            <div class="text-red-700 text-sm font-semibold mt-2">
                                ▲ {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-4 text-center group">
                        {{-- Tailwind 2 does not support "group" utility --}}
                        <button id="loginBtn"
                            class="min-w-1/2 text-center group-hover:border-4 text-white bg-black py-4 px-12 inline-flex justify-center gap-2 ring-0 rounded-full hover:ring hover:ring-black transition-all duration-300 scale-75">
                            {{ trans('texts.login') }}
                            <span class="relative right-0 top-[1px] duration-300 group-hover:-right-2"> ➝ </span>
                        </button>
                    </div>
                </form>

                @if (!is_null($company) && $company->client_can_register)
                    <div class="mt-5 text-center">
                        <a class="button-link text-sm"
                            href="{{ route('client.register') }}">{{ ctrans('texts.register_label') }}</a>
                    </div>
                @endif

                @if (!is_null($company) && !empty($company->present()->website()))
                    <div class="mt-5 text-center">
                        <a class="button-link text-sm" href="{{ $company->present()->website() }}">
                            {{ ctrans('texts.back_to', ['url' => parse_url($company->present()->website())['host'] ?? $company->present()->website()]) }}
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
