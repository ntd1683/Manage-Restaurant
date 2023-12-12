<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\SettingRequest;
use App\Http\Services\Admin\SettingService;
use Illuminate\View\View;

class SettingController extends Controller
{
    protected SettingService $settingService;

    public function __construct()
    {
        $this->settingService = new SettingService();
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view("admin.setting");
    }

    /**
     * Save the form for editing the specified resource.
     */
    public function save(SettingRequest $request)
    {
        $data = $request->validated();
        $result = $this->settingService->save($data);

        if ($result)
            return redirect()
                ->route("admin.index")
                ->with("success", trans("Update Successfully"));
        return redirect()->back()->withErrors("Update Failed");
    }
}
