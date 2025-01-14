<div class="row m-1 btn btn-danger " wire:click="backToList()">
    Back To product List
    <i class="nav-icon fas fa-user-alt ml-2"></i>
</div>
<div class="row">

    <div class="col-lg-12 ">
        <form enctype="multipart/form-data">
            <div class="card card-primary ">
                <div class="card-header">
                    <h3 class="card-title">Create Product</h3>
                </div>
                <div class="row">

                    <div class="col-lg-6">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Product Name :</label>
                                <input type="text"
                                    class="form-control border-primary @error('newProduct.name')
                                is-invalid
                                @enderror"
                                    placeholder="Proudct Name..." wire:model.lazy='newProduct.name'>
                            </div>
                            <div class="form-group">
                                <label>Unit Price</label>
                                <input type="number"
                                    class="form-control @error('newProduct.unitPrice')
                                is-invalid
                                @enderror"
                                    placeholder="Unit Price..." wire:model.lazy='newProduct.unitPrice'>
                            </div>
                            <div class="form-group">
                                <label for="productQuantity">Quantity</label>
                                <input type="number"
                                    class="form-control @error('newProduct.Quantity')
                                is-invalid
                                @enderror"
                                    id="productQuantity" placeholder="Quantity..." wire:model='newProduct.Quantity'>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea
                                    class="form-control @error('newProduct.description')
                                is-invalid
                                @enderror"
                                    rows="3" placeholder="Enter Description..." wire:model='newProduct.description'></textarea>
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file"
                                        class="custom-file-input form-control @error('addImage')
                                is-invalid
                                @enderror"
                                        id="productImage" wire:model='addImage'>
                                    @error('addImage')
                                        <div class="text-danger ">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <label class="custom-file-label" for="productImage">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="card-body">
                            <div class="border" style="height: 500px; width:500px; border-radius:5px">
                                @if ($addImage)
                                    <img src="{{ $addImage->temporaryUrl() }}" style="height: 450px; width:450px ; border-radius : 20px ; border : solid 1px #007BFF">
                                @endif
                            </div>
                            <div wire:loading wire:target="photo">Uploading...</div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="col-lg-12 ">
        <div class="row">
            <div class="col-lg-6">
                <form>
                    <div class="card card-primary ">
                        <div class="card-header">
                            <h3 class="card-title">Update Categories</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Categories</label>
                                <input type="text"
                                    class="form-control @error('category.name')
                                    is-invalid
                                @enderror"
                                    wire:model.lazy='category.name' wire:keydown.enter='addNewCategory()'
                                    placeholder="Category Name ...">
                                <input type="text" class="form-control" wire:model.lazy='category.updateName'
                                    wire:keydown.enter='addNewCategory()' placeholder="Category Name ..." hidden>
                                <select class="custom-select form-control-border border-width-2"
                                    wire:model='newProduct.categoryId'>
                                    <option>--------------------------</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
        
                    </div>
                </form>
            </div>
            <div class="col-lg-6">
                <form>
                    <div class="card card-primary ">
                        <div class="card-header">
                            <h3 class="card-title">Add Variation</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Add Title ..."
                                    wire:model='variationName'>
                                <input type="text" class="form-control mt-2" placeholder="Add Value ..."
                                    wire:model='variationValue' wire:keydown.enter="fillVariationArray()">
                                @foreach ($arrayOfVariations as $index => $value)
                                    <a href="#" class="btn btn-info btn-L mt-2"
                                        wire:click.prevent='deleteFromArrayOfVariations({{ $index }})'>{{ $value }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <div class="col-lg-6">
         <form>
            <div class="card card-primary ">
                <div class="card-header">
                    <h3 class="card-title">Add Tages</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Add Title ...">
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>
<div class="row m-2">
    <button type="submit" class="btn btn-primary" wire:click.prevent='createProduct()'>Update Product</button>
</div>
