<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PedidosMail;

class PedidosController extends Controller
{
    public function sendEmail(Request $request)
    {
        // Validate the incoming request
        $data = $request->validate([
            'primeiro_nome' => 'required|string|max:255',
            'ultimo_nome' => 'required|string|max:255',
            'telefone' => 'required|string|max:20',
            'email' => 'required|email',
            'mensagem' => 'required|string',
        ]);


        // Send the email using the PedidosMail Mailable
        Mail::to('recipient@example.com')->send(new PedidosMail($data));

        // Return a success response
        return 'Email sent successfully!';
    }
}
