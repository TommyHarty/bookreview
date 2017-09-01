@extends('layouts.main')

@section('content')

    @include('partials.profile-header')

    @include('partials.book-modal')

    <div class="columns">
        @foreach ($user->followers as $follower)
            <div class="column is-one-third">
                <div class="card">
                    <header class="card-header">
                        <p class="card-header-title">
                            {{ $follower->name }}
                        </p>
                    </header>
                    <div class="card-content">
                        <div class="content">
                            {{ $follower->books->count() }}
                            @if ($follower->books->count() == 1)
                                book review.
                            @else
                                book reviews.
                            @endif
                        </div>
                    </div>
                    <footer class="card-footer">
                        <a href="{{ route('show.user', $follower->slug) }}" class="card-footer-item">View Profile</a>
                    </footer>
                </div>
            </div>
        @endforeach
    </div>

@endsection
