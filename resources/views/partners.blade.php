@component('layouts.main')
<div class='container-fluid py-5 mt-3'>
    <div class='container'>

        <p>
            We offer a range of 1:1 coaching and group coaching to help you achieve your academic, professional and
            career goals at home or abroad.
        </p>

        <p>
            Professional review, advice and support when you need it including:
            Scholarship application
            Personal statements
            Student visa application
            Pre-interview preparation
            Career planning
            Immigration advice
            Grant applications
            PhD proposals
            Tests and courses
            Eligibility evaluation
        </p>

        <br>

        <h3>
            Counsellors
        </h3>

        <div class='row'>
            @if (count(\App\Models\User::where('role', 3)->get()) > 0)
            @foreach (\App\Models\User::where('role', 3)->get() as $coach)
            <div class='col-md-3 mb-3 text-center'>
                <a href="/counsellor/{{ $coach->id }}" style="text-decoration: none; color: black">
                    <div class='card' style="width: 100%">

                        <div class='card-body text-center'>
                            <img src="{{ asset('images/businessavatar.jpg') }}"
                                style="width: 150px; height: 150px; border:1px solid black" class='rounded-circle mb-2'
                                alt='...' />

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
@endcomponent
