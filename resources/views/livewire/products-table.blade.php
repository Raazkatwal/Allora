<div class="main_content">
    <div class="sidebar">
        <div class="sidebar_content">
            <h1 class="sideheading"> Menu</h1>
            <div class="sidelinks">
                <a wire:click = productclick><i class="fa-solid fa-bag-shopping"></i> Products</a>
                <a wire:click = userclick><i class="fa-solid fa-user"></i> Users</a>
                <a href=""><i class="fa-solid fa-gear"></i> Site settings</a>
                <a href=""><i class="fa-solid fa-cart-shopping"></i> Orders</a>
            </div>
                <a href="" onclick="window.close();return false;" class="close_btn"><i class="fa-solid fa-arrow-right-from-bracket"></i> Exit</a>
        </div>
    </div>
<div class="orders_table">
    <h2 class="table_heading">
        <span>
            {{$Usersectionvisible ? 'Users' : 'Products'}}
        </span> 
        <div>
            <input wire:model.live.debounce.300ms = "search" type="text" placeholder="Search...." class="searchbar">
            @if (!$Usersectionvisible)
                <button class="table-btn add-btn" wire:click="showAddModal">Add <i class="fa-solid fa-plus"></i></button>
            @endif
        </div>
    </h2>
    <div class="scrollabe-div">
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>{{$Usersectionvisible ? 'username' : 'name'}}</th>
                    <th>{{$Usersectionvisible ? 'Email' : 'description'}}</th>
                    @if (!$Usersectionvisible)
                    <th>category</th>
                    @else
                    <th>Usertype</th>
                    @endif
                    <th colspan={{!$Usersectionvisible ? '3' : ''}}>Action</th>
                </tr>
            </thead>
            <tbody>
                @if (!$Usersectionvisible)
                    @foreach ($products as $p)
                        <tr wire:key={{$p->id}}>
                            <td>{{ $p->id }}</td>
                            <td class="shrink-text">{{ $p->name }}</td>
                            <td class="shrink-text">{{ $p->description }}</td>
                            <td>Gaming</td>
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
                @else
                    @foreach ($users as $u)
                    <tr wire:key={{$u->id}}>
                        <td>{{ $u->id }}</td>
                        <td class="shrink-text">{{ $u->username }}</td>
                        <td class="shrink-text">{{ $u->email }}</td>
                        <td class="shrink-text">{{ $u->profile->usertype }}</td>
                        <td>
                            <button title="{{$u->id}}" class="table-btn view-btn" wire:click="showConfirmModal({{ $u->id }})">make admin</button>
                            <button class="table-btn delete-btn" wire:click="showDeleteModal({{ $u->id }})">delete</button>
                        </td>
                    </tr>
                    @endforeach
                @endif
                
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
    @if ($isDeleteModalOpen || $isConfirmModalOpen)
    <div class="modal_wrapper">
        <div class="modal-content">
            <h1 class="modal-head">Are you sure?</h1>
            <p class="modal-text">Are you sure you want to {{$isDeleteModalOpen ? 'delete this record?' : 'make this user an admin?'}}</p>
            <div class="flex-btns">
                <button class="table-btn {{$isDeleteModalOpen ? 'delete-btn' : 'view-btn'}}" 
                        wire:click="
                            @if ($Usersectionvisible && $isConfirmModalOpen)
                                changeUser
                            @elseif ($Usersectionvisible)
                                deleteUser
                            @else 
                                deleteProduct
                            @endif">
                    {{$isDeleteModalOpen ? 'Delete' : 'Confirm'}}
                </button>
                <button class="table-btn" wire:click="closeModal">Cancel</button>
            </div>
        </div>
    </div>
@endif

</div>
</div>
