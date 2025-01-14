<div class="card">
        <div class="card-header">
            <h3 class="card-title">Responsive Hover test Table</h3>
            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search"
                        wire:model.live="search">
                </div>
            </div>
        </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$posts->links()}}
        </div>
    </div>