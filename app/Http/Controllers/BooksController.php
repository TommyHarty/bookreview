<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, Request $request)
    {
        $this->validate(request(), [
            'title' => 'required',
            'review' => 'required',
            'published' => 'numeric|digits_between:4,4'
        ]);

        Book::create([
            'title' => request('title'),
            'slug' => strtolower(str_replace(' ', '-', request('title'))),
            'author' => request('author'),
            'published' => request('published'),
            'review' => request('review'),
            'link' => request('link'),
            'user_id' => auth()->id()
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Book $book)
    {
        if (Auth::user() && Auth::user()->id == $user->id) {
            $isAuthorised = true;
        } else {
            $isAuthorised = false;
        }

        $isFollowing = false;

        foreach ($user->followers as $f) {
            if (Auth::user() && $f->id == Auth::user()->id) {
                $isFollowing = true;
            }
        }

        return view('books.show', compact('user', 'book', 'isAuthorised', 'isFollowing'));
    }

}
