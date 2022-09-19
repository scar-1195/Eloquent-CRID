<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;

class ProjectController extends Controller
{
    public function getAllProjects()
    {
        $projects = Project::all();
        return $projects;
    }

    public function getProjects($limits = 10)
    {
        $projects = Project::take($limits)->get();
        return $projects;
    }

    public function insertProject()
    {
        $project = new Project;
        $project->city_id = 1;
        $project->company_id = 1;
        $project->user_id = 1;
        $project->name = 'Proyecto de prueba 2';
        $project->is_active = 1;
        $project->save();

        return "Guardado";
    }

    //? Se utiliza request cuando algún formulario o una fuente que nos dirá cuáles serán los valores de los registros
    // public function insertProject(Request $request) {
    //     $project = new Project;
    //     $project->city_id = $request->cityId;
    //     $project->company_id = $request->companyId;
    //     $project->user_id = $request->userId;
    //     $project->name = $request->name;
    //     $project->execution_date = $request->executionDate;
    //     $project->is_active = $request->isActive;
    //     $project->save();
    // }

    public function updateProject()
    {
        $project = Project::find(2);
        $project->name = 'Proyecto de tecnología';
        $project->save();

        return "Actualizado";
    }

    //? Con esto podemos modificar campos con condiciones especificas
    // public function updateOneProject()
    // {
    //     Project::where('is_active', 1)
    //         ->where('city_id', 1)
    //         ->update(['name' => 'Modifique todo']);
    // }

    //? Con este metodo podemos eliminar un registro con su id
    // public function deleteProject()
    // {
    //     $project = Project::find(2);
    //     $project->delete();
    // }

    //? Con este metodo podemos eliminar varios registros con sus ids
    // public function deleteProject()
    // {
    //     Project::destroy(1);
    //     Project::destroy(1, 2, 3);
    //     Project::destroy([1, 2, 3]);
    // }

    public function deleteProject() {
        $project = Project::where('project_id', '>', 15)->delete();
        return "Registros eliminados";
    }
}
