@extends('layouts.main')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-5">
        <h2>Edit Album</h2>

        <form action="{{ route('albums.update', $album->id) }}" method="post">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" value="{{ $album->id }}">

                <div class="form-group">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" value="{{ $album->name }}" class="form-control">
                </div>

                <div class="form-group">
                    <label class="form-label">Artist Name</label>
                    <select name="artist_id" class="form-control">
                        <option>-- Choose One --</option>
                        @foreach ($artist as $item)
                        <option value="{{ $item->id }}" 
                        @if ($album->artist_id == $item->id)
                            selected
                        @endif>{{ $item->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <button class="btn btn-success">Update</button>
            </form>

        </div>
    </div>
</div>    
@endsection