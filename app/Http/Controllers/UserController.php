<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'id_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:25000',
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8',
                'role' => 'required|string',
            ]);

            if ($request->hasFile('id_photo')) {
                $image = $request->file('id_photo');
                $imageName = 'id_photo_' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/id_photos/'), $imageName);
                $request->merge(['id_photo' => $imageName]);
            }

            User::create([
                'id_photo' => $request->input('id_photo'),
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'role' => $request->input('role'),
            ]);

            Alert::success('Success!', 'Added user successfully.');

            return redirect()->route('users.index')->with('success', 'User created successfully.');
        } catch (\Exception $e) {
            Alert::error('Error', 'Error Message: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'id_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:25000',
                'name' => 'required|string|max:255',
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique('users')->ignore($id),
                ],
                'old_password' => [
                    'nullable',
                    function ($attribute, $value, $fail) use ($id) {
                        $user = User::find($id);

                        if (!Hash::check($value, $user->password)) {
                            $fail(__('The old password is incorrect.'));
                        }
                    },
                ],
                'password' => 'nullable|string|min:8|confirmed',
                'role' => 'required|string',
            ]);

            $user = User::find($id);

            if ($request->hasFile('id_photo')) {
                $image = $request->file('id_photo');
                $imageName = 'id_photo_' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/id_photos/'), $imageName);
                $user->id_photo = $imageName;
            }

            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->role = $request->input('role');

            if ($request->filled('password')) {
                $user->password = bcrypt($request->input('password'));
            }

            $user->save();

            Alert::success('Success!', 'Updated user successfully.');

            return redirect()->route('users.index')->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            Alert::error('Error', 'Error Message: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return response()->json(['success' => true, 'message' => 'User deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }

}
