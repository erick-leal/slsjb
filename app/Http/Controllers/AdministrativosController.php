<?php 

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Administrativo;
use App\Cargo;
use App\Http\Requests\AdministrativoRequest; 
use Illuminate\Support\Facades\Input;

class AdministrativosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $administrativos = Administrativo::search($request->nombre)->orderBy('apellido_paterno','ASC')->paginate(5);
        return view('administrativos.index')->with('administrativos',$administrativos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
    	$cargos = Cargo::orderBy('nombre','ASC')->pluck('nombre','id');
        return view('administrativos.create')->with('cargos',$cargos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdministrativoRequest $request)
    {
        //Manipulacion de Imagenes
        if ($request->file('foto'))
        {    
            $file = $request->file('foto');
            $name = 'liceosanjuanbautista_'. time(). '.' .$file->getClientOriginalExtension();
            $path = public_path(). '/imagenes/administrativos';
            $file->move($path, $name);
        }

        $administrativo = new Administrativo($request->all());
        $administrativo->save();
        flash('Administrativo ' .$administrativo->nombre.' agregado exitosamente!','success');
        return redirect()->route('administrativos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $administrativo = Administrativo::find($id);
        return view('administrativos.show')->with('administrativo',$administrativo); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) 
    {
    	$administrativo = Administrativo::find($id);
    	$administrativo->cargo;
    	$cargos	= Cargo::orderBy('id','ASC')->pluck('nombre','id');      
        return view('administrativos.edit')->with('administrativo', $administrativo)->with('cargos',$cargos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdministrativoRequest $request, $id)
    {
        $administrativo = Administrativo::find($id);
        $administrativo->fill($request->all());

        if(Input::hasFile('foto')){
            $file=Input::file('foto');
            $file->move(public_path().'/imagenes/administrativos',$file->getClientOriginalName());
            $administrativo->foto=$file->getClientOriginalName();
        }


        $administrativo->save();
        flash('Administrativo ' .$administrativo->nombre.' editado exitosamente!','warning');
        return redirect()->route('administrativos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $administrativo=Administrativo::findOrFail($id);
        $administrativo->delete();
        flash('Administrativo eliminado exitosamente!','danger');
        return redirect()->route('administrativos.index');
    }
}
