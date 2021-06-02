<?php

namespace App\Http\Controllers;

use App;
use App\Article;
use App\Category;
use App\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use File;

class ArticlesController extends Controller
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
        $list_articles = Article::latest()->get();
        return view('admin.article.index', compact('list_articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_categories = Category::latest()->get();
        return view('admin.article.create', compact('list_categories'));
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
            'title' => 'required|max:255|unique:articles',
            'description' => 'max:255',
            'title_picture' => 'image',
        ]);

        $foldername = "images/summernote/".Str::slug($request->title, '-');
        // if folder is null, create new folder 
        if(!File::isDirectory($foldername)){
            File::makeDirectory($foldername, 0777, true, true);
        }  

        $text = $request->text;

        // source : http://www.expertphp.in/article/laravel-summernote-editor-to-get-upload-file-image-url-instead-of-base64-intervention-image

        if($request->text != null) {
            $dom = new \DomDocument();
            $dom->loadHtml($text, 
                LIBXML_HTML_NOIMPLIED | # Make sure no extra BODY
                LIBXML_HTML_NODEFDTD |  # or DOCTYPE is created
                LIBXML_NOERROR |        # Suppress any errors
                LIBXML_NOWARNING        # or warnings about prefixes.
            );   
            $images = $dom->getElementsByTagName('img');
            // foreach <img> in the submited text
            foreach($images as $img){
                $src = $img->getAttribute('src');
                
                // if the img source is 'data-url'
                if(preg_match('/data:image/', $src)){                
                    // get the mimetype
                    preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                    $mimetype = $groups['mime'];           
                    // Generating a random filename
                    $filename = uniqid();
                    $filepath = $foldername."/".$filename.".".$mimetype;   
                    // @see http://image.intervention.io/api/
                    $image = Image::make($src)
                    // resize if required
                    /* ->resize(300, 200) */
                    ->encode($mimetype, 100)  // encode file to the specified mimetype
                    ->save(public_path($filepath));                
                    $new_src = asset($filepath);
                    // $new_src = $filepath;
                    $img->removeAttribute('src');
                    $img->setAttribute('src', $new_src);
                } // <!--endif
            } // <!-

            $text = $dom->saveHTML();

        }

        $title_picture = $request->title_picture;

        if($request->title_picture != null) {
            $title_picture = 'title_picture_'.time().'.'.$request->title_picture->extension();  
            $request->title_picture->move(public_path($foldername), $title_picture);
        }
   

        $create_article = Article::create([
            'id_category' => $request->id_category,
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'description' => $request->description,
            'title_picture' => $title_picture,
            'text' => $text,
            'author' => Auth::user()->email,
            'status' => 'draft',
        ]);

        //log
        Log::create([
            'page' => 'Article',
            'action' => 'create',
            'description' => Auth::user()->email.' menambahkan article dengan id = '.$create_article->id,
            'database' => 'articles',
            'author' => Auth::user()->email,
        ]);

        return redirect('/article')->with('status', 'Data article berhasil ditambahkan!');
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
    public function edit($slug)
    {
        $list_categories = Category::latest()->get();
        $article = Article::where('slug', $slug)->first();
        return view('admin.article.edit', compact('list_categories', 'article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'id_category' => 'required',
            'title' => 'required|max:255',
            'description' => 'max:255',
            'title_picture' => 'image',
        ]);

        $foldername = "images/summernote/".$slug;
        // if folder is null, create new folder 
        if(!File::isDirectory($foldername)){
            File::makeDirectory($foldername, 0777, true, true);
        }  

        $text = $request->text;

        // source : http://www.expertphp.in/article/laravel-summernote-editor-to-get-upload-file-image-url-instead-of-base64-intervention-image

        if($request->text != null) {
            $dom = new \DomDocument();
            $dom->loadHtml($text, 
                LIBXML_HTML_NOIMPLIED | # Make sure no extra BODY
                LIBXML_HTML_NODEFDTD |  # or DOCTYPE is created
                LIBXML_NOERROR |        # Suppress any errors
                LIBXML_NOWARNING        # or warnings about prefixes.
            );   
            $images = $dom->getElementsByTagName('img');
            // foreach <img> in the submited text
            foreach($images as $img){
                $src = $img->getAttribute('src');
                
                // if the img source is 'data-url'
                if(preg_match('/data:image/', $src)){                
                    // get the mimetype
                    preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                    $mimetype = $groups['mime'];           
                    // Generating a random filename
                    $filename = uniqid();
                    $filepath = $foldername."/".$filename.".".$mimetype;   
                    // @see http://image.intervention.io/api/
                    $image = Image::make($src)
                    // resize if required
                    /* ->resize(300, 200) */
                    ->encode($mimetype, 100)  // encode file to the specified mimetype
                    ->save(public_path($filepath));                
                    $new_src = asset($filepath);
                    // $new_src = $filepath;
                    $img->removeAttribute('src');
                    $img->setAttribute('src', $new_src);
                } // <!--endif
            } // <!-

            $text = $dom->saveHTML();

        }

        $title_picture = $request->title_picture;

        if($request->title_picture != null) {
            $title_picture = 'title_picture_'.time().'.'.$request->title_picture->extension();  
            $request->title_picture->move(public_path($foldername), $title_picture);
        }

        $column_article_update = array(
                'id_category' => $request->id_category,
                'title' => $request->title,
                'description' => $request->description,
                'text' => $text,
                'author' => Auth::user()->email,
                'status' => 'draft'
        );

        if($request->title_picture != NULL) {
            $column_article_update['title_picture'] = $title_picture;
        }

        $update_article = Article::where('slug', $slug)
            ->update($column_article_update);

        if($update_article == 1) {
            $get_article = Article::where('slug', $slug)->first();

            //log
            Log::create([
                'page' => 'Article',
                'action' => 'update',
                'description' => Auth::user()->email.' mengubah article dengan id = '.$get_article->id,
                'database' => 'articles',
                'author' => Auth::user()->email,
            ]);
        }

        return redirect('/article')->with('status', 'Data article berhasil diubah!');
    }

    public function updateStatus(Request $request)
    {
        $status_article = Article::where('id', $request->id)
            ->update([
                'status' => $request->status,
            ]);

        if($status_article == 1) {
            $get_article = Article::where('id', $request->id)->get();
        }

        // return $get_article;
        $maps = $get_article->map(function ($index) {
            return [
                'id' => $index->id,
                'id_category' => $index->category->name,
                'title' => $index->title,
                'slug' => $index->slug,
                'description' => Str::limit($index->description, 110),
                'title_picture' => $index->title_picture,
                'text' => $index->text,
                'author' => $index->author,
                'status' => $index->status,
                'created_at' => $index->created_at->diffForHumans(),
                'updated_at' => $index->updated_at,
            ];
        });

        return $maps;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $removeFolder = $this->removeFolder($article->slug);
        
        if ($removeFolder == TRUE) {

            //log
            Log::create([
                'page' => 'Article',
                'action' => 'delete',
                'description' => Auth::user()->email.' menghapus article dengan judul = '.$article->title,
                'database' => 'articles',
                'author' => Auth::user()->email,
            ]);

            Article::destroy($article->id);
            
            return redirect('/article')->with('status', 'Data article berhasil dihapus!');
        }else{
            return redirect('/article')->with('status', 'Data article gagal dihapus!');
        }

    }

    public function removeFolder($slug)
    {
        $foldername = "images/summernote/".$slug;
        $delete = File::deleteDirectory(public_path($foldername));
        return $delete;
    }

}
