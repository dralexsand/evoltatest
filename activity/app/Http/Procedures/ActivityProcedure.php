<?php

declare(strict_types=1);

namespace App\Http\Procedures;

use App\Services\ActivityService;
use Illuminate\Http\Request;
use Sajya\Server\Procedure;

class ActivityProcedure extends Procedure
{

    /**
     * The name of the procedure that will be
     * displayed and taken into account in the search
     *
     * @var string
     */
    public static string $name = 'activity';

    /**
     * Execute the procedure.
     *
     * @param Request $request
     *
     * @return array|string|integer
     */
    public function handle(Request $request, ActivityService $service)
    {
        return $service->storeVisit($request);
    }
}
