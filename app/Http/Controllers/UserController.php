<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\RegistrationEmail;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all users from the database
        $users = User::paginate(2);

        // Return the view with the users data
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:5',
            ]);

            // Create the user
            $user = User::create([
                'name' => $request->first_name . ' ' . $request->last_name,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            // Send Email
            $data = [
                'first_name'=> $user->first_name,
                'last_name' => $user->last_name
            ];
            //Mail::to($user->email)->send(new RegistrationEmail($data,'emails.registration'));

            // Redirect to the users index page with a success message
            return redirect('users')->with('success', 'User created successfully');
        } catch (\Exception $e) {
            // Handle the exception 
            throw $e;
        }
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
        // Fetch the user by ID
        $user = User::findOrFail($id);

        // Return the edit view with the user data
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255'
        ]);

        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name
        ];

        User::where('id', $id)->update($data);
        // Redirect to the users index page
        return redirect('users')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Delete the user
        $user->delete();

        // Redirect to the users index page with a success message
        return redirect('users')->with('success', 'User deleted successfully');
    }

    public function dashboard(){
        return view('dashboard');
    }
}
