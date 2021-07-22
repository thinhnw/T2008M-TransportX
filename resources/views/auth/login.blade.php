<div style="display: block" class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat">
    <div style="width: 100%;max-width: 450px;text-align: center;margin-top: 60px;margin-left:750px" class="login-form text-center p-7 position-relative overflow-hidden">
        <!--begin::Login Header-->
        <div class="d-flex flex-center mb-5" style="text-align: center">
            <a href="#" style="position: relative;text-align: center">
            </a>
        </div>
        <!--end::Login Header-->
        <!--begin::Login Sign in form-->
        <div class="card" style="position: relative;background: #fff">
            <div class="card-header mb-10" style="padding-bottom: 15px;">
                <h3>Welcome to  TRANSPORT X  </h3>
                <div class="text-muted font-weight-bold">Login to your account.</div>
            </div>
            <div class="card-body mb-10">
                <table class="kt-form" style="padding: 10px !important;margin: 0;width: 100%;border: 1px solid #eee;">
                    <tbody>
                  
                    <tr>
                        <td style="text-align: left;border-bottom: 1px solid #eee;font-weight:bold;padding: 0 10px;">
                            ADMIN
                            <br>
                            <span id="login_admin" class="text-muted font-size-xs font-weight-normal">Click to Copy</span>
                        </td>
                        <td style="text-align: left;border-bottom: 1px solid #eee;padding: 0 10px">admin@admin.com</td>
                        <td style="text-align: right;border-bottom: 1px solid #eee;">12345678</td>
                    </tr>
                    
                    
                    <tr>
                        <td style="border-bottom: 1px solid #eee;text-align: left;font-weight:bold;padding: 0 10px;">
                            DRIVER
                            <br>
                            <span id="login_admin" class="text-muted font-size-xs font-weight-normal">Click to Copy</span>
                        </td>
                        <td style="border-bottom: 1px solid #eee;text-align: left;padding: 0 10px">driver@driver.com</td>
                        <td style="border-bottom: 1px solid #eee;text-align: right;">12345678</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #eee;text-align: left;font-weight:bold;padding: 0 10px;">
                            Client
                            <br>
                            <span id="login_admin" class="text-muted font-size-xs font-weight-normal">Click to Copy</span>
                        </td>
                        <td style="text-align: left;padding: 0 10px">client@client.com</td>
                        <td style="text-align: right;">12345678</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div style="position: relative">
                <x-guest-layout>
                    <x-jet-authentication-card>
                        <x-slot name="logo">
                            {{-- <x-jet-authentication-card-logo /> --}}
                        </x-slot>

                        <x-jet-validation-errors class="mb-4" />

                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group px-3">
                                <x-jet-label for="email" value="{{ __('Email') }}" class="text-left" />
                                <x-jet-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required autofocus />
                            </div>

                            <div class="mt-4 form-group px-3">
                                <x-jet-label for="password" value="{{ __('Password') }}" />
                                <x-jet-input id="password" class="block mt-1 w-full form-control" type="password" name="password" required autocomplete="current-password" />
                            </div>

                            <div class="block mt-4">
                                <label for="remember_me" class="flex items-center">
                                    <x-jet-checkbox id="remember_me" name="remember" />
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                </label>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-jet-button class="ml-4 btn btn-primary">
                                    {{ __('Log in') }}
                                </x-jet-button>
                            </div>
                        </form>
                    </x-jet-authentication-card>
                </x-guest-layout>
            </div>
                <!--  content -->
        </div>
    </div>
</div>

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
@stop

@section('js')
<script>
    let address = 'Hanoi Vietnam'
    $.get('http://nominatim.openstreetmap.org/search?format=json&q='+address, function(data){
        console.log(data);
    });
</script>
@stop