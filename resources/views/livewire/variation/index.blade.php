<div>
    <div class="modal fade" id="modalTest" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        @if ($variationToggle === true)
                            Add obtions to " {{ $variation['name'] }} "
                        @endif
                    </h5>
                </div>
                <div class="modal-body ">
                    <input type="text" class="form-control" placeholder="Add An Obtion Here"
                        wire:model='variationObtionName' >
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Obtions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($variationToggle === true && $variation->obtions())
                                @foreach ($variation->obtions as $obtion)
                                    <tr>
                                        <td>
                                            {{ $obtion->name }}
                                        </td>
                                    </tr>
                                @endforeach

                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click='addObtionName()'>Update</button>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header d-flex justify-content-start align-items-center">
            <button class="btn btn-primary" wire:click='addNewVariation()'>Add new category</button>
            <div class="card-tools ml-3">
                <div class="input-group input-group-sm">
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
                            <td >
                                <input type="text"
                                    class="form-control @error('name')
                                  is-invalid
                                @enderror"
                                    wire:model='name' placeholder="Category name...">
                                @error('name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                            <td>
                                <button class="btn btn-success" wire:click='newVariation()'>New Category</button>
                                <button class="btn btn-danger" wire:click='cancel()'>Cancel</button>
                            </td>
                        </tr>
                    @endif
                    @foreach ($variations as $variation)
                        <tr>
                            <td>{{ $variation->id }}</td>
                            <td>{{ $variation->name }}</td>
                            <td>
                                <button class="btn btn-info" wire:click='addObtion({{ $variation->id }})'>Add
                                    Obtion</button>
                                <button class="btn btn-danger"
                                    wire:click='deletevariation({{ $variation->id }})'>Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="px-3">
                {{$variations->links()}}
            </div>
        </div>
        <!-- /.card-body -->
    </div>

    <script>
        window.addEventListener('popUp', event => {
            // $('#modalTest').modal("show")
            $('#modalTest').modal('show')
        })
    </script>

</div>
