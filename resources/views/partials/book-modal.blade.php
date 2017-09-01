<div class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">New Book Review</p>
            <button class="delete close-modal" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
            <form class="" action="{{ route('store.book', $user->slug) }}" method="post">
                {{ csrf_field() }}

                <div class="field">
                    <label class="label">Title</label>
                    <div class="control">
                        <input class="input" type="text" name="title" value="{{ old('title')}}" required autofocus>
                    </div>
                    <small>Required.</small>
                </div>

                <div class="field">
                    <label class="label">Author</label>
                    <div class="control">
                        <input class="input" type="text" name="author" value="{{ old('author')}}">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Year Published</label>
                    <div class="control">
                        <input class="input" type="text" name="published" value="{{ old('published')}}">
                    </div>
                    <small>Year in four digit format, i.e. '1984' ;)</small>
                </div>

                <div class="field">
                    <label class="label">Review</label>
                    <div class="control">
                        <textarea name="review" class="textarea" rows="6" value="" required>{{ old('review')}}</textarea>
                    </div>
                    <small>Required.</small>
                </div>

                <div class="field">
                    <label class="label">Referral Link</label>
                    <div class="control">
                        <input class="input" type="text" name="link" value="{{ old('link')}}">
                    </div>
                    <small>A link to where the book can be purchased. Affiliate links accepted.</small>
                </div>

            {{-- </form> --}}
        </section>
        <footer class="modal-card-foot">
            <button type="submit" class="button is-primary">Save Book Review</button>
            </form>
            <button class="button close-modal">Cancel</button>
        </footer>
    </div>
</div>
