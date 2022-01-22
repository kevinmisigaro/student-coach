@component('layouts.main')
<div class="container-fluid" style="background:#f2f7f9;">
    <div class="container">

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

        <div class="text-center py-3">
            <h3><strong>{{ $group->name }}</strong></h3>
        </div>
        <br>

        <div class="row">
            <div class="col-md-9">

                <div class="card" style="width: 100%">
                    <div class="card-body">
                        {{ $group->description }}
                        <hr>
                        <small>{{ $group->owner }}</small>
                    </div>
                </div>
                <br>
                <div class="">
                    <button class="btn btn-primary" style="background:#05547f" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Create post
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        Create post
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/group/post/{{ $group->id }}" method="post">
                                        @csrf
                                        <div class="form-group mb-2">
                                            <label for="">Title</label>
                                            <input type="text" name="title" class="form-control">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="">Content</label>
                                            <textarea name="body" cols="100%" rows="5" class="form-control"></textarea>
                                            <small>This is optional</small>
                                        </div>
                                        <div class="form-group mb-2 d-grid">
                                            <button class="btn btn-success">
                                                Create post
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--//Modal-->
                    <br><br>
                    <h4>Posts</h4>
                    <hr>
                    @if (count($group->posts)>0)
                    @foreach ($group->posts as $post)
                    <!--- card--->
                    <a href="/post/{{ $post->id }}" style="text-decoration: none; color: black">
                        <div class="card p-3 shadow mb-2" style="width: 100%">
                            <div class="row">
                                <div class="col-md-7">
                                    <h5>
                                        <strong>{{ $post->title }}</strong>
                                    </h5>
                                </div>
                                <div class="col-md-3 text-center">
                                    <p>
                                        @if (isset($post->comments))
                                        Comments: {{ count($post->comments) }}
                                        @else
                                        Comments: 0
                                        @endif
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    {{ $post->created_at->diffForHumans() }}
                                </div>
                            </div>
                            <div>
                                <small>Author: {{ $post->user->name }}</small>
                            </div>
                        </div>
                    </a>
                    <!--- card--->
                    @endforeach
                    @else
                    <div class="alert alert-info mt-2 text-center" role="alert">
                        No posts
                    </div>
                    @endif

                </div>
            </div>
            <div class="col-md-3">
                <div class="card" style="width: 100%">
                    <div class="card-body">
                        Members: {{ count($group->members) }}
                        <br>
                        <hr>
                        {{-- <button class="btn btn-primary">
                            Be a member
                        </button> --}}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endcomponent
