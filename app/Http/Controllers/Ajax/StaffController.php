<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\GetStaffRequest;
use App\Http\Services\Admin\StaffService;
use App\Http\Traits\ResponseTrait;
use App\Tables\StaffTable;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    use ResponseTrait;
    protected StaffService $staffService;

    public function __construct()
    {
        $this->staffService = new StaffService();
    }

    public function getStaff(GetStaffRequest $request)
    {
        $render = $request->get("render") != null;
        $search = $request->get("search") ?? "";
        $date = $request->get("date") ?? "";
        $level = $request->get("level") ?? -1;

        $users = $this->staffService->getUsers($search, $date, $level);

        if ($users == null)
            return $this->errorResponse("Get users failed");

        if ($render) {
            $table = new StaffTable($users);
            $users = $table->render();
        } else
            $users = $users->get();

        return $this->successResponse($users, "Get users success");
    }
}
