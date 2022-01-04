@component('layouts.main')
<div class='my-3 container-fluid'>
    <div class='container'>

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

        <div class='row mt-5'>
            <div class='col-md-4 text-center'>
                <div class='card' style="width:100%">
                    <div class='card-body'>
                        <h4>
                            <strong>{{ $job->title }}</strong>
                        </h4>
                        <p>
                            {{ $job->city->name }}, <br> {{ $job->city->country->name }}
                        </p>
                    </div>
                </div>
                <br />
                <button class='btn btn-primary' data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Apply
                </button>

                <!--//modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Do you want to apply for this position?
                                <br><br>
                                <a href="/applicant/{{ $job->id }}" class="btn btn-success">Apply</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!---//modal--->

            </div>
            <div class='col-md-8'>

                <div class='mb-3'>
                    <h5>Deadline date:</h5>
                    <p style="text-align:left">
                        {{ $job->deadline_date }}
                    </p>
                </div>

                <div class='mb-3'>
                    <h5>About the company:</h5>
                    <p style="text-align:left">
                        {{ $job->description }}
                    </p>
                </div>



                {{-- <div class='mb-5'>
                    <h5>Requirements:</h5>
                    <ul style="text-align:left">
                        <li>Lorem Ipsum is simply dummy text</li>
                        <li>Lorem Ipsum is simply dummy text</li>
                        <li>Lorem Ipsum is simply dummy text</li>
                        <li>Lorem Ipsum is simply dummy text</li>
                    </ul>
                </div>

                <div class='mb-3'>
                    <h5>Qualifications:</h5>
                    <ul style="text-align:left">
                        <li>Lorem Ipsum is simply dummy text</li>
                        <li>Lorem Ipsum is simply dummy text</li>
                        <li>Lorem Ipsum is simply dummy text</li>
                        <li>Lorem Ipsum is simply dummy text</li>
                    </ul>
                </div> --}}

            </div>
        </div>
    </div>
</div>
@endcomponent
