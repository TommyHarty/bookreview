<div class="card profile-header m-b-40">
    <div class="card-content">
        <div class="columns">
            <div class="column is-2">
              <div class="image">
                  @if ($user->photo)
                      <img src="/uploads/{{ $user->photo }}">
                      @if ($isAuthorised)
                          <form class="" action="{{ route('delete.photo', $user->slug) }}" method="post">
                              {{ csrf_field() }}
                              <div class="text-center">
                                  <button type="submit" id="delete-photo" style="display:none;" class="button is-danger"><i class="fa fa-times" aria-hidden="true"></i></button>
                              </div>
                          </form>
                      @endif
                  @else
                      <img src="https://placehold.it/256x256">
                      @if ($isAuthorised)
                          <a id="add-photo" style="display:none;" class="button is-primary"><i class="fa fa-plus" aria-hidden="true"></i></a>
                      @endif
                  @endif
              </div>
            </div>
            <div class="column is-10">
                <p>
                    <span class="title is-bold">{{ $user->name }}</span>
                    @if ($isAuthorised)
                        <button id="open-modal" class="button is-primary is-pulled-right"><i class="fa fa-plus" aria-hidden="true"></i></button>
                        <a id="edit-button" class="button is-primary is-pulled-right m-r-5"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a id="save-button" style="display:none;" class="button is-primary is-pulled-right" href=""
                            onclick="event.preventDefault();
                                     document.getElementById('edit-bio').submit();">
                            <i class="fa fa-check" aria-hidden="true"></i>
                        </a>
                    @elseif(Auth::user())
                        @if (!$isFollowing)
                            <a class="button is-primary is-pulled-right" href=""
                                onclick="event.preventDefault();
                                         document.getElementById('follow-user').submit();">
                                Follow</i>
                            </a>

                            <form id="follow-user" style="display:none;" action="{{ route('follow.user', $user->slug) }}" method="post">
                                {{ csrf_field() }}
                            </form>
                        @else
                            <a class="button is-primary is-pulled-right" href=""
                                onclick="event.preventDefault();
                                         document.getElementById('unfollow-user').submit();">
                                Unfollow</i>
                            </a>

                            <form id="unfollow-user" style="display:none;" action="{{ route('unfollow.user', $user->slug) }}" method="post">
                                {{ csrf_field() }}

                            </form>
                        @endif
                    @else
                        <a href="{{ route('register') }}" class="button is-primary is-pulled-right">Follow</a>
                    @endif
                </p>
                <p id="user-bio" class="tagline m-t-10">
                    {!! nl2br(e($user->bio)) !!}
                </p>

                @if ($isAuthorised)
                <form id="edit-bio" style="display:none;" class="m-t-10" method="post" action="{{ route('update.user', $user->slug) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{method_field('PUT')}}

                    <div style="height:0px;overflow:hidden">
                        <input type="file" id="file-input" name="photo" />
                    </div>

                    <div class="field">
                        <div class="control">
                            <textarea name="bio" class="textarea" rows="6" placeholder="Add a short profile description" required>{{ old('bio', $user->bio)}}</textarea>
                        </div>
                    </div>
                </form>
                @endif

            </div>
        </div>
        <footer class="card-footer">
            <a href="{{ route('show.user', $user->slug) }}" class="card-footer-item">{{ $user->books->count() }} Books</a>
            <a href="{{ route('show.followers', $user->slug) }}" class="card-footer-item">{{ $user->followers->count() }} Followers</a>
            <a href="{{ route('show.following', $user->slug) }}" class="card-footer-item">{{ $user->following->count() }} Following</a>
        </footer>
    </div>
</div>
