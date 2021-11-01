<div class="border p-5 flex flex-col">
    <a href="{{ route('articles.page', ['slug' => $attributes['article']->slug]) }}">
        <div>
            <img src="{{ $attributes['article']->image }}" alt="" srcset="">
        </div>
        <h3 class=" text-2xl my-3">{{ $attributes['article']->title }}</h3>
        <p>{{ $attributes['article']->getLead() }}</p>
        
    </a>
    <div class=" my-3">
        @foreach ($attributes['article']->tags as $tag)
            {{ $tag->name }}
        @endforeach
    </div>
    <div class=" flex justify-between">
        <x-views-counter-component :id="$attributes['article']->id" :views="$attributes['article']->views" />
        <x-like-button-component :id="$attributes['article']->id" :likes="$attributes['article']->likes" />
    </div>
</div>