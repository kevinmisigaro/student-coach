@component('layouts.main')
<div class="container-fluid" style="background:#f2f7f9; height: 100vh">
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

        <style>
            .link{
                color: #710A3E;
                text-decoration: none
            }
            .link:hover{
                text-decoration-line: underline;
                color: #710A3E;
            }
        </style>

        <div class="row">
            <div class="col-md-9 mt-3">

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
                                <form action="/forum/create" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-2">
                                        <label for="">Title</label>
                                        <input type="text" name="title" class="form-control">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Image</label>
                                        <input type="file" name="image" class="form-control">
                                        <small>This is optional</small>
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

                @if (count($posts) > 0)
                @foreach ($posts as $post)
                <!--- card--->
                

                    <div class="card px-3 py-2 shadow mb-2" style="width: 90%;">
                        <div class="card-body row">
                            <div class="col-md-5">
                                <div class="d-flex flex-row justify-content-start">
                                    <div class="text-center">
                                        <a href="/post/like/{{ $post->id }}">
                                            <i class="fa fa-arrow-up" aria-hidden="true" style="color:black"></i>
                                        </a>
                                        <br>
                                        {{ count(\App\Models\PostLike::where(['post_id' => $post->id, 'is_like' => true])->get()) }}
                                        <br>
                                        <a href="/post/dislike/{{ $post->id }}" style="color:black">
                                            <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="ms-4">
                                        <a href="/post/{{ $post->id }}" class="link">
                                            <strong>{{ $post->title }}</strong> <br>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <small>by {{ $post->user->name }}</small> <br>
                                <small>{{ $post->created_at->diffForHumans() }}</small>
                            </div>
                            <div class="col-md-3 text-center">
                                <p>
                                    @if (isset($post->comments))
                                    {{ count($post->comments) }} comments
                                    @else
                                    0 comments
                                    @endif
                                </p>

                            </div>
                        </div>
                    </div>
                
                <!--- card--->
                @endforeach
                @else
                <div class="alert alert-info mt-2 text-center" role="alert">
                    No posts
                </div>
                @endif


            </div>
            <div class="col-md-3">
                <div class="d-grid mb-3">
                    <button class="btn btn-primary" style="background:#05547f" type="button" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Start New Discussion
                    </button>
                </div>

                <div class="card" style="width: 100%">
                    <div class="card-body">
                        <h4>Groups</h4>
                        <hr>
                        @if (count($groups) > 0)
                        <u>Top groups:</u>
                        <br>
                        <ul>
                            @foreach ($groups as $group)
                            <li>
                                {{ $group->name }}
                            </li>
                            @endforeach
                        </ul>
                        @else
                        <div class="alert alert-info mt-2 text-center" role="alert">
                            No groups
                        </div>
                        @endif

                        <br>
                        <div class="d-grid gap-2">
                            {{-- <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                data-bs-target="#createGroupModal">Create group</button> --}}
                            <a class="btn btn-outline-primary" href="/group">View groups</a>
                        </div>

                        <!-- Create group Modal -->
                        <div class="modal fade" id="createGroupModal" tabindex="-1"
                            aria-labelledby="createGroupModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="createGroupModalLabel">Create group</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/group/store" method="post">
                                            @csrf
                                            <div class="form-group mb-2">
                                                <input type="text" name="name" placeholder="Group name"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group mb-4">
                                                <textarea name="description" placeholder="Group description" cols="100%"
                                                    rows="3" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group mb-2 d-grid">
                                                <button class="btn btn-success">Create</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!---//create group modal--->

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endcomponent
