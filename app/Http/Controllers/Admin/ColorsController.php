<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\ColorsDatatable;
use Illuminate\Http\Request;
use App\Model\Color;
use Up;
use Storage;

class ColorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ColorsDatatable $colors)
    {
       return $colors->render('admin.colors.index', ['title' => trans('admin.colors')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.colors.create', ['title' => trans('admin.create')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = $this->validate(request(), [
                'name'      => 'required',
                'color'   => 'required|max:7',
            ], [], [
                'name'      => trans('admin.name'),
                'color'   => trans('admin.color'),
            ]
        );
        Color::create($data);
        session()->flash('success', trans('admin.record_added'));

        return redirect(aurl('colors'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $color = Color::find($id);
        return view('admin.colors.edit', ['title' => trans('admin.edit'), 'color' => $color]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->validate(request(), [
            'name'      => 'required',
            'color'   => 'required|max:7',
        ], [], [
            'name'      => trans('admin.name'),
            'color'   => trans('admin.color'),
            ]
        );
        Color::where('id', $id)->update($data);
        session()->flash('success', trans('admin.record_edited'));

        return redirect(aurl('colors'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $color = Color::find($id);
        $color->delete();
        session()->flash('success', trans('admin.record_deleted'));

        return redirect(aurl('colors'));
    }

    public function multi_delete() {
        if(is_array(request('item'))){
            foreach(request('item') as $id){
                $color = Color::find($id);
                $color->delete();
            }
        } else {
            $color = Color::find(request('item'));
            $color->delete();
        }
        session()->flash('success', trans('admin.records_deleted'));

        return redirect(aurl('colors'));
    }
}
