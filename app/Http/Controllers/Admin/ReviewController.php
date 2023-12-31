<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Review;
use App\Models\Rlco;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class ReviewController extends Controller
{
    public function index(): View
    {
        return View('admin.review.index');
    }
    public function indexAjax(Request $request): JsonResponse
    {
        $query = Review::with('rlco')->select("*");
        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('rlco_name', function (Review $review){
                return '<a target="_blank" href="'.route('admin.rlcos.show',optional($review->rlco)->id).'">'.optional($review->rlco)->rlco_name.'</a>';
            })
            ->editColumn('created_at', function (Review $review){
                return $review->created_at->format('d-m-Y');
            })
            ->rawColumns(['rlco_name','created_at'])
            ->make(true);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
