<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\bid;
use Illuminate\Http\Request;

class BidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Article $article)
    {
        return view('bids.create', ['bid' => new Bid(), 'article' => $article]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Article $article,Request $request)
    {
        $article->bids()->create($request->all());
        return redirect()->route('articles.show', $article);
    }

    /**
     * Display the specified resource.
     */
    public function show(bid $bid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(bid $bid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, bid $bid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(bid $bid)
    {
        //
    }
}
