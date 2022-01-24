@component('layouts.main')
<div class="pt-5 container-fluid" style="background: #f5f5f5; height: 100vh">
    <div class="container">
        <div class="d-flex row justify-content-center">
            <div class="card" style="width:30rem">
                <div class="card-body">
                    <h4>
                        Register
                    </h4>
                    <br />
                    <form action="/register" method="POST">
                        @csrf
                        <div class="form-group mb-3" style="text-align:left">
                            <label>Full name</label>
                            <input type="text" name="name" class="form-control" />
                        </div>
                        <div class="form-group mb-3" style="text-align:left">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" />
                        </div>
                        <div class="form-group mb-3" style="text-align:left">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" />
                        </div>
                        <div class="form-group mb-3" style="text-align:left">
                            <label>Confirm Password</label>
                            <input type="password" name="confirm" class="form-control" />
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-6 mb-3 col-sm-12">
                                <label for="">City</label>
                                <input type="text" name="city" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3 col-sm-12">
                                <label for="">Country</label>
                                <input type="text" name="country" class="form-control">
                            </div>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                              Read our terms of service
                            </label>
                          </div>
                        <div class="form-group mb-3 d-grid">
                            <button type="submit" class="btn btn-success">
                                Register
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endcomponent
