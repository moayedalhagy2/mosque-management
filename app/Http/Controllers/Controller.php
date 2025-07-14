<?php

namespace App\Http\Controllers;

abstract class Controller
{
     private bool $disablePagination = false;

    protected function withoutPagination(): void
    {
        $this->disablePagination = true;
    }

    protected function withPagination(): void
    {
        $this->disablePagination = false;
    }
    protected function pageSize(): int | null
    {
        return $this->disablePagination ? null :  request('pageSize', 30);
    }
    
    protected function successJson(mixed $data = [], int $httpCode = 200)
    {
        
        return response()->json([
            'success' => true,
            'data' => $data
        ], $httpCode);
    }
}
