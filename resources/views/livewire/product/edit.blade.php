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
                                    class="form-control border-primary @error('editProduct.name')
                                is-invalid
                                @enderror"
                                    placeholder="Proudct Name..." wire:model.lazy='editProduct.name'>
                            </div>
                            <div class="form-group">
                                <label>Unit Price</label>
                                <input type="number"
                                    class="form-control @error('editProduct.unitPrice')
                                is-invalid
                                @enderror"
                                    placeholder="Unit Price..." wire:model.lazy='editProduct.unitPrice'>
                            </div>
                            <div class="form-group">
                                <label for="productQuantity">Quantity</label>
                                <input type="number"
                                    class="form-control @error('editProduct.Quantity')
                                is-invalid
                                @enderror"
                                    id="productQuantity" placeholder="Quantity..." wire:model='editProduct.Quantity'>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea
                                    class="form-control @error('editProduct.description')
                                is-invalid
                                @enderror"
                                    rows="3" placeholder="Enter Description..." wire:model='editProduct.description'></textarea>
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file"
                                        class="custom-file-input form-control @error('editImage')
                                is-invalid
                                @enderror"
                                        id="productImage" wire:model='editImage'>
                                    @error('editImage')
                                        <div class="text-danger ">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <label class="custom-file-label" for="productImage">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <style>
                        .loading-spinner {
                            display: inline-block;
                            position: relative;
                            width: 80px;
                            height: 80px;
                        }

                        .loading-spinner div {
                            box-sizing: border-box;
                            display: block;
                            position: absolute;
                            width: 64px;
                            height: 64px;
                            margin: 8px;
                            border: 8px solid #3498db;
                            border-radius: 50%;
                            animation: loading-spinner 1.2s linear infinite;
                            border-color: #3498db transparent transparent transparent;
                        }

                        .loading-spinner div:nth-child(1) {
                            animation-delay: -0.45s;
                        }

                        .loading-spinner div:nth-child(2) {
                            animation-delay: -0.3s;
                        }

                        .loading-spinner div:nth-child(3) {
                            animation-delay: -0.15s;
                        }

                        @keyframes loading-spinner {
                            0% {
                                transform: rotate(0deg);
                            }

                            100% {
                                transform: rotate(360deg);
                            }
                        }
                    </style>
                    <div class="col-lg-6">
                        <div class="card-body">
                            <label for="">Image :</label>
                            <div wire:loading wire:target="editImage" class="loading-spinner">
                                <div></div>
                                <div></div>
                                <div></div> 
                                <div></div>
                            </div>
                            @if (@isset($editImage))
                            
                                <img src="{{ $editImage->temporaryUrl() }}"
                                    style="height: 450px; width:450px ; border-radius : 20px ; border : solid 1px #007BFF">
                            @else
                                {{-- {{dd($editProduct['imagePath'])}} --}}
                                <img src="{{ asset($editProduct['imagePath']) }}"
                                    style="height: 450px; width:450px ; border-radius : 20px ; border : solid 1px #007BFF">
                            @endif
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
                                    wire:model='editProduct.categoryId'>
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
    <button type="submit" class="btn btn-primary" wire:click='updateProduct()'>Update Product</button>
</div>
