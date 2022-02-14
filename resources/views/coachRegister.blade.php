@component('layouts.main')
    <div class="container-fluid mt-5">
        <div class="container">

            @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif


            <div class="d-flex row justify-content-center my-5">
                <div class="card" style="width:60rem">
                    <div class="card-body">
                        <div class="text-center">
                            <h4>
                               <u>
                                Register as a coach
                               </u>
                            </h4>
                        </div>
                        <br />
                        <form action="/register/coach" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col mb-3" style="text-align:left">
                                    <label>Full name</label>
                                    <input type="text" name="name" class="form-control" />
                                </div>
                                <div class="col mb-3" style="text-align:left">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3" style="text-align:left">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" />
                                </div>
                                <div class="col mb-3" style="text-align:left">
                                    <label>Phone</label>
                                    <input type="text" name="phone" placeholder="+234..." class="form-control" />
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Biography</label>
                                <textarea name="bio" cols="100%" rows="4" class="form-control"></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Area of expertise</label>
                                <input type="text" class="form-control" name="expertise">
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3 col-sm-12">
                                    <label for="">City</label>
                                    <input type="text" name="city" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3 col-sm-12">
                                    <label for="">Country</label>
                                    <input type="text" name="country" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3" style="text-align:left">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" />
                                </div>
                                <div class="col mb-3" style="text-align:left">
                                    <label>Confirm Password</label>
                                    <input type="password" name="confirm" class="form-control" />
                                </div>
                            </div>
    
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="mycheckbox" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    <a href="/terms">Read our terms of
                                        service</a>
                                </label>
                            </div>
    
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Terms of service</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem ad nihil
                                            doloribus ratione maxime, vitae quae sed corrupti voluptas necessitatibus
                                            aliquam accusantium unde? Aliquid, neque necessitatibus? Nihil perferendis
                                            accusamus quae?
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem ad nihil
                                            doloribus ratione maxime, vitae quae sed corrupti voluptas necessitatibus
                                            aliquam accusantium unde? Aliquid, neque necessitatibus? Nihil perferendis
                                            accusamus quae?
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem ad nihil
                                            doloribus ratione maxime, vitae quae sed corrupti voluptas necessitatibus
                                            aliquam accusantium unde? Aliquid, neque necessitatibus? Nihil perferendis
                                            accusamus quae?
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem ad nihil
                                            doloribus ratione maxime, vitae quae sed corrupti voluptas necessitatibus
                                            aliquam accusantium unde? Aliquid, neque necessitatibus? Nihil perferendis
                                            accusamus quae?
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem ad nihil
                                            doloribus ratione maxime, vitae quae sed corrupti voluptas necessitatibus
                                            aliquam accusantium unde? Aliquid, neque necessitatibus? Nihil perferendis
                                            accusamus quae?
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem ad nihil
                                            doloribus ratione maxime, vitae quae sed corrupti voluptas necessitatibus
                                            aliquam accusantium unde? Aliquid, neque necessitatibus? Nihil perferendis
                                            accusamus quae?
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem ad nihil
                                            doloribus ratione maxime, vitae quae sed corrupti voluptas necessitatibus
                                            aliquam accusantium unde? Aliquid, neque necessitatibus? Nihil perferendis
                                            accusamus quae?
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem ad nihil
                                            doloribus ratione maxime, vitae quae sed corrupti voluptas necessitatibus
                                            aliquam accusantium unde? Aliquid, neque necessitatibus? Nihil perferendis
                                            accusamus quae?
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem ad nihil
                                            doloribus ratione maxime, vitae quae sed corrupti voluptas necessitatibus
                                            aliquam accusantium unde? Aliquid, neque necessitatibus? Nihil perferendis
                                            accusamus quae?
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem ad nihil
                                            doloribus ratione maxime, vitae quae sed corrupti voluptas necessitatibus
                                            aliquam accusantium unde? Aliquid, neque necessitatibus? Nihil perferendis
                                            accusamus quae?
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem ad nihil
                                            doloribus ratione maxime, vitae quae sed corrupti voluptas necessitatibus
                                            aliquam accusantium unde? Aliquid, neque necessitatibus? Nihil perferendis
                                            accusamus quae?
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem ad nihil
                                            doloribus ratione maxime, vitae quae sed corrupti voluptas necessitatibus
                                            aliquam accusantium unde? Aliquid, neque necessitatibus? Nihil perferendis
                                            accusamus quae?
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem ad nihil
                                            doloribus ratione maxime, vitae quae sed corrupti voluptas necessitatibus
                                            aliquam accusantium unde? Aliquid, neque necessitatibus? Nihil perferendis
                                            accusamus quae?
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem ad nihil
                                            doloribus ratione maxime, vitae quae sed corrupti voluptas necessitatibus
                                            aliquam accusantium unde? Aliquid, neque necessitatibus? Nihil perferendis
                                            accusamus quae?
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem ad nihil
                                            doloribus ratione maxime, vitae quae sed corrupti voluptas necessitatibus
                                            aliquam accusantium unde? Aliquid, neque necessitatibus? Nihil perferendis
                                            accusamus quae?
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem ad nihil
                                            doloribus ratione maxime, vitae quae sed corrupti voluptas necessitatibus
                                            aliquam accusantium unde? Aliquid, neque necessitatibus? Nihil perferendis
                                            accusamus quae?
                                        </div>
                                    </div>
                                </div>
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