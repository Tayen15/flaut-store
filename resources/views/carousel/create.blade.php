<!-- resources/views/carousel/create.blade.php -->

@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <h2>Create Carousel Image</h2>
        <form action="{{ route('carousel.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" id="image" name="image" accept="image/jpeg, image/png, image/jpg, image/gif, image/svg" required>
            </div>

            <div class="form-group">
                <label for="alt_text">Alt Text</label>
                <input type="text" class="form-control" id="alt_text" name="alt_text" required>
            </div>

            <button type="submit" class="btn btn-primary">Upload Image</button>
        </form>
    </div>
@endsection
