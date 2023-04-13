<?php 

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShoulQueue;

class CorreoRecivido extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
        public $subject='Mensaje De Contactos';
            public $contenido;

    /**
     * Create a new message instance.
     * 
     * @return void
     */
    public function __construct($contenido)
    {
        $this->contenido = $contenido;
    }

    /**
     *  Build the message.
     * 
     * @return $this
     */

     public function build()
     {
        return Inertia::render('public/CorreoRecivido');
     }
}

?>