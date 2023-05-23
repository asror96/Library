<?php
namespace App\Http\Controllers\Genre;
use App\Services\Genre\Service;
class BaseController
{
    public $service;
    public function __construct(Service $service)
    {
        $this->service=$service;
    }
}
