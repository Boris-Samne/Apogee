<?php

namespace App\Http\Controllers\Prof;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Matiere;
use App\Models\User;
use App\Models\Prof;
use App\Models\profMat;
use Illuminate\Support\Facades\Auth;

class ProfController extends Controller
{
    function create(Request $request){
          //Validate Inputs
          $request->validate([
              'name'=>'required',
              'prenom'=>'required',
              'tel'=>'required',
              'dateNaissProf'=>'required',
              'adrProf'=>'required',
              'matiere'=>'required',
              'email'=>'required|email|unique:profs,email',
              'password'=>'required|min:5|max:30',
              'cpassword'=>'required|min:5|max:30|same:password'
          ]);

          $prof = new Prof();
          
          $prof->nomProf = $request->name;
          $prof->prenomProf = $request->prenom;
          $prof->adrProf = $request->adrProf;
          $prof->telProf = $request->tel;
          $prof->dateNaissProf = $request->dateNaissProf;
          $prof->email = $request->email;
          $prof->password = \Hash::make($request->password);
          $save = $prof->save();

          $profs = Prof::All();
                
                foreach($profs as $prof){
                    if($prof->nomProf == $request->name and $prof->prenomProf == $request->prenom and $prof->adrProf = $request->adrProf and $prof->telProf = $request->tel and $prof->dateNaissProf = $request->dateNaissProf) {
                        $idProf=$prof->id;
                    }
                }
        $matieres=array();
        $matieres=$request->input('matiere');
        foreach($matieres as $matiere){
            $profmat = new profMat();
            $profmat->idProf = $idProf;
            $profmat->idMat = $matiere;
            $save = $profmat->save();
        }
         


          if( $save ){
              return redirect()->back()->with('success','You are now registered successfully');
          }else{
              return redirect()->back()->with('fail','Something went wrong, failed to register');
          }
    }

    public function check(Request $request)
    {
        // Validate inputs
        $request->validate([
            'email' => 'required|email|exists:profs,email',
            'password' => 'required|min:5|max:30',
        ], [
            'email.exists' => 'This email is not found in the profs table.',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('prof')->attempt($credentials)) {
            $prof = auth()->guard('prof')->user();
            $matieres = Note::where('idProf', $prof->id)
                ->join('matieres', 'notes.id', '=', 'matieres.id')
                ->select('matieres.*')
                ->distinct()
                ->get();
            $etudiants = User::all();
            return view('dashboard.prof.home', ['etudiants'=>$etudiants, 'matieres'=>$matieres]);
        } else {
            return redirect()->route('prof.login')->with('fail', 'Incorrect professor credentials');
        }
    }
    public function chooseClasse(Request $request, $id)
    {
        $selectedClassName = null;
        $notes = Note::all();
        $etudiants = User::join('notes', 'users.id', '=', 'notes.idEtu')
        ->select('users.*', 'notes.note as note', 'notes.idEtu as idEtu ')
        ->where('notes.idMat', '=', $id)
        ->get();
    
        return view('dashboard.prof.matEtu', compact('id','etudiants', 'request'));
        // return redirect()->route('prof.matEtu', ["etudiants" => $etudiants]);
    }
    
    public function RegisterMark(Request $request, $id)
    {
        $res = 0;
        $etudiants = User::join('notes', 'users.id', '=', 'notes.idEtu')
            ->select('users.*', 'notes.note as note', 'notes.idEtu as idEtu')
            ->where('notes.idMat', '=', $id)
            ->get();
    
        foreach ($etudiants as $etudiant) {
            $inputFieldName = "note$etudiant->idEtu";
    
            if ($request->filled($inputFieldName)) {
                $test = Note::where('idEtu', $etudiant->idEtu)
                    ->where('idMat', $id)
                    ->update(['note' => $request->input($inputFieldName)]);
    
                if ($test) {
                    $res += 1;
                }
            }
        }
        
        $etudiants = User::join('notes', 'users.id', '=', 'notes.idEtu')
            ->select('users.*', 'notes.note as note', 'notes.idEtu as idEtu')
            ->where('notes.idMat', '=', $id)
            ->get();
    
        $notif = "Notes enregistré avec success!";
    
        return view('dashboard.prof.matEtu', compact('id', 'etudiants', 'request', 'notif'));
    }
    function logout(){
        Auth::guard('prof')->logout();
        return redirect('/');
    }

    public function home()
    {
            $prof = auth()->guard('prof')->user();
            $matieres = Note::where('idProf', $prof->id)
                ->join('matieres', 'notes.id', '=', 'matieres.id')
                ->select('matieres.*')
                ->distinct()
                ->get();
            $etudiants = User::all();
            return view('dashboard.prof.home', ['etudiants'=>$etudiants, 'matieres'=>$matieres]);
    }
}