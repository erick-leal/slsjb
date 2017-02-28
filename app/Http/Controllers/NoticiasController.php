<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Noticia;
use App\Administrativo;
use App\Http\Requests\NoticiaRequest; 
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;


class NoticiasController extends Controller
{
    
    public function index(Request $request)
    {
        $noticias = Noticia::search($request->nombre)->orderBy('id','DSC')->paginate(5);
        return view('noticias.index')->with('noticias',$noticias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {	
        return view('noticias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoticiaRequest $request)
    {
        //Manipulacion de Imagenes
        if ($request->file('foto'))
        {    
            $file = $request->file('foto');
            $name = 'liceosanjuanbautista_'. time(). '.' .$file->getClientOriginalExtension();
            $path = public_path(). '/imagenes/noticias';
            $file->move($path, $name);
        }

        $noticia =  new Noticia($request->all());
        $noticia->id_administrativo = auth('administrativo')->user()->id;
        $noticia->fecha = Carbon::now();
        $noticia->save();
        flash('Noticia ' .$noticia->nombre.' agregado exitosamente!','success');
        return redirect()->route('noticias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $noticia = Noticia::find($id);
        $noticia->administrativo;
    	$administrativos = Administrativo::orderBy('nombre','ASC')->pluck('nombre','id');
        return view('noticias.edit')->with('noticia', $noticia);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NoticiaRequest $request, $id)
    {
        $noticia = Noticia::find($id);
        $noticia->fill($request->all());

        if(Input::hasFile('foto')){
            $file=Input::file('foto');
            $file->move(public_path().'/imagenes/noticias',$file->getClientOriginalName());
            $noticia->foto=$file->getClientOriginalName();
        }

        $noticia->save();
        flash('Noticia ' .$noticia->nombre.' editado exitosamente!','warning');
        return redirect()->route('noticias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $noticia=Noticia::findOrFail($id);
        $noticia->delete();
        flash('Noticia eliminado exitosamente!','danger');
        return redirect()->route('noticias.index');
    }
}
