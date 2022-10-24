<!DOCTYPE html>
@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')

    <body>
        <h1>n rebuilding</h1>
        <div class="instagram-list">
            @foreach ($instagramItems as $instagramItem)
                <a href="{{ $instagramItem['link'] }}" target="_blank" class="instagram-list__item">
                    <img src="{{ $instagramItem['img'] }}" alt="" />
                </a>
            @endforeach
        </div>
    </body>
@endsection