<?php

namespace App\Http\Controllers;

use App\User;
use App\Book;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function users()
    {
        $users = User::latest()->get();
        return view('pages.users', compact('users'));
    }

    public function books()
    {
        $books = Book::latest()->get();
        return view('pages.books', compact('books'));
    }
}
