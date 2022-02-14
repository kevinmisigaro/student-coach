@component('layouts.dashboard')
<div class="container">
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <h1 class="h3 mb-2 text-gray-800">
        My profile
    </h1>

    <div class="card shadow">
        <div class="card-body">
            <div class="row mt-3">
                <div class="col-3 text-center">
                    @if ($user->avatar == null)
                    <img class="rounded-circle" src="{{ asset('images/businessavatar.jpg') }}" alt="avatar"
                        style="max-width: 80%; border: 1px solid black" />
                    @else
                    <img class="rounded-circle" src="{{ env('APP_URL') }}/{{ $user->avatar }}" alt="avatar"
                        style="max-width: 80%; border: 1px solid black" />
                    @endif
                    <br><br>
                    <button class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
                        Update
                    </button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update your details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/dashboard/profile/update" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div>
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" value="{{ $user->name }}" name="name"
                                                class="form-control">
                                        </div>
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                        <div class="form-group">
                                            <label for="">Username</label>
                                            <input type="text" value="{{ $user->username }}" name="username"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Image</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="text" value="{{ $user->email }}" name="email"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Phone</label>
                                            <input type="text" value="{{ $user->phone }}" name="phone"
                                                class="form-control">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col">
                                                <label for="">City</label>
                                                <input type="text" value="{{ $user->city }}" name="city"
                                                    class="form-control">
                                            </div>
                                            <div class="col">
                                                <label for="">Country</label>
                                                <input type="text" value="{{ $user->country }}" name="country"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <input type="text" class="form-control" name="status" value="{{ $user->status }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Bio</label>
                                            <textarea cols="100%" rows="5" name="bio" class="form-control">
                                            {{ $user->bio }}
                                        </textarea>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-warning">
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-9">
                    <div>
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" value="{{ $user->name }}" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" value="{{ $user->username }}" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" value="{{ $user->email }}" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" value="{{ $user->phone }}" class="form-control" disabled>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label for="">City</label>
                                <input type="text" value="{{ $user->city }}" class="form-control" disabled>
                            </div>
                            <div class="col">
                                <label for="">Country</label>
                                <input type="text" value="{{ $user->country }}" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <input type="text" class="form-control" value="{{ $user->status }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">Bio</label>
                            <textarea name="" id="" cols="100%" rows="5" class="form-control" disabled>
                                    {{ $user->bio }}
                                </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endcomponent
