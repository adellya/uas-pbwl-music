@extends('layouts.main')

@section('content')

        @if($artist->photo)
            <img src="/uploads/{{ $artist->photo }}" class="bd-placeholder-img mr-2 rounded" width="150">
        @else
            <p>No image found</p>
        @endif

        <h2>{{ $artist->name }}</h2>


@endsection