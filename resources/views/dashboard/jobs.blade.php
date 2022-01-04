@component('layouts.dashboard')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">
    Jobs
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
                Add job
            </button>
            @endif

            <!-- Modal -->
            <div class=" modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Create new job
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/dashboard/job/store" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">Job title</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">City</label>
                                <select name="city" class="form-control">
                                    <option value="" selected disabled>
                                        Select city
                                    </option>
                                    @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">
                                        {{ $city->name }}, {{ $city->country->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Deadline date</label>
                                <input type="date" name="deadline" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Job Link</label>
                                <input type="text" name="link" class="form-control">
                            </div>
                            <div class="form-group mb-4">
                                <label for="">Job description</label>
                                <textarea name="description" id="" cols="100%" rows="7"
                                    class="form-control mb-3"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <button class="btn btn-success btn-block">
                                    Create job
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
                        Title
                    </th>
                    <th>
                        Deadline date
                    </th>
                    <th>
                        City
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
                        Title
                    </th>
                    <th>
                        Deadline date
                    </th>
                    <th>
                        City
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
            </tfoot>
            <tbody>
                @if (\Illuminate\Support\Facades\Auth::user()->role == 1)
                @foreach ($jobs as $job)
                <tr>
                    <td>
                        {{ $loop->iteration }}
                    </td>
                    <td>
                        {{ $job->title }}
                    </td>
                    <td>
                        {{ $job->deadline_date }}
                    </td>
                    <td>
                        {{ $job->city->name }}
                    </td>
                    <td></td>
                </tr>
                @endforeach
                @endif

                @if (\Illuminate\Support\Facades\Auth::user()->role == 2)
                @foreach (\App\Models\Applicant::where('user_id',\Illuminate\Support\Facades\Auth::id())->get() as
                $application)
                <tr>
                    <td>
                        {{ $loop->iteration }}
                    </td>
                    <td>
                        {{ $application->job->title }}
                    </td>
                    <td>
                        {{ $application->job->deadline_date }}
                    </td>
                    <td>
                        {{ $application->job->city->name }}
                    </td>
                    <td></td>
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
