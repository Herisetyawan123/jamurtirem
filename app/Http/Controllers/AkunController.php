<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AkunController extends Controller
{
    public function index()
    {
        $data = User::get();
        return view('pages.akun.index', ['users' => $data]);
    }

    public function edit($id)
    {
        $data = User::find($id);
        return view('pages.akun.edit', ['user' => $data]);
    }

    public function delete($id)
    {
        $data = User::find($id);
        $data->delete();
        return back()->with('success', 'data berhasil dihapus');
    }

    public function update(Request $rq)
    {
        $data = $rq->all();
        Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::find($data['id']);
        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => Hash::make($data['password']),
        ]);

        return back()->with('success', 'data berhasil diperbarui');
    }
    
}
