<?php

namespace App\Http\Controllers\Admin;

use App\Model\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $newsletters->render('admin.newsletters.index', ['title'=> trans('admin.newsletters')]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function show(Newsletter $newsletter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function edit(Newsletter $newsletter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Newsletter $newsletter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newsletter = Newsletter::find($id);
        if(!empty($newsletter->photo)){
            Storage::has($newsletter->photo)?Storage::delete($newsletter->photo):'';
        }
        $newsletter->delete();

        session()->flash('success', trans('admin.record_deleted'));
        return redirect(aurl('slides'));
    }

    public function multi_delete() {
        if(is_array(request('item'))){
            Newsletter::destroy(request('item'));
        } else {
            Newsletter::find(request('item'))->delete();
        }
        session()->flash('success', trans('admin.records_deleted'));

        return redirect(aurl('states'));
    }
}
