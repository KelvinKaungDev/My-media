@extends('admin.layout.app')

@section('title', 'User List')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 p-5">
                    @if (Session::has('message_success'))
                        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                            {{ Session::get('message_success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true" class="text-white">&times;</span>
                            </button>
                        </div>
                    @endif
                    <form action="{{ route('post.update', $post -> id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">{{ __('Title') }}</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ $post -> title }}">

                            @error('title')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Category Type</label>

                            <select class="form-control" aria-label="Default select example" name="category_id">
                                @foreach ($categories as $index => $category)
                                    <option value="{{ $category -> id }}">
                                        {{ $category -> title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">{{ __('Description') }}</label>
                            <textarea class="form-control" name="description" id="description" rows="3">{{ $post -> description}}</textarea>

                            @error('description')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="formFile" class="form-label">Upload Image</label>
                            <input class="form-control" type="file" id="formFile" name="image">
                        </div>

                        <button type="submit" class="btn btn-secondary col-md-4 mr-4">
                            {{ __('Update') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
