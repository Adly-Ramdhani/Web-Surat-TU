<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function indexSt()
    {
        $usersSt = User::where('role', 'staf')->get();
    return view('users.staff.index', compact('usersSt'));
    }

    public function loginAuth(Request $request)
    {
        $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        $user = $request->only(['email', 'password']);
        if(Auth::attempt($user)){
            return redirect()->route('home.page');
        }else{
            return redirect()->back()->with('failed', 'Proses login gagal, silahkan coba lagi');
        }

    }

    public function editSt($id)
    {
        $users = User::find($id);
        // or $medicine = Medicine::where('id',$id)->first()

        return view('users.staff.edit', compact('users'));
    }

    public function updateSt(Request $request, $id)
    {
        $validatedData =  $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'sometimes|required|min:2', // Atur panjang minimal yang sesuai
        ]);
    
        $usersData = [
            'name' => $request->name,
            'email' => $request->email,
        ];
    
        if (isset($request->password) && !empty($request->password)) {
            $hashedPassword = Hash::make($request->password);
            $userData['password'] = $hashedPassword;
        }
    
        User::where('id', $id)->update($usersData);
    
        return redirect()->route('users.staff.home')->with('success', 'Berhasil mengubah data!');
    }
    

    public function createSt()  
     {
    return view('users.staff.create'); 
    } 

    

    public function storeSt(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',

        ]);

        // Buat pengguna baru
        $users = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt('defaultpassword'),
        ]);

        return redirect()->route('users.staff.home')->with('success', 'Berhasil menambahkan Users!');
    }

    public function destroySt($id)
    { 
        User::where('id',$id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil mengahpus data');
    }
   
    // Guru

    public function indexGr()
    {
        $usersGr = User::where('role', 'guru')->get();
    return view('users.guru.index', compact('usersGr'));
    }

    public function editGr($id)
    {
        $users = User::find($id);
        // or $medicine = Medicine::where('id',$id)->first()

        return view('users.guru.edit', compact('users'));
    }

    public function updateGr(Request $request, $id)
    {
        $validatedData =  $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'sometimes|required|min:2', // Atur panjang minimal yang sesuai
        ]);
    
        $usersData = [
            'name' => $request->name,
            'email' => $request->email,
        ];
    
        if (isset($request->password) && !empty($request->password)) {
            $hashedPassword = Hash::make($request->password);
            $userData['password'] = $hashedPassword;
        }
    
        User::where('id', $id)->update($usersData);
    
        return redirect()->route('users.guru.home')->with('success', 'Berhasil mengubah data!');
    }

    public function destroyGr($id)
    { 
        User::where('id',$id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil mengahpus data');
    }

    public function createGr()  
     {
    return view('users.guru.create'); 
    } 

    public function storeGr(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'role' => 'guru',
           
        ]);

        // Buat pengguna baru
        $users = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'role' => 'guru',
            'password' => ('defaultpassword'),
        ]);

        return redirect()->route('users.guru.home')->with('success', 'Berhasil menambahkan Users!');
    }

}
