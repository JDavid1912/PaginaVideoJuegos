@extends('layouts.app')
@section('content')
<h1>{{$post->title}}</h1>
<p>{{$post->slug}}</p>
<div class="border p-3">
    {!! nl2br(e($post->content)) !!}
</div>
@endsection
