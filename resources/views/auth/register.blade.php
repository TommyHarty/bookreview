@extends('layouts.main')

@section('content')

    <div class="m-t-50 m-l-15 m-r-15">
        <div class="card form-card">
            <header class="card-header">
                <p class="card-header-title">
                    Don't be shy!
                </p>
            </header>
            <div class="card-content">
                <form class="" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div class="field">
                        <label class="label">Name</label>

                        <input id="name" type="text" class="input{{ $errors->has('name') ? ' is-danger' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="help is-danger">
                                {{ $errors->first('name') }}
                            </span>
                        @endif
                    </div>

                    <div class="field">
                        <label class="label">Email</label>

                        <input id="email" type="text" class="input{{ $errors->has('email') ? ' is-danger' : '' }}" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="help is-danger">
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                    </div>

                    <div class="field">
                        <label class="label">Password</label>

                        <input id="password" type="password" class="input{{ $errors->has('password') ? ' is-danger' : '' }}" name="password" value="{{ old('password') }}" required>

                        @if ($errors->has('password'))
                            <span class="help is-danger">
                                {{ $errors->first('password') }}
                            </span>
                        @endif
                    </div>

                    <div class="field">
                        <label class="label">Confirm Password</label>

                        <input id="password-confirm" type="password" class="input{{ $errors->has('password_confirmation') ? ' is-danger' : '' }}" name="password_confirmation" value="{{ old('password_confirmation') }}" required>

                        @if ($errors->has('password_confirmation'))
                            <span class="help is-danger">
                                {{ $errors->first('password_confirmation') }}
                            </span>
                        @endif
                    </div>

                    <div class="field">
                        <div class="control">
                            <button type="submit" class="button is-primary">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <div class="has-text-centered m-t-20">
            Already registered? Click <a href="{{ route('login') }}">here</a> to login.
        </div>
    </div>

@endsection
