<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    public function __construct($data = null, $message = null, $succeeded = false, $errors = null)
    {
        $this->Succeeded = $succeeded;
        $this->Data = $data;
        $this->Message = $message;
        $this->Errors = $errors;
    }
    public $Succeeded;
    public $Message;
    public $Errors;
    public $Data;
}