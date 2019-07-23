<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\ProductsDatatable;
use Illuminate\Http\Request;
use App\Model\Product;
use Up;
use Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductsDatatable $products)
    {
       return $products->render('admin.products.index', ['title' => trans('admin.products')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::create(['title'=>'']);
        if(!empty($product)) {
            return redirect(aurl('products/'.$product->id.'/edit'));
        }
        //return view('admin.products.create', ['title' => trans('admin.create')]);
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
                'title'   => 'required',
                'photo'      => 'required|'.v_image()
            ], [], [
                'title'   => trans('admin.title'),
                'photo'      => trans('admin.photo')
            ]
        );
        if(request()->hasFile('photo')) {
            $data['photo'] = up()->upload([
                'file'          =>'photo',
                'path'          =>'products',
                'upload_type'   =>'single',
                'delete_file'   =>''
            ]);
        }
        Product::create($data);
        session()->flash('success', trans('admin.record_added'));

        return redirect(aurl('products'));
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
        $product = Product::find($id);
        $title = "Create / Edit : " .$product->title;
        return view('admin.products.product', ['title' => $title, 'product' => $product]);
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
                'title'   => 'required',
                'photo'      => 'sometimes|nullable|'.v_image(),
            ], [], [
                'title'   => trans('admin.title'),
                'photo'      => trans('admin.photo')
            ]
        );
        if(request()->hasFile('photo')) {
            $data['photo'] = up()->upload([
                'file'          =>'photo',
                'path'          =>'products',
                'upload_type'   =>'single',
                'delete_file'   =>Product::find($id)->photo
            ]);
        }
        Product::where('id', $id)->update($data);
        session()->flash('success', trans('admin.record_edited'));

        return redirect(aurl('products'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        Storage::delete($product->photo);
        $product->delete();
        session()->flash('success', trans('admin.record_deleted'));

        return redirect(aurl('products'));
    }

    public function multi_delete() {
        if(is_array(request('item'))){
            foreach(request('item') as $id){
                $product = Product::find($id);
                Storage::delete($product->photo);
                $product->delete();
            }
        } else {
            $product = Product::find(request('item'));
            Storage::delete($product->photo);
            $product->delete();
        }
        session()->flash('success', trans('admin.records_deleted'));

        return redirect(aurl('products'));
    }
}
