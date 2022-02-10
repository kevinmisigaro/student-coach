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
</style>
<div class="container-fluid mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="d-flex flex-wrap justify-content-between mb-4">
                    <div> <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-shadow btn-wide" style="background: #741342;color:white"> <span class="btn-icon-wrapper pr-2 opacity-7"> <i class="fa fa-plus fa-w-20"></i> </span> New Discussion</button> </div>
                    {{-- <div class="col-12 col-md-3 p-0 mb-3"> <input type="text" class="form-control" placeholder="Search..."> </div> --}}
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
                                     <textarea name="body" cols="100%" rows="8" style="height: 200px" class="form-control"></textarea>
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

                <div class="card mb-3">
                    <div class="card-header pl-0 pr-0">
                        <div class="row no-gutters w-100 align-items-center">
                            <div class="col ml-3">Topics</div>
                            <div class="col-4 text-muted">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-4">Replies</div>
            
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (count($posts) > 0)
                    @foreach ($posts as $post)
                    <div class="card-body py-3">
                        <div class="row no-gutters align-items-center">
                            <div class="col-1 text-center">
                                <a href="/post/like/{{ $post->id }}">
                                    <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 
                                </a>
                                <br>
                                {{ \App\Models\PostLike::where(['post_id' => $post->id, 'is_like' => true])->count() }}
                                <br>
                                <a href="/post/dislike/{{ $post->id }}">
                                    <i class="fa fa-thumbs-o-down" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="col">
                                <a href="/post/{{ $post->id }}" class="text-big" data-abc="true">{{ $post->title }}</a>
                                <div class="text-muted small mt-1">Started {{ $post->created_at->diffForHumans() }} &nbsp;·&nbsp; <a href="/userprofile/{{ $post->user->id }}" class="text-muted" data-abc="true">{{ $post->user->username }}</a></div>
                            </div>
                            <div class="d-none d-md-block col-4">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-4">
                                        {{ isset($post->comments) ? count($post->comments) : 0 }}
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

                {{ $posts->links() }}

                <br><br>
                
           </div>
            <div class="col-md-3">
                <div class="card" style="width: 100%">
                    <div class="card-body">
                        <u><b>Trending topics</b></u>
                        @if (count(\App\Models\Post::get()) > 0)
                        @foreach (\App\Models\Post::take(3)->get() as $post)
                            <div class="pos-relative py-2">
                                <h6 class="text-primary text-sm">
                                  <a href="/post/{{ $post->id }}" class="text-primary"> 
                                    {{ $post->title }}
                                  </a>
                                </h6>
                                <p class="mb-0 text-sm"><span class="op-6">Posted</span> <a class="text-black" href="#">{{ $post->created_at->diffForHumans() }}</a> <span class="op-6">by</span> <a class="text-black" href="#">{{ $post->user->username }}</a></p>
                              </div>
                              <hr>
                            @endforeach
                        @else
                            
                        @endif
                          
                        @if (count($groups) > 0)
                        <u><b>Groups:</b></u>
                        <br>
                        @foreach ($groups as $group)
                        <div>
                            <i class="fa {{ $group->icon }}" aria-hidden="true"></i>  <a href="/group/singlegroup/{{ $group->id }}">{{ $group->name }}</a>
                        </div>
                        @endforeach
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
