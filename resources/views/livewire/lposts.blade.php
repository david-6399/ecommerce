<div wire:poll>

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form wire:submit.live='create'>
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Name" wire:model='test.name'>
                    
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Price</label>
                    <input type="integer" class="form-control" id="exampleInputPassword1" placeholder="Price" wire:model='test.price'>
                </div>

                <div class="form-group">
                    <select wire:model='test.selectObtions'>
                        <option value="">name 1</option>
                        <option value="">name 2</option>
                        <option value="">name 3</option>
                        <option value="">name 4</option>
                    </select>
                </div>
                
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>


</div>
