<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\Matiere;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\pdf as PDF;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function create(Request $request){
          //Validate Inputs
          $request->validate([
              'name'=>'required',
              'prenom'=>'required',
              'tel'=>'required',
              'dateNaissEtu'=>'required',
              'adrEtu'=>'required',
              'filiere' => 'required',
              'email'=>'required|email|unique:users,email',
              'password'=>'required|min:5|max:30',
              'cpassword'=>'required|min:5|max:30|same:password'
          ]);

          $user = new User();
          $user->nomEtu = $request->name;
          $user->prenomEtu = $request->prenom;
          $user->adrEtu = $request->adrEtu;
          $user->telEtu = $request->telEtu;
          $user->filiere = $request->filiere;
          $user->dateNaissEtu = $request->dateNaissEtu;
          $user->email = $request->email;
          $user->password = \Hash::make($request->password);
          $save = $user->save();

          if( $save ){
              return redirect()->back()->with('success','You are now registered successfully');
          }else{
              return redirect()->back()->with('fail','Something went wrong, failed to register');
          }
    }

    function check(Request $request){
        //Validate inputs
        $request->validate([
           'email'=>'required|email|exists:users,email',
           'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email is not exists on users table'
        ]);

        $creds = $request->only('email','password');
        if( Auth::guard('web')->attempt($creds) ){
            return redirect()->route('user.home');
        }else{
            return redirect()->route('user.login')->with('fail','Incorrect credentials');
        }
    }

    public function Result(Request $request, $user){
        $results=Note::join('matieres','matieres.id','=', 'notes.idMat' )
        ->select('matieres.*', 'notes.note as note', 'notes.coef as coef')
        ->where('notes.idEtu', '=', $user)
        ->get();
        $user = User::find($user);
        return view('dashboard.user.home', compact('results', 'user'));
    }

    public function releve(Request $request, $user)
    {
        $results=Note::join('matieres','matieres.id','=', 'notes.idMat' )
        ->select('matieres.*', 'notes.note as note', 'notes.coef as coef')
        ->where('notes.idEtu', '=', $user)
        ->get();

        $user = User::find($user);

        $moyenne = 10;

        $options = ['isHtml5ParserEnabled' => true, 'isPhpEnabled' => true, 'isPhp7' => true];

        $pdf = PDF::loadView('pdf.template', compact('results', 'moyenne', 'user', 'options'));

        return $pdf->download('monReleve.pdf');
    }
    public function docs(Request $request, $doc){
        $user=Auth::guard('web')->user()->id;
        $user = User::find($user);
        if($doc==1){
            $pdf= PDF::loadView('pdf.conventionSFE',compact('user') );
            return $pdf->download('MaConvention.pdf');
        }
        elseif($doc==2){
            $pdf= PDF::loadView('pdf.conventionSI',compact('user') );
            return $pdf->download('MaConvention.pdf');
        }
        else
            return view('dashboard.user.documents');
    }
    function logout(){
        Auth::guard('web')->logout();
        return redirect('/');
    }
}