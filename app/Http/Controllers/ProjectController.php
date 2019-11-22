<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;


class ProjectController extends Controller
{
    public function index() {
        $project = Project::all();
        $total = Project::all()->count();
        $user = User::all();
        $totalUser = User::all()->count();
        return view('list-project', compact('project', 'total'), compact('user','totalUser'));
    }
    public function sobre(){
        return view('sobre');
    }

     public function include(){
        return view('include-project');
    }

    public function create() {
        return view('include-project');
    }

    public function store(Request $request) {
        $project = new Project();
        $project->name = $request->name;
        $project->description = $request->description;
        $project->value = $request->value;
        $project->temp = $request->temp;
        $project->imagem = $request->imagem;
        $project->supporter = "";
        $project->id_User = 0;
        $project->finalizado = 0;
        $project->save();
        return redirect()->route('project-index')->with('message', 'Projeto criado com sucesso!');
    }

    public function show($id) {
        return 1;
    }

    public function edit($id) {
        $project = Produto::findOrFail($id);
        return view('alter-project', compact('project'));
    }

    public function update(Request $request, $id) {
        $project = Project::findOrFail($id); 
        $project->name = $request->name;
        $project->description = $request->description;
        $project->value = $request->value;
        $project->temp = $request->temp;
        $project->imagem = $request->imagem;
        $project->supporter = "";
        $project->save();
        return redirect()->route('project-index')->with('message', 'Projeto alterado com sucesso!');
    }

    public function support(Request $request, $id) {
        $project = Project::findOrFail($id);
        $project->name = $project->name;
        $project->description = $project->description;
        $project->temp = $project->temp;
        $project->imagem = $project->imagem; 
        $project->value += $request->value;
        $project->supporter = $project->supporter . ", " .$request->nameSupporter;
        $project->save();
        return redirect()->route('project-index')->with('message', 'Projeto alterado com sucesso!');
    }

    public function projectFinish($id) {
        $project = Project::findOrFail($id);
        $project->finalizado = 1;
        $project->save();
        return redirect()->route('project-index')->with('message', 'Projeto finalizado com sucesso!');
    }
    
    public function find(Request $request) {
        $projects = DB::table('project')->where('name', 'like', '%'.$request->pesquisa.'%');
        
        return redirect()->route('index-project')->with('message', 'Contribuição realizada com sucesso!');
    }

    public function destroy($id) {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect()->route('index-project')->with('message', 'Projeto excluído com sucesso!');
    }

}
