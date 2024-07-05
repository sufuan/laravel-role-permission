<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VolunteerController extends Controller
{
    public function showPendingVolunteers()
    {
        $volunteers = Post::where('post_status', 'pending')->get();
        return view('backend.volunteers.index', compact('volunteers'));
    }

    public function approveVolunteer($id)
    {
        $volunteer = Post::findOrFail($id);

        // Check if the user already exists
        $existingUser = User::where('email', $volunteer->email)->first();

        if ($existingUser) {
            // Update the post status and associate with the existing user
            $volunteer->post_status = 'published';
            $volunteer->user_id = $existingUser->id;
        } else {
            // Create a new user with volunteer's details
            $user = User::create([
                'name' => $volunteer->name,
                'email' => $volunteer->email,
                'password' => $volunteer->password, // Assuming the password is already hashed
                'phone' => $volunteer->phone,
                // Add other fields as needed
            ]);

            // Update the post status and associate with the new user
            $volunteer->post_status = 'published';
            $volunteer->user_id = $user->id;
        }

        $volunteer->save();

        return redirect()->route('admin.volunteers')->with('status', 'Volunteer approved and added to users.');
    }
}
