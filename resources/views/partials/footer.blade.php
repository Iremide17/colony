<footer class="dark-footer skin-dark-footer style-2">
    <div class="footer-middle">
        <div class="container">
            <div class="row">

                <div class="col-lg-5 col-md-5">
                    <div class="footer_widget">
                        <img src="assets/img/logo-light.png" class="img-footer small mb-2" alt="" />
                        <h4 class="extream mb-3">Do you need help with<br>anything?</h4>
                        <p>Receive updates, hot deals, tutorials, discounts sent straignt in your inbox every month</p>
                        <div class="foot-news-last">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Email Address">
                                <div class="input-group-append">
                                    <button type="button" class="input-group-text theme-bg b-0 text-light">Subscribe</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-7 ml-auto">
                    <div class="row">

                        <div class="col-lg-6 col-md-6">
                            <div class="footer_widget">
                                <h4 class="widget_title">Layouts</h4>
                                <ul class="footer-menu">
                                    <li><a href="{{ url('/')}}">Home Page</a></li>
                                    <li><a href="{{  route('property.index') }}">Property Page</a></li>
                                    <li><a href="{{ url('contact') }}">Contact Page</a></li>
                                </ul>
                            </div>
                        </div>

                        {{-- <div class="col-lg-4 col-md-4">
                            <div class="footer_widget">
                                <h4 class="widget_title">All Sections</h4>
                                <ul class="footer-menu">
                                    <li><a href="#">Headers<span class="new">New</span></a></li>
                                    <li><a href="#">Features</a></li>
                                    <li><a href="#">Attractive<span class="new">New</span></a></li>
                                    <li><a href="#">Testimonials</a></li>
                                    <li><a href="#">Videos</a></li>
                                    <li><a href="#">Footers</a></li>
                                </ul>
                            </div>
                        </div> --}}

                        <div class="col-lg-6 col-md-6">
                            <div class="footer_widget">
                                <h4 class="widget_title">Company</h4>
                                <ul class="footer-menu">
                                    <li><a href="{{ url('about-us') }}">About</a></li>
                                    <li><a href="{{ route('terms.show') }}">Our Terms of use</a></li>
                                    <li><a href="{{ route('policy.show') }}">Our Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 text-center">
                    <p class="mb-0">© {{ date('Y') }} {{ application('name') }}; All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>


<!-- Log In Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="registermodal" aria-hidden="true">
    <div class="modal-dialog modal-xl login-pop-form" role="document">
        <div class="modal-content overli" id="registermodal">
            <div class="modal-body p-0">
                <div class="resp_log_wrap">
                    <div class="resp_log_thumb" style="background:url({{ asset('img/log.jpg') }})no-repeat;"></div>
                    <div class="resp_log_caption">
                        <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
                        <div class="edlio_152">
                            <ul class="nav nav-pills tabs_system center" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-login-tab" data-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true"><i class="fas fa-sign-in-alt mr-2"></i>Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-signup-tab" data-toggle="pill" href="#pills-signup" role="tab" aria-controls="pills-signup" aria-selected="false"><i class="fas fa-user-plus mr-2"></i>Register</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">
                                <div class="login-form">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="form-group">
                                            <x-form.label for="email" value="{{ __('Email') }}" />
                                            <div class="input-with-icon">
                                                <x-jet-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus /> <i class="ti-user"></i>
                                            </div>
                                            <x-form.error for="email" />
                                        </div>

                                        <div class="form-group">
                                            <x-form.label for="password" value="{{ __('Password') }}" />
                                            <div class="input-with-icon">
                                                <x-jet-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                                                <i class="ti-unlock"></i>
                                            </div>
                                            <x-form.error for="password" />
                                        </div>

                                        <div class="form-group">
                                            <div class="eltio_ol9">
                                                <div class="eltio_k1">
                                                    <input id="dd" class="checkbox-custom" name="dd" type="checkbox">
                                                    <label for="dd" class="checkbox-custom-label">Remember Me</label>
                                                </div>
                                                @if (Route::has('password.request'))
                                                <div class="eltio_k2">
                                                    <a href="#">Lost Your Password?</a>
                                                </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-md full-width pop-login">Login</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-signup" role="tabpanel" aria-labelledby="pills-signup-tab">
                                <div class="login-form">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <div class="input-with-icon">
                                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                                <i class="ti-user"></i>
                                            </div>
                                            <x-form.error for="name" />
                                        </div>

                                        <div class="form-group">
                                            <label>Email ID</label>
                                            <div class="input-with-icon">
                                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                                <i class="ti-user"></i>
                                            </div>
                                            <x-form.error for="email" />
                                        </div>

                                        <div class="form-group">
                                            <label>Password</label>
                                            <div class="input-with-icon">
                                                <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                                                <i class="ti-unlock"></i>
                                            </div>
                                            <x-form.error for="password" />
                                        </div>

                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <div class="input-with-icon">
                                                <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}">
                                                <i class="ti-unlock"></i>
                                            </div>
                                            <x-form.error for="password_confirmation" />
                                        </div>

                                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                        <div class="form-group">
                                            <div class="eltio_ol9">
                                                <div class="eltio_k1">
                                                    <input id="dds" class="checkbox-custom" name="terms" type="checkbox">
                                                    <label for="dds" class="checkbox-custom-label">
                                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                                        ]) !!}
                                                    </label>
                                                </div>
                                            </div>
                                            <x-form.error for="terms" />
                                        </div>
                                        @endif

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-md full-width pop-login">Register</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="autho-message" tabindex="-1" role="dialog" aria-labelledby="authomessage" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
        <div class="modal-content" id="authomessage">
            <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
            <div class="modal-body">
                <h4 class="modal-header-title">Drop Message</h4>
                <div class="login-form">
                    <form>

                        <div class="form-group">
                            <label>Subject</label>
                            <div class="input-with-icons">
                                <input type="text" class="form-control" placeholder="Message Title">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Messages</label>
                            <div class="input-with-icons">
                                <textarea class="form-control ht-80"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-md full-width pop-login">Send Message</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
