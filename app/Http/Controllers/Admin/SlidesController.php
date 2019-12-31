<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\SlideDatatable;
use App\Model\Slide;
use Illuminate\Http\Request;
use Storage;

class SlidesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SlideDatatable $slides)
    {
        return $slides->render('admin.slides.index', ['title'=> trans('admin.slides')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slides.create', ['title'=> trans('admin.slides')]);
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
                'title'         => 'sometimes|nullable',
                'description'   => 'sometimes|nullable',
                'photo'         => 'required|'.v_image(),
                'url'           => 'required|url',
                'status'        => 'required|in:active,inactive',
            ], [], [
                'title'         => trans('admin.title'),
                'description'   => trans('admin.description'),
                'photo'         => trans('admin.photo'),
                'url'           => trans('admin.url'),
                'status'        => trans('admin.status')
            ]
        );
        if(request()->hasFile('photo')){
            $data['photo'] = up()->upload([
                'file'          =>'photo',
                'path'          =>'slides',
                'upload_type'   =>'single',
                'delete_file'   =>''
            ]);
        }

        Slide::create($data);
        session()->flash('success', trans('admin.record_added'));

        return redirect(aurl('slides'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show(Slide $slide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide = Slide::find($id);
        return view('admin.slides.edit', ['title'=> trans('admin.slides'), 'slide'=>$slide]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */

    public function change_status()
    {
        if(request()->ajax() and request()->has('slide_status')) {
            $id = request()->get('slide_id');
            if(request()->get('slide_status') == 'active'){
                $status = 'inactive';
                Slide::where('id', $id)->update(['status' => $status]);
            } else {
                $status = 'active';
                Slide::where('id', $id)->update(['status' => $status]);
            }
            return json_encode(['status'=>$status]);
        }
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate(request(), [
                'title'         => 'sometimes|nullable',
                'description'   => 'sometimes|nullable',
                'photo'         => 'sometimes|nullable|'.v_image(),
                'url'           => 'required|url',
                'status'        => 'required|in:active,inactive',
            ], [], [
                'title'         => trans('admin.title'),
                'description'   => trans('admin.description'),
                'photo'         => trans('admin.photo'),
                'url'           => trans('admin.url'),
                'status'        => trans('admin.status')
            ]
        );
        if(request()->hasFile('photo')){
            $data['photo'] = up()->upload([
                'file'          =>'photo',
                'path'          =>'slides',
                'upload_type'   =>'single',
                'delete_file'   =>Slide::find($id)->photo
            ]);
        }

        Slide::where('id', $id)->update($data);
        session()->flash('success', trans('admin.record_edited'));

        return redirect(aurl('slides'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $slide = Slide::find($id);
        if(!empty($slide->photo)){
            Storage::has($slide->photo)?Storage::delete($slide->photo):'';
        }
        $slide->delete();

        session()->flash('success', trans('admin.record_deleted'));
        return redirect(aurl('slides'));
    }

    public function multi_delete() {
        if(is_array(request('item'))){
            Slide::destroy(request('item'));
        } else {
            Slide::find(request('item'))->delete();
        }
        session()->flash('success', trans('admin.records_deleted'));

        return redirect(aurl('slides'));
    }
}
