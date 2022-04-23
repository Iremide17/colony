<x-guest-layout>
    <section>
        <div class="container">
            <div class="login-form">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
        
                    <div class="form-group">
                        <x-form.label for="email" value="{{ __('Email') }}"/>
                        <div class="input-with-icon">
                            <x-jet-input id="email" class="form-control" type="email" name="email"
                                :value="old('email')" required autofocus /> <i
                                class="ti-user"></i>
                        </div>
                        <x-form.error for="email" />
                    </div>
        
                    <div class="form-group">
                        <x-form.label for="password" value="{{ __('Password') }}"/>
                        <div class="input-with-icon">
                            <x-jet-input id="password" class="form-control" type="password"
                                name="password" required autocomplete="current-password" />
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
    </section>
</x-guest-layout>
