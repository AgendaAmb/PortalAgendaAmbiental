<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class RegisterException extends Exception
{
    /**
     * Mensaje de la excepción
     *
     * @var string
     */
    private $error_message = 'Ocurrió un error al momento de registrar a un usuario';

    /**
     * Canal del log
     * @var LoggerInterface
     */
    private $log;

    /**
     * Exception request data
     *
     * @var array
     */
    private $request_data;

    /**
     * Exception messages
     *
     * @var array
     */
    private $messages;

    public function __construct($request_data, $messages)
    {
        $this->request_data = $request_data;
        $this->messages = $messages;
        $this->log = Log::channel('register');
    }

    /**
     * Get the exception's context information.
     *
     * @return array
     */
    public function context()
    {
        return [
            'request_data' => $this->request_data,
            'errors' => $this->messages
        ];
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        $this->log->error($this->error_message);
        $this->log->error(json_encode($this->context(), JSON_PRETTY_PRINT));

        return new JsonResponse($this->messages, JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
    }
}
