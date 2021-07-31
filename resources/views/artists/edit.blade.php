@extends('layouts.main')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-5">
        <form action="{{ route('artists.update', $artist->id) }}" method="post" accept-charset="UTF-8" role="form" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $artist->name }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="bio" class="form-label">Bio</label>
                <textarea name="bio" id="bio" rows="5" class="form-control @error('bio') is-invalid @enderror">{{ $artist->bio }}</textarea>
                @error('bio')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" name="photo" id="photo" class="form-control-file">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

    

@endsection