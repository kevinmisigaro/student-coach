@component('layouts.dashboard')
    
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">
            My bookings
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
                       Event name
                    </th>
                    <th>
                        Event date
                    </th>
                    <th>
                        City
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
                        Image
                    </th>
                    <th>
                        City
                    </th>
                    <th>
                        Action
                    </th>
                  </tr>
                </tfoot>
                <tbody>
                    @foreach (\Illuminate\Support\Facades\Auth::user()->events as $event)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ $event->name }}
                            </td>
                            <td>
                                {{ $event->image }}
                            </td>
                            <td>
                                {{ $event->location }}
                            </td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

      <!-- /.container-fluid -->
@endcomponent