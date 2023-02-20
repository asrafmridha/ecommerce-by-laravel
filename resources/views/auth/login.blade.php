{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}


<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
  @include('backend.includes.meta')

  @include('backend.includes.css')

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu blank-page navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v1 px-2">
                    <div class="auth-inner py-5">
                        <!-- Login v1 -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <a style="margin-left: 750px; margin-right:600px" href="javascript:void(0);" class="brand-logo">
                                    

                                    <div style="margin-left: 500px; margin-right:500px">
                                        <h2>Login Here</h2>
                                </a>
                                @if (session('status'))
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ session('status') }}
                                </div>
                                @endif
                                <form action="{{ route('login') }}" method="POST">
                                  @csrf
                                  <div class="form-group">
                                    <label for="email">Email</label>
                                      <input name="email" type="text" class="form-control fc-outline-dark" placeholder="Enter your username">
                                  </div><!-- form-group -->
                                  <div class="form-group">

                                    <label for="password">Password</label>
                                      <input  name="password" type="password" class="form-control fc-outline-dark" placeholder="Enter your password">
                                     
                                  </div><!-- form-group -->
                                  <button type="submit" class="mb-3 btn btn-info btn-block">Sign In</button>
                             <a href=""><i data-feather='facebook'>f</i></a>
                                
                                 
                                </form>
                                    <div class="mt-2 mb-2">
                                        @if (Route::has('password.request'))
                
                                              @auth
                                              <a href="{{ route('password.request') }}">
                                                  <small>{{ __('Forgot your password?') }}</small>
                                              </a>
                                              @endauth
                                              @guest
                                              <a href="{{ route('password.request') }}">
                                                  <small>{{ __('Forgot your password?') }}</small>
                                              </a>
                                              @endguest
                                          </a>
                                        @endif
                                    </div>
                                    <div class="mg-t-60 tx-center">Not yet a member? <a href="{{ route('register') }}" class="tx-info">Sign Up</a>
                                        
                                </div>
                            </div>
                            {{--   my div  --}}
                              </div><!-- login-wrapper -->
                            </div><!-- overlay-body -->
                          </div><!-- d-flex -->
                            </div>
                        </div>
                        <!-- /Login v1 -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    @include('backend.includes.script')
</body>
<!-- END: Body-->

</html>

