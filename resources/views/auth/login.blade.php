@component('layouts.main')
<div class="pt-5 container-fluid" style="background: #f5f5f5; height: 100vh">
    <div class="container">
        @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif


        <div class="d-flex row justify-content-center">
          <div class="card" style="width: 30rem">
            <div class="card-body">
                <h4>Login</h4>
                <br />
                <form method="POST" action="/login">
                    @csrf
                    <div class="form-group mb-3">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" />
                    </div>
                    <div class="form-group mb-5">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" />
                    </div>
                    <div class="form-group mb-3 d-grid">
                        <button type="submit" class="btn btn-success">Login</button>
                    </div>
                </form>
            </div>
        </div>
        </div>


    </div>
</div>
@endcomponent
