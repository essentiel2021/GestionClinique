<div class="row p-4 pt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="card-title flex-grow-1"><i class="fa-solid fa-hospital fa-2x"></i> Cliniques</h3>
                <div class="card-tools d-flex align-items-center">
                    <a class="btn btn-link text-white mr-4 d-block" wire:click="toggleShowAddCliniqueForm()"><i class="fa-solid fa-hospital"></i> Nouvelle clinique</a>
                    <div class="input-group input-group-md" style="width: 250px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Recherche">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive p-0 table-striped">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                        <th style="width:50%;">Cliniques</th>
                        <th style="width:20%;"class="text-center">Ajouté</th>
                        <th style="width:30%;"class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($isAddClinique)
                            <tr>
                                <td colspan="2">
                                    <input type="text" wire:keydown.enter='addNewClinique' wire:model="newCliniqueName" class="form-control @error('newCliniqueName') is-invalid @enderror"/>
                                    @error('newCliniqueName')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-link" wire:click="addNewClinique()"> <i class="fa fa-check"></i> Valider</button>
                                    <button class="btn btn-link" wire:click="toggleShowAddCliniqueForm()"> <i class="far fa-trash-alt"></i> Annuler</button>
                                </td>
                            </tr>
                        @endif
                        @forelse($cliniques as $clinique)
                            <tr>
                                <td>{{ $clinique->libelle }}</td>
                                <td class="text-center">{{ optional($clinique->created_at)->diffForHumans() }}</td>
                                <td class="text-center">
                                <button class="btn btn-link" wire:click='editClinique({{$clinique->id}})'> <i class="far fa-edit"></i> </button>
                                <button class="btn btn-link"wire:click="confirmDelete('{{$clinique->libelle}}',{{$clinique->id}})"> <i class="far fa-trash-alt"></i> </button>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <div class="alert alert-danger">
                                        <h5><i class="icon fas fa-ban"></i> Information!</h5>
                                        Aucune donnée en Base.
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div class="float-right">
                    {{ $cliniques->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    window.addEventListener("showEditForm",function(e){
        Swal.fire({
        title: "Edition d'une clinique",
        input: 'text',
        inputValue: e.detail.clinique.libelle,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText:'Modifier <i class="fa fa-check"></i>',
        cancelButtonText:'Annuler <i class="fa fa-times"></i>',
        inputValidator: (value) => {
            if (!value) {
                return 'Champ obligatoire'
            }
            @this.updateClinique(e.detail.clinique.id,value)
        }
        })
    })

     window.addEventListener("showSuccessMessage", event=>{
        Swal.fire({
                position: 'top-end',
                icon: 'success',
                toast:true,
                title: event.detail.message || "Opération effectuée avec succès!",
                showConfirmButton: false,
                timer: 5000
                }
            )
    })
    window.addEventListener("showConfirmMessage", event=>{
        Swal.fire({
        title:event.detail.message.title,
        text: event.detail.message.text,
        icon:event.detail.message.type,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuer',
        cancelButtonText: 'Annuler',
        }).then((result) => {
        if (result.isConfirmed) {
            if(event.detail.message.data.succursale_id){
                @this.deleteSuccursale(event.detail.message.data.succursale_id)
            }
            if(event.detail.message.data.departement_id){
                @this.deleteDepartement(event.detail.message.data.departement_id)
            }
        }
        })
    })
</script>
