@component('layouts.main')
<div class="container-fluid">
    <div class="container">

        <div class="text-center my-3">
            <h3><strong>Forum</strong></h3>
        </div>

        <div class="row">
            <div class="col-md-9 mt-3">

                <div class="d-grid mb-3">
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Create post
                    </button>
                </div>

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
                                <form action="/forum/create" method="post">
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

                @if (count($posts) > 0)
                @foreach ($posts as $post)
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
            <div class="col-md-3"></div>
        </div>

    </div>
</div>
@endcomponent
