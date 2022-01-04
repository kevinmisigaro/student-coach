@component('layouts.main')
<div class="mt-5 container-fluid">
    <div class="container">
        <h2 class="text-center">
            <strong>Universities We Partner With</strong>
        </h2>
        <br />
        <div class="row">

            @foreach ($universities as $item)
            <div class="col-md-3">
              <a href="/university/{{ $item->id }}" style="text-decoration: none; color: black">
                  <div class="card mb-3" style="width: 100% ">
                      <div class="card-body">
                          <img src="{{ asset('images/harvard-university-academy-scholars-program-2021-funding-available.png') }}"
                              class="img-fluid" alt="..." />
                      </div>
                  </div>
              </a>
          </div>
            @endforeach
            
        </div>
    </div>
</div>
@endcomponent
