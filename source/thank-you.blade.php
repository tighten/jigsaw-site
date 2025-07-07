@extends('_layouts.master')

@section('body')
    <div class="pt-6 font-normal text-xl bg-brown-lightest min-h-screen">
        @include('_components.navigation')

        <div class="container-content py-16">
            <div class="flex max-w-4xl mx-auto justify-around">
                <div class="text-center mt-32 py-32 w-full bg-white rounded-t-md sm:rounded-lg sm:shadow-lg">
                    <h1 class="font-normal mb-8 text-2xl text-blue-darker">Thanks for your submission!</h1>

                    <a href="https://www.fieldgoal.io" class="flex items-center justify-center">
                        <img class="w-4 h-4 mr-2 sm:h-5 sm:w-5 inline-block" src="/assets/img/fieldgoal-icon.svg" alt="FieldGoal logo">

                        <span class="block text-sm font-normal hover:text-purple">Powered by FieldGoal</span>
                    </a>
                </div>
            </div>

            <div class="flex max-w-4xl mx-auto justify-around py-8 md:py-16">
                <a href="/" title="Jigsaw by Tighten" class="bg-purple text-sm py-3 px-4 hover:bg-purple-dark rounded-sm text-white uppercase font-medium shadow-md">Go to home</a>
            </div>
        </div>
        @include('_components.built-with-jigsaw')
    </div>
    @include('_components.footer')
@endsection
