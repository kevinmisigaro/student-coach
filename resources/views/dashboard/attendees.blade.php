@component('layouts.dashboard')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">
    {{ $event->name }} attendees
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
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>
                            S/N
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Booking date
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
                            Name
                        </th>
                        <th>
                            Booking date
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </tfoot>
                <tbody>
                    @if (count($event->attendees) > 0)
                    @foreach ($event->attendees as $attendee)
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            {{ $attendee->name }}
                        </td>
                        <td>
                            {{ $attendee->pivot->created_at }}
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
