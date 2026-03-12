<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $request->only('email')
        );
        // $Status = password.sent
        
        return $status == Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()->withInput($request->only('email'))
                        ->withErrors(['email' => __($status)]);
    }

}



/* ----------------------------------------------------------
public function store(Request $request)
{
    // STEP 1: Incoming Request
    // Suppose user submits the form with this input:
    // POST /forgot-password
    // email = user@gmail.com

    // $request->all() output
    // [
    //     "email" => "user@gmail.com"
    // ]


    // STEP 2: Validation
    $request->validate([
        'email' => 'required|email'
    ]);

    // If validation fails:
    // Example input: "abc"
    // Laravel automatically throws ValidationException
    // Redirects back with errors like:
    // [
    //   "email" => ["The email field must be a valid email address."]
    // ]

    // If validation passes:
    // execution continues


    // STEP 3: Extract only the email
    $emailData = $request->only('email');

    // Debug output of $emailData
    // [
    //     "email" => "user@gmail.com"
    // ]


    // STEP 4: Send Reset Link
    $status = Password::sendResetLink($emailData);

    // Internally Laravel does the following:

    // 1. Check if user exists
    // SQL Query executed:
    // select * from users where email = 'user@gmail.com'

    // CASE 1: If user exists

    // Generate reset token
    // Example token:
    // "8d3a2f7c91b3e4fbc6d7..."

    // Insert into table password_reset_tokens

    // Example table record
    // ---------------------------------------
    // email         | token        | created_at
    // ---------------------------------------
    // user@gmail.com | hashed_token | timestamp
    // ---------------------------------------

    // Send reset email to user

    // Example email link:
    // http://yourapp.com/reset-password/TOKEN?email=user@gmail.com

    // Return status:
    // $status = Password::RESET_LINK_SENT

    // Actual returned value internally:
    // "passwords.sent"



    // CASE 2: If user does NOT exist

    // No token generated
    // No email sent

    // Returned status:
    // $status = Password::INVALID_USER

    // Actual value:
    // "passwords.user"



    // STEP 5: Check status
    if ($status == Password::RESET_LINK_SENT) {

        // Example:
        // $status = "passwords.sent"

        // __($status) checks translation file
        // resources/lang/en/passwords.php

        // Example translation:
        // 'sent' => 'We have emailed your password reset link!'

        // Final message becomes:
        // "We have emailed your password reset link!"

        return back()->with('status', __($status));

        // Redirects back to:
        // /forgot-password

        // Session Flash Data:
        // [
        //   "status" => "We have emailed your password reset link!"
        // ]
    }



    // STEP 6: If email not found
    return back()

        // Keeps previously entered email
        // old('email') = user@gmail.com
        ->withInput($request->only('email'))

        // Add error message
        ->withErrors([
            'email' => __($status)
        ]);

    // Example error message from lang file:
    // "We can't find a user with that email address."

    // Final response:

    // Redirect back to:
    // /forgot-password

    // Session data:
    // errors = [
    //   "email" => "We can't find a user with that email address."
    // ]

} 
*/