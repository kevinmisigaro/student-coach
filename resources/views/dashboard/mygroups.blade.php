@component('layouts.dashboard')

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">
            My groups
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
                        Name
                    </th>
                    <th>
                        Description
                    </th>
                    <th>
                        Members count
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
                        Description
                    </th>
                    <th>
                        Members count
                    </th>
                  </tr>
                </tfoot>
                <tbody>
                    @foreach (\Illuminate\Support\Facades\Auth::user()->groups as $group)
                   <tr>
                       <td>
                           {{  $loop->iteration }}
                       </td>
                       <td>
                           {{ $group->name }}
                       </td>
                       <td>
                           {{ $group->description }}
                       </td>
                       <td>
                           {{ $group->members->count() }}
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