@component('layouts.main')
<div class="container-fluid pt-3" style="background:#a5cae4; height: 100vh">
    <div class="container">
        <div class="row">
            <div class="col-md-9">

                <div class="card shadow my-3" style="width: 100%; background:#f4fcfc">
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
                        @if ($post->body != null)
                            <hr>
                            <div>
                                <p style="text-align: left">
                                    {{ $post->body }}
                                </p>
                            </div>
                        @endif
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
                            <textarea name="comment" cols="100%" rows="3" placeholder="Enter comment..."
                                class="form-control"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <button class="btn btn-primary" type="submit" style="background:#05547f; border: 1px solid #05547f">
                                Comment
                            </button>
                        </div>
                    </form>
                </div>
                <hr>
                <div>
                    @if (isset($post->comments))
                    @foreach ($post->comments as $comment)
                    <div class="alert alert-dark mb-2" role="alert">
                        <small><u>{{ $comment->user->name }}</u></small>
                        <br>
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
