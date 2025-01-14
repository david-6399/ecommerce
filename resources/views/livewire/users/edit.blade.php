<div class="row m-1 btn btn-danger ">
    Back To Users List 
    <i class="nav-icon fas fa-user-alt ml-2"></i>    
</div>
<div class="row">
    <div class="col-lg-6 ">
        <div class="card card-primary ">
            <div class="card-header">
                <h3 class="card-title">User Profile</h3>
            </div>

            <form wire:submit='updateUserInfo'>
                <div class="card-body">
                    <div class="form-group">
                        <label for="userName">User Name :</label>
                        <input type="text" class="form-control" id="userName" wire:model='editUser.name'>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Phone Number :</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Phone Number" wire:model='editUser.phone'>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">User Email :</label>
                        <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Email" disabled wire:model='editUser.email'>
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Update Password</h3>
            </div>

            <form>
                <div class="card-body">
                    <label for="exampleInputBorder"><code>Enter Your Password</code></label>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Password">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-danger">Update</button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-lg-6 ">
        <div class="card card-secondary ">
            <div class="card-header">
                <h3 class="card-title">Add address</h3>
            </div>

            <form wire:submit='updateAddress()'>
                <div class="card-body">
                    <div class="form-group">
                        <label for="wilaya">Wilaya :</label>
                        <input type="text" class="form-control"  placeholder="Wilaya"
                            wire:model='editUser.Wilaya'>
                    </div>
                    <div class="form-group">
                        <label for="address1">Address 1 :</label>
                        <input type="text" class="form-control"  placeholder="Address 1"
                            wire:model='editUser.address1'>
                        <a class="btn btn-link" wire:click='addNewAddress'>Add Address +++</a>
                    </div>
                    @if ($addAddress  || $secondAddressActive )
                        <div class="form-group">
                            <label for="address2">Address 2 :</label>
                            <input type="text" class="form-control" 
                                placeholder="Address 2" wire:model='editUser.address2'>
                        </div>
                    @endif
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-secondary">Submit</button>
                </div>
            </form>
        </div>
        <div class="card card-info ">
            <div class="card-header">
                <h3 class="card-title">Add Payment Method</h3>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio"
                            wire:click='test'>
                        <label for="customRadio1" class="custom-control-label">COD</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio">
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
