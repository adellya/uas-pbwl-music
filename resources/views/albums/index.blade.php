@extends('layouts.main')

@section('content')

<div class="row">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h2>List of Album</h2>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <a href="{{ route('albums.create') }}">
                        <button class="btn btn-success btn-sm">Add New</button>
                    </a>
                </div>
            </div>
        </div>
        <hr>
        
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        @endif
            
        

        <table class="table">
            <thead>
                <tr>
                    <th width="5%">#</th>
                    <th>Name</th>
                    <th>Artist</th>
                    <th width="20%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($albums as $album)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $album->name }}</td>
                    <td>{{ $album->artist->name }}</td>
                    <td><form action="{{ route('albums.destroy', $album->id) }}" method="POST">
                        <a class="btn btn-default btn-sm" href="{{ route('albums.edit', $album->id) }}"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </form></td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>    
@endsection