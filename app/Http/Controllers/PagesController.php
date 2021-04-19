<?php

namespace App\Http\Controllers;

use App\Article;
use App\Guide;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    
    public function home1()
    {
        return view('pages.component_home.home_1.home_index_1');
    }

    public function home2()
    {
        $list_guides = Guide::all();
        $articles = Article::where('status', 'publish')->latest()->paginate(3);
        return view('pages.component_home.home_2.home_index_2', compact('articles', 'list_guides'));
    } 

    public function home3()
    {
        return view('pages.component_home.home_3.home_index_3');
    }

    public function guide()
    {
        $list_guides = Guide::all();
        return view('pages.component_guide.guide_index', compact('list_guides'));
    }

    public function publication($slug = null)
    {
        if ($slug == null) {
            
            $articles = Article::where('status', 'publish')->latest()->get();
            return view('pages.component_publication.publication_list', compact('articles'));

        }else{
            $article = Article::where('slug', $slug)->first();
            return view('pages.component_publication.publication_article', compact('article'));
        }
        
    }

    public function penghargaan()
    {
        return view('pages.component_penghargaan.penghargaan_index');
    }

}
