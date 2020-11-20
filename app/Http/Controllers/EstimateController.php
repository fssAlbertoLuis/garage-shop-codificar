<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estimate;
use App\Http\Requests\EstimateRequest;
use Illuminate\Support\Facades\Validator;

class EstimateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'vendor_name' => 'nullable|string',
            'customer_name' => 'nullable|string',
            'from' => 'nullable|date',
            'to' => 'nullable|date'
        ]);
        if ($validator->fails()) {die(var_dump($validator->errors()));
            return redirect('/estimate');
        }
        $where = [];
        $search_terms = [];
        $route_append = [];
        if ($request->get('vendor_name')) {
            array_push($where, ['vendor_name', 'like', '%'.$request->get('vendor_name').'%']);
            $search_terms['vendedor'] = $request->get('vendor_name');
            $route_append['vendor_name'] = $request->get('vendor_name');
        }
        if ($request->get('customer_name')) {
            array_push($where, ['customer_name', 'like', '%'.$request->get('customer_name').'%']);
            $search_terms['cliente'] = $request->get('customer_name');
            $route_append['customer_name'] = $request->get('customer_name');
        }
        if ($request->get('from')) {
            array_push($where, ['created_at', '>=', $request->get('from')]);
            $search_terms['Criado de'] = $request->get('from');
            $route_append['from'] = $request->get('from');
        }
        if ($request->get('to')) {
            array_push($where, ['created_at', '<=', $request->get('to')]);
            $search_terms['Criado até'] = $request->get('to');
            $route_append['to'] = $request->get('to');
        }
        if (count($where) > 0) {
            $estimates = Estimate::where($where)->orderBy('created_at', 'DESC')->paginate(10);
        } else {
            $estimates = Estimate::orderBy('created_at', 'DESC')->paginate(10);
        }
        return view('index', ['estimates' => $estimates, 'filters'=> $search_terms, 'route_append' => $route_append]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\EstimateRequest;  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(EstimateRequest $request)
    {
        $validated = $request->validated();
        $estimate = new Estimate($validated);
        $estimate->save();
        return redirect('/estimate')->with('new_estimate', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estimate = Estimate::findOrFail($id);
        return view('show', ['estimate' => $estimate]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estimate = Estimate::findOrFail($id);
        return view('show', ['estimate' => $estimate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EstimateRequest $request, $id)
    {
        $estimate = Estimate::findOrFail($id);
        $estimate->fill($request->validated());
        $estimate->save();
        return redirect('/estimate/'.$estimate->id)->with('updated_estimate', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estimate = Estimate::findOrFail($id);
        $estimate->delete();
        return redirect('/estimate')->with('deleted_estimate', true);
    }
    
    
}
