<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function index()
    {
        return view('tickets.index', ['tickets' => Ticket::all()]);
    }

    public function show($id)
    {
        return view('tickets.show', ['ticket' => Ticket::findOrFail($id)]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);

        /*Ticket::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'estado' => 'Backlog',
        ]);*/

        return redirect()->route('tickets.index')->with('success', 'Ticket creado exitosamente');
    }

    public function update(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->update(['estado' => $request->estado]);

        return redirect()->route('tickets.index')->with('success', 'Estado del ticket actualizado');
    }
    public function create()
    {
        $tickets= DB::table('tickets')
        ->orderBy('titulo')
        ->get();
        return view ('tickets.new', ['tickets'=>$tickets]);
    }


    public function edit($id)
    {
        $ticket = Ticket::find($id);
        $tickets = DB::table('tickets')
            ->orderBy('titulo')
            ->get();
        return view('comuna.edit', ['comuna' => $comuna, 'municipios' => $municipios]);
    }
}
