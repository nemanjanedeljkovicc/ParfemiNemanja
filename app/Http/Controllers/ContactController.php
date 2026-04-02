<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.main.contact');
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        try {
            Mail::raw(
                "Name: {$validated['name']}\nEmail: {$validated['email']}\n\nMessage:\n{$validated['message']}",
                function ($mail) use ($validated) {
                    $mail->to('nemanja.nedeljkovicc10@mail.com')
                        ->replyTo($validated['email'], $validated['name'])
                        ->subject($validated['subject']);
                }
            );

            return back()->with('success', 'Message sent successfully.');
        } catch (Throwable $e) {
            Log::error('Contact form mail failed', [
                'message' => $e->getMessage(),
            ]);

            return back()
                ->withInput()
                ->with('error', 'Message could not be sent right now. Please try again later.');
        }
    }

}
