<?php

namespace App\Http\Controllers;

use App\Comment;
use App\LogPortal;
use Stevebauman\Location\Facades\Location;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list_comment = Comment::where('id_article', $request->id_article)->latest()->get();
        
        // return $get_article;
        $maps = $list_comment->map(function ($index) {
            return [
                'id' => $index->id,
                'id_article' => $index->id_article,
                'name' => $index->name,
                'email' => $index->email,
                'comment' => $index->comment,
                'created_at' => $index->created_at->diffForHumans(),
                'updated_at' => $index->updated_at,
            ];
        });

        return $maps;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //comment
        $Comment = Comment::create([
                                    'id_article' => $request->id_article,
                                    'name' => $request->name,
                                    'email' => $request->email,
                                    'comment' => $request->comment,
                                ]);

        //LogPortal
        $ip = request()->ip();
        $location = Location::get();
        
        LogPortal::create([
            'action' => $request->name.' memberikan komentar article dengan id_article = '.$request->id_article,
            'location' => $location->cityName,
            'ip' => $location->ip,
        ]);

        return $Comment;
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
