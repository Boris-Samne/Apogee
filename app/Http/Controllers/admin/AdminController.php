<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Filiere;
use App\Models\Matiere;
use App\Models\profMat;
use App\Models\Prof;
use App\Models\Semestre;
use App\Models\User;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function check(Request $request){
         //Validate Inputs
         $request->validate([
            'email'=>'required|email|exists:admins,email',
            'password'=>'required|min:5|max:30'
         ],[
             'email.exists'=>'This email is not exists in admins table'
         ]);

         $creds = $request->only('email','password');

         if( Auth::guard('admin')->attempt($creds) ){
             return redirect()->route('admin.home');
         }else{
             return redirect()->route('admin.login')->with('fail','Incorrect credentials');
         }
    }

    function logout(){
        Auth::guard('admin')->logout();
        return redirect('/');
    }




    public function insertFilier(Request $request){
        // Validate the form data

                $request->validate([
                    'intituleFil' => 'required',
                    'cycle' => 'required',
                
                ]);

                Filiere::create([
                    'intituleFil' => $request->intituleFil,
                    'cycle' => $request->cycle,
                ]);
            
                session()->flash('success', 'Filier bien ajoutée');
                //  return "date est expirer";
               
             return redirect()->back();
            
            
              //  return redirect('/admin/home')->with('success', 'Produit added successfully!');
        } 

    public function insertMatiere(Request $request){
        // Validate the form data

                $request->validate([
                    'intituleMat' => 'required',
                    'coefMat' => 'required',
                    'filiere' => 'required',
                
                ]);

                Matiere::create([
                    'intituleMat' => $request->intituleMat,
                    'coefMat' => $request->coefMat,
                    'idFil' => $request->filiere,
                ]);
                $matieres = Matiere::All();
                
                // foreach($matieres as $matiere){
                //     if($matiere->intituleMat == $request->intituleMat and $matiere->coefMat == $request->coefMat){
                //         $idMat=$matiere->id;
                //     }
                // }
                // Note::create([
                //     'idFil' => $request->filiere,
                //     'idMat' => $idMat,
                //     'coef' => $request->coefMat,
                // ]);

            
                session()->flash('success', 'Matiere bien ajoutée');
                //  return "date est expirer";
                
                return redirect()->back();
            
            
        } 
        public function insertSemestre(Request $request){
            // Validate the form data
    
                    $request->validate([
                        'intituleSem' => 'required',
                        'dateDeb' => 'required',
                        'dateFin' => 'required',
                    
                    ]);
    
                    Semestre::create([
                        'intituleSem' => $request->intituleSem,
                        'dateDeb' => $request->dateDeb,
                        'dateFin' => $request->dateFin,
                    ]);
                
                    session()->flash('success', 'Semestre bien ajoutée');
                    //  return "date est expirer";
                    
                    return redirect()->back();
                
                
            } 



    public function editMatiere(Request $request, $id){
        $matiere = Matiere::findOrFail($id);
            return view('dashboard.admin.editMatiere')->with('matiere',$matiere);
        }
    public function editSemestre(Request $request, $id){
        $semestre = Semestre::findOrFail($id);
            return view('dashboard.admin.editSemestre')->with('semestre',$semestre);
        }
    public function editFiliere(Request $request, $id){
        $filiere = Filiere::findOrFail($id);
            return view('dashboard.admin.editFiliere')->with('filiere',$filiere);
        }
            
    public function updateMatiere(Request $request, $id){
        
        $matiere = Matiere::find($id);
        $intituleFil = $request->file('intituleMat');
        $coefMat = $request->file('coefMat');
        
        $matiere->intituleMat = $request->input('intituleMat');
        $matiere->coefMat = $request->input('coefMat');
        $matiere->updated_at=now();
        $matiere->update();
        session()->flash('success', 'Matiere bien modifiée !');

        //  return "date est expirer";
    }

    public function updateSemestre(Request $request, $id){
    
        $semestre = Semestre::find($id);
        $intituleSem = $request->file('intituleSem');
        $dateDeb = $request->file('dateDeb');
        $dateFin = $request->file('dateFin');
        
        $semestre->intituleSem = $request->input('intituleSem');
        $semestre->dateDeb = $request->input('dateDeb');
        $semestre->dateFin = $request->input('dateFin');
        $semestre->updated_at=now();
        $semestre->update();
        session()->flash('success', 'Semestre bien modifiée !');
        //  return "date est expirer";

        
    return redirect()->back();
        // $article->update($request->all());
    // return redirect()->route('admin.home');
    }

    public function deleteMatiere(Request $request){


        $matiere = Matiere::findOrFail($request->get('id'));
     
        $matiere->delete($request->all());
        session()->flash('success', 'matiere bien suprimée !');
        //  return "date est expirer";
       
     return redirect()->back();
    }

    public function deleteSemestre(Request $request){


        $semestre = Semestre::findOrFail($request->get('id'));
     
        $semestre->delete($request->all());
        session()->flash('success', 'semestre bien suprimée !');
        //  return "date est expirer";
       
     return redirect()->back();
    }




    public function etudiantesPreins(){
        $etudiantesPreins = User::All();
        
    
       // $produit_Users = Produit_User::All();
        // $etudiantesPreins= array();
        // foreach($users as $user){
        //     $dateFinale =    Carbon::parse($produit->dateFin); 
        // $dateFinaleEnSeconds = $dateFinale->timestamp; 
        // $now = now()->timestamp; 
        // $distance= $dateFinaleEnSeconds-$now;
        //     if($distance < 0 &&  ($produit->statusExpire == null) &&  ($produit->status == 1)){
               
    
        //         $etudiantesPreins[]=$produit;
              
        //     }
        // }
        return view('dashboard.admin.etudiantesPreins',['etudiantesPreins'=>$etudiantesPreins]);
    
    }
    public function profsPreins(){
        $profsPreins = Prof::All();
       
        return view('dashboard.admin.profsPreins',['profsPreins'=>$profsPreins]);
    
    }
    

