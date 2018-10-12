<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Professor;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class ProfessorsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $professors = Professor::all();

        return view('backEnd.professors.index', compact('professors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backEnd.professors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'name'=>'required',
            'lastname'=>'required',

        ]);

        
        Professor::create($request->all());

        Session::flash('message', 'Professor added!');
        Session::flash('status', 'success');

        return redirect('professors');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $professor = Professor::findOrFail($id);

        return view('backEnd.professors.show', compact('professor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $professor = Professor::findOrFail($id);

        return view('backEnd.professors.edit', compact('professor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        
        $professor = Professor::findOrFail($id);
        $professor->update($request->all());

        Session::flash('message', 'Professor updated!');
        Session::flash('status', 'success');

        return redirect('professors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $professor = Professor::findOrFail($id);

        $professor->delete();

        Session::flash('message', 'Professor deleted!');
        Session::flash('status', 'success');

        return redirect('professors');
    }

  

}
