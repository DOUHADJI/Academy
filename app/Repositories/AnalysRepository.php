<?php

namespace App\Repositories;

use App\Models\Analys;
use App\Models\Department;
use Illuminate\Support\Str;

class AnalysRepository
{
    public function generateAnalysCode(int $departmentId, int $analysId = null)
    {
        $analys = Analys::whereId($analysId)->first();
        $department = Department::whereId($departmentId)->first();
        $code = null;

        if ($department) {

            $departmentCode = strtoupper(substr(Str::ascii($department->name), 0, 3));

            if ($analys) {
                if ($analys->department_id == $departmentId) {
                    $code = $analys->code;
                } else {
                    $count = Analys::where("department_id", $departmentId)->count() + 1;
                    $code = sprintf('%s%03d', $departmentCode, $count);
                }
            } else {
                $count = Analys::where("department_id", $departmentId)->count() + 1;
                $code = sprintf('%s%03d', $departmentCode, $count);
            }
        }

        return $code;
    }
}
