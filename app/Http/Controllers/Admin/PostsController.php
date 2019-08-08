<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\PostsDatatable;
use App\Model\Post;
use Illuminate\Http\Request;
use Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PostsDatatable $posts)
    {
        return $posts->render('admin.posts.index', ['title'=> trans('admin.posts')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create', ['title'=> trans('admin.posts')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate(request(), [
                'title'         => 'required',
                'description'   => 'required',
                'content'       => 'required',
                'category'      => 'sometimes|nullable',
                'photo'         => 'required|'.v_image(),
                'date'          => 'required|date',
                'status'        => 'required|in:active,inactive',
                'keywords'      => 'sometimes|nullable',
            ], [], [
                'title'         => trans('admin.title'),
                'description'   => trans('admin.description'),
                'photo'         => trans('admin.photo'),
                'content'       => trans('admin.content'),
                'category'      => trans('admin.category'),
                'date'          => trans('admin.date'),
                'keywords'      => trans('admin.keywords'),
                'status'        => trans('admin.status')
            ]
        );
        if(request()->hasFile('photo')){
            $data['photo'] = up()->upload([
                'file'          =>'photo',
                'path'          =>'posts',
                'upload_type'   =>'single',
                'delete_file'   =>''
            ]);
        }

        Post::create($data);
        session()->flash('success', trans('admin.record_added'));

        return redirect(aurl('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.posts.edit', ['title'=> trans('admin.posts'), 'post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */

    public function change_status()
    {
        if(request()->ajax() and request()->has('post_status')) {
            $id = request()->get('post_id');
            if(request()->get('post_status') == 'active'){
                $status = 'inactive';
                Post::where('id', $id)->update(['status' => $status]);
            } else {
                $status = 'active';
                Post::where('id', $id)->update(['status' => $status]);
            }
            return json_encode(['status'=>$status]);
        }
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate(request(), [
                'title'         => 'required',
                'description'   => 'required',
                'content'       => 'required',
                'category'      => 'sometimes|nullable',
                'photo'         => 'sometimes|nullable|'.v_image(),
                'date'          => 'required|date',
                'status'        => 'required|in:active,inactive',
                'keywords'      => 'sometimes|nullable',
            ], [], [
                'title'         => trans('admin.title'),
                'description'   => trans('admin.description'),
                'photo'         => trans('admin.photo'),
                'content'       => trans('admin.content'),
                'category'      => trans('admin.category'),
                'date'          => trans('admin.date'),
                'keywords'      => trans('admin.keywords'),
                'status'        => trans('admin.status')
            ]);
        if(request()->hasFile('photo')){
            $data['photo'] = up()->upload([
                'file'          =>'photo',
                'path'          =>'posts',
                'upload_type'   =>'single',
                'delete_file'   =>Post::find($id)->photo
            ]);
        }

        Post::where('id', $id)->update($data);
        session()->flash('success', trans('admin.record_edited'));

        return redirect(aurl('posts'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $post = Post::find($id);
        if(!empty($post->photo)){
            Storage::has($post->photo)?Storage::delete($post->photo):'';
        }
        $post->delete();

        session()->flash('success', trans('admin.record_deleted'));
        return redirect(aurl('posts'));
    }

    public function multi_delete() {
        if(is_array(request('item'))){
            Post::destroy(request('item'));
        } else {
            Post::find(request('item'))->delete();
        }
        session()->flash('success', trans('admin.records_deleted'));

        return redirect(aurl('states'));
    }
}
