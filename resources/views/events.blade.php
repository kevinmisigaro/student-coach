@component('layouts.main')
<div class="container-fluid py-5">
    <div class="container">
        <h4>
            <b>Events</b>
        </h4>
        <br />
        <form action="" method="post">
            <div class="row mb-4">
                <div class="col-md-4 mb-3">
                    <input type="date" class="form-control">
                    <br>
                    <button class="btn btn-primary">
                        Search via date
                    </button>
                </div>
            </div>
        </form>
        <div class="row">
            @if (count($events) > 0)
            @foreach ($events as $event)
            <div class="col-md-4 mb-3">
                <a href="/event/{{ $event->id }}" style="text-decoration: none; color: black">
                    <div class="card" style="width:100%">
                        <div
                            style="background-image: url('{{ env('APP_URL') }}/{{ $event->image }}'); background-size:cover; height: 200px; background-position:center center ">
                        </div>
                        <div class="card-body">
                            <h5>
                                <b>{{ $event->name }}</b>
                            </h5>
                            <small>
                                {{ \Carbon\Carbon::parse($event->event_date)->format('l, jS, F'); }} at
                                {{ $event->event_time }}
                            </small>
                            <br>
                            <small>
                                <b>Location:</b> {{ $event->location }}
                            </small>
                            <br>
                            <small><b>Entrance:</b> Free</small>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            @else
            No events
            @endif
        </div>
    </div>
</div>
@endcomponent
