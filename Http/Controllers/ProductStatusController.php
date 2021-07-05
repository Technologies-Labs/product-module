<?php

namespace Modules\ProductModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ProductModule\Entities\ProductStatus;
use Modules\ProductModule\Services\ProductStatusService;

class ProductStatusController extends Controller
{
public function __construct(){
    $this->middleware('permission:product-status-create',   ['only' => ['create','store']]);
    $this->middleware('permission:product-status-edit',     ['only' => ['edit','update']]);
    $this->middleware('permission:product-status-list',     ['only' => ['show', 'index']]);
    $this->middleware('permission:product-status-delete',   ['only' => ['destroy']]);
    $this->middleware('permission:product-status-activate', ['only' => ['activate']]);
}
// /**
//  * Display a listing of the resource.
//  * @return Renderable
//  */
public function index()
{
    $statuses=ProductStatus::get();
    return view('productmodule::dashboard.productStatus.index',compact('statuses'));
}

/**
 * Show the form for creating a new resource.
 * @return Renderable
 */
public function create()
{
    return view('productmodule::dashboard.productStatus.create');
}

/**
 * Store a newly created resource in storage.
 * @param Request $request
 * @return Renderable
 */
public function store(Request $request)
{
    $request->validate([
        'name'           => 'required|string|unique:product_statuses,name',
        'description'    => 'required',
    ]);

    $status = new ProductStatusService();
    $status ->setName($request->name)
            ->setDescription($request->description)
            ->createProductStatus();

    return redirect()->route("productStatuses.index")->with('success', 'تم اضافة  بنجاح');
}


/**
 * Show the form for editing the specified resource.
 * @param int $id
 * @return Renderable
 */
public function edit($id)
{
    $status =ProductStatus::find($id);
    if (!$status) {
        return redirect()->route('dashboard')->with('failed',"status Not Found");
    }
    return view('productmodule::dashboard.productStatus.edit',compact('status'));
}

/**
 * Update the specified resource in storage.
 * @param Request $request
 * @param int $id
 * @return Renderable
 */
public function update(Request $request, $id)
{
$request->validate([
        'name'           => 'required|string|unique:product_statuses,name,'. $id,
        'description'    => 'required',
    ]);

    $status = ProductStatus::find($id);
    if(!$status){
        return redirect()->route('dashboard')->with('failed',"status Not Found");
    }

    $statusUpdate   = new ProductStatusService();
    $statusUpdate   -> setName($request->name)
                    -> setDescription($request->description)
                    ->updateProductStatus($status);

    return redirect()->route("productStatuses.index")->with('success', 'تم التعديل  بنجاح');
}

/**
 * Remove the specified resource from storage.
 * @param int $id
 * @return Renderable
 */
public function destroy($id)
{
    $status=ProductStatus::find($id);
    if (!$status) {
        return redirect()->route('dashboard')->with('failed',"status Not Found");
    }
    $status->delete();
}
}
