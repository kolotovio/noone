@if ($menu)
    {{-- @dump($menu) --}}
    <div class=" grid grid-flow-col gap-x-5">
    @foreach ($menu as $item)
        <a href="{{ route($item['routeName']) }}"
            class="border-b-2 {{ request()->routeIs($item['routeName'].'*') ? 'border-blue-600' : 'border-gray-300' }}">
            {{ $item['title'] }}
        </a>
    @endforeach
</div>
@endif