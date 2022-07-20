@extends('admin.layout.app')

@section('title', 'User List')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 p-5">
                    @if (Session::has('message_success'))
                        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                            {{ Session::get('message_success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true" class="text-white">&times;</span>
                            </button>
                        </div>
                    @endif
                    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">{{ __('Title') }}</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter Post Title ...">

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
                            <textarea class="form-control" name="description" id="description" rows="3"></textarea>

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
                            {{ __('Create') }}
                        </button>
                    </form>
                </div>

                <div class="col-7">
                    @if (Session::has('message_delete_success'))
                        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                            {{ Session::get('message_delete_success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true" class="text-white">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if (Session::has('message_delete_fail'))
                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            {{ Session::get('message_delete_fail') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true" class="text-white">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card mt-5">
                        <div class="card-header">
                            <h1 class="card-title text-bold">
                                {{ __('Post List') }}
                            </h1>

                            <div class="card-tools">
                                <form action="#" method="post">
                                    @csrf

                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="post_search" class="form-control float-right" placeholder="Search" value="{{ old('post_search') }}">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap text-center">
                                <thead>
                                    <tr>
                                        <th>{{ __('ID') }}</th>
                                        <th>{{ __('Title') }}</th>
                                        <th>{{ __('Image') }}</th>
                                        <th>{{ __('') }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($posts as $index => $post)
                                        <tr class="admin-cursor">
                                            <td>{{ ++$index }}</td>
                                            <td>{{ $post -> title }}</td>
                                            <td>
                                                <img src="{{ $post -> image }}" width="50px">
                                            </td>
                                            <td >
                                                <form method="post" action="{{ route('post.destroy', $post -> id) }}" id="deletePost">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    @csrf
                                                </form>

                                                <button class="btn btn-sm bg-danger text-white" onclick="document.getElementById('deletePost').submit()">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>

                                                <button
                                                    type="submit"
                                                    class="btn btn-sm bg-danger text-white"
                                                    onclick="window.location.href='{{ route('post.edit', $post -> id)}}'"
                                                >
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
