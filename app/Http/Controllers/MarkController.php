<?php
  
namespace App\Http\Controllers;
  
use App\Models\Mark;
use App\Models\Student;
use Illuminate\Http\Request;
  
class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marks = Mark::latest()->paginate(5);
        return view('marks.index',compact('marks'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::all();
        return view('marks.create',compact('students'));
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
//   echo "<pre>";print_r($request->teacher); echo "</pre>";exit;
        Mark::create($request->all());
   
        return redirect()->route('marks.index')
                        ->with('success','Mark created successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function show(Mark $mark)
    {
        return view('marks.show',compact('mark'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function edit(Mark $mark)
    {
        
        $students = Student::all();
        return view('marks.edit',compact('mark','students'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mark $mark)
    {
        $request->validate([
            'name' => 'required',
        ]);
  
        $mark->update($request->all());
  
        return redirect()->route('marks.index')
                        ->with('success','Mark updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mark $mark)
    {
        $mark->delete();
  
        return redirect()->route('marks.index')
                        ->with('success','Mark deleted successfully');
    }
}