<?php

namespace Modules\Admin\Http\Controllers\Acl;

use App\Models\ExtendedPermission;
use App\Models\ExtendedRole;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Js;
use Mockery\Exception;
use Modules\Admin\Http\Requests\Acl\AclRolesRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

/**
 *
 */
class AclRolesController extends Controller
{
    /**
     * @param AclRolesRequest $request
     * @return JsonResponse
     */
    public function getRoles(AclRolesRequest $request): JsonResponse
    {
        $roles = ExtendedRole::where(function($q) use ($request) {
            if ($request->post('Role')['name']) {
                $q->where("name", "like", "%" . $request->post('Role')['name'] . "%");
            }
            if($request->post('Role')['description']) {
                $q->where("description", "like", "%" . $request->post('Role')['description'] . "%");
            }
        })->paginate($request->post("max_page"), ['*'], 'RoleList', $request->post("page"))->toArray();
        return response()->json([
            "status" => true ,
            "roles" => $roles
        ]);
    }

    /**
     * TODO get permission by role
     * @param AclRolesRequest $request
     * @return JsonResponse
     */
    public function getPermissionRoles(AclRolesRequest $request): JsonResponse
    {
        // Extract pagination data from the request
        $currentPage = $request->post('page', 1);
        $maxPerPage = $request->post('max_page', 10);

        // Build the query for roles
        $roleQuery = ExtendedRole::query();

        // Filter the roles by ID if provided
        if (isset($request->post('Role')['id'])) {
            $roleQuery->where('id', $request->post('Role')['id']);
        }

        // Get the role
        $role = $roleQuery->first();

        if (!$role) {
            // Role not found, handle the case accordingly
            // For example, return a response with an error message
            return response()->json(['message' => 'Role not found.']);
        }

        // Build the query for permissions
        $permissionQuery = $role->permissions();

        // Filter the permissions by name if provided
        if (isset($request->post('Permission')['name'])) {
            $permissionQuery->where('name', 'like', '%' . $request->post('Permission')['name'] . '%');
        }

        // Paginate the results and convert them to an array
        $paginatedPermissions = $permissionQuery->paginate($maxPerPage, ['*'], 'PermissionList', $currentPage)->toArray();


        // Return the response in the desired format (e.g., JSON)
        return response()->json([
            "status" => true,
            'role' => $role,
            "permissions" => $paginatedPermissions
        ]);

    }

    /**
     * @param AclRolesRequest $request
     * @return JsonResponse
     */
    public function actionRole(AclRolesRequest $request): JsonResponse
    {
        $roleName = trim($request->post('Role')['name']);
        $roleDescription = trim($request->post('Role')['description']);
        if($request->post('Role')['action'] === "edit") {
            $id = $request->post('Role')['id'];
            $editRole = ExtendedRole::find($request->post('Role')['id']);
            if(!$editRole) {
                return response()->json([
                    'status' => false,
                    'message' => 'Role not found'
                ], 400);
            }

            $checkDuplicate = ExtendedRole::where("name", $roleName)->whereNot("id" , $id)->first();
            if($checkDuplicate) {
                return response()->json([
                    'status' => false,
                    'message' => 'Duplicate name found'
                ], 400);
            }
            $editRole->name = $roleName;
            $editRole->description = $roleDescription;
            $modelSaved = $editRole->save();
            if($modelSaved) {
                return response()->json([
                    'status' => true,
                    'message' => 'Successfully saved'
                ]);
            }
        } else {
            $newRole = ExtendedRole::create([
                'name' => $roleName,
                'description' => $roleDescription,

            ]);
            if ($request->post('Role')['action'] === "clone") {
                $group = ExtendedRole::find($request->post('Role')['roleId']);
                if($group) {
                    $newRole->givePermissionTo($group->permissions);
                }
            }
            return response()->json([
                'status' => true,
                'message' => 'Successfully Added'
            ]);
        }
    }

    /**
     * @param AclRolesRequest $request
     * @return JsonResponse
     */
    public function deleteRole(AclRolesRequest $request): JsonResponse
    {
        $role = ExtendedRole::find($request->post('Role')['id']);
        if(!$role) {
            return response()->json([
                'status' => false,
                'message' => 'Role not found'
            ],400);
        }
        $permissions = $role->permissions;
        DB::transaction(function () use ($role, $permissions) {
            $role->revokePermissionTo($permissions);
            $role->delete();
        });
        return response()->json([
            'status' => true,
            'message' => 'Successfully deleted'
        ]);
    }

    public function deletePermissionRole(AclRolesRequest $request): JsonResponse
    {
        if(!isset($request->post('Role')['Permission']['id'])) {
            return response()->json([
                'status' => false,
                'message' => 'Incorrect request'
            ],400);
        }
        $role = Role::find($request->post('Role')['id']);
        $permissions = $role->permissions()->pluck('id')->toArray();
        $permissionToRemove = $request->post('Role')['Permission']['id'];

        if (($key = array_search($permissionToRemove, $permissions)) !== false) {
            unset($permissions[$key]);
        }
        $role->syncPermissions($permissions);
        return response()->json([
            'status' => true,
            'message' => 'Successfully deleted'
        ]);
    }

    public function updatePermissionRole(AclRolesRequest $request): JsonResponse
    {
        if(!isset($request->post('Role')['Permission']['id'])) {
            return response()->json([
                'status' => false,
                'message' => 'Incorrect request'
            ],400);
        }
        $permission = ExtendedPermission::find($request->post('Role')['Permission']['id']);
        if(!$permission) {
            return response()->json([
                'status' => false,
                'message' => 'Permission not found'
            ],400);
        }
        $permission->description = $request->post('Role')['Permission']['description'];
        $permission->save();
        return response()->json([
            'status' => true,
            'message' => 'Successfully updated'
        ]);
    }
}
