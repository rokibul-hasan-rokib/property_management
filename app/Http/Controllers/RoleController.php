<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRoleRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = (new User())->getAllUserForUpdate();
        return view("backend.role.index", compact(""));
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
    public function edit(User $role)
    {
       return view("backend.role.edit", compact("role"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, User $role)
    {
          try {
            

          } catch (\Throwable $th) {
            //throw $th;
          }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}