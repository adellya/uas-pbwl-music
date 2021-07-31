@extends('layouts.main')

@section('content')


<div class="row">
    <h2>Add New Artist</h2>
    <hr>
</div>


<div class="row">
    
    <div class="col-md-5">
        <form action="{{ route('artists.store') }}" method="post" accept-charset="UTF-8" role="form" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="bio" class="form-label">Bio</label>
                <textarea name="bio" id="bio" class="form-control @error('bio') is-invalid @enderror"></textarea>
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
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>

    <div class="col-md-7">
        <div class="bg-white rounded-2 shadow-sm p-3">
    
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($artists as $artist)
                    <tr>
                        <td>{{ ++$i;}}</td>
                        <td>
                            @if($artist->photo)
                            <img src="/uploads/{{ $artist->photo }}" class="bd-placeholder-img mr-2 rounded" width="32" height="32">
                            @else
                            <p>No image found</p>
                            @endif
                        </td>
                        <td>{{ $artist->name }}</td>
                        <td>
                            <form action="{{ route('artists.destroy', $artist->id) }}" method="POST">
                                <a class="btn btn-default btn-sm" href="{{ route('artists.show', $artist->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Show detail"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a class="btn btn-default btn-sm" href="{{ route('artists.edit', $artist->id) }}"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

    

@endsection