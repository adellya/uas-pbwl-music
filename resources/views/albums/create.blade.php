@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-8">
        <div class="card-cs">
            <div class="card-title-cs"><h5>Add New Album</h5></div>

            <form action="{{ route('albums.store') }}" method="post">
                @csrf
                @method('post')

                <div class="form-group-cs">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Artist</label>
                    <select name="artist" class="custom-select @error('artist') is-invalid @enderror">
                        <option>-- Choose one --</option>
                        @foreach ($artists as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('artist')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="card-footer-cs">
                    <button class="btn btn-success">Create</button>
                </div>
            </form>

        </div>
    </div>
</div>    
@endsection