@extends('layouts.main')

@section('content')

    @include('partials.profile-header')

    @include('partials.book-modal')

    <div class="columns">
        @foreach ($user->books as $book)
            <div class="column is-one-third">
                <div class="card">
                    <header class="card-header">
                        <p class="card-header-title">
                            {{ $book->title }}
                        </p>
                    </header>
                    <div class="card-content">
                        <div class="content">
                            {{ str_limit($book->review, 99) }}
                        </div>
                    </div>
                    <footer class="card-footer">
                        <a href="{{ route('show.book', array($user->slug, $book->slug)) }}" class="card-footer-item">Read Full Review</a>
                    </footer>
                </div>
            </div>
        @endforeach
    </div>

@endsection
