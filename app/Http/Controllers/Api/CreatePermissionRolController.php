<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Response\ApiResponse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Str;

class CreatePermissionRolController extends Controller
{
    public function store(Request $request)
    {
        DB::beginTransaction();  // start transaction for database operations
        try {
            // Validate request data
            $message = [
                'role_name.required' => 'El nombre del rol es obligatorio.',
                'role_name.string' => 'El nombre del rol debe ser una cadena.',
                'role_name.max' => 'El nombre del rol debe tener un máximo de 255 caracteres.',
                'permissions.required' => 'Los permisos son obligatorios.',
                'permissions.*.required' => 'Los permisos deben ser cadenas.',
                'permissions.*.string' => 'Los permisos deben ser cadenas.',
                'permissions.*.max' => 'Los permisos deben tener un máximo de 255 caracteres.',
            ];

            $validator = Validator::make($request->all(), [
                'role_name' => 'required|string|max:255',
                'permissions' => 'required|array',
                'permissions.*' => 'required|string|max:255',
            ], $message);

            if ($validator->fails()) {
                return ApiResponse::error('Error de validación ' . $validator->messages()->first(), 422);
            }

            // crea rol
            $role = Role::create([
                'name' => $request->role_name,
            ]);

            // asigna permisos a rol creado
            $role->givePermissionTo($request->permissions);
            DB::commit(); //
            return ApiResponse::success('Rol creado', 200, $role);
        } catch (\Exception $e) {
            //throw $th;
            return ApiResponse::error('Error al crear el rol ' . $e->getMessage(), 500);
        }
    }
    public function getRole()
    {
        try {
            // Obtiene todos los roles
            $roles = Role::get();
            return ApiResponse::success('Roles obtenidos', 200, $roles);
        } catch (\Exception $e) {
            //throw $th;
            return ApiResponse::error('Error al obtener los roles ' . $e->getMessage(), 500);
        }
    }
    public function createPermissionsAction(Request $request)
    {

        DB::beginTransaction();
        try {
            // Validate request data

            $message = [
                'permissions.required' => 'Los permisos son obligatorios.',

                'permissions.*.string' => 'Los permisos deben ser cadenas.',
                'permissions.*.max' => 'Los permisos deben tener un máximo de 255 caracteres.',
            ];

            $validator = Validator::make($request->all(), [
                'permissions' => 'required|array',
                'permissions.*' => 'required|string|max:255',
            ], $message);
            if ($validator->fails()) {
                return ApiResponse::error('Error de validación ' . $validator->messages()->first(), 422);
            }
            // return $request->all();
            // crea permisos
            foreach ($request->permissions as $permission) {
                Permission::create(['name' => $permission]);
            }

            DB::commit();
            return ApiResponse::success('Permisos creado', 200, $request);
        } catch (\Exception $e) {
            //throw $th;
            return ApiResponse::error('Error al crear los permisos' . $e->getMessage(), 403);
        }
    }

    //Mostrar todos los usuarios
    public function ShowUsers()
    {
        try {
            // Obtener todos los usuarios con sus roles
            $users = User::with('roles')->get()->map(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'roles' => $user->roles->pluck('name'),
                    'created_at' => $user->created_at,
                    'updated_at' => $user->updated_at,
                ];
            });

