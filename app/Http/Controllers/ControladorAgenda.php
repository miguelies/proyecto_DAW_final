<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Act_arch;
use App\Models\Actividades;
use App\Models\Archivos;
use App\Models\Grup_act;
use App\Models\Grupos;
use App\Models\User;
use App\Models\Usu_act;
use App\Models\Usu_gru;
use App\Models\Usu_arch;
use App\Http\Controllers\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ControladorAgenda extends Controller
{

    //Vistas de Inicio y de Perfil

    public function getIndex()
    {
 		return view('Agenda.inicio');
    }

    public function getPerfil()
    {
        $user = User::where('id',Auth::user()->id)->get();
 		return view('Agenda.perfil', array('Usuario'=>$user));
    }
    
    public function putPerfil(Request $request)
    {
        User::where('id',Auth::user()->id)->first()->update(
            ['name'=>$request->input('name')
            ,'email'=>$request->input('email')]);
        return redirect()->back();
    }

    //Tareas Individuales, mostrar y crear

    public function getTareas()
    {
        $cod_usu=Auth::user()->id;
        $tarea_usu=Usu_act::where('codigo_usuario',$cod_usu)->get();
        $tareas=array();
        for($i=0;$i<count($tarea_usu);$i++) {
            $tareas[$i]=Actividades::where('cod_actividad',$tarea_usu[$i]["cod_actividad"])->get();
        };
 		return view('Agenda.tareas', array('arrayTareas'=>$tareas));
    }

    public function getTareaEspecifica($cod)
    {
        $comprobar=Usu_act::where('cod_actividad',$cod)->where('codigo_usuario',Auth::user()->id)->get();
        $Archivos=Act_arch::where('cod_actividad',$cod)->get();
        $lista_arch=array();
        for($i=0;$i<count($Archivos);$i++)
        {
            $lista_arch[$i]=Archivos::where('cod_archivos',$Archivos[$i]['cod_archivos'])->get();
        }
        if(isset($comprobar[0])){
            $tareas=Actividades::where('cod_actividad',$cod)->get();
            $date_now = time(); //tiempo actual
            $date_convert = strtotime($tareas[0]['fecha_cierre']." ".$tareas[0]['hora_cierre']);
            if($date_now < $date_convert || $tareas[0]['fecha_cierre'] == NULL && $tareas[0]['hora_cierre'] == NULL) {
                $entregas=Act_arch::where('cod_actividad',$cod)->get();
                return view('Agenda.tareas_especi', array('Tarea'=>$tareas,'Entregas'=>$entregas,'estado'=>1,'Archivos'=>$lista_arch));
            }
            else
            {
                $entregas=Act_arch::where('cod_actividad',$cod)->get();
                return view('Agenda.tareas_especi', array('Tarea'=>$tareas,'Entregas'=>$entregas,'estado'=>0,'Archivos'=>$lista_arch));
            }
        } 
        else {
            return redirect()->back();
        }
    }

    public function postTareas_create(Request $request)
    {
        $Actividades=new Actividades();
		$Actividades->nombre_actividad=$request->input('nombre_actividad');
		$Actividades->descripcion_actividad=$request->input('descripcion_actividad');
        $Actividades->estado_actividades=0;
        $Actividades->fecha_cierre=$request->input('fecha_cierre');
        $Actividades->hora_cierre=$request->input('hora_cierre');
		$Actividades->save();

        $ultimo=Actividades::orderBy('cod_actividad', 'desc')->limit(1)->get();
        $cod_usu=Auth::user()->id;
        $ultimo_cod=$ultimo[0]["cod_actividad"];

        $Union=new Usu_act();
        $Union->codigo_usuario =$cod_usu;
		$Union->cod_actividad =$ultimo_cod;
        $Union->save();
		return redirect()->back();
    }

    
    public function postEntrega(Request $request) 
    {

        $Archi = $request->file('ruta_archivo');
        if($Archi) {
            $NomArchi = Str::slug($Archi->getClientOriginalName()) . '.' .$Archi->getClientOriginalExtension();
            $Archivos = new Archivos();
            $Archivos->ruta_archivo = $NomArchi;
            $Archi->storeAs('Archivos/'.Auth::user()->id,$NomArchi);
            $Archivos->save();
            
            $cod_usu=Auth::user()->id;
            $ultimo=Archivos::orderBy('cod_archivos', 'desc')->limit(1)->get();
            $ultimo_cod=$ultimo[0]["cod_archivos"];

            $Union=new Usu_arch();
            $Union->codigo_usuario =$cod_usu;
            $Union->cod_archivos =$ultimo_cod;
            $Union->save();

            $Asig=new Act_arch();
            $Asig->cod_actividad =$request->input('cod_acti');
            $Asig->cod_archivos =$ultimo_cod;
            $Asig->save();
        }
        return redirect()->back();
	}

    public function postBorradoTareaIndi(Request $request) 
    {
        $Acti=Actividades::where('cod_actividad', $request->input('cod_acti'));
        $Acti->delete();
        return redirect('tareas');
	}
    public function editarTareaIndi(Request $request) {
		Actividades::where('cod_actividad',$request->input('cod_acti'))->first()->update(
        ['nombre_actividad'=>$request->input('nombre_actividad')
        ,'descripcion_actividad'=>$request->input('descripcion_actividad')
        ,'estado_actividades'=>$request->input('estado')
        ,'fecha_cierre'=>$request->input('fecha_cierre')
        ,'hora_cierre'=>$request->input('hora_cierre')]);
		return redirect()->back();
	}
    //Mostrar archivos y subir propios

    public function getArchivos()
    {
        $Archivos=Usu_arch::where('codigo_usuario',Auth::user()->id)->get();
        $lista_arch=array();
        for($i=0;$i<count($Archivos);$i++)
        {
            $lista_arch[$i]=Archivos::where('cod_archivos',$Archivos[$i]['cod_archivos'])->get();
        }
 		return view('Agenda.archivos',array('Archivos'=>$lista_arch));
    }

    public function postArchivos_Create(Request $request) 
    {

        $Archi = $request->file('ruta_archivo');
        if($Archi) {
            $NomArchi = Str::slug($Archi->getClientOriginalName()) . '.' .$Archi->getClientOriginalExtension();
            $Archivos = new Archivos();
            $Archivos->ruta_archivo = $NomArchi;
            $Archi->storeAs('Archivos/'.Auth::user()->id,$NomArchi);
            $Archivos->save();
            
            $cod_usu=Auth::user()->id;
            $ultimo=Archivos::orderBy('cod_archivos', 'desc')->limit(1)->get();
            $ultimo_cod=$ultimo[0]["cod_archivos"];

            $Union=new Usu_arch();
            $Union->codigo_usuario =$cod_usu;
            $Union->cod_archivos =$ultimo_cod;
            $Union->save();
        }
        return redirect()->back();
	}

    function getDownload($file_name) {
        $desca = Archivos::where('cod_archivos', $file_name)->firstOrFail();
        $rutaArchi = storage_path("app/public/Archivos/".Auth::user()->id."/".$desca->ruta_archivo);
        return response()->download($rutaArchi);
    }
    //Grupos General, crear grupos

    public function getGrupos()
    {
        $cod_usu=Auth::user()->id;
        $grupos_num=Usu_gru::where('codigo_usuario',$cod_usu)->distinct()->get('codigo_grupos');
        $grupos=array();
        for($i=0;$i<count($grupos_num);$i++) {
            $grupos[$i]=Grupos::where('cod_grupo',$grupos_num[$i]["codigo_grupos"])->get();
        };
 		return view('Agenda.grupos',array('grupos'=>$grupos));
    }

    public function getGrupos_Create()
    {
 		return view('Agenda.grupos_create');
    }

    public function postGrupos_Create(Request $request) {
		$Grupos=new Grupos();
		$Grupos->nombre_grupo=$request->input('nombre_grupo');
		$Grupos->descripcion_grupo=$request->input('descripcion_grupo');
		$Grupos->save();

        $ultimo=Grupos::orderBy('cod_grupo', 'desc')->limit(1)->get();
        $cod_usu=Auth::user()->id;
        $ultimo_cod=$ultimo[0]["cod_grupo"];

        $Union=new Usu_gru();
        $Union->codigo_usuario =$cod_usu;
		$Union->codigo_grupos =$ultimo_cod;
        $Union->administrador=TRUE;
        $Union->save();
		return redirect()->back();
	}

    //Grupos Especificos, Salir del grupo, añadir al grupo, borrar grupo

    public function getGrupEspe($id)
    {
        $grupos=Grupos::where('cod_grupo',$id)->get();
        $status=Usu_gru::where('codigo_grupos',$id)->where('codigo_usuario',Auth::user()->id)->get();
        $Acti_Grup = Grup_act::where('cod_grupos',$id)->distinct()->get('cod_actividades');
        $Actividades=array();
        for($i=0;$i<count($Acti_Grup);$i++) {
            $Actividades[$i] = Actividades::where('cod_actividad',$Acti_Grup[$i]['cod_actividades'])->get();
        }
        return view('Agenda.grupos_espe', array('arrayGrupo'=>$grupos, 'id'=>$id, 'status'=>$status,'arrayTareas'=>$Actividades));
    }

    public function postSalir(Request $request) {
        $Union = Usu_gru::where('codigo_usuario',$request->input('codigo_usuario'))->where('codigo_grupos',$request->input('codigo_grupos'));
        $Union->delete();
        $Acti = Grup_act::where('codigo_usuario',$request->input('codigo_usuario'))->where('cod_grupos',$request->input('codigo_grupos'));
        $Acti->delete();
        return redirect("grupos");
    }
    public function postAdd(Request $request) {
        $comprobar = User::where('id',$request->input('codigo_usuario'))->get();
        $comprobar_set = Usu_gru::where('codigo_usuario',$request->input('codigo_usuario'))->get();
        if(isset($comprobar[0])) {
            if(isset($comprobar_set[0])){}
            else {
                $Union=new Usu_gru();
                $Union->codigo_usuario=$request->input('codigo_usuario');
                $Union->codigo_grupos=$request->input('codigo_grupos');
                $Union->administrador=$request->input('administrador');
                $Union->save();

                $Acti_nue=Grup_act::where('cod_grupos',$request->input('codigo_grupos'))->distinct()->get('cod_actividades');
                for($i=0;$i<count($Acti_nue);$i++) {
                    $Acti_usu=new Grup_Act();
                    $Acti_usu->cod_grupos=$request->input('codigo_grupos');
                    $Acti_usu->cod_actividades=$Acti_nue[$i]['cod_actividades'];
                    $Acti_usu->codigo_usuario=$request->input('codigo_usuario');
                    $Acti_usu->save();
                }
            }
        }
		return redirect()->back();
    }
    public function postRemove(Request $request) {
        $Acti_Grup = Grup_act::where('cod_grupos',$request->input('cod_grupo'))->distinct()->get('cod_actividades');
        for($i=0;$i<count($Acti_Grup);$i++) {
            $Acti = Actividades::where('cod_actividad',$Acti_Grup[$i]['cod_actividades']);
            $Acti->Delete();
        }
        $Grupo = Grupos::where('cod_grupo',$request->input('cod_grupo'));
        $Grupo->Delete();
        return redirect("grupos");
    }

    // Tareas para grupos
    public function postTareasGrupo_create(Request $request)
    {
        $Actividades=new Actividades();
		$Actividades->nombre_actividad=$request->input('nombre_actividad');
		$Actividades->descripcion_actividad=$request->input('descripcion_actividad');
        $Actividades->estado_actividades=0;
        $Actividades->fecha_cierre=$request->input('fecha_cierre');
        $Actividades->hora_cierre=$request->input('hora_cierre');
		$Actividades->save();

        $ultimo=Actividades::orderBy('cod_actividad', 'desc')->limit(1)->get();
        $cod_usu=Usu_gru::where('codigo_grupos',$request->input('cod_grupo'))->get('codigo_usuario');
        $ultimo_cod=$ultimo[0]["cod_actividad"];

        for($i=0;$i<count($cod_usu);$i++) {
            $Union=new Grup_act();
            $Union->cod_grupos =$request->input('cod_grupo');
            $Union->codigo_usuario =$cod_usu[$i]['codigo_usuario'];
            $Union->cod_actividades =$ultimo_cod;
            $Union->save();
        }
		return redirect()->back();
    }

    public function getTareaGrupoEspecifica($id,$cod)
    {
        $comprobar=Grup_act::where('cod_actividades',$cod)->where('cod_grupos',$id)->where('codigo_usuario',Auth::user()->id)->get();
        $Archivos=Act_arch::where('cod_actividad',$cod)->get();
        $lista_arch=array();
        for($i=0;$i<count($Archivos);$i++)
        {
            $lista_arch[$i]=Archivos::where('cod_archivos',$Archivos[$i]['cod_archivos'])->get();
        }
        if(isset($comprobar[0])){
            $tareas=Actividades::where('cod_actividad',$cod)->get();
            $date_now = time(); //tiempo actual
            $date_convert = strtotime($tareas[0]['fecha_cierre']." ".$tareas[0]['hora_cierre']);
            if($date_now < $date_convert || $tareas[0]['fecha_cierre'] == NULL && $tareas[0]['hora_cierre'] == NULL) {
                $entregas=Act_arch::where('cod_actividad',$cod)->get();
                $admin = Usu_gru::where('codigo_grupos',$id)->where('codigo_usuario',Auth::user()->id)->get();
                return view('Agenda.tareas_grupo_especi', array('Tarea'=>$tareas,'Entregas'=>$entregas,'estado'=>1,'Archivos'=>$lista_arch,'admin'=>$admin));
            }
            else
            {
                $entregas=Act_arch::where('cod_actividad',$cod)->get();
                $admin = Usu_gru::where('codigo_grupos',$id)->where('codigo_usuario',Auth::user()->id)->get();
                return view('Agenda.tareas_grupo_especi', array('Tarea'=>$tareas,'Entregas'=>$entregas,'estado'=>0,'Archivos'=>$lista_arch,'admin'=>$admin));
            }
        } 
        else {
            return redirect()->back();
        }
    }

    public function postEntregaGrupo(Request $request) 
    {

        $Archi = $request->file('ruta_archivo');
        if($Archi) {
            $Acti=Actividades::where('cod_actividad', $request->input('cod_acti'))->get();
            $NomArchi = Str::slug($Archi->getClientOriginalName()) . '.' .$Archi->getClientOriginalExtension();
            $Archivos = new Archivos();
            $Archivos->ruta_archivo = $NomArchi;
            $Archi->storeAs('Archivos/'.Auth::user()->id,$NomArchi);
            $Archi->storeAs('Actividad/'.$Acti[0]['cod_actividad'],$NomArchi);
            $Archivos->save();
            
            $cod_usu=Auth::user()->id;
            $ultimo=Archivos::orderBy('cod_archivos', 'desc')->limit(1)->get();
            $ultimo_cod=$ultimo[0]["cod_archivos"];

            $Union=new Usu_arch();
            $Union->codigo_usuario =$cod_usu;
            $Union->cod_archivos =$ultimo_cod;
            $Union->save();

            $Asig=new Act_arch();
            $Asig->cod_actividad =$request->input('cod_acti');
            $Asig->cod_archivos =$ultimo_cod;
            $Asig->save();
        }
        return redirect()->back();
	}
    
    function postDownloadGrupo(Request $request) {
        $desca = Archivos::where('cod_archivos', $request->input('file_name'))->firstOrFail();
        $rutaArchi = storage_path("app/public/Actividad/".$request->input('cod_acti')."/".$desca->ruta_archivo);
        return response()->download($rutaArchi);
    }

    public function postBorradoTareaGrupo(Request $request) 
    {
        $Acti=Actividades::where('cod_actividad', $request->input('cod_acti'));
        $Acti->delete();
        return redirect('grupos');
	}
    public function editarTareaGrupo(Request $request) {
		Actividades::where('cod_actividad',$request->input('cod_acti'))->first()->update(
        ['nombre_actividad'=>$request->input('nombre_actividad')
        ,'descripcion_actividad'=>$request->input('descripcion_actividad')
        ,'estado_actividades'=>$request->input('estado')
        ,'fecha_cierre'=>$request->input('fecha_cierre')
        ,'hora_cierre'=>$request->input('hora_cierre')]);
		return redirect()->back();
	}

}
