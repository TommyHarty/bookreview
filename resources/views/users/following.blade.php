@extends('layouts.main')

@section('content')

    @include('partials.profile-header')

    @include('partials.book-modal')

    <div class="columns">
        @foreach ($user->following as $follow)
            <div class="column is-one-third">
                <div class="card">
                    <header class="card-header">
                        <p class="card-header-title">
                            {{ $follow->name }}
                        </p>
                    </header>
                    <div class="card-content">
                        <div class="content">
                            {{ $follow->books->count() }}
                            @if ($follow->books->count() == 1)
                                book review.
                            @else
                                book reviews.
                            @endif
                        </div>
                    </div>
                    <footer class="card-footer">
                        <a href="{{ route('show.user', $follow->slug) }}" class="card-footer-item">View Profile</a>
                    </footer>
                </div>
            </div>
        @endforeach
    </div>

@endsection
