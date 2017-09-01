@extends('layouts.main')

@section('content')

    <div class="columns">
        @foreach ($users as $user)
            <div class="column is-one-third">
                <div class="card">
                    <header class="card-header">
                        <p class="card-header-title">
                            {{ $user->name }}
                        </p>
                    </header>
                    <div class="card-content">
                        <div class="content">
                            {{ $user->books->count() }}
                            @if ($user->books->count() == 1)
                                book review.
                            @else
                                book reviews.
                            @endif
                        </div>
                    </div>
                    <footer class="card-footer">
                        <a href="{{ route('show.user', $user->slug) }}" class="card-footer-item">View Profile</a>
                    </footer>
                </div>
            </div>
        @endforeach
    </div>

@endsection
