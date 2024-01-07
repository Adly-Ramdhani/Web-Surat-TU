<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Letter;
use App\Models\User;




class LetterController extends Controller
{
    public function index()
    {
        $letters = Letter::all();
        return view('letters.index', compact('letters'));
    }

    public function create()  
    {
        $letter_types = Letter::all();
        $users = User::where('role', 'guru')->get();
        return view('letters.cretae', compact('letter_types', 'users'));
    } 

    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'letter_perihal' => 'required',
            'letter_type_id' => 'required|exists:letter_types,id',
            'content' => 'required',
            'recipients' => 'required',
            'user_id' => 'required',
        ]);
    
        // Menyimpan data yang diterima dari formulir ke dalam database menggunakan model Letter
        $letter = new Letter();
        $letter->perihal = $request->input('letter_perihal'); // Sesuaikan dengan nama atribut yang ada di model Letter
        $letter->klasifikasi_surat = $request->input('letter_type_id'); // Pastikan sesuai dengan nama atribut yang ada di model Letter
        $letter->isi_surat = $request->input('content');
        // Simpan lampiran (jika diperlukan)
       
        $letter->notulis = $request->input('user_id'); // Pastikan sesuai dengan nama atribut yang ada di model Letter
        // Simpan ke dalam database
    
        // Redirect atau berikan respons sesuai kebutuhan aplikasi Anda
        return redirect()->route('letters.home')->with('success', 'Surat berhasil disimpan');
    }

    public function edit($id)
    {
        // Retrieve the letter type by ID from the database
        $letterType = Letter::find($id);

        // Check if the letter type exists
        if (!$letterType) {
            // Handle case when the letter type is not found (e.g., show error or redirect)
            return response()->json(['error' => 'Letter type not found'], 404);
        }

        // Assuming you want to pass the letter type data to a view named 'edit'
        return view('letters.edit', compact('letterType'));
    }
   
      public function destroy($id)
     { 
        Letter::where('id',$id)->delete();

       return redirect()->back()->with('deleted', 'Berhasil mengahpus data');
     }

}
