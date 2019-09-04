<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 1]);
        $data = Post::latest()->paginate(5);
        return view('Posts.index', compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'     =>  'required',
            'content'   =>  'required',
            'slug'      =>  'required',
            'image'    =>  'image|max:2048'
        ]);

        $image = $request->file('image');

        if($image != ''){
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/posts'), $new_name);
        } else {
            $new_name = '';
        }

        $form_data = array(
            'title'     => $request->title,
            'content'   => $request->content,
            'slug'      => $request->slug,
            'image'     => $new_name
        );

        Post::create($form_data);

        return redirect('posts')->with('success', 'Data Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Post::findOrFail($id);
        return view('Posts.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Post::findOrFail($id);
        //$this->authorize($user);
        return view('Posts.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, $id)
    {
        $this->authorize('update', $user);
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
            $request->validate([
                'title'     =>  'required',
                'content'   =>  'required',
                'slug'      =>  'required',
                'image'    =>  'image|max:2048'
            ]);

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        else
        {
            $request->validate([
                'title'     =>  'required',
                'content'   =>  'required',
                'slug'      =>  'required'
            ]);
        }

        $form_data = array(
            'title'     => $request->title,
            'content'   => $request->content,
            'slug'      => $request->slug,
            'image'     => $image_name
        );
  
        Post::whereId($id)->update($form_data);

        return redirect('posts')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Post::findOrFail($id);
        $data->delete();

        return redirect('posts')->with('success', 'Data is successfully deleted');
    }
}