            return ApiResponse::success('Usuarios obtenidos', 200, $users);
        } catch (\Exception $e) {
            return ApiResponse::error('Error al obtener los usuarios: ' . $e->getMessage(), 500);
        }
    }

    //Mostrar un usuario por id
    public function showUser($id)
    {
        try {
            // Busca el usuario por ID con sus roles
            $user = User::with('roles')->find($id);
            if (!$user) {
                return ApiResponse::error('Usuario no encontrado', 404);
            }

            // Formatea la respuesta para incluir los nombres de los roles
            $userData = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'roles' => $user->roles->pluck('name'),
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at,
            ];

            return ApiResponse::success('Usuario obtenido', 200, $userData);
        } catch (\Exception $e) {
            return ApiResponse::error('Error al obtener el usuario: ' . $e->getMessage(), 500);
        }
    }

    // Crear un nuevo usuario
    public function createUser(Request $request)
    {
        DB::beginTransaction();
        try {
            // Validar los datos de la solicitud
            $message = [
                'name.required' => 'El nombre es obligatorio.',
                'name.string' => 'El nombre debe ser una cadena.',
                'name.max' => 'El nombre debe tener un máximo de 255 caracteres.',
                'email.required' => 'El correo electrónico es obligatorio.',
                'email.email' => 'El correo electrónico no es válido.',
                'email.max' => 'El correo electrónico debe tener un máximo de 255 caracteres.',
                'email.unique' => 'El correo electrónico ya está en uso.',
                'password.required' => 'La contraseña es obligatoria.',
                'password.string' => 'La contraseña debe ser una cadena.',
                'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
                'roles.array' => 'Los roles deben ser un arreglo.',
                'roles.*.string' => 'Cada rol debe ser una cadena.',
                'roles.*.exists' => 'Uno o más roles no existen.',
            ];

            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email',
                'password' => 'required|string|min:8',
                'roles' => 'nullable|array',
                'roles.*' => 'string|exists:roles,name,guard_name,api', // Valida que los roles existan
            ], $message);

            if ($validator->fails()) {
                return ApiResponse::error('Error de validación ' . $validator->messages()->first(), 422);
            }

            // Crea el usuario
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            // Asigna roles: si no se envían, asigna 'User' por defecto
            $roles = $request->filled('roles') ? $request->roles : ['User'];
            $user->syncRoles($roles); // syncRoles reemplaza los roles existentes

            DB::commit();
            return ApiResponse::success('Usuario creado', 200, $user->load('roles'));
        } catch (\Exception $e) {
            DB::rollBack();
            return ApiResponse::error('Error al crear el usuario ' . $e->getMessage(), 500);
        }
    }

    // Actualizar un usuario
    public function updateUser(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            // Busca el usuario por ID
            $user = User::find($id);
            if (!$user) {
                return ApiResponse::error('Usuario no encontrado', 404);
            }

            // Validar los datos de la solicitud
            $message = [
                'name.required' => 'El nombre es obligatorio.',
                'name.string' => 'El nombre debe ser una cadena.',
                'name.max' => 'El nombre debe tener un máximo de 255 caracteres.',
                'email.required' => 'El correo electrónico es obligatorio.',
                'email.email' => 'El correo electrónico no es válido.',
                'email.max' => 'El correo electrónico debe tener un máximo de 255 caracteres.',
                'email.unique' => 'El correo electrónico ya está en uso.',
                'password.string' => 'La contraseña debe ser una cadena.',
                'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
                'roles.array' => 'Los roles deben ser un arreglo.',
                'roles.*.string' => 'Cada rol debe ser una cadena.',
                'roles.*.exists' => 'Uno o más roles no existen.',
            ];

            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email,' . $user->id . ',id',
                'password' => 'nullable|string|min:8',
                'roles' => 'nullable|array',
                'roles.*' => 'string|exists:roles,name,guard_name,api', // Valida que los roles existan
            ], $message);

            if ($validator->fails()) {
                return ApiResponse::error('Error de validación ' . $validator->messages()->first(), 422);
            }

            // Actualiza los datos del usuario
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->filled('password') ? bcrypt($request->password) : $user->password,
            ]);

            // Actualiza los roles si se envían
            if ($request->filled('roles')) {
                $user->syncRoles($request->roles);
            }

            DB::commit();
            return ApiResponse::success('Usuario actualizado', 200, $user->load('roles'));
        } catch (\Exception $e) {
            DB::rollBack();
            return ApiResponse::error('Error al actualizar el usuario: ' . $e->getMessage(), 500);
        }
    }
}
