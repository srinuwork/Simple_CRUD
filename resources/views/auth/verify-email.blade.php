<x-guest-layout>
    <h1>Verify Email</h1>

    <p style="color: #555555; font-size: 14px; margin-bottom: 20px;">
        Thanks for signing up! Before getting started, please verify your email address by clicking on the link we just emailed to you.
        If you didn't receive the email, we'll send you another one.
    </p>

    @if (session('status') == 'verification-link-sent')
        <div class="success-msg" style="margin-bottom: 20px;">
            A new verification link has been sent to the email address you provided during registration.
        </div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="btn-primary-form">Resend Verification Email</button>
    </form>

    <form method="POST" action="{{ route('logout') }}" style="margin-top: 16px;">
        @csrf
        <div class="back-link">
            <a href="javascript:void(0)" onclick="this.closest('form').submit()">Log Out</a>
        </div>
    </form>
</x-guest-layout>
