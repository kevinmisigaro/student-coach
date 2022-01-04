@component('layouts.main')
<div class='mt-5 container-fluid'>
    <div class='container'>
        <div class='row'>
            <div class='col-md-4'>
            <div class='card' style="width:100%">
                <div class='card-body text-center'>
                    <img src="{{ asset('images/harvard-university-academy-scholars-program-2021-funding-available.png') }}" alt='...' class='img-fluid' />
                    <br/>
                    <p>
                        <strong>
                        {{ $university->name }}
                        </strong>
                    </p>
                    <p>
                        {{ $university->city->name }}, {{ $university->city->country->name }}
                    </p>
                </div>
            </div>
            </div>
            <div class='col-md-8'>
                <h4>About the university:</h4>
                <br>
                <p style="text-align: left">
                {{ $university->description }}
                </p>
            </div>
        </div>
    </div>
</div>
@endcomponent