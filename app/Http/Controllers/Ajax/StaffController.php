<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
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

    public function getStaff(Request $request)
    {
        $users = null;
        $type = $request->get("type") ?? 0;
        $render = $request->get("render") != null;
        $level = $request->get("level") ?? -1;

        if ($type === 0) {
            $users = $this->staffService->getUsers();
        } else if ($type == 1) {
            $users = $this->staffService->getUsersByLevel($level);
        }

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
