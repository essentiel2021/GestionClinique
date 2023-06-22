<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Clinique;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class Cliniques extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $isAddClinique = false;
    public $newCliniqueName = "";
    public $newValue = "";

    public function toggleShowAddCliniqueForm(){
        if($this->isAddClinique){
            $this->isAddClinique = false;
            $this->newCliniqueName = "";
            $this->resetErrorBag();
        }
        else{
            $this->isAddClinique = true;
        }
    }
    public function addNewClinique(){
        $validated = $this->validate([
            "newCliniqueName" => "required|max:50|unique:cliniques,libelle"
        ]);
        Clinique::create(["libelle"=> $validated["newCliniqueName"]]);

        $this->toggleShowAddCliniqueForm();
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Clinique ajoutée  avec succès!"]);
    }
    public function editClinique(Clinique $clinique){
        //renvoi lobjet clinique
        $this->dispatchBrowserEvent("showEditForm",["clinique"=>$clinique]);
    }

    public function updateClinique(Clinique $clinique,$valueFromJs){
        $this->newValue = $valueFromJs;
        $validated = $this->validate([
            "newValue" => ["required", "max:50", Rule::unique("cliniques", "libelle")->ignore($clinique->id)]
        ]);
        $clinique->update(["libelle" => $validated["newValue"]]);
        $this->dispatchBrowserEvent("showSuccessMessage",["message" => "Clinique mise à jour avec succès !"]);
    }

    public function confirmDelete($name,$id){
        $this->dispatchBrowserEvent("showConfirmMessage", ["message"=>[
            'text' => "Vous êtes sur le point de supprimer la clinique $name de la liste.Voulez vous continuer?",
            'title' =>"Êtes vous sûr de vouloir continuer?",
            'type' => "warning",
            'data' => ["clinique_id" => $id]
        ]]);
    }
    
    public function render()
    {
        $data=[
            "cliniques" => Clinique::latest()->paginate(5),
        ];
        return view('livewire.cliniques.index',$data)->extends("layouts.master")->section("contenu");
    }
}
