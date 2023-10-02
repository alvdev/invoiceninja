@extends('portal.ninja2020.layout.clean')
@section('meta_title', $title)

@section('body')
    <div class="grid lg:grid-cols-2 h-screen">
        @if ($account && !$account->isPaid())
            <div class="bg-black text-center relative overflow-hidden">
                <div class="flex justify-center items-center h-full p-8 fixed lg:w-1/2 sm:text-2xl md:text-3xl text-white"
                    style="text-wrap: balance">Solo se llega más rápido pero acompañado se llega más lejos
                </div>
                <img src="{{ asset('images/client-portal-new-image.jpg') }}"
                    class="lg:w-1/2 h-screen object-cover fixed top-0 left-0 opacity-10" alt="Background image"
                    alt="Background image">
            </div>
        @endif

        <div class="flex flex-col gap-8 justify-center items-center py-16">
            <div>
                <img src="{{ $company->present()->logo() }}" class="mx-auto w-20 h-auto"
                    alt="{{ $company->present()->name() }} logo">
            </div>

            <div class="flex flex-col w-full px-8 sm:px-24">
                <h1 class="text-center text-4xl font-bold">{{ ctrans('texts.password_recovery') }}</h1>
                <p class="text-center mt-1 text-gray-600">{{ ctrans('texts.reset_password_text') }}</p>
                @if (session('status'))
                    <div class="alert alert-success mt-4">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="{{ route($passwordEmailRoute) }}" method="post" class="mt-16 flex flex-col gap-8">
                    @csrf
                    <div class="flex flex-col relative">
                        <label for="email"
                            class="absolute top-2 left-4 text-gray-500 text-sm">{{ ctrans('texts.email_address') }}</label>
                        @if ($company && !is_null($company))
                            <input type="hidden" name="company_key" value="{{ $company->company_key }}">
                        @endif
                        <input type="email" name="email" id="email"
                            class="w-full bg-gray-200 border-0 p-4 pt-8 transition duration-200 focus:outline-none focus:ring-4 focus:ring-purple-300 uppercase"
                            value="{{ request()->query('email') ?? old('email') }}" autofocus required>
                        @error('email')
                            <div class="text-red-700 text-sm font-semibold mt-2">
                                ▲ {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-4 text-center group">
                        <button
                            class="min-w-1/2 text-center group-hover:border-4 text-white bg-black py-4 px-12 inline-flex justify-center gap-2 ring-0 rounded-full hover:ring hover:ring-black transition-all duration-300 scale-75">{{ ctrans('texts.next_step') }}
                            <span class="relative right-0 top-[1px] duration-300 group-hover:-right-2"> ➝
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
