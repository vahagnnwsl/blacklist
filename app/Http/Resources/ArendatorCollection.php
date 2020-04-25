<?php

namespace App\Http\Resources;

use App\Arendator;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ArendatorCollection extends ResourceCollection
{

    protected $con;

    public function __construct($resource,$con = false)
    {
        parent::__construct($resource);
        $this->resource = $this->collectResource($resource);
        $this->con = $con;

    }

    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public $collects = 'App\Http\Resources\Arendator';

    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            $this->mergeWhen(!$this->con, [
                'total' => Arendator::searchAll($request->region, $request->key)->count(),
            ]),
        ];
    }
}
