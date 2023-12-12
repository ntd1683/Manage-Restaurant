<?php

namespace App\Http\Controllers;

use App\Http\Requests\admin\ProfileRequest;
use App\Http\Services\Admin\ProfileService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
    protected ProfileService $profileService;

    public function __construct()
    {
        $this->profileService = new ProfileService();
    }

    public function index(): View
    {
        $user = auth()->user();
        return view("admin.profile", compact("user"));
    }

    public function save(ProfileRequest $request)
    {
        $data = $request->validated();

        $result = $this->profileService->save($data);

        if ($result)
            return redirect()
                ->route("admin.index")
                ->with("success", trans("Update Successfully"));
        $errors = session("errors");
        $errors[] = "Update Failed";
        return redirect()->back()->withErrors($errors);
    }
}
