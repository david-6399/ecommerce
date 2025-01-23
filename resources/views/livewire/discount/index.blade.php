<div>
    <div class="card">
        <div class="card-header d-flex justify-content-start align-items-center">
            <button class="btn btn-primary" wire:click='addNewCategory()'>Add new category</button>
            <div class="card-tools ml-3">
                <div class="input-group input-group-sm" >
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search"
                        wire:model.live='search'>

                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="max-height: 400px;">
            <table class="table text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($showToggle === true)
                        <tr>
                            <td>
                                <input type="text"
                                    class="form-control @error('name')
                                  is-invalid
                                @enderror"
                                    wire:model="name" placeholder="Category name...">
                                @error('name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                            <td>
                                <button class="btn btn-success" >New Category</button>
                                <button class="btn btn-danger" >Cancel</button>
                            </td>
                        </tr>
                    @endif
                   
                        <tr>
                            <td>id</td>
                            <td>name</td>
                            <td>
                                <button class="btn btn-info" >Edit</button>
                                <button class="btn btn-danger" >Delete</button>
                            </td>
                        </tr>
                    
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <script>
        window.addEventListener('updateCategoryName', event => {
            Swal.fire({
                title: "Input email address",
                input: "text",
                inputLabel: "Your email address",
                inputPlaceholder: "Enter your email address",
                inputValue: event.detail.category.name ,
                inputValidator: (value) =>{
                    if(!value){
                        return 'Add New Value please !'
                    }
                    @this.test(event.detail.category.id,value)
                }
            });
        })

        window.addEventListener('successName' , event =>{
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Name has updated successflly",
                showConfirmButton: false,
                heightAuto: false,
                timer: 1500
            });
        })

        window.addEventListener('delete', event =>{
            Swal.fire({
                title: "Do you want to save the changes?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Delete",
                denyButtonText: `Don't delete`
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    @this.confirmDeleteCategory(event.detail.category.id)
                } else if (result.isDenied) {
                    Swal.fire("Category are not deleted", "","info");
                }
            });
        })

        window.addEventListener('successDelete' , event =>{
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Category has Deleted successflly",
                showConfirmButton: false,
                heightAuto: false,
                timer: 1500
            });
        })
    </script>
</div>
