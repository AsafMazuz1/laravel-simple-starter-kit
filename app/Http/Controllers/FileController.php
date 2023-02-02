<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetFileRequest;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function view(GetFileRequest $request , $id)
    {
//        $docFile = DocFile::findOrFail($id);
//        return response()->file(storage_path('app/docs/' . $docFile->name));
    }
}
