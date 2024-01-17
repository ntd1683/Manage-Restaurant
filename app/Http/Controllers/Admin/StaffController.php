<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserLevelEnum;
use App\Http\Controllers\Controller;
use App\Http\Services\Admin\StaffService;
use App\Tables\StaffTable;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    protected StaffService $staffService;
    protected StaffTable $staffTable;

    public function __construct()
    {
        $this->staffService = new StaffService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->staffService->getUsers();

        if ($users == null) {
            return view("admin.index")->with("error", "Get users failed");
        }

        $levels = UserLevelEnum::getArrayView();
        $table = new StaffTable($users);
        $table = $table->toHtml();

        return view("admin.staff.index", compact("table", "levels"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->staffService->deleteUser($id);
    }
}
