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
        background-image: url('{{ asset('images/teaching.png')}}')
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
                            Communities are a great way to connect <br> with fellow students, recent graduates and <br>
                            young professionals.
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
                            Our coaches are trailblazers who have 'been there <br> and done that' and achieved success
                            in their academic <br> and professional careers.
                        </i>
                    </h4>
                    <br>
                    <a href="/partner" class="btn btn-primary btn-lg px-5">
                        Meet our coaches
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
            <div class="col-md-4 mb-5 text-center">
                <i class="fa fa-users" aria-hidden="true" style="font-size: 35px"></i>
                <h4>
                    Community
                </h4>
                <p>
                    Join a forum on a topic of interest or create your own to start conversations with like-minded
                    people.
                    Find your tribe, join or start a forum
                </p>
                <a href="/forum" class="btn btn-primary btn-sm">
                    View community
                </a>
            </div>

            <div class="col-md-4 mb-5 text-center">
                <i class="fa fa-graduation-cap" aria-hidden="true" style="font-size: 35px"></i>
                <h4>
                    Coaching
                </h4>
                <p>
                    Our coaches are experienced professionals in career coaching, academia and study mobility including
                    trailblazers with notable achievements as former international students in the UK and Canada.
                </p>
                <a href="/partner" class="btn btn-primary btn-sm">
                    View coaches
                </a>
            </div>

            <div class="col-md-4 mb-3 text-center">
                <i class="fa fa-calendar-o" aria-hidden="true" style="font-size: 35px"></i>
                <h4>
                    Events
                </h4>
                <p>
                    Sign up for our events to get insights on Postgraduate studies and how to get your student Visa
                    without hassle, Access world class career advisory sessions.
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
            <h3><b><u>Testimonial</u></b></h3>
            <br>
            <p>
                "I think it is a very important event and more people should participate. I guess people do not attach
                value to unpaid events. I did not know what to expect but i'm glad I did. I also like that the coaches
                were involved in the activities, doing exactly what they preach!"
            </p>
            <img src="{{ asset('images/femaleavatar.png') }}"
                style="width: 90px; height: 90px; border:1px solid black" class='rounded-circle mb-2' alt='...' />
            <p>
                <b><i>Ada, participant at TSC career coaching workshop</i></b>
            </p>
        </div>

    </div>
</div>

<div class="container-fluid py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex flex-row justify-content-start">
                <i class="fa fa-phone" aria-hidden="true" style="font-size: 40pt"></i>
                <div class="ms-5">
                    <h4>
                        Phone:
                    </h4>
                    <p>
                        +255 782835136
                    </p>
                </div>
            </div>
            <div class="col-md-6 d-flex flex-row justify-content-start">
                <i class="fa fa-envelope" aria-hidden="true" style="font-size: 40pt"></i>
                <div class="ms-5">
                    <h4>
                        Email:
                    </h4>
                    <p>
                        ask@thestudentcoach.net
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" style="padding: 80px 0 50px 0; background: #710A3E">
    <div class="container pt-1 text-white">

        <div class="row mb-3">
            <div class="col-md-9 text-center mb-3">
                <h3>Join a global community of students online</h3>
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
