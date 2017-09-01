@extends('layouts.main')

@section('content')

    @foreach ($user->following as $user)
          @foreach ($books as $book)
                @if ($book->user->id == $user->id)
                    <div class="columns">
                        <div class="column is-8 is-offset-2">
                            <div class="card">
                                <header class="card-header">
                                    <p class="card-header-title">
                                        <a href="{{ route('show.user', $user->slug) }}" class="m-r-3">{{ $user->name }}</a> reviewed {{ $book->title }}.
                                    </p>
                                </header>
                                <div class="card-content">
                                    <div class="content">
                                        {{ str_limit($book->review, 149) }}
                                    </div>
                                </div>
                                <footer class="card-footer">
                                    <a href="{{ route('show.book', array($user->slug, $book->slug)) }}" class="card-footer-item">View Full Review</a>
                                </footer>
                            </div>
                        </div>
                    </div>
                @endif
          @endforeach
    @endforeach
    <div class="has-text-centered m-t-20">
        Follow more <a href="{{ route('all.users') }}">users</a> to see more <a href="{{ route('all.books') }}">book reviews</a> in your feed.
    </div>

@endsection
