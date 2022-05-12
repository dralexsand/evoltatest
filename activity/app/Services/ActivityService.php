<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityService
{
    public function storeVisit(Request $request)
    {
        $content = $request->getContent();
        $data = json_decode($content, true);

        //$url = $data['url'];

        if (!isset($data['url'])) {
            return [
                'message' => 'Error. Field url required'
            ];
        }

        return Activity::create([
            'url' => $data['url']
        ]);
    }

    public function getInfo()
    {
        return [
            'visits' => $this->getVisits(),
            'last' => $this->getLastVisit()
        ];
    }

    public function getVisits()
    {
        $visits = Activity::groupBy('url')
            ->select('url', DB::raw('count(*) as count'))
            ->orderBy('count', 'desc')
            ->orderBy('url', 'asc')
            ->get();

        return $visits->toArray();
    }

    public function getLastVisit()
    {
        $lastVisit = Activity::latest()->first();
        return $lastVisit->toArray();
    }
}
