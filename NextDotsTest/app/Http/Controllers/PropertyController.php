<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\PropertyRequest;
use App\Repositories\PropertyRepository;
use App\Repositories\FacilityRepository;
use App\Repositories\StateRepository;

class PropertyController extends Controller
{

    /** @var \App\Repositories\StateRepository */
    protected $state;

    /** @var \App\Repositories\FacilityRepository */
    protected $facility;

    /** @var \App\Repositories\PropertyRepository */
    protected $property;

    public function __construct(
        StateRepository $state,
        FacilityRepository $facility,
        PropertyRepository $property
    )
    {
        $this->state = $state;
        $this->facility = $facility;
        $this->property = $property;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = $this->property->search()->get();
        return view('property.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = $this->state->search()->get()->toArray();
        $facilities = $this->facility->search()->get()->toArray();
        return view('property.form', ['states' => $states, 'facilities' => $facilities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyRequest $request)
    {
        if($property = $this->property->createRow($request->all())){
            Session::flash('message', 'Property create');
            return redirect()->route('properties.index');
        } else {
            return redirect()->back()->withInput()->withErrors('Error creating property.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$property = $this->property->find($id)) {
            return redirect()->route('properties.index');
        }
        $facilities_property = $this->property->getIdProperties($property);
        $states = $this->state->search()->get()->toArray();
        $facilities = $this->facility->search()->get()->toArray();
        return view('property.form', ['property' => $property, 'states' => $states,
            'facilities' => $facilities, 'facilities_property' => $facilities_property]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PropertyRequest $request, $id)
    {
        if(!$property = $this->property->find($id)) {
            return redirect()->route('properties.index');
        }
        if($property = $this->property->updateRow($property, $request->all())){
            Session::flash('message', 'Property update');
            return redirect()->route('properties.index');
        } else {
            return redirect()->back()->withInput()->withErrors('Error updating property.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$property = $this->property->find($id)) {
            return redirect()->route('properties.index');
        }
        if($property = $this->property->deleteRow($property)){
            Session::flash('message', 'Property removed');
            return redirect()->route('properties.index');
        } else {
            return redirect()->back()->withInput()->withErrors('Error deleting property.');
        }
    }
}
