<div
    x-data="{
        items: [],
        generate() {
            const headings = document.querySelectorAll('#content h2, #content h3');
            this.items = Array.from(headings).map(h => {
                return {
                    id: h.id,
                    text: h.textContent,
                    level: parseInt(h.tagName.substring(1)),
                };
            });
            console.log(this.items);
        }
    }"
    x-init="console.log('Table of Contents initialized'); generate();"
    class="space-y-2"
>
    <template x-for="item in items" :key="item.id">
        <a
            :href="'#' + item.id"
            class="mb-4 text-blue-darker hover:text-purple text-sm font-normal leading-normal"
            x-text="item.text"
        ></a>
    </template>
</div>
