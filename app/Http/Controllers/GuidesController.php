<?php

namespace App\Http\Controllers;

use App\Guide;
use App\Category;
use App\Log;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Intervention\Image\ImageManagerStatic as Image;
use File;

class GuidesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_guides = Guide::latest()->get();
        return view('admin.guide.index', compact('list_guides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_guides = Guide::latest()->get();
        return view('admin.guide.create', compact('list_guides'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_category' => 'required',
            'name' => 'required',
            'description' => 'max:255',
            'title_picture' => 'image',
            'file' => 'file',
        ]);

        $foldername = "file_guide/".Str::slug($request->name, '-');
        // if folder is null, create new folder 
        if(!File::isDirectory($foldername)){
            File::makeDirectory($foldername, 0777, true, true);
        }  

        $title_picture = $request->title_picture;

        if($request->title_picture != null) {
            $title_picture = 'cover_guide_picture_'.time().'.'.$request->title_picture->extension();  
            $request->title_picture->move(public_path($foldername), $title_picture);
        }

        $file = $request->file;

        if($request->file != null) {
            $file = 'guide_file_'.time().'.'.$request->file->extension();
            $request->file->move(public_path($foldername), $file);
        }

        $create_guide = Guide::create([
            'id_category' => $request->id_category,
            'name' => $request->name,
            'description' => $request->description,
            'title_picture' => $title_picture,
            'file' => $file,
        ]);

        //log
        Log::create([
            'page' => 'Guidelines',
            'action' => 'create',
            'description' => Auth::user()->email.' menambahkan guide dengan id = '.$create_guide->id,
            'database' => 'guides',
            'author' => Auth::user()->email,
        ]);

        return redirect('/guidelines/create')->with('status', 'Data guide berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $list_guides = Guide::latest()->get();
        $guide = Guide::find($id);
        return view('admin.guide.edit', compact('list_guides', 'guide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guide $guide)
    {
        $request->validate([
            'id_category' => 'required',
            'name' => 'required',
            'description' => 'max:255',
            'title_picture' => 'image',
            'file' => 'file',
        ]);

        $oldFoldername = "file_guide/".Str::slug($guide->name, '-');
        $foldername = "file_guide/".Str::slug($request->name, '-');
        // if folder is null, create new folder 
        if(File::isDirectory($oldFoldername)){
            rename($oldFoldername, $foldername);
        }  

        $title_picture = $request->title_picture;

        if($request->title_picture != null) {
            $title_picture = 'cover_guide_picture_'.time().'.'.$request->title_picture->extension();  
            $request->title_picture->move(public_path($foldername), $title_picture);
        }

        $file = $request->file;

        if($request->file != null) {
            $file = 'guide_file_'.time().'.'.$request->file->extension();
            $request->file->move(public_path($foldername), $file);
        }

        $column_guide_update = array(
            'id_category' => $request->id_category,
            'name' => $request->name,
            'description' => $request->description,
        );

        if($request->title_picture != NULL) {
            $column_guide_update['title_picture'] = $title_picture;
        }

        if($request->file != NULL) {
            $column_guide_update['file'] = $file;
        }

        $update_guide = Guide::where('id', $guide->id)
            ->update($column_guide_update);

        if ($update_guide == 1) {
            $get_guide = Guide::find($guide->id);

            //log
            Log::create([
                'page' => 'Guidelines',
                'action' => 'update',
                'description' => Auth::user()->email.' mengubah guide dengan id = '.$get_guide->id,
                'database' => 'guides',
                'author' => Auth::user()->email,
            ]);
        }

        return redirect('/guidelines/')->with('status', 'Data guide berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guide $guide)
    {
        $removeFolder = $this->removeFolder($guide->name);
        
        if ($removeFolder == TRUE) {

            //log
            Log::create([
                'page' => 'Guidelines',
                'action' => 'delete',
                'description' => Auth::user()->email.' menghapus guide dengan nama = '.$guide->name,
                'database' => 'guides',
                'author' => Auth::user()->email,
            ]);

            Guide::destroy($guide->id);

            return redirect('/guidelines')->with('status', 'Data Guide berhasil dihapus!');
        }else{
            return redirect('/guidelines')->with('status', 'Data Guide gagal dihapus!');
        }
    }

    public function removeFolder($slug)
    {
        $foldername = "file_guide/".Str::slug($slug, '-');
        $delete = File::deleteDirectory(public_path($foldername));
        return $delete;
    }
}
