@extends('_layouts.master')

@section('body')
<header class="w-full bg-white absolute z-10 shadow-md px-4 md:px-6">
    <nav class="flex items-center max-w-300 mx-auto py-4" aria-role="navigation">
        <a class="flex shrink-0 lg:flex-1 items-center mr-1" href="/" title="Jigsaw by Tighten">
            <img src="/assets/img/jigsaw-logo.svg" alt="Jigsaw logo" class="w-10 lg:w-11 mr-3 shadow-sm border-2 border-white rounded-lg" />

            <h1 class="hidden mr-4 ml-4 uppercase tracking-wide text-blue-darker text-lg lg:text-2xl font-normal lg:ml-0 lg:inline-block">
                Jigsaw
            </h1>
        </a>

        <div class="w-full flex items-center lg:max-w-xl xl:max-w-180">
            <div id="docsearch" class="w-full"></div>
        </div>

        <div class="hidden lg:flex lg:flex-1 items-center">
            <a href="https://github.com/tighten/jigsaw" title="Contribute to Jigsaw on GitHub" class="flex mr-3 text-blue-darker pl-8">
                <img src="/assets/img/GitHub.svg" alt="GitHub alien logo">
            </a>

            <p class="text-sm text-blue-dark mb-0 leading-tight">
                A project by
                <a href="https://tighten.com?utm_campaign=jigsaw-docs" title="Tighten | Product Development for Web + Mobile"
                    class="text-purple">Tighten</a>
            </p>
        </div>

        @include('_components.navigation-toggle')
    </nav>
</header>

<div class="bg-brown-lightest min-h-screen pt-16 md:pt-24 lg:pt-32 px-0 md:px-6">
    <div class="flex flex-col lg:flex-row justify-center max-w-300 mx-auto">

        @include('_components.sidebar')

        <div id="content" class="line-numbers markdown bg-white w-full lg:max-w-xl xl:max-w-180 md:mb-6 lg:mb-10 px-6 xl:px-10 pt-4 pb-8 font-normal sm:shadow-sm md:rounded-lg" v-pre>
            @yield('documentation_content')
        </div>

        @include('_components.table-of-contents')
    </div>

    <footer class="flex flex-col items-center py-8">
        <div class="flex flex-col sm:flex-row items-center justify-center">
            <p class="text-grey-dark font-normal text-xs sm:text-sm my-1">
                Brought to you by the lovely humans at
                <a href="https://tighten.com?utm_campaign=jigsaw-docs" class="text-purple hover:text-purple-darker font-normal no-underline sm:pr-4" title="Tighten | Product Development for Web + Mobile | Laravel + Vue.js">Tighten</a>
            </p>

            <a href="https://github.com/tighten/jigsaw" class="sm:border-l border-purple-light sm:pl-4 text-purple text-xs sm:text-sm hover:text-purple-darker font-normal no-underline my-1" title="Jigsaw on GitHub">
                Issues/Feature Requests
            </a>
        </div>

    </footer>
</div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@docsearch/js@3"></script>
    <script type="text/javascript">
        docsearch({
            appId: 'BH4D9OD16A',
            apiKey: '57a7f5b1e4e0a44c7e2f8e96abcbf674',
            indexName: 'jigsaw',
            container: '#docsearch'
        });
    </script>
@endsection
