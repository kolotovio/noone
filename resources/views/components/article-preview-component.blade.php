<div class="border p-5 flex flex-col">
    <a href="{{ route('articles.page', ['slug' => $attributes['article']->slug]) }}">
        <div>
            <img src="{{ $attributes['article']->image }}" alt="" srcset="">
        </div>
        <div>{{ \Carbon\Carbon::parse($attributes['article']->created_at)->format('d.m.Y H:i') }}</div>
        <h3 class=" text-2xl my-3">{{ $attributes['article']->title }}</h3>
        <p>{{ $attributes['article']->getLead() }}</p>
    </a>
    <div class=" flex justify-between">
        <x-views-counter-component :id="$attributes['article']->id" :views="$attributes['article']->views" />
        <x-like-button-component :id="$attributes['article']->id" :likes="$attributes['article']->likes" />
    </div>
</div>