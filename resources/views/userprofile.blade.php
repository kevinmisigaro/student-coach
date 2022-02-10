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
        background-color: #fff;
        border-bottom: 1px solid rgba(26, 54, 126, 0.125)
    }

    .btn-primary.btn-shadow {
        box-shadow: 0 0.125rem 0.625rem rgba(63, 106, 216, 0.4), 0 0.0625rem 0.125rem rgba(63, 106, 216, 0.5)
    }

    .btn.btn-wide {
        padding: .375rem 1.5rem;
        font-size: .8rem;
        line-height: 1.5;
        border-radius: .25rem
    }

    .btn-primary {
        color: #fff;
        background-color: #3f6ad8;
        border-color: #3f6ad8
    }

    .form-control {
        display: block;
        width: 100%;
        height: calc(2.25rem + 2px);
        padding: .375rem .75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out
    }

    .card-body {
        flex: 1 1 auto;
        padding: 1.25rem
    }

    .flex-truncate {
        min-width: 0 !important
    }

    .d-block {
        display: block !important
    }

    a {
        color: #E91E63;
        text-decoration: none !important;
        background-color: transparent
    }

    .media img {
        width: 40px;
        height: auto
    }

    .followbtn {
        background: #741342;
        color: white
    }

    .followoutlinebtn {
        border: #741342 1px solid;
        color: #741342
    }

    .followbtn:hover {
        background: #741342;
        color: white
    }

    .followoutlinebtn:hover {
        background: #741342;
        color: white;
        border: 1px solid #741342
    }

</style>
<div class="container mt-4">

    @if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row">
        <div class="col-md-9 col-sm-12 col-xs-12">
            <h5><b><u>Posts by {{ $user->username }}</u></b></h5>

            <div class="card mb-3">
                <div class="card-header pl-0 pr-0">
                    <div class="row no-gutters w-100 align-items-center">
                        <div class="col ml-3">Topics</div>
                        <div class="col-4 text-muted">
                            <div class="row no-gutters align-items-center">
                                <div class="col-4">Replies</div>
                                <div class="col-8">Last update</div>
                            </div>
                        </div>
                    </div>
                </div>
                @if (count($user->posts) > 0)
                @foreach ($user->posts as $post)
                <div class="card-body py-3">
                    <div class="row no-gutters align-items-center">
                        <div class="col"><a href="/post/{{ $post->id }}" class="text-big"
                                data-abc="true">{{ $post->title }}</a>
                            <div class="text-muted small mt-1">Started {{ $post->created_at->diffForHumans() }}
                                &nbsp;·&nbsp; <a href="javascript:void(0)" class="text-muted"
                                    data-abc="true">{{ $post->user->username }}</a></div>
                        </div>
                        <div class="d-none d-md-block col-4">
                            <div class="row no-gutters align-items-center">
                                <div class="col-4">
                                    {{ isset($post->comments) ? count($post->comments) : 0 }}
                                </div>
                                <div class="media col-8 align-items-center">
                                    @if (isset($post->comments))
                                    <img src="{{ asset('images/businessavatar.jpg') }}" alt="profile"
                                        style="border: 1px solid black" class="d-block ui-w-30 rounded-circle">
                                    <div class="media-body flex-truncate ml-2">
                                        <div class="line-height-1 text-truncate">
                                            <small>{{ $post->created_at->format('d/m/y') }}</small>
                                        </div>
                                        <a href="javascript:void(0)" class="text-muted small text-truncate"
                                            data-abc="true">
                                            by {{ $post->user->username }}
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="m-0">
                @endforeach
                @else
                <div class="px-3 py-3">
                    <div class="alert alert-info mt-2 text-center" role="alert">
                        No posts
                    </div>
                </div>
                @endif

            </div>

        </div>
        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="card" style="width: 100%">
                <div style="background: #741342; height: 90px"></div>
                <div class="text-center">
                    <img src="{{ asset('images/businessavatar.jpg') }}" alt="profile"
                        style="border: 1px solid black;margin-top: -60px" width="100" height="100"
                        class="rounded-circle">
                </div>

                <div class="card-body text-center">
                    <h4><u>{{ $user->username }}</u></h4>
                    <small><b>Member since:</b> {{ $user->created_at->diffForHumans() }}</small> <br>
                    <small>
                        {{ $user->city }}, {{ $user->country }}
                    </small> <br><br>

                    @if ($user->id != \Illuminate\Support\Facades\Auth::id())
                        @if (!\App\Models\Follower::where(['user_id' => $user->id, 'follower_id' =>
                        \Illuminate\Support\Facades\Auth::id()])->exists())
                        <a class="btn btn-sm followbtn" href="/follow/{{ $user->id }}">
                            Follow <i class="fa fa-plus" aria-hidden="true"></i>
                        </a>
                        @else
                        <a href="/follow/{{ $user->id }}" class="btn btn-outline-primary btn-sm followoutlinebtn">
                            Unfollow
                        </a>
                        @endif
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endcomponent
