<div
    x-data="{
        items: [],
        generate() {
            const headings = document.querySelectorAll('#content h3');
            this.items = Array.from(headings).map(h => ({
                id: h.id,
                text: h.textContent
            }));
        }
    }"
    x-init="generate()"
    class="flex-1 hidden lg:flex pl-6">
    <template x-if="items.length > 0">
        <nav role="aside" class="flex flex-col pl-2">
            <p class="mb-6 text-sm uppercase font-light tracking-wide text-blue">
                On this page
            </p>
            <template x-for="item in items" :key="item.id">
                <a
                    :href="'#' + item.id"
                    class="mb-4 text-blue-darker hover:text-purple text-sm font-normal leading-normal"
                    x-text="item.text" />
            </template>
        </nav>
    </template>
</div>
