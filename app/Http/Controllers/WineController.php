<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wine;
use App\Vineyard;
use App\Tag;
use App\_Purchase;


class WineController extends Controller
{
    /**
     * GET /wine/
     */
    public function index()
    {
        return view('wine.index');
    }

    public function edit(Request $request)
    {
        $id = $request->input('id', '');

        $wine = Wine::find($id)->toArray();

        if (!$wine) {
            return redirect('/show')->with(['alert' => 'The wine you were looking for was not found.']);
        } else {
            return view('wine.edit')->with([
                'wine' => $wine
            ]);
        }
    }

    /*
     * GET wine lis}
     */
    public function show()
    {
        $wines = Wine::orderBy('id')->get()->toArray();

        if (!$wines) {
            return redirect('/')->with(['alert' => 'There are no wines in your list, go to add wine.']);
        } else {
            return view('wine.show')->with([
                'wines' => $wines
            ]);
        }
    }


    /*
     * GET /wines/search
     */
    public function search(Request $request)
    {
        $searchTerm = $request->session()->get('searchTerm', '');
        $searchResults = $request->session()->get('searchResults', null);

        return view('wines.search')->with([
            'searchTerm' => $searchTerm,
            'searchResults' => $searchResults,
        ]);
    }

    /**
     * GET /books/search-process
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function searchProcess(Request $request)
    {
        $request->validate([
            'searchTerm' => 'required'
        ]);

        $searchTerm = $request->searchTerm;

        $searchResults = Wine::where('name', $searchTerm)->get();
        }

        return redirect('/wines/search')->with([
            'searchTerm' => $request->searchTerm,
            'searchResults' => $searchResults
        ]);
    }

    /*
     * GET /wines/create
     */
    public function create()
    {
        $vineyards = Vineyard::getForDropdown();

        $tags = Tag::getForCheckboxes();

        return view('wines.create')->with([
            'vineyardss' => $vineyardss,
            'tags' => $tags
        ]);
    }

    /*
     * POST /wines
     */
    public function store(Request $request)
    {
        # Validate the request data
        $request->validate([
            'name' => 'required',
            'vineyard_id' => 'required',
            'year' => 'required|digits:4',
            'type' => 'required',
            'purchase_id' => 'required'
        ]);

        # Note: If validation fails, it will redirect the visitor back to the form page
        # and none of the code that follows will execute.

        $wine = new wine();
        $wine->name = $request->name;
        $wine->type = $request->type;
        $wine->grape = $request->grape;
        $wine->vineyard = $request->vineyard;
        $wine->rating = $request->rating;
        $wine->cost = $request->cost;
        $wine->comment = $request->comment;

        $wine->save();

        # Note: Have to sync tags *after* the book has been saved so there's a book_id to store in the pivot table
        $wine->tags()->sync($request->tags);

        return redirect('/wines/create')->with(['alert' => 'The wine ' . $wine->name . ' was added.']);
    }

    /*
     * GET /books/{id}/edit
     */
    public function edit($id)
    {
        $wine = Wine::find($id);

        $vineyardss = Vineyard::getForDropdown();

        $tags = Tag::getForCheckboxes();

        $wineTags = $wine->tags->pluck('id')->toArray();

        if (!$wine) {
            return redirect('/wines')->with(['alert' => 'Wine not found.']);
        }

        return view('wines.edit')->with([
            'wine' => $wine,
            'vineyards' => $vineyards,
            'tags' => $tags,
            'wineTags' => $wineTags,
        ]);
    }

    /*
     * PUT /books/{id}
     */
    public function update(Request $request, $id)
    {
        $wine = Wine::find($id);
        $wine->name = $request->name;
        $wine->type = $request->type;
        $wine->grape = $request->grape;
        $wine->vineyard = $request->vineyard;
        $wine->rating = $request->rating;
        $wine->cost = $request->cost;
        $wine->comment = $request->comment;
        $wine->tags()->sync($request->tags);

        $wine->save();

        return redirect('/wines/' . $id . '/edit')->with(['alert' => 'Your changes were saved.']);
    }

    /*
    * Asks user to confirm they want to delete the book
    * GET /books/{id}/delete
    */
    public function delete($id)
    {
        $wine = Wine::find($id);

        if (!$wine) {
            return redirect('/wines')->with(['alert' => 'Book not found']);
        }

        return view('wines.delete')->with([
            'wine' => $wine,
        ]);
    }

    /*
    * Deletes the book
    * DELETE /wines/{id}/delete
    */
    public function destroy($id)
    {
        $wine = Wine::find($id);

        $wine->tags()->detach();

        $wine->delete();

        return redirect('/wines')->with([
            'alert' => '“' . $wine->name . '” was removed.'
        ]);
    }
}