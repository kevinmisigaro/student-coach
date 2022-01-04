@component('layouts.dashboard')

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">
            Universities
        </h1>
        <p class="mb-4"></p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Add university
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create University</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">University name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">City</label>
                                <select name="city" class="form-control">
                                    <option value="" selected disabled>
                                        Select city
                                    </option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">
                                            {{ $city->name }}, {{ $city->country->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Description</label>
                                <textarea name="body" id="" cols="100%" rows="7" class="form-control mb-3"></textarea>
                            </div>
                            <div class="form-group mb-5">
                                <label for="">University image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <button class="btn btn-success btn-block">
                                    Create university
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
            <!---//Modal--->

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
                        Image
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
                    @foreach ($universities as $university)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ $university->name }}
                            </td>
                            <td>
                                {{ $university->image }}
                            </td>
                            <td>
                                {{ $university->city->name }}
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