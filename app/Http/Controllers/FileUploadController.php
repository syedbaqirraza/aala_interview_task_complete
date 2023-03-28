<?php

namespace App\Http\Controllers;

use App\Events\EventOne;
use App\Models\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class FileUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = FileUpload::all();
        $files=json_encode($data);
        return view('fileUpload.index', compact('files'));
    }
    public function getAllImages()
    {
        $data = FileUpload::all();
        $files=json_encode($data);
        return response($files,200);
    }
    public function deleteImages($id)
    {
        $fileUpload = FileUpload::find($id);
        $fileUpload->delete();
        return response('',200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fileUpload.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:jpeg,jpg,png,gif|max:10000|dimensions:width=500,height=500',
        ],
            [
                'file.dimensions' => 'You have to choose the file which have perticural dimensions! 500X500',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->getMessages()],400);
        } else {
            try {
                $file = $request->file('file');
                $path = $file->store('public');
                $filename_only = basename($path);
                FileUpload::create(['filename' => $filename_only]);
                Artisan::call('watermark');
                return response()->json(['success' => 'image Uploaded']);
            } catch (\Exception $error) {
                return response()->json(['exception' => $error->getMessage()]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FileUpload  $fileUpload
     * @return \Illuminate\Http\Response
     */
    public function show(FileUpload $fileUpload)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FileUpload  $fileUpload
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('fileUpload.change');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FileUpload  $fileUpload
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $completeName = array($request->firstName, $request->middleName, $request->lastName);
        event(new EventOne($completeName, 'run'));
        return response()->json('',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FileUpload  $fileUpload
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fileUpload = FileUpload::find($id);
        $fileUpload->delete();
        return redirect()->back()->with('success', 'File deleted successfully');
    }
}
