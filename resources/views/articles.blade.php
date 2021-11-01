@extends('default')

@section('content')
    @if ($articles)
        {{-- @dump($articles) --}}
        <div class=" grid gap-y-5 justify-items-start">
        @foreach ($articles as $item)
            <x-article-list-component :article="$item" />
        @endforeach
    </div>
    <div>

        {{ $articles->links() }}
    </div>
    @endif
@endsection