<x-guest-layout>
    <h1>Reset Password</h1>

    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="form-group">
            <label for="email">Email Address:</label>
            <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username" placeholder="Enter your email">
            @error('email') <p style="color: var(--danger); font-size: 13px; margin-top: 5px;">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label for="password">New Password:</label>
            <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Enter new password">
            @error('password') <p style="color: var(--danger); font-size: 13px; margin-top: 5px;">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password:</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm new password">
            @error('password_confirmation') <p style="color: var(--danger); font-size: 13px; margin-top: 5px;">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="btn-primary-form">Reset Password</button>
    </form>
</x-guest-layout>
