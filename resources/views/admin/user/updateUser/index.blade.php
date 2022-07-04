@extends('admin.layout.app')

@section('title', 'Admin Dashboard')

@section('content')

<div class="row d-flex justify-content-center">
    <form action="{{ route('user.update', $user -> id) }}" method="post" class="p-5 col-md-12">
        @method("PUT")
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $user -> name }}">

            @error('name')
                <div class="form-text text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="emial" class="form-label">{{ __('Email address') }}</label>
            <input type="email" class="form-control" name="email" id="email" value="{{ $user -> email }}">

            @error('email')
                <div class="form-text text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="ph_number" class="form-label">{{ __('Phone Number') }}</label>
            <input type="text" class="form-control" name="ph_number" id="ph_number" value="{{ $user -> ph_number ?? 'N/A' }}">

            @error('ph_number')
                <div class="form-text text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">{{ __('Address') }}</label>
            <input type="text" class="form-control" name="address" id="address" value="{{ $user -> address ?? 'N/A' }}">

            @error('address')
                <div class="form-text text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">{{ __('Gender') }}</label>
            <select class="form-control" aria-label="Default select example" name="gender">
                <option selected>
                    {{ __('Select Gender') }}
                </option>

                <option
                    value="male"
                    @if($user -> gender == 'male') selected @endif
                >
                    {{ __('Male') }}
                </option>

                <option
                    value="female"
                    @if($user -> gender == 'female') selected @endif
                >
                    {{ __('Female') }}
                </option>
            </select>

            @error('gender')
                <div class="form-text text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-secondary col-md-4 mr-4">
                {{ __('Update') }}
            </button>

            <a class="underline text-sm text-gray-600 hover:text-gray-900 mt-2" href="{{ route('change-password.edit', $user -> id) }}">
                {{ __('Change Password') }}
            </a>
        </div>
    </form>
</div>

@endsection
