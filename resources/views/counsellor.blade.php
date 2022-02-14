@component('layouts.main')
<div class="container-fluid mt-5">
    <div class="container">

        @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="row my-5">
            <div class="col-md-4 text-center">
                @if ($coach->avatar == null)
                <img src="{{ asset('images/businessavatar.jpg') }}" 
                style="max-width: 200px; border: 1px solid black" 
                class="rounded-circle" alt="..." /> 
                @else
                <img src="{{ env('APP_URL') }}/{{ $coach->avatar }}" 
                style="max-width: 200px; border: 1px solid black" 
                class="rounded-circle" alt="..." />
                @endif
                <br /><br>
                <p>
                    {{ $coach->name }}
                </p>
                <p>
                    {{ $coach->city }}, {{ $coach->country }}
                </p>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Start chat
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    Chat session
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                You are about to begin chat session with <strong>{{ $coach->name }}</strong>
                                <br><br>
                                <a href="/beginSession/{{ $coach->id }}" class="btn btn-success">Proceed</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!---//modal--->

            </div>
            <div class="col-md-8">
                <h3>
                    {{ $coach->name }}
                </h3>
                <br />
                <p style="text-align:left">
                    {{ $coach->bio }}
                </p>
            </div>
        </div>
    </div>
</div>
@endcomponent
