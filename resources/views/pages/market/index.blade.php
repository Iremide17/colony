<x-guest-layout>
	
	<section class="error-wrap">
        <div class="container">
            <div class="row justify-content-center">
                
                <div class="col-lg-6 col-md-10">
                    <div class="text-center">
                        
                        <img src="{{  asset('img/404.png') }}" class="img-fluid" alt="">
                        <p>It seems the page you are looking for is still under construction, please try again at another time. Thank you. Team {{ application('name')}}</p>
                        <a class="btn btn-theme" href="{{ url('/') }}">Back To Home</a>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </section>
</x-guest-layout>
