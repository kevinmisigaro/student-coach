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
                </div>
                <div class="col-md-6 p-4">
                    {{ \Carbon\Carbon::parse($event->event_date)->format('l, jS, F,Y'); }}
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
                     <div class="mt-3">
                         <p>Share:</p>
                        <div class="d-flex flex-row justify-content-start">
                            <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ env('APP_URL') }}/event/{{ $event->id }}">
                                <i class="fa fa-facebook" aria-hidden="true" style="font-size: 15pt"></i>
                            </a>
                            <a target="_blank" href="https://twitter.com/intent/tweet?url={{ env('APP_URL') }}/event/{{ $event->id }}">
                                <i class="fa fa-twitter ms-4" aria-hidden="true" style="font-size: 15pt"></i>
                            </a>
                            <a target="_blank" href="https://wa.me/?text=Student%20Coach%5Cn%20{{ env('APP_URL') }}/event/{{ $event->id }}">
                                <i class="fa fa-whatsapp ms-4" aria-hidden="true" style="font-size: 15pt"></i>
                            </a>
                            <a target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url={{ env('APP_URL') }}/event/{{ $event->id }}">
                                <i class="fa fa-linkedin ms-4" aria-hidden="true" style="font-size: 15pt"></i>
                            </a>
                            <a target="_blank" href="https://t.me/share/url?url={{ env('APP_URL') }}/event/{{ $event->id }}">
                                <i class="fa fa-telegram ms-4" aria-hidden="true" style="font-size: 15pt"></i>
                            </a>
                         </div>
                     </div>
                     
                </div>
            </div>
       </div>
   </div>
</div>
@endcomponent
