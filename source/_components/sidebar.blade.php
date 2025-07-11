<div
    x-data="{
        open: false
    }"
    x-bind:class="open || 'hidden'"
    x-on:togglenav.window="open = !open"
    class="flex-1 lg:block md:border-b lg:border-b-0 pt-8 md:pt-1 pl-6 md:pl-0 pr-6 pb-2 mb-4 md:mb-6">
    <nav>
        <ul class="-mt-2">
            @foreach($page->navigation as $key => $item)
                <li class="list-none text-sm">
                    <a
                        href="{{ $item['root'] }}"
                        @class([
                            'block p-2',
                            'text-purple-dark font-semibold' => $page->selected($item['root']),
                            'text-blue-dark hover:text-purple font-normal' => ! $page->selected($item['root']),
                        ])>
                        {{ $item['label'] ?? $key }}
                    </a>
                    @if(isset($item['children']))
                        <ul>
                            @foreach($item['children'] as $childKey => $child)
                                <li>
                                    <a
                                        href="{{ $child['root'] }}"
                                        @class([
                                            'block p-2 pl-6 text-blue-dark hover:text-purple',
                                            'font-semibold' => $page->selected($child['root']),
                                            'font-normal' => ! $page->selected($child['root']),
                                        ])>
                                        {{ $child['label'] ?? $childKey }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </nav>
</div>
