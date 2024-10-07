<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
use App\Models\User;

class InsertData extends Controller
{
    public function index(){
        
        return view('form');
    }

    public function add(Request $request){
        $input = $request->all();
        $user = new User;
        $user->first_name = $input['first_name'];
        $user->last_name = $input['last_name'];
        $user->email = $input['email'];
        $user->age= $input['age'];
        // $user->phone_number= $input['phone'];
        $user->dob= $input['dob'];
        $user->address= $input['address'];
        $user->password = bcrypt($input['password']);// Consider hashing the password before storing it 
        $user->department= $input['department'];
        $user->position= $input['position'];
        $user->hire_date= $input['hiredate'];
        $user->salary= $input['salary'];
        // $user->profile_picture= $input['profile_picture'];
        $user->save();

        return redirect()->route('layouts.list')->with('success', 'User added successfully!');

    }

    public function listUsers(){
        $users = User::all(); // Fetch all users
        return view('layouts.list', compact('users')); // Pass the users data to the view
    }
// Edit
    public function edit($id){
        $users=User::find($id);
        if($users){
            return view('layouts.edit',compact('users'));
        }
        else{
            return redirect()->route('layouts.list')->with('error','User not found.');
        }
    }

    public function update(Request $request,$id){
        $users=User::find($id);
        if($users){
            $users->first_name = $request->input('first_name');
            $users->last_name = $request->input('last_name');
            $users->age = $request->input('age');
            $users->email = $request->input('email');
            $users->dob = $request->input('dob');
            $users->department= $request->input('department');
            $users->position= $request->input('position');
            $users->salary= $request->input('salary');
            $users->hire_date= $request->input('hiredate');
            $users->save();

            return redirect()->route('layouts.list');
        }
        else{
            return redirect()->route('layouts.list');
        }
    }

    // //Delete
    // public function delete($id){
    //     $users=User::find($id);
    //     if($users){
    //         $users->delete();
    //         return redirect()->route('layouts.list');
    //     }
    //     else{
    //         return redirect()->route('layouts.list')->with('error','File is not Deleted');
    //     }
    // }


    // Profile page
    public function profile($id){
        $user = User::find($id);
    
        if ($user) {
            return view('layouts.profile', compact('user'));
        } else {
            return redirect()->route('layouts.list')->with('error', 'User not found.');
        }
    }

    // Delete thrash 
    public function delete($id)
{
    \DB::beginTransaction();
    try {
        $user = User::findOrFail($id);

        // Move user to trash
        $inserted = \DB::table('user_trash')->insert([
            'firstname' => $user->first_name,
            'lastname' => $user->last_name,
            'department' => $user->department,
            'email' => $user->email,
            'position' => $user->position,
            'hiredate' => $user->hire_date,
            'salary' => $user->salary,
            'age' => $user->age,
            'deleted_at' => now(),
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at
        ]);

        if (!$inserted) {
            throw new \Exception("Failed to insert user into trash.");
        }

        $user->delete(); // Delete the user from the original table

        \DB::commit(); // Commit the transaction

        return response()->json(['success' => true]);
    } catch (\Exception $e) {
        \DB::rollBack(); // Rollback the transaction
        \Log::error('Error deleting user: ' . $e->getMessage());

        return response()->json(['success' => false, 'error' => $e->getMessage()]);
    }
}

    public function restore($id)
    {
        $trashedUser = \DB::table('user_trash')->where('id', $id)->first();
    
        if ($trashedUser) {
            // Create a new user with the details from trash
            $user = new User();
            $user->firstname = $trashedUser->firstname;
            $user->lastname = $trashedUser->lastname;
            $user->department = $trashedUser->department;
            $user->position = $trashedUser->position;
            $user->hiredate = $trashedUser->hiredate;
            $user->salary = $trashedUser->salary;


            $user->email = $trashedUser->email;
            $user->age = $trashedUser->age;
            
    
            $user->created_at = $trashedUser->created_at;
            $user->updated_at = $trashedUser->updated_at;
    
            $user->save(); // Save the new user to the original table
    
            // Remove the user from the trash
            \DB::table('user_trash')->where('id', $id)->delete();
    
            return redirect()->back()->with('success', 'User restored successfully.');
        }
        
        return redirect()->back()->with('error', 'User not found.');
    }
    

    

    public function deletePermenant($id)
    {
        $user = \DB::table('user_trash')->where('id', $id)->first();
        if ($user) {
            \DB::table('user_trash')->where('id', $id)->delete();
            return redirect()->back()->with('success', 'User deleted permanently.');
        }
        return redirect()->back()->with('error', 'User not found.');
    }
        


public function showTrash()
{
    $trashedUsers = \DB::table('user_trash')->get(); // Fetch all trashed users
    return view('trash', compact('trashedUsers')); // Pass the trashed users to the view
}
    
}  


