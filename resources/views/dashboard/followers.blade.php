@component('layouts.dashboard')

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">
            Followers
        </h1>
        <p class="mb-4"></p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
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
                        Username
                    </th>
                    <th>
                        City
                    </th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>
                        S/N
                    </th>
                    <th>
                        Username
                    </th>
                    <th>
                        City
                    </th>
                  </tr>
                </tfoot>
                <tbody>
                    @foreach (\App\Models\Follower::where('user_id', \Illuminate\Support\Facades\Auth::id())->get() as $f)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ $f->follower->username }}
                            </td>
                            <td>
                                {{ $f->follower->city }}, {{ $f->follower->country }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

      <!-- /.container-fluid -->
@endcomponent