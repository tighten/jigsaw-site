<div class="w-full lg:w-64 xl:w-72 mr-0 lg:mr-8 mb-8 lg:mb-0">
    <nav>
        <ul>
            @foreach($page->navigation as $key => $item)
                <li class="list-none text-sm">
                    <a
                        href="{{ $item['root'] }}"
                        @class([
                            'block p-2' => true,
                            'text-purple-dark font-semibold' => $page->selected($item['root']),
                            'text-blue-dark hover:text-purple font-normal' => ! $page->selected($item['root']),
                        ])
                    >
                        {{ $item['label'] ?? $key }}
                    </a>
                    @if(isset($item['children']))
                        <ul>
                            @foreach($item['children'] as $childKey => $child)
                                <li>
                                    <a
                                        href="{{ $child['root'] }}"
                                        @class([
                                            'block p-2 pl-6 text-blue-dark hover:text-purple' => true,
                                            'font-semibold' => $page->selected($child['root']),
                                            'font-normal' => ! $page->selected($child['root']),
                                        ])
                                    >
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
