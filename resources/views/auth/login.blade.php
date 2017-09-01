@extends('layouts.main')

@section('content')
    <div class="m-t-50 m-l-15 m-r-15">
        <div class="card form-card">
            <header class="card-header">
                <p class="card-header-title">
                    Welcome back!
                </p>
            </header>
            <div class="card-content">
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="field">
                        <label class="label">Email</label>

                        <input id="email" type="text" class="input{{ $errors->has('email') ? ' is-danger' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

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
                        <div class="control">
                            <label class="checkbox">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </label>
                        </div>
                    </div>

                    <div class="field">
                        <div class="control">
                            <button type="submit" class="button is-primary">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="has-text-centered m-t-20">
            Forgot your password? Click <a href="{{ route('password.request') }}">here</a> to reset.
        </div>
    </div>
@endsection
