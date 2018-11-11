@extends('layouts.app',['title' => 'Announcements']) 
@section('content')

<div class="row bg-white p-5">
    <h5>Announcements</h5>

    @foreach ($news as $article)
    <article class="w-full py-4 border-b ">
        <p>{{$article->message}}</p>
        <p>{{ date('F d, Y h:m A', strtotime( $article->created_at)) }}</p>
    </article>
    @endforeach {{ $news->render()}} @if (count($news) ==0)

    <div class="alert  mt-4  alert-primary w-full" role="alert">
        <i data-feather="alert-triangle"></i> No new announcements here!
    </div>
    @endif

</div>
@endsection