<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\ProductsDatatable;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Size;
use App\Model\Weight;
use App\Model\Color;
use App\Model\Brand;
use App\Model\Maker;
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
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

    public function upload_file($id)
    {
        if(request()->hasFile('file')) {
            $fid = up()->upload([
                'file'          => 'file',
                'path'          => 'products/'.$id,
                'upload_type'   => 'files',
                'file_type'     => 'product',
                'relation_id'   => $id,
            ]);
            return response(['status'=>true, 'id'=>$fid], 200);
        }
    }

    public function delete_file()
    {
        if(request()->has('id')) {
            up()->delete(request('id'));
        }
    }

    public function update_product_photo($id)
    {
        if(request()->hasFile('photo')) {
            $product = Product::where('id', $id)->update([
                'photo' => up()->upload([
                    'file'          => 'photo',
                    'path'          => 'products/'.$id,
                    'upload_type'   => 'single',
                    'delete_file'   => ''
                ])
            ]);

            return response(['status'=>true], 200);
        }
    }

    public function change_status()
    {
        if(request()->ajax() and request()->has('prod_status')) {
            $id = request()->get('prod_id');
            if(request()->get('prod_status') == 'active'){
                Product::where('id', $id)->update(['status' => 'inactive']);
                $status = 'inactive';
            } else {
                Product::where('id', $id)->update(['status' => 'active']);
                $status = 'active';
            }
            return json_encode(['status'=>$status]);
        }
    }

    public function delete_product_photo($id)
    {
        $product = Product::find($id);
        Storage::delete($product->photo);
        Product::where('id', $id)->update(['photo' => '']);
    }

    public function load_weight_size()
    {
        if (request()->ajax() and request()->has('category_id')){
            $cat_list = array_diff(explode(",", get_category(request('category_id'))), [request('category_id')]);
            $size1 = Size::where('is_public', 'yes')->whereIn('category_id', $cat_list)->pluck('name', 'id');
            $size2 = Size::where('category_id', request('category_id'))->pluck('name', 'id');
            $sizes = json_decode($size1,true) + json_decode($size2,true);
            $weights = Weight::pluck('name', 'id');
            $product = Product::find(request('pid'));

            return view('admin.products.ajax.size_weight', ['sizes'=>$sizes, 'weights'=>$weights, 'product' => $product])->render();
        } else {
            return trans('admin.please_select_category');
        }
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $colors = Color::all();
        $brands = Brand::all();
        $makers = Maker::all();
        $title = "Create / Edit : " .$product->title;
        return view('admin.products.product', ['title' => $title, 'product' => $product, 'colors' => $colors, 'brands' => $brands, 'makers' => $makers]);
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
                'title'             => 'required',
                'description'       => 'required',
                'content'           => 'required',
                'category_id'       => 'required|numeric',
                'price'             => 'required|numeric',
                'price_offre'       => 'sometimes|nullable|numeric',
                'stock'             => 'required|numeric',
                'offre_start_at'    => 'sometimes|nullable|date',
                'offre_end_at'      => 'sometimes|nullable|date',
                'status'            => 'required|in:inactive,active',
                'size'              => 'sometimes|nullable|numeric',
                'size_id'           => 'sometimes|nullable|numeric',
                'weight'            => 'required|numeric',
                'weight_id'         => 'required|numeric',
                'color_id'          => 'sometimes|nullable|numeric',
                'brand_id'          => 'sometimes|nullable|numeric',
                'maker_id'          => 'sometimes|nullable|numeric',
            ], [], [
                'title'             => trans('admin.title'),
                'description'       => trans('admin.description'),
                'content'           => trans('admin.content'),
                'category_id'       => trans('admin.category'),
                'price'             => trans('admin.price'),
                'price_offre'       => trans('admin.price_offre'),
                'stock'             => trans('admin.stock'),
                'offre_start_at'    => trans('admin.offre_start_at'),
                'offre_end_at'      => trans('admin.offre_end_at'),
                'status'            => trans('admin.status'),
                'size'              => trans('admin.size'),
                'size_id'           => trans('admin.size_name'),
                'weight'            => trans('admin.weight'),
                'weight_id'         => trans('admin.weight_name'),
                'color_id'          => trans('admin.color_id'),
                'brand_id'          => trans('admin.brand_id'),
                'maker_id'          => trans('admin.maker_id'),
            ]
        );
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
        foreach ($product->files()->get() as $file) {
            up()->delete($file->id);
        }
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
