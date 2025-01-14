<div class="card">
    <div class="modal fade" id="showModal" tabindex="-1">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card-header d-flex justify-content-start align-items-center">
        <div class="btn btn-info mr-3" wire:click="$set('pageStatus','addProduct')">Create New Product Here</div>
        <div class="card-tools mr-2">
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
        <div class="">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </div>
        <div class="">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th style="width: 3%">#</th>
                    <th style="width: 27%">Product Name</th>
                    <th style="width: 7%">Price </th>
                    <th style="width: 7%">QNT</th>
                    <th style="width: 56%">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr data-widget="expandable-table" aria-expanded="false">
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->unitPrice }}</td>
                        <td>{{ $product->Quantity }}</td>
                        <td>
                            <button class="btn btn-info" wire:click='goToEditPage({{ $product->id }})'>Edit</button>
                            <button type="button" class="btn btn-primary" wire:click='popUp()'>
                                Modal
                            </button>
                        </td>
                    </tr>
                    <tr class="expandable-body d-none">
                        <td colspan="5">
                            <div class="row">
                                <div class="col-lg-9">
                                    <p style="display: yes;">
                                        <img src="{{ asset('storage/' . $product->imagePath) }}" alt=""
                                            style="width: 200px">
                                    </p>
                                </div>
                                <div class="col-lg-3">
                                    {{-- <img src="{{ asset('storage/' . $product->imagePath) }}" class="img-fluid mb-2"
                                        alt="black sample" style="width:100px; height:100px;"> --}}
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>


<script>
    window.addEventListener("hello", event => {
        $("#showModal").modal("show")
    })
</script>
