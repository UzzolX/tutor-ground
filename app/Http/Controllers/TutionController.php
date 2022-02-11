<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tution;
use App\Student;
use App\Http\Requests\TutionPostRequest;
use Auth;
use App\User;
use App\Category;
use App\Post;

class TutionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['student', 'verified'], ['except' => array('index', 'show', 'apply', 'alltutions', 'searchtutions', 'category')]);
    }

    //homepage recent tution
    public function index()
    {
        $tutions = Tution::latest()->limit(10)->where('status', 1)->get(); //to get tution on the front page
        $categories = Category::with('tutions')->get();                //to get category on the front page
        // $posts = Post::where('status', 1)->get();                    //to get blogs on the front page
        // $companies = Company::get()->random(12);                    //to get tution on the front page

        return view('welcome', compact('tutions', 'categories'));
    }


    public function show($id, Tution $tution)
    {

        $tutionRecommendations = $this->tutionRecommendations($tution);

        return view('tutions.show', compact('tution', 'tutionRecommendations'));
    }

    public function tutionRecommendations($tution)
    {
        $data = [];

        $tutionsBasedOnCategories = Tution::latest()->where('category_id', $tution->category_id)
            ->whereDate('last_date', '>', date('Y-m-d'))
            ->where('id', '!=', $tution->id)
            ->where('status', 1)
            ->limit(6)
            ->get();
        array_push($data, $tutionsBasedOnCategories);

        $tutionBasedOnStudent = Tution::latest()
            ->where('student_id', $tution->student_id)
            ->whereDate('last_date', '>', date('Y-m-d'))
            ->where('id', '!=', $tution->id)
            ->where('status', 1)
            ->limit(6)
            ->get();
        array_push($data, $tutionBasedOnStudent);

        $tutionBasedOnPosition = Tution::where('position', 'LIKE', '%' . $tution->position . '%')->where('id', '!=', $tution->id)
            ->where('status', 1)
            ->limit(6);
        array_push($data, $tutionBasedOnPosition);

        $collection  = collect($data);
        $unique = $collection->unique("id");
        $tutionRecommendations =  $unique->values()->first();
        return $tutionRecommendations;
    }



    public function student()
    {
        return view('student.index');
    }

    //My tutions
    public function mytution()
    {
        $tutions = Tution::latest()->where('user_id', auth()->user()->id)->get();
        return view('tutions.mytution', compact('tutions'));
    }


    public function edit($id)
    {
        $tution = Tution::findOrFail($id);
        return view('tutions.edit', compact('tution'));
    }

    public function update(TutionPostRequest $request, $id)
    {
        $tution = Tution::findOrFail($id);
        $tution->update($request->all());
        return redirect()->back()->with('message', 'tution  Sucessfully Updated!');
    }

    //Applicant list methid
    public function applicant()
    {
        $applicants = Tution::has('users')->where('user_id', auth()->user()->id)->get();
        return view('tutions.applicants', compact('applicants'));
    }


    public function  create()
    {
        return view('tutions.create');
    }
    public function  store(TutionPostRequest $request)
    {

        $user_id = auth()->user()->id;
        $student = Student::where('user_id', $user_id)->first();
        $student_id = $student->id;
        Tution::create([
            'user_id' => $user_id,
            'student_id' => $student_id,
            'title' => request('title'),
            'slug' => str_slug(request('title')),
            'description' => request('description'),
            'medium' => request('medium'),
            'category_id' => request('category'),
            'class' => request('class'),
            'address' => request('address'),
            'location' => request('location'),
            'status' => request('status'),
            'last_date' => request('last_date'),
            'number_of_student' => request('number_of_student'),
            'gender' => request('gender'),
            'group' => request('group'),
            'salary' => request('salary')

        ]);
        return redirect()->back()->with('message', 'tution posted successfully!');
    }

    public function apply(Request $request, $id)
    {
        $tutionId = Tution::find($id);
        $tutionId->users()->attach(Auth::user()->id);
        return redirect()->back()->with('message', 'Application sent!');
    }

    public function alltutions(Request $request)
    {

        //front search
        $search = $request->get('search');
        $address = $request->get('address');
        if ($search && $address) {
            $tutions = Tution::where('position', 'LIKE', '%' . $search . '%')
                ->orWhere('title', 'LIKE', '%' . $search . '%')
                ->orWhere('type', 'LIKE', '%' . $search . '%')
                ->orWhere('address', 'LIKE', '%' . $address . '%')
                ->paginate(20);

            return view('tutions.alltutions', compact('tutions'));
        }




        $keyword = $request->get('position');
        $type = $request->get('type');
        $category = $request->get('category_id');
        $address = $request->get('address');
        if ($keyword || $type || $category || $address) {
            $tutions = Tution::where('position', 'LIKE', '%' . $keyword . '%')
                ->orWhere('type', $type)
                ->orWhere('category_id', $category)
                ->orWhere('address', $address)
                ->paginate(20);
            return view('tutions.alltutions', compact('tutions'));
        } else {

            $tutions = Tution::latest()->paginate(20);
            return view('tutions.alltutions', compact('tutions'));
        }
    }
    public function searchtutions(Request $request)
    {

        $keyword = $request->get('keyword');
        $users = Tution::where('title', 'like', '%' . $keyword . '%')
            ->orWhere('position', 'like', '%' . $keyword . '%')
            ->limit(5)->get();
        return response()->json($users);
    }


    public function destroy(Request $request)
    {

        $id = $request->get('id');
        $tution = Tution::find($id);
        $tution->delete();
        return redirect()->back()->with('message', 'tution deleted successfully');
    }
}
