@component('layouts.dashboard')

<div>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Customer Row -->
    <div class="row">

        @if (\Illuminate\Support\Facades\Auth::user()->role == 1)
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">University partners
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                               {{ count($universities) }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="far fa-address-card fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Students
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ count($students) }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="far fa-address-card fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Coaches
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                               {{ count($coaches) }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="far fa-address-card fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if (\Illuminate\Support\Facades\Auth::user()->role == 2)
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Coaches consulted
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                               {{ count( \App\Models\Conversation::where('student_id', \Illuminate\Support\Facades\Auth::id())->get()) }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="far fa-address-card fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jobs applied
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                               0
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="far fa-address-card fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if (\Illuminate\Support\Facades\Auth::user()->role == 3)
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Student consultations
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                               {{ count( \App\Models\Conversation::where('coach_id', \Illuminate\Support\Facades\Auth::id())->get()) }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="far fa-address-card fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

</div>


</div>

@endcomponent
