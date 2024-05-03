@extends('_layouts.master')

@section('body')
    <div class="pt-6 font-normal text-xl bg-brown-lightest">
        @include('_components.navigation')

        <div class="container-content px-4 sm:px-6 py-4 sm:py-8">
            <div class="flex-col mb-0 sm:mb-8 pb-4">
                <h1 class="text-4xl md:text-5xl text-blue-darker leading-none">
                    Get in Touch
                </h1>

                <p class="max-w-xl mt-4 text-grey-dark text-lg md:text-xl leading-normal">
                    Have a question or a project you'd like to partner with Tighten on?
                    Let's talk!
                </p>
                @include('_components.contact-form')
            </div>
        </div>
        @include('_components.built-with-jigsaw')
    </div>

    @include('_components.footer')
@endsection

@section('scripts')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        function onSubmit(token) {
            const form = document.getElementById('contact-form');

            if (! form.checkValidity()) {
                form.reportValidity();
                grecaptcha.reset();
                return;
            }

            form.submit();
        }
    </script>
    <style>
        .grecaptcha-badge { visibility: hidden; }
    </style>
@endsection
