<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();

        return view('users.index', compact('users'));
    }
    public function delete($id)
    {
        $user = User::findOrFail($id); // Menemukan pengguna berdasarkan ID atau menghasilkan 404 jika tidak ditemukan
        $user->delete(); // Menghapus pengguna dari database

        // Tambahkan logika lain yang Anda inginkan, misalnya mengirim notifikasi atau meredirect ke halaman lain
        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}
