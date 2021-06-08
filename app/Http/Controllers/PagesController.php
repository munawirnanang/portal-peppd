<?php

namespace App\Http\Controllers;

use App\Article;
use App\LogPortal;
use App\Guide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    
    public function home()
    {
        $data['list_guides'] = Guide::all();
        // $articles = Article::where('status', 'publish')->latest()->paginate(3);
        $data['articles'] = Article::where('status', 'publish')->latest()->paginate(3);
        $data['marquee_news'] = Article::where('status', 'publish')->latest('id')->first();
        // return view('pages.home', compact('articles', 'list_guides'));
        return view('pages.home', $data);
    }

    public function guide()
    {
        $data['list_guides'] = Guide::all();
        $data['marquee_news'] = Article::where('status', 'publish')->latest('id')->first();
        return view('pages.guide', $data);
    }

    public function publication($slug = null)
    {
        if ($slug == null) {
            $data['articles'] = Article::where('status', 'publish')->latest()->get();
            $data['marquee_news'] = Article::where('status', 'publish')->latest('id')->first();
            return view('pages.publication', $data);
        }else{
            $data['article'] = Article::where('slug', $slug)->first();
            $data['marquee_news'] = Article::where('status', 'publish')->latest('id')->first();
            $data['page_hint'] = DB::table('log_portals')
                ->where('action', 'like', 'user mengklik article dengan id = '.$data['article']->id.'%')
                ->get();
            return view('pages.publication_article', $data);
        }
        
    }

    /* public function penghargaan()
    {
        return view('pages.component_penghargaan.penghargaan_index');
    } */

}
