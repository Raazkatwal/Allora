<div class="orders_table">
    <h2 class="table_heading">
        <span>Products</span> 
        <div>
            <input wire:model.live.debounce.300ms = "search" type="text" placeholder="Search...." class="searchbar">
            <button class="table-btn add-btn" wire:click="showAddModal">Add <i class="fa-solid fa-plus"></i></button>
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
                    <th colspan="3">Action</th>
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
                            <button class="table-btn view-btn" wire:click="viewProduct({{ $p->id }})">view</button>
                        </td>
                        <td>
                            <button class="table-btn edit-btn" wire:click="showEditModal({{ $p->id }})">edit</button>
                        </td>
                        <td>
                            <button class="table-btn delete-btn" wire:click="showDeleteModal({{ $p->id }})">delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @if ($isAddModalOpen || $isEditModalOpen)
    <div class="modal_wrapper">
        <div class="modal-content">
            <h1 class="modal-head">{{ $isEditModalOpen ? 'Edit Product' : 'Add Product' }}</h1>
            <form wire:submit.prevent="{{ $isEditModalOpen ? 'updateProduct' : 'addProduct' }}" class="modal-form">
                <div>
                    <label for="name">Name</label>
                    <input type="text" name="name" wire:model.defer="name" class="modal-form-input @error('name') input-error @enderror" autocomplete="off" wire:model="name">
                    <span class="input-error-msg">
                        @error('name') {{$message}} @enderror
                    </span>
                </div>
                <div>
                    <label for="description">Description</label>
                    <textarea name="" id="modal-textarea" wire:model.defer="description" class="modal-form-input @error('description') input-error @enderror" wire:model="description"></textarea>
                    <span class="input-error-msg">
                        @error('description') {{$message}} @enderror
                    </span>
                </div>
                <div>
                    <label for="image">Image</label>
                    <input type="file" name="image" class="modal-form-input">
                </div>
                <div class="flex-btns">
                    <button type="submit" class="table-btn {{ $isEditModalOpen ? 'edit-btn' : 'add-btn' }}">{{ $isEditModalOpen ? 'Update' : 'Add' }}</button>
                        <button type="button" wire:click="closeModal" class="table-btn close_btn">Cancel</button>
                </div>
            </form>
        </div>
    </div>
    @endif
    @if ($isDeleteModalOpen)
    <div class="modal_wrapper">
        <div class="modal-content">
            <h1 class="modal-head">Are you sure ?</h1>
            <p class="modal-text">Are you sure you want to delete this record ?</p>
            <div class="flex-btns">
                <button class="table-btn delete-btn" wire:click="deleteProduct">Delete</button>
                <button class="table-btn"  wire:click="closeModal">Cancel</button>
            </div>
        </div>
    </div>
    @endif
</div>

