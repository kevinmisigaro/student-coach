@component('layouts.main')

<div class='my-3 container-fluid'>
    <div class='container'>

        <h2>
            Jobs
        </h2>

        <br />

        <div class='row'>
            @if (count($jobs))
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