public function validationUser(Request $request,$id){
    $user = User::where('id',$id)->first();
    $idUser=$id;
    $dateCreation=$user->created_at;
    $idFilier=$user->filiere;
    //$vendeur = User::where('id',$idVendeur)->first();
    $matieres = Matiere::All();
    $notes = Note::All();
    $semestres = Semestre::All();
   // $user = User::findOrFail($id_u);
  // $user= User::findOrFail(Auth::guard('web')->user()->id);

    foreach($matieres as $matiere){
            if($matiere->idFil == $idFilier){
                foreach($semestres as $semestre){
                if($semestre->dateDeb <= $dateCreation and  $semestre->dateFin >= $dateCreation){
                   
                            $idSem=$semestre->id;
                         
                }}
                Note::create([
                    'idMat' => $matiere->id,
                    'coef' => $matiere->coefMat,
                    'idFil' => $idFilier,
                    'idEtu' => $id,
                    'idSem' => $idSem,
                ]);
            }
    }
   
    session()->flash('success', 'validation bien effectuée');
    //  return "date est expirer";
   
 return redirect()->back();

}

public function validationProf(Request $request,$id){
    
    //$vendeur = User::where('id',$idVendeur)->first();
    $notes = Note::All();
    $profsMats = profMat::All();
   // $user = User::findOrFail($id_u);
  // $user= User::findOrFail(Auth::guard('web')->user()->id);
    foreach($profsMats as $profsMat){
        if ($profsMat->idProf == $id){
            foreach($notes as $note){
        
                if($note->idMat == $profsMat->idMat){
                    $note->idProf=$profsMat->idProf;
                    $note->update();
                }


        }
        }
        
    }
        
    session()->flash('success', 'validation bien effectuée');
    //  return "date est expirer";
   
 return redirect()->back();

}

function classement()
{
    // Sélectionner distinctement les étudiants, les semestres et les filières
    $etudiants = DB::table('notes')->distinct('idEtu')->pluck('idEtu');
    $semestres = DB::table('notes')->distinct('idSem')->pluck('idSem');
    $filieres = DB::table('notes')->distinct('idFil')->pluck('idFil');

    // Parcourir chaque combinaison d'étudiant, semestre et filière
    foreach ($etudiants as $idEtu) {
        foreach ($semestres as $idSem) {
            foreach ($filieres as $idFil) {
                // Calculer la moyenne
                $moyenne = DB::table('notes')
                    ->where('idEtu', $idEtu)
                    ->where('idSem', $idSem)
                    ->where('idFil', $idFil)
                    ->avg(DB::raw('coef * note'));

                // Enregistrer la moyenne dans la table classement
                if($moyenne!=null){
                    DB::table('classement')->insert([
                    'idEtu' => $idEtu,
                    'idSem' => $idSem,
                    'idFil' => $idFil,
                    'moy' => $moyenne,
                ]);
                }               
            }
        }
    }
    $etudiantesPreins = User::All();
     return view('dashboard.admin.etudiantesPreins',['etudiantesPreins'=>$etudiantesPreins]);
}

}