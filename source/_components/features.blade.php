<section class="flex flex-col items-center bg-white py-12 md:py-16">
    <div class="flex flex-col md:flex-row items-center container-content mb-8 px-4 sm:px-6">
        <div class="flex-col md:w-1/2 md:pr-10 lg:pr-20 pb-8 md:pb-0">
            <h3 class="mb-5 text-blue-darker">
                Blade templating, just like your Laravel apps.
            </h3>

            <p class="text-blue mb-0">
                Blade is a powerful, simple, and beautiful templating language, but until now it wasn't an option if you were building a simple static site that didn't need a complex PHP backend. Jigsaw brings Blade to the static site world, so you can use the same templating engine for simple websites as you do for complex web applications.
            </p>
        </div>

        <div class="w-full md:w-1/2">
            @component('_components.code-editor')
                <div class="editor-row">
                    <p class="ln">1</p>
                    <div class="line-code">@@extends('_layouts.master')</div>
                </div>

                <div class="editor-row">
                    <p class="ln">2</p>
                    <div class="line-code">@@section('body')</div>
                </div>

                <div class="editor-row">
                    <p class="ln">3</p>
                    <div class="line-code ml-4"><span class="text-pink-dark">&lt;h1&gt;</span>Hello World<span class="text-pink-dark">&lt;/h1&gt;</span></div>
                </div>

                <div class="editor-row">
                    <p class="ln">4</p>
                    <div class="line-code">@@endsection</div>
                </div>
            @endcomponent
        </div>
    </div>

    <div class="flex flex-col md:flex-row items-center container-content mt-6 px-4 sm:px-6">
        <div class="flex-col md:w-1/2 md:pr-10 lg:pr-20 pb-8 md:pb-0">
            <h3 class="mb-5 text-blue-darker">
                Use Markdown for content-driven pages.
            </h3>

            <p class="text-blue">
                Markdown is a fantastic writing format for things like articles, blog posts, or documentation pages. Jigsaw makes it painless to create a layout in Blade, and fill it with content written in Markdown.
            </p>

            <a href="/docs/installation" title="Read the Jigsaw documentation"
                class="text-purple hover:text-purple-darker text-base no-underline hover:underline">
                Learn more in the docs <img src="/assets/img/icon-arrow.svg" class="inline-block w-4 -mb-1" alt="Learn more in the documentation">
            </a>
        </div>

        <div class="w-full md:w-1/2">
            @component('_components.code-editor')
                <div class="editor-row">
                    <p class="ln">1</p>
                    <div class="line-code">---</div>
                </div>

                <div class="editor-row">
                    <p class="ln">2</p>
                    <div class="line-code">extends: layouts.post</div>
                </div>

                <div class="editor-row">
                    <p class="ln">3</p>
                    <div class="line-code">section: content</div>
                </div>

                <div class="editor-row">
                    <p class="ln">4</p>
                    <div class="line-code">---</div>
                </div>

                <div class="editor-row">
                    <p class="ln">5</p>
                    <div class="line-code"></div>
                </div>

                <div class="editor-row">
                    <p class="ln">6</p>
                    <div class="line-code"># Hello World!</div>
                </div>

                <div class="editor-row">
                    <p class="ln">7</p>
                    <div class="line-code">Welcome to the future.</div>
                </div>
            @endcomponent
        </div>
    </div>
</section>
