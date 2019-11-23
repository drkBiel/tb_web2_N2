<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;
use Illuminate\Support\Facades\DB;


class ProjectController extends Controller
{
    public function index() {
        $project = Project::all();
        $total = Project::all()->count();
        return view('list-project', compact('project', 'total'));
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
        $project->imagem_1 = "";

        $project->imagem_2 = "";
        
        $project->supporter = "";
        $project->id_User = $request->idUser;
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
        $project->imagem_1 = "";
        $project->imagem_2 = "";
        $project->supporter = "";
        $project->save();
        return redirect()->route('project-index')->with('message', 'Projeto alterado com sucesso!');
    }

    public function support(Request $request, $id) {
        $project = Project::findOrFail($id);
        $project->name = $project->name;
        $project->description = $project->description;
        $project->temp = $project->temp;
        $project->imagem_1 = "";
        $project->imagem_2 = "";
        $project->value += $request->value;
        $project->supporter = $project->supporter . ", " .$request->nameSupporter;
        $project->save();
        return redirect()->route('project-index')->with('message', 'Projeto alterado com sucesso!');
    }

    public function projectFinish($id) {
        $project = Project::findOrFail($id);
        $project->finalizado = 1;
        $project->save();
        return redirect()->route('project-index')->with('message', 'Contribuição finalizado com sucesso!');
    }
    
    public function filter(Request $request) {
        $project = DB::table('project')->where('name','Like','%' . $request->pesquisa . '%' )->get();
        $total = count($project);

        return view('list-project', compact('project', 'total'));

    }

    public function destroy($id) {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect()->route('project-index')->with('message', 'Projeto excluído com sucesso!');
    }

    public function filterMyProjects(Request $request) {
        $project = Project::all();
        $total = Project::all()->count();
        return view('myProjects', compact('project', 'total'));

    }

}
