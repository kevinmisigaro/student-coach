@component('layouts.main')
<div class="container-fluid py-5">
   <div class="container">

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

       <div class="card" style="width: 100%">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ env('APP_URL') }}/{{ $event->image }}" class="img-fluid" alt="...">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                    <i class="fa fa-instagram ms-2" aria-hidden="true"></i>
                    <i class="fa fa-whatsapp ms-2" aria-hidden="true"></i>
                </div>
                <div class="col-md-6 p-4">
                    {{ \Carbon\Carbon::parse($event->event_date)->format('l, jS, F,y'); }}
                    <br>
                    <h4>
                        <b>{{ $event->name }}</b>
                    </h4>
                    <br>
                    <small>
                        <b>Location:</b> {{ $event->location }}
                     </small>
                     <br><br>
                     <small>
                         <b>Description:</b> <br>
                         {{ $event->description }}
                     </small>
                     <br><br>
                     <small><b>Entrance:</b> Free</small>
                     <br><br>
                     <a href="/event/attend/{{ $event->id }}" class="btn btn-success">
                         Attend
                     </a>
                </div>
            </div>
       </div>
   </div>
</div>
@endcomponent
