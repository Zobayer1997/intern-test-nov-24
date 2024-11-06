<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);

        Image::create(['filepath' => 'images/' . $imageName]);

        return back()->with('success', 'Image uploaded successfully');
    }

    public function showImages()
    {
        $images = Image::all();
        return view('images', compact('images'));
    }
}
