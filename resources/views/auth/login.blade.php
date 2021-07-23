<img src="img/bg-3.jpg" alt="background" style="position: absolute;width: 100%;height: 900px">
<div style="display: block" class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat">
    <div style="width: 100%;max-width: 450px;text-align: center;margin-top: 60px;margin-left: 35%" class="login-form text-center p-7 position-relative overflow-hidden">
        <!--begin::Login Header-->
        <div class="d-flex flex-center mb-5" style="text-align: center">
            <a href="#" style="position: relative;text-align: center">
                <img src="img/horizontal_on_white_by_logaster.png" style="padding: 0 50px" alt="Spotlayer" class="max-h-75px">
            </a>
        </div>
        <!--end::Login Header-->
        <!--begin::Login Sign in form-->
        <div class="login-signin" style="position: relative;background: #fff">
            <div class="mb-10" style="padding-bottom: 15px;margin-top: -80px">
                <h3>Welcome to  TRANSPORT X  </h3>
                <div class="text-muted font-weight-bold">Login to your account.</div>
            </div>
            <div class="mb-10">
                <table class="kt-form" style="padding: 10px !important;margin: 0;width: 100%;border: 1px solid #eee;">
                    <tbody>
                    <tr>
                        <td colspan="3" style="text-align: center;background: #eee;color: #000;font-size: 24px;font-weight: bold;text-transform: uppercase;padding: 10px;">
                            Demo Login Details
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: left;background: #fff000;padding: 10px;color: #000;border: 1px solid #ccc;">
                            If any user from below didn't work for any reason, it may be a visitor has changed it's data, the data will be reset again every 12 hours.
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left;border-bottom: 1px solid #eee;font-weight:bold;padding: 0px 10px;">
                            ADMIN
                            <br>
                            <span id="login_admin" class="text-muted font-size-xs font-weight-normal">Click to Copy</span>
                        </td>
                        <td style="text-align: left;border-bottom: 1px solid #eee;padding: 0 10px">admin@cargo.com</td>
                        <td style="text-align: right;border-bottom: 1px solid #eee;">123456</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #eee;text-align: left;font-weight:bold;padding: 0 10px;">
                            EMPLOYEE
                            <br>
                            <span class="text-muted font-size-xs font-weight-normal">Click to Copy</span>
                        </td>
                        <td style="border-bottom: 1px solid #eee;text-align: left;padding: 0 10px">employee@cargo.com</td>
                        <td style="border-bottom: 1px solid #eee;text-align: right;">123456</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #eee;text-align: left;font-weight:bold;padding: 0 10px;">
                            BRANCH MANAGER
                            <br>
                            <span class="text-muted font-size-xs font-weight-normal">Click to Copy</span>
                        </td>
                        <td style="border-bottom: 1px solid #eee;text-align: left;padding: 0 10px">branch@cargo.com</td>
                        <td style="border-bottom: 1px solid #eee;text-align: right;">123456</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #eee;text-align: left;font-weight:bold;padding: 0 10px;">
                            DRIVER/CAPTAIN
                            <br>
                            <span class="text-muted font-size-xs font-weight-normal">Click to Copy</span>
                        </td>
                        <td style="border-bottom: 1px solid #eee;text-align: left;padding: 0 10px">driver@cargo.com</td>
                        <td style="border-bottom: 1px solid #eee;text-align: right;">123456</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #eee;text-align: left;font-weight:bold;padding: 0 10px;">
                            Client
                            <br>
                            <span class="text-muted font-size-xs font-weight-normal">Click to Copy</span>
                        </td>
                        <td style="text-align: left;padding: 0 10px">client@cargo.com</td>
                        <td style="text-align: right;">123456</td>
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

                            <div>
                                <x-jet-label for="email" class="text-left" />
                                <x-jet-input id="email" class="block mt-1 w-full" type="email" style="padding:14px 28px;width: 100%;height: 50px;border: 20px;background: #fff0f2;outline: none" name="email" :value="old('email')" required autofocus placeholder="Email"/>
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="password" class="text-left" />
                                <x-jet-input id="password" class="block mt-1 w-full" type="password" style="padding:14px 28px;width: 100%;height: 50px;border: 20px;background: #fff0f2;outline: none" name="password" required autocomplete="current-password" placeholder="Password" />
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
                </x-guest-layout>
            </div>
                <!--  content -->
        </div>
    </div>
</div>
