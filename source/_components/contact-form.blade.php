<div>
    <form id="contact-form"
          class="p-8 bg-white rounded-t-md sm:rounded-lg sm:shadow-lg"
          action="https://fieldgoal.io/f/7Uf3mL"
          method="POST"
    >
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="mb-6">
                <label class="block font-semibold mb-2 text-blue-darker" for="name">Name</label>
                <input
                        id="name"
                        name="name"
                        type="text"
                        class="bg-white border border-blue-darker p-2 rounded w-full"
                        required
                        autofocus
                        autocomplete="name"
                        autocorrect="off"
                        autocapitalize="sentences"
                        spellcheck="false"
                >
            </div>
            <div class="mb-6">
                <label class="block font-semibold mb-2 text-blue-darker" for="email">Email</label>
                <input
                        id="email"
                        name="email"
                        type="email"
                        class="bg-white border border border-blue-darker p-2 rounded w-full"
                        required
                        autocomplete="email"
                        autocorrect="off"
                        autocapitalize="off"
                        spellcheck="false"

                >
            </div>
        </div>

        <div>
            <label class="block font-semibold mb-2 text-blue-darker" for="message">Message</label>
            <textarea
                    class="bg-white border border-blue-darker p-2 rounded w-full"
                    id="message"
                    name="message"
                    rows="6"
                    required
                    autocomplete="off"
                    autocapitalize="sentences"
            ></textarea>
        </div>
        <div class="flex flex-wrap">
            <div class="w-full mb-4 md:mb-0">
                            <span class="text-xs leading-tight text-pretty">
                                This site is protected by reCAPTCHA and the Google <a class="inline-link underline" href="https://policies.google.com/privacy">Privacy Policy</a> and <a class="inline-link underline" href="https://policies.google.com/terms">Terms of Service</a> apply.
                            </span>
            </div>

            <div class="w-full">
                <button class="g-recaptcha flex float-right text-sm py-3 px-4 bg-blue-darker hover:bg-blue-dark rounded text-white uppercase font-medium shadow-md"
                        type="submit"
                        data-sitekey="6LfDrMwpAAAAAIAGKqYK-Z94c0h_gM4OKjVFbPmK"
                        data-callback="onSubmit"
                        data-action="submit"
                >
                    Send
                </button>
            </div>
        </div>
    </form>

    <div class="w-full flex justify-center mt-8">
        <a href="https://fieldgoal.io/"
           class="flex items-center text-sm hover:text-purple transition-colors"
        >
            <img class="w-4 h-4 mr-2 sm:h-5 sm:w-5 inline-block" src="/assets/img/fieldgoal-icon.svg" alt="FieldGoal logo">
            <span class="font-normal inline-block">Form powered by FieldGoal</span>
        </a>
    </div>
</div>