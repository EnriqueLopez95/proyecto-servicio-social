<?php

namespace App\Mail;

use App\Models\Coordinador;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CoordinadorWelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $coordinador;
    public $password;

    /**
     * Create a new message instance.
     *
     * @param Coordinador $coordinador
     * @param string $password
     * @return void
     */
    public function __construct(Coordinador $coordinador, string $password)
    {
        $this->coordinador = $coordinador;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('gerarbarriostm@gmail.com', 'Sistema de Gestión')
                    ->subject('Bienvenido - Credenciales de Coordinador')
                    ->view('email.coordinador_welcome');
    }
}