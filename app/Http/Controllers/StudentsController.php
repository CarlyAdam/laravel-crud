<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Student;
use App\Professor;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class StudentsController extends Controller
{
   

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $students = Student::all();

        return view('backEnd.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $professors = Professor::all();

        foreach ($professors as $professor) {

        $professorsArray[$professor->id] = $professor->name;
    }
    return view('backEnd.students.create', compact('professorsArray'));
        
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
        
        Student::create($request->all());

        Session::flash('message', 'Student added!');
        Session::flash('status', 'success');

        return redirect('students');
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
        $student = Student::findOrFail($id);

        return view('backEnd.students.show', compact('student'));
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
        $student = Student::findOrFail($id);

        return view('backEnd.students.edit', compact('student'));
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
        
        $student = Student::findOrFail($id);
        $student->update($request->all());

        Session::flash('message', 'Student updated!');
        Session::flash('status', 'success');

        return redirect('students');
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
        $student = Student::findOrFail($id);

        $student->delete();

        Session::flash('message', 'Student deleted!');
        Session::flash('status', 'success');

        return redirect('students');
    }

 

}
