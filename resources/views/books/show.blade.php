@extends('layouts.main')

@section('content')

    @include('partials.profile-header')

    @include('partials.book-modal')

    <div class="columns">
        <div class="column is-one-third">
            <div class="card">
                <div class="card-content">
                    <div class="content">
                        @if ($book->author)
                            <strong>Author:</strong> {{ $book->author }}.
                        @endif
                        @if ($book->published && $book->author)
                            <br>
                        @endif
                        @if ($book->published)
                            <strong>Published:</strong> {{ $book->published }}.
                        @endif
                    </div>
                </div>
                <footer class="card-footer">
                    <a href="{{ $book->link }}" target="_blank" class="card-footer-item">Buy This Book</a>
                </footer>
            </div>
        </div>
        <div class="column">
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">
                        {{ $book->title }} Review.
                    </p>
                </header>
                <div class="card-content">
                    <div class="content">
                        {!! nl2br(e($book->review)) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
