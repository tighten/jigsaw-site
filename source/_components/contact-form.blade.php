<form class="animation-details" action="https://fieldgoal.io/f/3VDhfY" method="POST">
    <div class="mb-6">
        <label class="block font-semibold mb-2 text-blue-darker" for="name">Name</label>
        <input class="bg-white border border-blue-darker p-2 rounded w-full" id="name" name="name" type="text">
    </div>
    <div class="mb-6">
        <label class="block font-semibold mb-2 text-blue-darker" for="email">Email</label>
        <input class="bg-white border border-blue-darker p-2 rounded w-full" id="email" name="email" type="email">
    </div>
    <div class="mb-4">
        <label class="block font-semibold mb-2 text-blue-darker" for="message">Message</label>
        <textarea class="bg-white border border-blue-darker p-2 rounded w-full" id="message" name="message"
                  rows="6"></textarea>
    </div>
    <div class="flex flex-wrap">
        <div class="w-full md:w-1/2 mb-6">
            <a href="https://fieldgoal.io/"
               class="float-right md:float-none items-center inline-block text-sm text-gray hover:text-purple transition-colors"
            >
                <img class="w-4 h-4 mr-2 sm:h-5 sm:w-5 inline-block" src="/assets/img/fieldgoal-icon.svg" alt="FieldGoal logo">
                <span class="font-normal inline-block">Form powered by FieldGoal</span>
            </a>
        </div>

        <div class="w-full md:w-1/2 mb-6">
            <div class="g-recaptcha float-right" data-sitekey="jigsaw_recaptcha_site_key"></div>
        </div>

        <div class="w-full">
            <button class="flex float-right text-sm py-2 px-4 md:py-3 md:px-4 bg-blue-darker hover:bg-blue-dark rounded text-white uppercase font-medium shadow-md" type="submit">Send</button>
        </div>
    </div>
</form>
