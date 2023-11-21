<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Notificacion;
use App\Models\User;

class MailController extends Controller
{
    public function index(Request $request){
        return view('panel.mails.form');
    }

    public function sendMail(Request $request) {
        $validated = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        // $correo = 'pabloferreyra935@gmail.com';
        // $user_auth = 'PabloFerreyra';

        $admin = User::where('name', 'admin')->first();

        $user_auth = auth()->user();

        // Envio de Mail
        Mail::to($admin->email)->send(new Notificacion(
            $user_auth,
            $request->title,
            $request->body
        ));

        return redirect()->route('mails.form')->with('alert', 'Mensaje enviado exitosamente.');
    }
}
