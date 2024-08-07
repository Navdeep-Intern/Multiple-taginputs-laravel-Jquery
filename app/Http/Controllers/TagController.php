<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        return view('tags');
    }

    public function tags(Request $request)
    {
        $search = $request->search;

        if($search == ''){
            $tags = Tag::orderby('name', 'asc')->select('id', 'name')->get();
        } else {
            $tags = Tag::orderby('name', 'asc')->select('id', 'name')->where('name', 'like', '%' . $search . '%')->limit(5)->get();
        }

        $response = array();
        foreach($tags as $tag){
            $response[] = array("id" => $tag->id, "text" => $tag->name);
        }

        return response()->json($response);
    }

    public function saveTags(Request $request)
    {
        $tags = $request->tags;

        foreach ($tags as $tagName) {
            Tag::firstOrCreate(['name' => $tagName]);
        }

        return response()->json(['success' => 'Tags saved successfully']);
    }
}
// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Tag;

// class TagController extends Controller
// {
//     public function index()
//     {
//         return view('tags');
//     }

//     public function tags(Request $request)
//     {
//         $search = $request->search;

//         if($search == ''){
//             $tags = Tag::orderby('name', 'asc')->select('id', 'name')->limit(5)->get();
//         } else {
//             $tags = Tag::orderby('name', 'asc')->select('id', 'name')->where('name', 'like', '%' . $search . '%')->limit(5)->get();
//         }

//         $response = array();
//         foreach($tags as $tag){
//             $response[] = array("id" => $tag->id, "text" => $tag->name);
//         }

//         return response()->json($response);
//     }

//     public function saveTags(Request $request)
//     {
//         $tags = $request->tags;
//         $processedTags = [];

//         foreach ($tags as $tagName) {
//             $tag = Tag::firstOrCreate(['name' => $tagName]);
//             $processedTags[] = [
//                 'id' => $tag->id,
//                 'name' => $tag->name,
                
//             ];
//         }
        

//         return response()->json(['success' => 'Tags saved successfully', 'tags' => $processedTags]);
//     }
// }