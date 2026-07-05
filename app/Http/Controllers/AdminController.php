<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.gifts');
        }

        return view('admin.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (! Auth::attempt($validated)) {
            return back()
                ->withInput(['email' => $validated['email']])
                ->withErrors(['email' => 'The admin login details are incorrect.']);
        }

        $request->session()->regenerate();

        return redirect()->route('admin.gifts');
    }

    public function gifts()
    {
        return view('admin.gifts', [
            'gifts' => Gift::latest()->paginate(20),
            'totalPaid' => Gift::where('status', 'paid')->sum('amount'),
            'paidCount' => Gift::where('status', 'paid')->count(),
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
