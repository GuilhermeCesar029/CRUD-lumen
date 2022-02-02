<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __contruct()
    {

    }

    public function index()
    {
        try {

            $users = User::all();
            return response()->json($users);

        } catch (\Exception $error) {
            return $error->getMessage();
        }

    }

    public function create(Request $request)
    {
        try {

            $user = new User;

            $user->use_name = $request->name;
            $user->use_email = $request->email;
            if (!empty($request->password)) {
                $user->use_password = Hash::make($request->password);
            }

            $user->save();

            return response()->json('User created successfully!', 201);

        } catch (\Exception $error) {
            return $error->getMessage();
        }

    }

    public function show($id)
    {
        try {

            $user = User::find($id);
            if (!$user) {
                return response()->json('User not found!', 404);
            }

            return response()->json($user);

        } catch (\Exception $error) {
            return $error->getMessage();
        }

    }

    public function update(Request $request, $id)
    {
        try {

            $user = User::find($id);

            $user->use_name = $request->name;
            $user->use_email = $request->email;
            if (!empty($request->password)) {
                $user->use_password = Hash::make($request->password);
            }

            $user->save();

            return response()->json('User successfully updated!');

        } catch (\Exception $error) {
            return $error->getMessage();
        }
    }

    public function destroy($id)
    {
        try {

            $user = User::find($id);
            if (!$user) {
                return response()->json('User not found!', 404);
            }

            $user->delete();

            return response()->json('User successfully removed!');

        } catch (\Exception $error) {
            return $error->getMessage();
        }
    }

    public function search(Request $request)
    {
        try{
            $filter = $request->filter;
            $users = User::where('use_name', 'LIKE', '%'.$filter.'%')
                ->orWhere('use_email', 'LIKE', '%'.$filter.'%')
                ->paginate(10);

            return response()->json($users);

        }catch(\Exception $error){
            return $error->getMessage();
        }
    }


}
