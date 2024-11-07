<?php

use Illuminate\Support\Facades\Route;



use App\Http\Controllers\PdfController;

Route::match(['get', 'post'], '/', [PdfController::class, 'handle'])->name('pdfconverter.handle');
