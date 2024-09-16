<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(){
        return view('home.post',[
            'posts' => Post::all()
        ]);
    }
    public function storeData(Request $request){
        $validated = $request->validate([
            'title' => 'required',
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png|max:2048',
        ]);
        //upload image

//        $imageName=null;
//         if(isset(request()->image))
//         {
//             $imageName = time().'.'.request()->image->getClientOriginalExtension();
//             request()->image->move(public_path('images'), $imageName);
//         }

        $post = new Post;
        $post->title = $request->title;
        $post->name = $request->name;
        $post->description = $request->description;
        $post->image =saveImage($request,$post->id);
        $post->save();
        return redirect()->route('home')->with('success','Post created successfully');
    }
    private function saveImage($request,$postId)
    {
        $post = new Post;
        $files = $request->file('image');
        foreach ($files as $item) {
            $imageName=rand(). '.'. $item->getClientOriginalExtension();
            $directory = 'asset/image/';
            $imgUrl=$directory.$postId.'-'.$imageName;
            $item->move($directory,$postId.'-'.$imageName);
            $image = new Image();
            $image->post_id = $postId;
            $image->images = $imgUrl;
            $image->save();
        }
    }







    public function editData($id){
        $post = Post::find($id);

        return view('home.edit',[
            'post'=>$post
        ]);
    }
    public function updateData(Request $request, $id){

        $validated = $request->validate([
            'title' => 'required',
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png|max:2048',
        ]);
        //upload image

        $post = Post::find($id);
        $post->title = $request->title;
        $post->name = $request->name;
        $post->description = $request->description;
        $post->image = $request->saveImage($request,$post->id);
//        if(isset(request()->image))
//        {
//            $imageName = time().'.'.request()->image->getClientOriginalExtension();
//            request()->image->move(public_path('images'), $imageName);
//            $post->image =$imageName;
//        }
        $post->save();
        return redirect()->route('home')->with('success','Post updete successfully');
    }






    public function deleteData($id){
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('home')->with('success','Post Has been Deleted successfully');
    }


}
