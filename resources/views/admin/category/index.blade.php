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
                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">{{ __('Title') }}</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter Category Title ...">

                            @error('title')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">{{ __('Type') }}</label>
                            <input type="text" class="form-control" name="type" id="type" placeholder="Enter Category Type ...">

                            @error('type')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
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

                        <div class="d-flex justify-content-start">
                            <button type="submit" class="btn btn-secondary col-md-4 mr-4">
                                {{ __('Create') }}
                            </button>
                        </div>
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
                    <div class="card mt-5">
                        <div class="card-header">
                            <h1 class="card-title text-bold">
                                {{ __('Category List') }}
                            </h1>

                            <div class="card-tools">
                                <form action="{{ route('category.search') }}" method="post">
                                    @csrf

                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="category_search" class="form-control float-right" placeholder="Search" value="{{ old('category_search') }}">

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
                                        <th>{{ __('Type') }}</th>
                                        <th>{{ __('') }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($categories as $index => $category)
                                        <tr class="admin-cursor">
                                            <td>{{ ++$index }}</td>
                                            <td>{{ $category -> title }}</td>
                                            <td>{{ $category -> type }}</td>
                                            <td>
                                                <form method="post" action="{{ route('category.destroy', $category -> id) }}">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    @csrf

                                                    <button class="btn btn-sm bg-danger text-white">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
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
