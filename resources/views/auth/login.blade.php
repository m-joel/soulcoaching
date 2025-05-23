<x-auth-layout>

    <!--begin::Alert-->
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session('status') === 'verification-link-sent')
        <div class="alert alert-success">
            {{ __('Ein neuer Bestätigungslink wurde an deine E-Mail-Adresse gesendet.') }}
        </div>
    @endif
    <!--end::Alert-->

    <!--begin::Signin Form-->
    <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="{{ route('login') }}" method="POST">
        @csrf

        <!--begin::Heading-->
        <div class="text-center mb-11">
            <!--begin::Title-->
            <h1 class="text-dark fw-bolder mb-3">Einloggen</h1>
            <!--end::Title-->
            <!--begin::Subtitle-->
            <div class="text-gray-500 fw-semibold fs-6">Melde dich mit deinen Zugangsdaten an</div>
            <!--end::Subtitle-->
        </div>
        <!--begin::Heading-->

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!--begin::Input group-->
        <div class="fv-row mb-8">
            <!--begin::Email-->
            <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent" value="{{ old('email') }}" required autofocus>
            <!--end::Email-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="fv-row mb-3">
            <!--begin::Password-->
            <input type="password" placeholder="Passwort" name="password" autocomplete="off" class="form-control bg-transparent" required>
            <!--end::Password-->
        </div>
        <!--end::Input group-->

        <!--begin::Wrapper-->
        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
            <div></div>
            @if (Route::has('password.request'))
                <!--begin::Link-->
                <a href="{{ route('password.request') }}" class="link-primary">Passwort vergessen ?</a>
                <!--end::Link-->
            @endif
        </div>
        <!--end::Wrapper-->

        <!--begin::Submit button-->
        <div class="d-grid mb-10">
            <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                @include('partials.general._button-indicator', ['label' => __('Bestätigen')])
            </button>
        </div>
        <!--end::Submit button-->

        <!--begin::Sign up-->
        <div class="text-gray-500 text-center fw-semibold fs-6">
            Noch kein Mitglied?
            <a href="{{ route('register') }}" class="link-primary">Registriere dich</a>
        </div>
        <!--end::Sign up-->
    </form>
    <!--end::Signin Form-->

    @push('scripts')
    <script src="{{ asset('js/custom/authentication/sign-in/general.js') }}"></script>
    @endpush
</x-auth-layout>
