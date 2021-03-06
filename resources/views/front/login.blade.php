@include('front.header')

<!-- ================ contact section start ================= -->
<section class="section-margin">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">Login</h2>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif


            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @if($errors->any())
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            @endif
            <div class="col-lg-12">
                <form method="post" action="{{ url('/') }}/login">
                    @csrf
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" value="{{old('email')}}" type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                               placeholder="Enter Email Address">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <input type="hidden" name="role" value="User">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                    <hr>
                    <a href="{{ url('/') }}/register">Register</a>
                    | <a href="{{ url('/') }}/forgotPassword">Forgot Password</a>
                </form>


            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->
@include('front.footer')