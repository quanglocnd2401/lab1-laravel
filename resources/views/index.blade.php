@extends('layouts.master')

@section('content')

    <div class="row">
        @foreach ($article->comments() as $comment)
            <h1>{{$comment}}</h1>
        @endforeach
        hello
    </div>
@endsection
