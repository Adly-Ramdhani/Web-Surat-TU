<?php

namespace App\Http\Controllers;
use Excel;
use App\Exports\NamaMigrationExport;
use App\Models\Letter_type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class letter_typesController extends Controller
{
    public function index()
    {
        $letter_types =Letter_type::with('letter')->get();
     return view('klasifikasi.index', compact('letter_types'));
    }

    public function create()  
     {
    return view('klasifikasi.create'); 
    } 

    public function edit($id)
    {
        // Retrieve the letter type by ID from the database
        $letterType = Letter_type::find($id);

        // Check if the letter type exists
        if (!$letterType) {
            // Handle case when the letter type is not found (e.g., show error or redirect)
            return response()->json(['error' => 'Letter type not found'], 404);
        }

        // Assuming you want to pass the letter type data to a view named 'edit'
        return view('klasifikasi.edit', compact('letterType'));
    }
    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'letter_code' => 'required',
            'name_type' => 'required',
            // Sesuaikan aturan validasi dengan kebutuhan Anda
        ]);
    
        // Lakukan pembaruan data berdasarkan $id
        $letterType = Letter_Type::find($id);
        $countSimilarEntries = Letter_type::count();
        if (!$letterType) {
            return redirect()->route('klasifikasi.home')->with('error', 'Data not found');
        }
    
        // Update nilai-nilai berdasarkan input dari request
        $letterType->letter_code = $request->input('letter_code', $countSimilarEntries + 1);
        $letterType->name_type = $request->input('name_type');
        // Dan seterusnya sesuai dengan kolom yang ingin di-update
    
        // Simpan perubahan ke dalam database
        $letterType->save();
    
        // Redirect atau berikan respons sesuai kebutuhan aplikasi Anda
        return redirect()->route('klasifikasi.home')->with('success', 'Data successfully updated');
    }
    



    public function store(Request $request)
{
    $request->validate([
        'letter_code' => 'required|min:3',
        'name_type' => 'required',
    ]);

    $baseLetterCode = $request->letter_code;
    $newLetterType = $baseLetterCode;

    // Check if a similar entry already exists
    $countSimilarEntries = Letter_type::count();

    // If similar entries exist, append a numeric suffix
    // if ($countSimilarEntries > 0) {
        $newLetterType = $baseLetterCode . '-' . ($countSimilarEntries + 1);
    // }

    Letter_type::create([
        'letter_code' => $newLetterType, // Corrected field name
        'name_type' => $request->name_type,
    ]);

    return redirect()->route('klasifikasi.home')->with('success', 'Berhasil menambahkan Surat');
}  
    public function destroy($id)
  { 
    Letter_type::where('id',$id)->delete();

    return redirect()->back()->with('deleted', 'Berhasil mengahpus data');
  }



public function exportExcel() 
    {
      $file_name = 'data_pembelian'.'.xlsx';
      return Excel::download(new NamaMigrationExport, $file_name);
    }
    

}
