<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;

Route::get('/', function () {
   $html = "
   <h1>Contact App</h1>
   <div>
       <a href='" . route('contacts.index') . "'>All contacts</>
       <a href='" . route('contacts.create') . "'>Add contacts</>
       <a href='" . route('contacts.show', 1) . "'>Show contacts</>
   </div>
   ";
   return $html;
   // return view('welcome');
});

Route::get('/contacts', function() {
   return "<h1>Daftar Kontak</h1>";
})->name('contacts.index');

Route::get('/contacts/create', function() {
   return "<h1>Tambah Kontak Baru</h1>";

})->name('contacts.create');
Route::get('/contacts/{id}', function($id) {

   return "Ini Kontak ke-" . $id;
})->whereNumber('id')->name('contacts.show');

Route::get('/companies/{name?}', function($name=null) {
        if($name) {
            return "<h2>🤖 Nama Perusahaan: </h2>" . $name;
        } else {
            return "<h2>🤖 Nama Perusahaan Kosong 🤖</h2>";
        }
})->whereAlphaNumeric('name')->name('companies');

Route::get('/', function () {
    $html = "
    <h1>Contact App</h1>
    <div>
        <a href='" . route('admin.contacts.index') . "'>All contacts</>
        <a href='" . route('admin.contacts.create') . "'>Add contacts</>
        <a href='" . route('admin.contacts.show', 1) . "'>Show contacts</>
    </div>
    ";
    return $html;
    // return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/contacts', function() {
        return "<h1>📜 Daftar Kontak</h1>";
    })->name('contacts.index');
    
    Route::get('/contacts/create', function() {
        return "<h1>☎️ Tambah Kontak Baru</h1>";
    })->name('contacts.create');
    
    Route::get('/contacts/{id}', function($id) {
        return "<h3>💬 Ini Kontak ke- </h3>" . $id;
    })->whereNumber('id')->name('contacts.show');
    
    Route::get('/companies/{name?}', function($name=null) {
        if($name) {
            return "🤖 Nama Perusahaan: " . $name;
        } else {
            return "🤖 Nama Perusahaan Kosong 🤖";
        }
    })->whereAlphaNumeric('name')->name('companies');
});
