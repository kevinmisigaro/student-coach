@component('layouts.main')
<div class="container-fluid mt-3">
    <div class="container">
        <div class="row">
            <div class="col-md-9">

                <div class="card shadow my-3" style="width: 100%">
                    <div class="card-body text-center">
                        <h4>
                            <b>{{ $post->title }}</b>
                        </h4>
                        <div class="row mt-3">
                            <div class="col-md-6 text-center">
                                <small>{{ $post->user->name }}</small>
                            </div>
                            <div class="col-md-6 text-center">
                                <small>{{ $post->created_at }}</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <h4>
                        Comments
                    </h4>
                </div>

                <div class="mb-3">
                    <form action="/post/comment/{{ $post->id }}" method="post">
                        @csrf
                        <div class="form-group mb-2">
                            <textarea name="comment" cols="100%" rows="4" placeholder="Enter comment..."
                                class="form-control"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <button class="btn btn-primary" type="submit">
                                Comment
                            </button>
                        </div>
                    </form>
                </div>

                <div>
                    @if (isset($post->comments))
                    @foreach ($post->comments as $comment)
                    <div class="alert alert-dark mb-2" role="alert">
                        {{ $comment->message }}
                    </div>
                    @endforeach
                    @endif
                </div>

            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>
@endcomponent
