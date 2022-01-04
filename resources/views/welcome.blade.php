@component('layouts.main')
<style>
    .hero-top {
        background-size: cover;
        height: 60vh;
        background-color: lightblue;
        background-position: right center;
    }

    .hero {
        background: rgba(39, 62, 84, 0.6);
        overflow: hidden;
        height: 100%;
        z-index: 2;
        color: #fff;
        width: 100%;
    }

</style>
<div class="container-fluid hero-top" style="background-image: url('{{ asset('images/teaching.jpg')}}')">
    <div class="container-fluid hero">
        <div class="py-4">

            <div class="row container">
                <div class="col-md-6">
                    <div class="mt-5">
                        <h1>
                            <strong>
                                Connecting students to experienced Education Counsellors
                                specialising in education abroad.
                            </strong>
                        </h1>
                    </div>
                </div>

                <div class="col-md-6">

                </div>
            </div>
        </div>
    </div>
</div>

<div class='container-fluid py-5'>
    <div class='container'>

        <h2>
            Counsellors
        </h2>

        <br />

        <div class='row'>
            @if (count($coaches) > 0)
            @foreach ($coaches as $coach)
            <div class='col-md-3 mb-3 text-center'>
                <a href="/counsellor/{{ $coach->id }}" style="text-decoration: none; color: black">
                    <div class='card' style="width: 100%">

                        <div class='card-body text-center'>
                            <img src="{{ asset('images/businessavatar.jpg') }}" style="width: 150px; height: 150px"
                                class='rounded-circle mb-2' alt='...' />

                            <h4>
                                <strong>
                                    {{ $coach->name }}
                                </strong>
                            </h4>
                            <p>
                                {{ $coach->city->name }}
                            </p>

                        </div>

                    </div>
                </a>
            </div>
            @endforeach
            @else
            <div class="col-md-12 text-center">
                <p>No coaches at this time</p>
            </div>
            @endif
        </div>

    </div>
</div>


<div class='my-3 container-fluid'>
    <div class='container'>

        <h2>
            Jobs
        </h2>

        <br />

        <div class='row'>
            @if (count($jobs)>0)
            @foreach ($jobs as $job)
            <div class='col-md-3 text-center'>
                <a href="/job/{{ $job->id }}" style="color: black; text-decoration:none">
                    <div class='card mb-3' style="width: 100%">
                        <div class='card-body'>
                            <h4>
                                {{ $job->title }}
                            </h4>
                            <p>
                                {{ $job->city->name }}, {{ $job->city->country->name }}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            @else
            <div class="col-md-12 text-center">
                <p>No jobs currently.</p>
            </div>
            @endif
        </div>
    </div>
</div>


@endcomponent
