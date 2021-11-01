@extends('default')

@section('content')
    @if ($article)
        <h1 class=" text-3xl font-bold">{{ $article->title }}</h1>
        <div class="flex">
            <x-views-counter-component :id="$article->id" :views="$article->views" />
            <x-like-button-component :id="$article->id" :likes="$article->likes" />
        </div>
        <p>{{ $article->body }}</p>
        @if (count($article->comments))
            @dump($article->comments)
        @else
        Нет комментов
        @endif
        <div>
            <h4 class=" text-2xl font-bold">Отправить комментарий</h4>
            <form id="commentSend" class=" border flex flex-col p-5 items-start">
                <input type="text" name="subject" id="subject" placeholder="Тема сообщения" class=" border mb-3">
                <textarea name="body" id="body" rows="10" placeholder="Текст сообщения" class=" border mb-3"></textarea>
                <input type="hidden" name="articles_id" value="{{$article->id}}">
                <button type="submit" class=" bg-gray-900 text-white px-3 py-2">Отправить</button>
            </form>
            <div id="form_send_status" class="hidden"></div>
        </div>
        <script>
            incrementView = async (articleId) => {
                let {data} = await window.axios.put(`http://localhost:8000/api/view/${articleId}`)
                let counterBlock = document.getElementById(`views_counter_${articleId}`)
                let span = counterBlock.getElementsByTagName('span')[0]
                span.textContent = data
                // console.log(data);
            }
            setTimeout(() => {
                incrementView({{ $article->id }})
            }, 5 * 1000);
        </script>
    @endif
@endsection