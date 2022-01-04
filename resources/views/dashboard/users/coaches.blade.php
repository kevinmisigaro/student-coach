@component('layouts.dashboard')

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">
            Coaches
        </h1>
        <p class="mb-4"></p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            @if (\Illuminate\Support\Facades\Auth::user()->role == 1)
            <button class="btn btn-primary">
                Add coach
            </button>
            @endif
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>
                        S/N
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Action
                    </th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>
                        S/N
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                      Email
                    </th>
                    <th>
                        Action
                    </th>
                  </tr>
                </tfoot>
                <tbody>
                    @if (\Illuminate\Support\Facades\Auth::user()->role == 1)
                      @foreach ($coaches as $coach)
                          <tr>
                              <td>
                                  {{ $loop->iteration }}
                              </td>
                              <td>
                                  {{ $coach->name }}
                              </td>
                              <td>
                                  {{ $coach->email }}
                              </td>
                              <td></td>
                          </tr>
                      @endforeach
                    @endif

                    @if (\Illuminate\Support\Facades\Auth::user()->role == 2)
                      @foreach (\App\Models\Conversation::where('student_id', \Illuminate\Support\Facades\Auth::id())->get() as $convo)
                          <tr>
                              <td>
                                  {{ $loop->iteration }}
                              </td>
                              <td>
                                  {{ $convo->coach->name }}
                              </td>
                              <td>
                                  {{ $convo->coach->email }}
                              </td>
                              <td></td>
                          </tr>
                      @endforeach
                    @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>

      <!-- /.container-fluid -->
@endcomponent