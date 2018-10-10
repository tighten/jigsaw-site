@extends('_layouts.master')

@section('body')
<div class="pt-6 font-normal text-xl bg-brown-lightest">
    @include('_components.navigation')

    <div class="container-content py-8">
        <div class="flex-col mb-8 pb-4">
            <h1 class="text-4xl md:text-5xl text-blue-darker leading-none">
                Static sites for <br />
                modern developers
            </h1>

            <p class="max-w-md mt-4 text-grey-dark text-lg leading-normal md:text-xl">
                Jigsaw is a framework for rapidly building static sites using the <br class="hidden sm:block">
                same modern tooling that powers your web applications.
            </p>
        </div>
    </div>

    @include('_components.jigsaw-is-awesome')
    @include('_components.getting-started')
    @include('_components.features')
    @include('_components.compile-your-assets')
    @include('_components.built-with-jigsaw')
    @include('_components.build-your-site')
</div>

@include('_components.footer')
@endsection
