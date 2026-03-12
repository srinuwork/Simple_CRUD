<x-guest-layout>
    <h1>Confirm Password</h1>

    <p style="color: #555555; font-size: 14px; margin-bottom: 20px;">
        This is a secure area of the application. Please confirm your password before continuing.
    </p>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="form-group">
            <label for="password">Password:</label>
            <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Enter your password">
            @error('password') <p style="color: var(--danger); font-size: 13px; margin-top: 5px;">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="btn-primary-form">Confirm</button>
    </form>
</x-guest-layout>
