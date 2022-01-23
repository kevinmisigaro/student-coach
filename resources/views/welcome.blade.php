@component('layouts.main')
<style>
    .hero-top {
        background-size: cover;
        height: 60vh;
        background-color: lightblue;
        background-position: right center;
    }

    .hero {
        background: rgba(39, 62, 84, 0.6);
        overflow: hidden;
        height: 100%;
        z-index: 2;
        color: #fff;
        width: 100%;
    }

    .carousel {
        height: 70vh;
        background-position: center center;
        position: relative;
        z-index: 1;
        overflow: hidden;
    }

    .overlay {
        position: absolute;
        top: 0px;
        left: 0px;
        height: 100%;
        width: 100%;
        background-color: black;
        opacity: 0.5;
    }

    #carousel1 {
        background-image: url('{{ asset('images/students-standing.png')}}')
    }

    #carousel2 {
        background-image: url('{{ asset('images/students-sitting.png')}}')
    }

    #carousel3 {
        background-image: url('{{ asset('images/students-standing.png')}}')
    }

</style>

<div class="owl-carousel owl-theme owl-loaded">
    <div class="owl-stage-outer">
        <div class="owl-stage">
            <div class="owl-item" id="carousel1">
                <div class="container pt-5 text-white carousel" style="z-index:100">
                    <h1>
                        <strong>
                            Slingshot your academic <br> and career success
                        </strong>
                    </h1>
                    <br>
                    <h4>
                        <i>
                            Connecting learning and development <br> communities for the savvy student
                        </i>
                    </h4>
                    <br><br>
                    <a href="/register" class="btn btn-primary btn-lg px-5">
                        Get Started
                    </a>
                </div>
            </div>
            <div class="owl-item" id="carousel2">
                <div class="container pt-5 text-white carousel" style="z-index:100">
                    <h1>
                        <strong>
                            Join a community
                        </strong>
                    </h1>
                    <br>
                    <h4>
                        <i>
                            Connecting learning and development <br> communities for the savvy student
                        </i>
                    </h4>
                    <br><br>
                    <a href="/forum" class="btn btn-primary btn-lg px-5">
                        Find a learning community
                    </a>
                </div>
            </div>
            <div class="owl-item" id="carousel3">
                <div class="container pt-5 text-white carousel" style="z-index:99999">
                    <h1>
                        <strong>
                            Connect to a coach
                        </strong>
                    </h1>
                    <br>
                    <h4>
                        <i>
                            Connecting learning and development <br> communities for the savvy student
                        </i>
                    </h4>
                    <br><br>
                     <a href="/forum" class="btn btn-primary btn-lg px-5">
                        Find a learning community
                    </a> 
                </div>
            </div>
        </div>
    </div>

</div>

{{-- <div class='container-fluid my-5'>
    <div class='container'>

        <div class="row">
            <div class="col-md-4 text-center">
                <h3>
                    <b>Study Abroad</b>
                </h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid, accusamus mollitia alias optio
                    expedita consectetur consequuntur exercitationem impedit excepturi atque minus, illo repudiandae.
                    Cum, soluta. Rem modi placeat dolorem totam?
                </p>
            </div>

            <div class="col-md-4 text-center">
                <h3>
                    <b>Join a community</b>
                </h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid, accusamus mollitia alias optio
                    expedita consectetur consequuntur exercitationem impedit excepturi atque minus, illo repudiandae.
                    Cum, soluta. Rem modi placeat dolorem totam?
                </p>
                <a href="/forum">Find a learning community</a>
            </div>

            <div class="col-md-4 text-center">
                <h3>
                    <b>Connect to a coach</b>
                </h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid, accusamus mollitia alias optio
                    expedita consectetur consequuntur exercitationem impedit excepturi atque minus, illo repudiandae.
                    Cum, soluta. Rem modi placeat dolorem totam?
                </p>
            </div>
        </div>

    </div>
</div> ----}}


<div class="container-fluid py-5" style="background: #f5f5f5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 text-center mb-3">
                <img src="{{ asset('images/students-suits.jpg') }}" alt="" class="img-fluid">
            </div>
            <div class="col-md-6 col-sm-12 mb-3">
                <div class="ms-3">
                    <h3>
                        <b>Who we are</b>
                    </h3>
                    <p class="text-muted" style="text-align: justify">
                        We provide curated communities and coaching for students and young professionals.
                        For many students, accessing relevant information for academic, study abroad and career success
                        can
                        often be
                        confusing. Does this sound like you or someone
                        <br><br>
                        At the Student Coach, we believe in the power of peer-mentoring by connecting students,
                        graduates,
                        and young
                        professionals to support academic, professional and career aspirations.
                        <br><br>
                        We are the premier learning and development community amplifying opportunities through curated,
                        interactive
                        communities and our dedicated coaching.
                        <br>
                        We’ve been there, done that and want to be part of your success story.
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="container-fluid py-5">
    <div class="container">
        <div class="text-center">
            <h2>
                <u><b>Why Student Coach?</b></u>
            </h2>
        </div>

        <br>

        <div class="row mt-5">
            <div class="col-md-6 mb-3 text-center">
                <h4>
                    Community
                </h4>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, blanditiis tenetur quaerat illum
                    libero, ipsum itaque laboriosam, quas dolorem placeat eum quam dolor similique quis fugit animi
                    rerum deserunt modi?
                </p>
                <a href="/forum" class="btn btn-primary btn-sm">
                    View community
                </a>
            </div>

            <div class="col-md-6 mb-5 text-center">
                <h4>
                    Coaching
                </h4>
                <p>
                    Our coaches are experienced professionals in career coaching, academia and study mobility including
                    trailblazers with notable achievements as former international students in the UK and Canada.
                </p>
                <a href="/partners" class="btn btn-primary btn-sm">
                    View coaches
                </a>
            </div>

            <div class="col-md-6 mb-3 text-center">
                <h4>
                    Events
                </h4>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, blanditiis tenetur quaerat illum
                    libero, ipsum itaque laboriosam, quas dolorem placeat eum quam dolor similique quis fugit animi
                    rerum deserunt modi?
                </p>
                <a href="/events" class="btn btn-primary btn-sm">
                    View events
                </a>
            </div>

        </div>
    </div>
</div>

<div class="container-fluid py-5" style="background: #f5f5f5">
    <div class="container">

        <div class="text-center">
            <h3><b>Testimonial</b></h3>
            <br>
            <img src="{{ asset('images/businessavatar.jpg') }}" style="width: 100px; height: 100px; border:1px solid black"
                                class='rounded-circle mb-2' alt='...' />
<p>
    John Doe
</p>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam quidem illum, facilis autem, modi
    commodi, totam culpa sint expedita tempora similique necessitatibus sapiente earum natus minima dolorum
    blanditiis omnis vitae.
</p>
</div>

</div>
</div>

<div class="container-fluid py-5 bg-success">
    <div class="container py-5 text-white">

        <div class="row mb-3">
            <div class="col-md-9 text-center mb-3">
                <h1>Join a global community of students online</h1>
            </div>
            <div class="col-md-3 text-center mb-3">
                <a href="/register" class="btn btn-light mt-2">
                    Get Started
                </a>
            </div>
        </div>
    </div>
</div>


@endcomponent
