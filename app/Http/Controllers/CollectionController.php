<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function index(Request $request)
    {
        $statusFilter = $request->input('status', 'active');

        if ($statusFilter === 'all') {
            $collections = Collection::latest()->get();
        } else {
            $collections = Collection::where('status', $statusFilter)->latest()->get();
        }

        return view('admin.collections.index', ['collections' => $collections]);
    }

    public function create()
    {
        return view('admin.collections.create');
    }

    public function store(Request $request)
    {
        // Validation rules
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'max_users' => 'nullable|integer|min:1',
        ];

        // Custom validation messages
        $messages = [
            'max_users.min' => 'The maximum number of users must be at least 1.',
        ];

        // Validate the incoming request with the defined rules and messages
        $this->validate($request, $rules, $messages);

        // If validation passes, create a new collection
        $collection = new Collection();
        $collection->title = $request->input('title');
        $collection->description = $request->input('description');
        $collection->max_users = $request->input('max_users');
        $collection->save();

        // Redirect back with a success message
        return redirect()->route('collections.index')->with('success', 'Collection created successfully.');
    }

    public function edit($id)
    {
        $collection = Collection::find($id);
        return view('admin.collections.edit', compact('collection'));
    }

    public function update(Request $request, $id)
    {
        $collection = Collection::find($id);

        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'max_users' => 'nullable|integer',
        ]);

        $collection->title = $request->input('title');
        $collection->description = $request->input('description');
        $collection->max_users = $request->input('max_users');

        $collection->save();

        return redirect()->route('collections.index')->with('success', 'Collection updated successfully');
    }

    public function destroy($id)
    {
        $collection = Collection::find($id);

        if (!$collection) {
            return redirect()->route('collections.index')->with('error', 'Collection not found.');
        }

        $collection->delete();

        return redirect()->route('collections.index')->with('success', 'Collection deleted successfully');
    }

    public function viewMembers(Collection $collection)
    {
        $users = $collection->users;

        return view('admin.collections.viewMembers', compact('collection', 'users'));
    }

}