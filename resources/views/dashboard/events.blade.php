@component('layouts.dashboard')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">
    Events
</h1>
<p class="mb-4"></p>

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session()->has('error'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        @if (\Illuminate\Support\Facades\Auth::user()->role == 1)
        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"">
                Add Event
            </button>
            @endif

            <!-- Modal -->
            <div class=" modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Create new event
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/dashboard/events/store" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="">Event name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Event Location</label>
                                    <input type="text" name="location" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="">Event Time</label>
                                    <input type="time" name="time" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Event date</label>
                                    <input type="date" name="date" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="">Event Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Event Link</label>
                                    <input type="text" name="link" class="form-control">
                                    <small>This is optional</small>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="">Event description</label>
                                <textarea name="description" id="" cols="100%" rows="4"
                                    class="form-control mb-3"></textarea>
                                <small>This is optional</small>
                            </div>

                            <div class="form-group mb-3">
                                <button class="btn btn-success btn-block">
                                    Create Event
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


    </div>

</div>


<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>
                        S/N
                    </th>
                    <th>
                        Event name
                    </th>
                    <th>
                        Date
                    </th>
                    <th>
                        Location
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>
                        S/N
                    </th>
                    <th>
                        Event name
                    </th>
                    <th>
                        Date
                    </th>
                    <th>
                        Location
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
            </tfoot>
            <tbody>
                @if (count($events) > 0)
                @foreach ($events as $event)
                <tr>
                    <td>
                        {{ $loop->iteration }}
                    </td>
                    <td>
                        {{ $event->name }}
                    </td>
                    <td>
                        {{ $event->event_date }}
                    </td>
                    <td>
                        {{ $event->location }}
                    </td>
                    <td>

                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
</div>

<!-- /.container-fluid -->
@endcomponent
