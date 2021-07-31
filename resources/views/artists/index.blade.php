@extends('layouts.main')

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ $message }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<main role="main" class="container">
    <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
        <img class="mr-3" src="{{ asset('/images/logo.png') }}" width="48" height="48">
        <div class="lh-100">
            <h6 class="mb-0 text-white lh-100">Winarni Player</h6>
            <small>version 1.0.1</small>
        </div>
    </div>
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">List of Artists</h6>
        @foreach ($artists as $artist)
        <div class="media text-muted pt-3">
            <img src="/uploads/{{ $artist->photo }}" class="bd-placeholder-img mr-2 rounded" width="32" height="32">

            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <strong class="text-gray-dark">{{ $artist->name }}</strong>
                    <a href="{{ route('artists.show', $artist->id) }}">more&hellip;</a>
                </div>
                <span class="d-block">on {{ $artist->created_at->format('F jS, Y') }}</span>
            </div>
        </div>
        @endforeach
    </div>
</main>

@endsection