@extends('nova::auth.layout')

@section('content')

    @include('nova::auth.partials.header')

    <form
            class="bg-white shadow rounded-lg p-8 max-w-login mx-auto"
            method="POST"
            action="{{ route('nova.login') }}"
    >
        {{ csrf_field() }}

        @component('nova::auth.partials.heading')
            {{ __('Welcome Back!') }}
        @endcomponent

        @if ($errors->any())
            <p class="text-center font-semibold text-danger my-3">
                @if ($errors->has('name'))
                    {{ $errors->first('name') }}
                @endif
            </p>
        @endif

        <div class="mb-6 {{ $errors->has('name') ? ' has-error' : '' }}">
            <label class="block font-bold mb-2" for="name">{{ __('Name') }}</label>
            <input class="form-control form-input form-input-bordered w-full" id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
        </div>

        <button class="w-full btn btn-default btn-primary hover:bg-primary-dark" type="submit">
            {{ __('Login') }}
        </button>
    </form>
@endsection
