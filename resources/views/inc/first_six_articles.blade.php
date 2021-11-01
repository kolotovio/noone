first six
@if ($first_six)
    {{-- @dump($first_six) --}}
    <div class=" grid grid-cols-3 gap-10">
    @foreach ($first_six as $item)
        <x-article-preview-component :article="$item" />
    @endforeach
</div>
@endif