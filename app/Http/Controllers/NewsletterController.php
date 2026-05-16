<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsletterEmail;

class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        // UPDATE

        if ($request->old_email) {

            $existing =
                NewsletterEmail::where(
                    'email',
                    $request->old_email
                )->first();

            if ($existing) {

                $request->validate([
                    'email' => 'required|email|unique:newsletter_emails,email'
                ]);

                $existing->update([
                    'email' => $request->email
                ]);

                return response()->json([
                    'success' => true
                ]);
            }
        }

        // INSERT NORMAL

        $request->validate([
            'email' => 'required|email|unique:newsletter_emails,email'
        ]);

        NewsletterEmail::create([
            'email' => $request->email
        ]);

        return back();
    }
}