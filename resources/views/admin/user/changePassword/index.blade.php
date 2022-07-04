@extends('admin.layout.app')

@section('title', 'Change Password')

@section('content')

<div class="row d-flex justify-content-center">

    @if(Session::has('UpdateFailed'))
        {{ Session::get('UpdateFailed')}}
    @endif
    <form class="p-5 col-md-7" method="POST" action="{{ route('change-password.update', $user -> id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="password" class="form-label">
                {{ __('Old Password')}}
            </label>
            <input type="password" name="old_password"class="form-control" id="password" placeholder="Enter Your Old Password ...">

            @error('old_password')
                <div class="form-text text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="new_password" class="form-label">
                {{ __('New Password') }}
            </label>
            <input type="password" name="new_password"class="form-control" id="new_password" placeholder="Enter Your New Password ...">

            @error('new_password')
                <div class="form-text text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="confirm_password" class="form-label">
                {{ __('Confirm Password') }}
            </label>
            <input type="password" name="confirm_password"class="form-control" id="confirm_password" placeholder="Retype Your New Password ...">

            @error('confirm_password')
                <div class="form-text text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-secondary col-md-4 mr-4">
                {{ __('Update') }}
            </button>
        </div>
    </form>

</div>

@endsection

