@extends('layouts.main')

@section('content')
    <div class="m-t-50 m-l-15 m-r-15">
        <div class="card form-card">
            <header class="card-header">
                <p class="card-header-title">
                    Reset Password
                </p>
            </header>
            <div class="card-content">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="" method="POST" action="{{ route('password.email') }}">
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
                        <div class="control">
                            <button type="submit" class="button is-primary">Send Password Reset Link</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
