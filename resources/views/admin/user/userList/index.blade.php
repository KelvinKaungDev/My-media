@extends('admin.layout.app')

@section('title', 'User List')

@section('content')

    @if (Session::has('message_success'))
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            {{ Session::get('message_success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="text-white">&times;</span>
            </button>
        </div>
    @endif

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h1 class="card-title text-bold">
                                {{ __('User Lists') }}
                            </h1>

                            <div class="card-tools">
                                <form action="{{ route('user-list.search') }}" method="post">
                                    @csrf

                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="user_search" class="form-control float-right" placeholder="Search" value="{{ old('user_search') }}">

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
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Phone Number') }}</th>
                                        <th>{{ __('') }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($users as $index => $user)
                                        <tr class="admin-cursor">
                                            <td>{{ ++$index }}</td>
                                            <td>{{ $user -> name }}</td>
                                            <td>{{ $user -> ph_number }}</td>
                                            <td>
                                                <form method="post" action="{{ route('user-list.destroy', $user -> id) }}">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    @csrf

                                                    <button class="btn btn-sm bg-danger text-white" {{(Auth::id() === $user -> id) ? 'disabled' : ''}}>
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
