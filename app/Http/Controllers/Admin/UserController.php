<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');
        $users = User::when($q, function($query) use ($q){
            $query->where('name','like',"%{$q}%")
                  ->orWhere('email','like',"%{$q}%");
        })->latest()->paginate(10);

        return view('admin.users.index', compact('users','q'));
    }

    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:user,admin',
        ]);

        if ($user->id === auth()->id()) {
            return back()->with('error','You cannot change your own role.');
        }

        $user->update(['role' => $request->role]);
        return back()->with('success','Role updated.');
    }

    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error','You cannot delete yourself.');
        }

        $user->delete();
        return back()->with('success','User deleted.');
    }
}
