@extends('default')

@section('content')
    @if ($articles)
    <div class=" flex">
        <div>
            {{-- @dump($tags) --}}
            @if (isset($tags))
            @foreach ($tags as $tag)
            <a href="{{ route('articles.tag', ['tag' => $tag->slug]) }}">{{ $tag->name }}</a>
            @endforeach
            @endif
        </div>
        <div class=" grid gap-y-5 justify-items-start">
            @foreach ($articles as $item)
            <x-article-list-component :article="$item" />
            @endforeach
        </div>
    </div>
    <div>
        {{ $articles->links() }}
    </div>
    @endif
@endsection