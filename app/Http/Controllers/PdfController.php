<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{
    public function handle(Request $request)
    {
        
        if ($request->isMethod('post')) {

            $request->validate([
                'images' => 'required',
                'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:40048',
            ]);

            // Initialize an array to store image paths
            $imagePaths = [];

            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');  // Save in 'storage/app/public/images'
                $imagePaths[] = storage_path('app/public/' . $path);  
            }

           
            $pdf = Pdf::loadView('pdfconverter', ['images' => $imagePaths])->setPaper('a4', 'portrait');

           
            return $pdf->download('converted-images.pdf');
        }

        return view('pdfconverter');
    }
}
