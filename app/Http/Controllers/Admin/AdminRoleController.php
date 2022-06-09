<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieving models
        $roles = Role::all();

        return view('admin.admin_role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving models
        $permissions = Permission::all();

        return view('admin.admin_role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Form validation
        $request->validate([
            'name'   =>  'required|unique:roles|max:255',
        ]);

        // Permissions see the result array
        $is_ok_permissions = $request->input('is_ok');

        if ($is_ok_permissions == null) {

            return redirect()->route('admin-role.create')
                ->with('warning', 'content.please_select_a_permission');

        } else {

            // Reset cached roles and permissions
            app()[PermissionRegistrar::class]->forgetCachedPermissions();

            // Record to database
            $role = Role::firstOrCreate([
                'name' => $request->input('name'),
                'guard_name' => 'web',
            ]);

            // Give permissions for role
            for($i = 0; $i < count($is_ok_permissions); $i++)
            {
                $role->givePermissionTo($is_ok_permissions[$i]);
            }

            return redirect()->route('admin-role.index')
                ->with('success', 'content.created_successfully');

        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // super-admin cannot be edited.
        // Get role
        $role = Role::find($id);

        if ($role->name != 'super-admin') {

            // Retrieving models
            $role = Role::findOrFail($id);
            $permissions = Permission::all();

            return view('admin.admin_role.edit', compact( 'role', 'permissions'));

        } else {

            return redirect()->route('admin-role.index')
                ->with('warning', 'content.you_are_not_authorized');

        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Form validation
        $request->validate([
            'name'   =>  [
                'required',
                'max:255',
                Rule::unique('roles')->ignore($id),
            ],
        ]);

        // Get All Request
        $input = $request->all();

        // Get all permission and convert array
        $permissions = Permission::all();
        $arr_permissions = array();
        foreach ($permissions as $permission) {
            $arr_permissions[] = $permission->name;
        }

        // Permissions see the result array
        $is_ok_permissions = $request->input('is_ok');

        if ($is_ok_permissions == null) {

            return redirect()->route('admin-role.edit', $id)
                ->with('warning', 'content.please_select_a_permission');

        } else {

            // Reset cached roles and permissions
            app()[PermissionRegistrar::class]->forgetCachedPermissions();

            // Update to database
            Role::find($id)->update($input);

            // Get role
            $role = Role::find($id);

            // Give permissions for role
            for($i = 0; $i < count($is_ok_permissions); $i++)
            {
                $role->givePermissionTo($is_ok_permissions[$i]);
            }

            // Revoke permissions for role
            for($i = 0; $i < count($arr_permissions); $i++)
            {
                if (!in_array($arr_permissions[$i], $is_ok_permissions)) {
                    $role->revokePermissionTo($arr_permissions[$i]);
                }
            }

            return redirect()->route('admin-role.index')
                ->with('success', 'content.created_successfully');

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Retrieve a model
        $role = Role::find($id);

        if ($role->name != 'super-admin') {

            // Delete record
            $role->delete();

            return redirect()->route('admin-role.index')
                ->with('success','content.deleted_successfully');

        } else {

            return redirect()->route('admin-role.index')
                ->with('warning', 'content.you_are_not_authorized');

        }

    }
}
