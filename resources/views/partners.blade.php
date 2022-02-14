@component('layouts.main')
<div class='container-fluid py-5 mt-3'>
    <div class='container'>

        <p>
            We offer a range of 1:1 coaching and group coaching to help you achieve your academic, professional and
            career goals at home or abroad.They will review your history,
            education, strengths, problem areas, and goals and build your roadmap to success.
        </p>

        <p>
            Professional review, advice and support when you need it including:
        </p>
        <ul>
            <li>Scholarship application
                </li>
                <li>
                    Personal statements
                
                </li>
                <li>
                    Student visa application
                    
                </li>
                <li>
                    Pre-interview preparation
                    
                </li>
                <li>
                    Career planning
                    
                </li>
                <li>
                    Immigration advice
                    
                </li>
                <li>
                    Grant applications
                    
                </li>
                <li>
                    PhD proposals
                    
                </li>
                <li>
                    Tests and courses
                    
                </li>
                <li>
                    Eligibility evaluation 
                </li>
        </ul>

        <br>

        <h3>
            Coaches
        </h3>

        <div class='row'>
            @if (count(\App\Models\User::where('role', 3)->get()) > 0)
            @foreach (\App\Models\User::where('role', 3)->get() as $coach)
            <div class='col-md-3 mb-3 text-center'>
                <a href="/counsellor/{{ $coach->id }}" style="text-decoration: none; color: black">
                    <div class='card' style="width: 100%">

                        <div class='card-body text-center'>
                            
                            @if ($coach->avatar == null)
                                <img src="{{ asset('images/businessavatar.jpg') }}"
                                style="width: 150px; height: 150px; border:1px solid black" class='rounded-circle mb-2'
                                alt='...' />
                            @else
                                <img src="{{ env('APP_URL') }}/{{ $coach->avatar }}"
                                style="width: 150px; height: 150px; border:1px solid black" class='rounded-circle mb-2'
                                alt='...' /> 
                            @endif

                            <h4>
                                <strong>
                                    {{ $coach->name }}
                                </strong>
                            </h4>
                            <p>
                                {{ $coach->city }}, {{ $coach->country }}
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
