<x-guest-layout>

    <x-slot name="header">
        <div class="_page_tetio">
            <div class="pledtio_wrap"><span>Get In Touch</span></div>
            <h2 class="text-light mb-0">Get Helps & Friendly Support</h2>
            <p>Looking for help or any support? We's available 24 hour a day.</p>
        </div>
    </x-slot>

    <section class="pt-0">
        <div class="container">
            <div class="row align-items-center pretio_top">

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="contact-box">
                        <i class="ti-shopping-cart theme-cl"></i>
                        <h4>Contact Head Agent</h4>
                        <p><a href="mailto:{{ application('email') }}">{{ application('email') }}</a></p>
                        <span><a href="tel:+{{ application('line2') }}">{{ application('line2') }}</a></span>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="contact-box">
                        <i class="ti-user theme-cl"></i>
                        <h4>{{ application('name') }} Hotline</h4>
                        <p><a href="mailto:{{ application('email') }}">{{ application('email') }}</a></p>
                        <span><a href="tel:+{{ application('line1') }}">{{ application('line1') }}</a></span>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="contact-box">
                        <i class="ti-comment-alt theme-cl"></i>
                        <h4>Start Whatsapp Chat</h4>
                        <span><a href="tel:+{{ application('line1') }}">{{ application('line1') }}</a></span>
                        <span class="live-chat">Live Chat</span>
                    </div>
                </div>

            </div>

            <!-- row Start -->
            <div class="row">
                <div class="col-lg-8 col-md-7">
                    <div class="property_block_wrap">

                        <div class="property_block_wrap_header">
                            <h4 class="property_block_title">Fillup The Form</h4>
                        </div>

                        <x-form action="{{ route('send.message') }}">
                            <div class="block-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <x-form.label for="name" value="{{ __('Name') }}" />
                                            <x-form.input id="name" class="block w-full mt-1" placeholder="Name" type="text" name="name" :value="old('name')" autofocus />
                                            <x-form.error for="name" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <x-form.label for="email" value="{{ __('Email') }}" />
                                            <x-form.input id="email" class="block w-full mt-1" placeholder="Email" type="email" name="email" :value="old('email')" autofocus />
                                            <x-form.error for="email" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <x-form.label for="subject" value="{{ __('Subject') }}" />
                                    <x-form.input id="subject" class="block w-full mt-1" placeholder="Subject" type="text" name="subject" :value="old('subject')" autofocus />
                                    <x-form.error for="subject" />
                                </div>

                                <div class="form-group">
                                    <x-form.label for="message" value="{{ __('Message') }}" />
                                    <textarea class="form-control simple" name="message">{{ old('message') }}</textarea>
                                    <x-form.error for="message" />
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-theme" type="submit">Submit Request</button>
                                </div>
                            </div>
                        </x-form>

                    </div>

                </div>

                <div class="col-lg-4 col-md-5">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3559.303346004152!2d81.00657231451953!3d26.86210176873481!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1621502911489!5m2!1sen!2sin" width="100%" height="470" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>

            </div>
            <!-- /row -->
        </div>
    </section>

    <section class="gray-simple">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 col-sm-12">
                    <div class="reio_o9i text-center mb-5">
                        <h2>Less work, meet our partner.</h2>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                            voluptatum deleniti atque corrupti quos dolores et quas molestias</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-9 col-md-10 col-sm-12 flex-wrap justify-content-center text-center">
                    <div class="pertner_flexio">
                        <img src="assets/img/c-1.png" class="img-fluid" alt="" />
                        <h5>Google Inc</h5>
                    </div>
                    <div class="pertner_flexio">
                        <img src="assets/img/c-2.png" class="img-fluid" alt="" />
                        <h5>Dribbbdio</h5>
                    </div>
                    <div class="pertner_flexio">
                        <img src="assets/img/c-3.png" class="img-fluid" alt="" />
                        <h5>Lio Vission</h5>
                    </div>
                    <div class="pertner_flexio">
                        <img src="assets/img/c-4.png" class="img-fluid" alt="" />
                        <h5>Alzerra</h5>
                    </div>
                    <div class="pertner_flexio">
                        <img src="assets/img/c-5.png" class="img-fluid" alt="" />
                        <h5>Skyepio</h5>
                    </div>
                    <div class="pertner_flexio">
                        <img src="assets/img/c-6.png" class="img-fluid" alt="" />
                        <h5>Twikller</h5>
                    </div>
                    <div class="pertner_flexio">
                        <img src="assets/img/c-7.png" class="img-fluid" alt="" />
                        <h5>Sincherio</h5>
                    </div>
                </div>
            </div>

        </div>
    </section>


</x-guest-layout>
