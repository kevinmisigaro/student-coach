@component('layouts.main')
<style>
    .card {
        box-shadow: 0 0.46875rem 2.1875rem rgba(4, 9, 20, 0.03), 0 0.9375rem 1.40625rem rgba(4, 9, 20, 0.03), 0 0.25rem 0.53125rem rgba(4, 9, 20, 0.05), 0 0.125rem 0.1875rem rgba(4, 9, 20, 0.03);
        border-width: 0;
        transition: all .2s
    }

    .card-header:first-child {
        border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0
    }

    .card-header {
        display: flex;
        align-items: center;
        border-bottom-width: 1px;
        padding-top: 0;
        padding-bottom: 0;
        padding-right: .625rem;
        height: 3.5rem;
        text-transform: uppercase;
        background-color: #fff;
        border-bottom: 1px solid rgba(26, 54, 126, 0.125)
    }

    .btn-primary {
        color: #fff;
        background-color: #3f6ad8;
        border-color: #3f6ad8
    }

    .btn {
        font-size: 0.8rem;
        font-weight: 500;
        outline: none !important;
        position: relative;
        transition: color 0.15s, background-color 0.15s, border-color 0.15s, box-shadow 0.15s
    }

    .card-body {
        flex: 1 1 auto;
        padding: 1.25rem
    }

    .card-body p {
        font-size: 13px
    }

    a {
        color: #741342;
        text-decoration: none !important;
        background-color: transparent
    }

    .media img {
        width: 20px;
        height: auto
    }

</style>
<div class="container-fluid mt-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex flex-row justify-content-between" style="width: 100%">
                            <div class="d-flex flex-row justify-content-start">

                                <div class="media-body ms-3"> <a href="/userprofile/{{ $post->user->id }}" data-abc="true">
                                        {{ $post->user->username }}
                                    </a>
                                    <div class="text-muted small">
                                        {{ $post->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                            <div class="text-muted ml-auto small ms-3">
                                <div>Member since <strong>{{ $post->user->created_at->format('d/m/Y') }}</strong></div>
                                <div><strong>{{ count($post->user->posts) }}</strong>
                                    {{ (count($post->user->posts) == 1) ? 'post' : 'posts' }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>
                            {{ $post->body }}
                        </p>
                    </div>
                    <div class="card-footer d-flex flex-wrap justify-content-between align-items-center px-0 pt-0 pb-3">
                        <div class="px-4 pt-3">
                            {{-- <a href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true"> 
                                <i class="fa fa-heart text-danger"></i>&nbsp; <span class="align-middle">445</span>
                            </a>  --}}
                            <span class="text-muted d-inline-flex align-items-center align-middle ml-4">
                        </div>
                        <div class="px-4 pt-3">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#commentModal"
                                class="btn btn-primary"><i class="ion ion-md-create"></i>&nbsp; Reply</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="commentModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/post/comment/{{ $post->id }}" method="post">
                        @csrf
                        <div class="form-group mb-2">
                            <textarea name="comment" cols="100%" rows="5" placeholder="Enter comment..."
                                class="form-control"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <button class="btn btn-primary" type="submit"
                                style="background:#05547f; border: 1px solid #05547f">
                                Comment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body p-4">
                        <h6 class="text-center mb-4 pb-2">
                            <u>Comments section</u>
                        </h6>

                        <div class="row">
                            <div class="col">

                                @if (isset($post->comments))
                                @foreach (\App\Models\Comment::where('post_id', $post->id)->whereNull('parent_id')->with('replies')->get() as
                                $comment)
                                <div class="d-flex flex-start mb-4">
                                    <img class="rounded-circle shadow-1-strong me-3"
                                        src="{{ asset('images/businessavatar.jpg') }}" alt="avatar"
                                        width="40" height="40" />
                                    <div class="flex-grow-1 flex-shrink-1">
                                        <div> 
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="mb-1">
                                                    <a href="/userprofile/{{ $comment->user->id }}">{{ $comment->user->username }}</a> <span class="small">-
                                                        {{ $comment->created_at->diffForHumans() }}</span>
                                                </p>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#replyModal">
                                                    <i class="fa fa-reply fa-xs"></i>
                                                    <span class="small">reply</span>
                                                </a>
                                            </div>
                                            <p class="small mb-0">
                                                {{ $comment->message }}
                                            </p>
                                        </div>

                                        <!-- Modal -->
                                        <div class="modal fade" id="replyModal" tabindex="-1"
                                            aria-labelledby="replyModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="replyModalLabel"></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="/post/comment/{{ $post->id }}/{{ $comment->id }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="form-group mb-2">
                                                                <textarea name="comment" cols="100%" rows="5"
                                                                    placeholder="Enter comment..."
                                                                    class="form-control"></textarea>
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <button class="btn btn-primary" type="submit"
                                                                    style="background:#05547f; border: 1px solid #05547f">
                                                                    Reply
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @if ( $comment->replies )
                                        @foreach($comment->replies as $rep1)
                                        <div class="d-flex flex-start mt-4">
                                            <a class="me-3" href="#">
                                                <img class="rounded-circle shadow-1-strong"
                                                    src="{{ asset('images/businessavatar.jpg') }}"
                                                    alt="avatar" width="40" height="40" />
                                            </a>
                                            <div class="flex-grow-1 flex-shrink-1">
                                                <div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="mb-1"> 
                                                            <a href="/userprofile/{{ $rep1->user->id }}">{{ $rep1->user->username }}</a> <span class="small">-
                                                                {{ $rep1->created_at->diffForHumans() }}</span>
                                                        </p>
                                                    </div>
                                                    <p class="small mb-0">
                                                        {{ $rep1->message }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif

                                    </div>
                                </div>
                                @endforeach
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endcomponent
