<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-start align-items-center">
                <h3 class="card-title mr-3">List of all users</h3>
                <div class="card-tools">
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
        
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User Name</th>
                            <th>User Phone</th>
                            <th>User Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <button class="btn btn-info" wire:click='updateUser({{$user->id}})'>Edit</button>
                                    <button class="btn btn-danger" wire:click='deleteUser()'>Delete</button>
                                </td>
                            </tr>
                        @endforeach
        
                    </tbody>
                </table>
            </div>
        
        </div>
    </div>
</div>
