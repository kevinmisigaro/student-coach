@component('layouts.main')
<div class='container-fluid py-5 mt-3'>
    <div class='container'>

        <h2>
            Counsellors
        </h2>

        <br />

        <div class='row'>
            @if (count(\App\Models\User::where('role', 3)->get()) > 0)
            @foreach (\App\Models\User::where('role', 3)->get() as $coach)
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
@endcomponent