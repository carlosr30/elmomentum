<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class LeaderboardCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection
        ];
    }

    public function with(Request $request): array
    {
        return [
            'meta' => [
                'runners' => $this->collection->count(),
                'totalRunsLogged' => $this->collection->sum('activities_count'),
                'totalDistance' => number_format($this->collection->sum('total_distance') / 1000, 0) . 'km'
            ]
        ];
    }
}
