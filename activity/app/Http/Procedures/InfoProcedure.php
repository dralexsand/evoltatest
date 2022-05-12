<?php

declare(strict_types=1);

namespace App\Http\Procedures;

use App\Services\ActivityService;
use Illuminate\Http\Request;
use Sajya\Server\Procedure;

class InfoProcedure extends Procedure
{
    /**
     * The name of the procedure that will be
     * displayed and taken into account in the search
     *
     * @var string
     */
    public static string $name = 'info';

    /**
     * Execute the procedure.
     *
     * @param Request $request
     *
     * @return array|string|integer
     */
    public function handle(ActivityService $service)
    {
        return $service->getInfo();
    }
}
