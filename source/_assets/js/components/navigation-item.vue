<template>
    <li class="list-reset mb-4 text-sm">
        <a :href="item.root" class="text-blue-darker"
            :class="{ 'text-purple font-medium': isActive(item.root) }">
            <slot></slot>
        </a>

        <ul v-if="item.children" class="list-reset my-4 ext-sm">
            <li :key="key" v-for="(child, key) in item.children" class="mb-4 ml-4">
                <a :href="child.root" class="text-blue-dark"
                :class="{ 'text-purple font-medium': isActive(child.root) }">
                    {{ key }}
                </a>

                <navigation-item v-if="item.children" :item="child"></navigation-item>
            </li>
        </ul>
    </li>
</template>

<script>
export default {
    name: 'navigation-item',
    props: {
        item: {
            type: Object,
            required: true,
        },
    },

    computed: {
        hasChildren() {
            return this.model.children &&
                this.model.children.length
        }
    },

    methods: {
        isActive(url) {
            return window.location.href.indexOf(url) > -1;
        },
    },
}
</script>

