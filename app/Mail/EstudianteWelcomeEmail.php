<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EstudianteWelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $estudiante;
    public $password;

    public function __construct($estudiante, $password)
    {
        $this->estudiante = $estudiante;
        $this->password = $password;
    }

    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
                    ->subject('Bienvenido - Credenciales de Acceso')
                    ->view('email.estudiante_welcome')
                    ->with([
                        'nombre' => $this->estudiante->nombre_estudiante,
                        'correo' => $this->estudiante->correo_estudiante,
                        'password' => $this->password,
                    ]);
    }
}