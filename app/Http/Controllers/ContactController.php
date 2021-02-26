<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * El método index hace una llamada a la tabla contactos para obtener la información de los contactos creados por el usuario que esta loggeado en el sistema. y retorna la información a la vista index.
     */
    public function index(Request $request)
    {
            //Se crea una variable contacts con la información de la base de datos, se verifica que la información que se obtenga sea del usuario loggeado a través de su identificador.
            $contacts = Contact::where('user_id',auth()->id())->get();
            return view('contacts.index', compact('contacts'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * Método que retorna la vista con el formulario para la creación de un nuevo contacto.
     */
    public function create()
    {
        //Se retorna la vista
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     * El método store es el encargado de almacenar la información dentro de la base de datos
     */
    public function store(Request $request)
    {
        //Primero se validan los datos, se comprueba que los campos del formulario no estén vacíos.
        $this->validate($request,[
        'nombre' => 'required',
        'ape_pat' => 'required',
        'ape_mat' => 'required',
        'fecha_nacimiento' => 'required|Date'
        ]);

        //Una vez se compruebe que hay información viniendo del formulario se procese a guardarla.

        //se crea una nueva instancia del modelo Contact
        $contact = new Contact();
        //Se lee la información que se obtiene del request en cada uno de los inputs del formulario, por su nombre
        $contact->nombre = $request->input('nombre');
        $contact->ape_pat = $request->input('ape_pat');
        $contact->ape_mat = $request->input('ape_mat');
        $contact->fecha_nacimiento = $request->input('fecha_nacimiento');
        //se obtiene el id del usuario actualmente logeado asi, sabremos que usuario a creado el contacto.
        $contact->user_id = Auth::id();
        //Se guarda la información ya validada
        $contact->save();
        //Se redirecciona al usuario a la pagina principal de contactos.
        return redirect()->route('contacts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     * El método edit retorna la vista para la edición de la información  
     */
    public function edit($id)
    {
        //Se obtiene el registro del contacto que sera editada y se almacena en la variable contact
        $contact = Contact::whereId($id)->first();
        //Se retorna una vista con el registro del contacto
        return view('contacts.edit',compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     * El método update se encarga de actualizar los datos del contacto dentro de la base de datos.
     */
    public function update(Request $request, $id)
    {
        //Primero se validan los datos, se comprueba que los campos del formulario no estén vacíos.
         $this->validate($request,[
        'nombre' => 'required',
        'ape_pat' => 'required',
        'ape_mat' => 'required',
        'fecha_nacimiento' => 'required|Date'
        ]);


        //Una vez se compruebe que hay información viniendo del formulario se procese a guardarla.

        //se crea una nueva instancia del modelo Contact
        $contact = Contact::find($id);
        //Se lee la información que se obtiene del request en cada uno de los inputs del formulario, por su nombre
        $contact->nombre = $request->input('nombre');
        $contact->ape_pat = $request->input('ape_pat');
        $contact->ape_mat = $request->input('ape_mat');
        $contact->fecha_nacimiento = $request->input('fecha_nacimiento');
        //Se guarda la información ya validada
        $contact->save();
        //Se redirecciona al usuario a la pagina principal de contactos.
        return redirect()->route('contacts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Se encuentra el registro a eliminar
        $contact = Contact::findOrFail($id);
        //se llama al metodo delete
        $contact->delete();

        //se redirecciona a la pagina principal
        return redirect()->route('contacts.index');
    }
}
