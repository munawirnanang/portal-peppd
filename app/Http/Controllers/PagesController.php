<?php

namespace App\Http\Controllers;

use App\Article;
use App\Guide;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    
    public function home()
    {
        return view('pages.home');
    }

    public function guide()
    {
        $list_guides = Guide::all();
        return view('pages.guide', compact('list_guides'));
    }

    public function publication($slug = null)
    {
        if ($slug == null) {
            
            $articles = Article::where('status', 'publish')->latest()->get();
            return view('pages.publication', compact('articles'));

        }else{
            $article = Article::where('slug', $slug)->first();
            return view('pages.article', compact('article'));
        }
        
    }

    /* public function penghargaan()
    {
        return view('pages.component_penghargaan.penghargaan_index');
    } */

}
