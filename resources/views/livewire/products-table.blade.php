<div class="orders_table">
    <h2 class="table_heading">
        <span>Products</span> 
        <div>
            <input wire:model.live = "search" type="text" placeholder="Search...." class="searchbar">
            <button class="table-btn add-btn">Add <i class="fa-solid fa-plus"></i></button>
        </div>
    </h2>
    <div class="scrollabe-div">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>name</th>
                    <th>id</th>
                    <th>description</th>
                    <th colspan="3">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $p)
                    <tr wire:key={{$p->id}}>
                        <td>{{ $loop->iteration }}</td>
                        <td class="shrink-text">{{ $p->name }}</td>
                        <td>{{ $p->id }}</td>
                        <td class="shrink-text">{{ $p->description }}</td>
                        <td>
                            <a href="{{ route('product.view', $p->id)}}"><button class="table-btn view-btn">view</button></a>
                        </td>
                        <td>
                            <a href="{{ route('product.edit', $p->id)}}"><button class="table-btn edit-btn">edit</button></a>
                        </td>
                        <td>
                            <a wire:click="delete({{$p->id}})"><button class="table-btn delete-btn">delete</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>