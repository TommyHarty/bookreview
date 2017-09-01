<?php

namespace App\Http\Controllers;

use Auth;
use App\Book;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $books = Book::latest()->get();
        return view('feed', compact('user', 'books'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
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

        return view('users.show', compact('user', 'isAuthorised', 'isFollowing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate(request(), [
            'photo' => 'dimensions:ratio=1/1',
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $path = $request->file('photo')->store('uploads');
            $file->move('uploads' , $file->getClientOriginalName());
            $user->photo = $request->file('photo')->getClientOriginalName();
        }

        $user->bio = request('bio');

        $user->save();

        return redirect("/users/$user->slug");
    }

    public function deletePhoto(User $user)
    {
        $user->photo = NULL;
        $user->save();

        return redirect("/users/$user->slug");
    }

    public function followUser(User $user)
    {
        $followed = $user;
        $follower = Auth::user();
        $followed->follow($follower);

        return redirect()->back();
    }

    public function unfollowUser(User $user)
    {
        $followed = $user;
        $follower = Auth::user();
        $followed->unfollow($follower);

        return redirect()->back();
    }

    public function showFollowers(User $user)
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

        return view('users.followers', compact('user', 'isAuthorised', 'isFollowing'));
    }

    public function showFollowing(User $user)
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

        return view('users.following', compact('user', 'isAuthorised', 'isFollowing'));
    }

}
