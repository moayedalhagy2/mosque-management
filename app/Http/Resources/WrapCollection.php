<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class WrapCollection extends ResourceCollection
{

    private array $custom_additional;
    public function __construct($resource, $resourceTransformer, $custom_additional = [])
    {
        $this->collects = $resourceTransformer;

        $this->custom_additional = $custom_additional;

        parent::__construct($resource);
    }

    public function toArray(Request $request): array
    {
        return [
            'success' => true,

            'data' => !count($this->custom_additional) ? $this->collection : [
                ...$this->custom_additional,
                'items' => $this->collection,
            ]
        ];
    }

    public function paginationInformation($request, $paginated, $default)
    {

        unset($default['meta']['links']);

        return $default;
    }
}
