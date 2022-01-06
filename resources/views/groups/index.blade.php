@component('layouts.main')
<div class="container-fluid">
    <div class="container">

        <div class="text-center my-3">
            <h3><strong>Forum Groups</strong></h3>
        </div>

        <div class="row" style="margin-top: 50px">
            <div class="col-md-9">

                @if (count($groups)>0)
                    @foreach ($groups as $group)
                    <a href="/group/singlegroup/{{ $group->id }}" style="text-decoration: none; color: black">
                        <div class="card shadow mb-3" style="width: 100%">
                            <div class="card-body row">
                                <div class="col-md-9">
                                    <p>
                                        <strong>{{ $group->name }}</strong>
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    Members: {{ count($group->members) }}
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                @else
                <div class="alert alert-info mt-2 text-center" role="alert">
                    No groups
                </div>
                @endif
            </div>
            <div class="col-md-3">

            </div>
        </div>

    </div>
</div>
@endcomponent
