<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
 

class ApiLevelException extends Exception
{
    
    private int $customHttpCode;
    private string $error_key;
    private string $customMessage;
    private array $details;

    public function __construct(
        string $error_key,
        string $custom_message,
        array $details = null,
        int $code = 500
    ) {
        $this->customHttpCode = $code;
        $this->error_key = $error_key;
        $this->customMessage = $custom_message;
        $this->details = $details;
    }
    public function render(Request $request)        
    {
        return response()->json([
            'success' => false,
            'errorKey' => $this->error_key,
            'message' =>  $this->customMessage,
            'details' => $this->details
        ], $this->customHttpCode);
    }
}
