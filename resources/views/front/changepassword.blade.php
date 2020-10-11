@include('front.header')

<!-- ================ contact section start ================= -->
<section class="section-margin">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">Change Password</h2>
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
                <form method="post" action="{{ url('/') }}/changePassword">
                    @csrf


                    <div class="form-group">
                        <label>Old Password</label>
                        <input name="oldPassword" type="password" class="form-control" id="exampleInputPassword" placeholder="Old Password">
                    </div>


                    <div class="form-group">
                        <label>Password</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label>Repeat Password</label>
                        <input name="password_confirmation" type="password" class="form-control" id="exampleInputPasswordRepeat"
                               placeholder="Repeat Password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                    </div>
                    <hr>
                </form>
                <hr>
                <a href="{{ url('/') }}">Back to home Page</a>

            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->
@include('front.footer')