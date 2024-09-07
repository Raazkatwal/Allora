<div class="main_content">
    <div class="sidebar">
        <div class="sidebar_content">
            <h1 class="sideheading"> Menu</h1>
            <div class="sidelinks">
                <a wire:click = productclick><i class="fa-solid fa-bag-shopping"></i> Products</a>
                <a wire:click = userclick><i class="fa-solid fa-user"></i> Users</a>
                <a wire:click = categoriesclick><i class="fa-solid fa-list"></i> Categories</a>
                <a href=""><i class="fa-solid fa-gear"></i> Site settings</a>
                <a href=""><i class="fa-solid fa-cart-shopping"></i> Orders</a>
            </div>
                <a href="" onclick="window.close();return false;" class="close_btn"><i class="fa-solid fa-arrow-right-from-bracket"></i> Exit</a>
        </div>
    </div>
<div class="orders_table">
    <h2 class="table_heading">
        <span>
            @if ($ProductSectionvisible)
            Products
            @elseif ($UsersSectionvisible)
            Users
            @elseif ($CategoriesSectionvisible)
            Categories
            @endif
        </span> 
        <div>
            <input wire:model.live.debounce.300ms = "search" type="text" placeholder="Search...." class="searchbar">
            @if (!$UsersSectionvisible)
                <button class="table-btn add-btn" wire:click="showAddModal">Add <i class="fa-solid fa-plus"></i></button>
            @endif
        </div>
    </h2>
    <div class="scrollabe-div">
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>{{$UsersSectionvisible ? 'username' : 'name'}}</th>
                    <th>{{$UsersSectionvisible ? 'Email' : 'description'}}</th>
                    @if ($ProductSectionvisible)
                    <th>category</th>
                    @elseif ($UsersSectionvisible)
                    <th>Usertype</th>
                    @endif
                    <th colspan={{!$UsersSectionvisible ? '3' : ''}}>Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($ProductSectionvisible)
                    @foreach ($products as $p)
                        <tr wire:key={{$p->id}}>
                            <td>{{ $p->id }}</td>
                            <td class="shrink-text">{{ $p->name }}</td>
                            <td class="shrink-text">{{ $p->description }}</td>
                            @if (!$CategoriesSectionvisible)
                            <td>{{$p->category->name}}</td>
                            @endif
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
                @elseif ($UsersSectionvisible)
                    @foreach ($users as $u)
                    <tr wire:key={{$u->id}}>
                        <td>{{ $u->id }}</td>
                        <td class="shrink-text">{{ $u->username }}</td>
                        <td class="shrink-text">{{ $u->email }}</td>
                        <td class="shrink-text">{{ $u->profile->usertype }}</td>
                        <td>
                            @if ($u->profile->usertype!='admin')
                            <button class="table-btn view-btn" wire:click="showConfirmModal({{ $u->id }})">make admin</button>
                            <button class="table-btn delete-btn" wire:click="showDeleteModal({{ $u->id }})">delete</button>
                            @else
                            <button class="table-btn" disabled style="cursor: not-allowed">already admin</button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                @else
                    @foreach ($categories as $c)
                        <tr wire:key={{$c->id}}>
                            <td>{{ $c->id }}</td>
                            <td class="shrink-text">{{ $c->name }}</td>
                            <td class="shrink-text">{{ $c->description }}</td>
                            <td>
                                <button class="table-btn view-btn" wire:click="viewCategory({{ $c->id }})">view</button>
                            </td>
                            <td>
                                <button class="table-btn edit-btn" wire:click="showCategoryEditModal({{ $c->id }})">edit</button>
                            </td>
                            <td>
                                <button class="table-btn delete-btn" wire:click="showDeleteModal({{ $c->id }})">delete</button>
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
            <h1 class="modal-head">
                @if ($isEditModalOpen)
                    Edit {{ $ProductSectionvisible ? 'Product' : 'Category' }}
                @else
                    Add {{ $ProductSectionvisible ? 'Product' : 'Category' }}
                @endif
            </h1>
            @php
                $action = $isEditModalOpen
                ? 'update' . ($ProductSectionvisible ? 'Product' : 'Category')
                : 'add' . ($ProductSectionvisible ? 'Product' : 'Category');
            @endphp
            <form wire:submit.prevent=" {{$action}} " class="modal-form" enctype="multipart/form-data">
                <div>
                    <label for="name">Name</label>
                    <input type="text" name="name" wire:model.defer="name" class="modal-form-input @error('name') input-error @enderror" autocomplete="off" wire:model="name">
                    <span class="input-error-msg">
                        @error('name') {{$message}} @enderror
                    </span>
                </div>
                @if ($ProductSectionvisible)
                <div>
                    <label for="category">Category</label>
                    <select name="category" wire:model="category_id">
                        <option value="">Select Category</option>
                        @foreach ($categories as $c)
                        <option value="{{ $c->id }}">{{$c->name}}</option>
                        @endforeach
                    </select>
                </div>
                @endif
                <div>
                    <label for="description">Description</label>
                    <textarea name="" id="modal-textarea" wire:model.defer="description" class="modal-form-input @error('description') input-error @enderror" wire:model="description"></textarea>
                    <span class="input-error-msg">
                        @error('description') {{$message}} @enderror
                    </span>
                </div>
                @if ($ProductSectionvisible)
                <div>
                    <label for="image">Image</label>
                    <input type="file" name="image" class="modal-form-input" accept="image/*" wire:model="image">
                    <span class="input-error-msg">
                        @error('image') {{$message}} @enderror
                    </span>
                </div>
                @endif
               
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
                @php
                    $action = '';
                    if ($UsersSectionvisible && $isConfirmModalOpen) {
                        $action = 'changeUser';
                    } elseif ($UsersSectionvisible) {
                        $action = 'deleteUser';
                    } elseif ($ProductSectionvisible) {
                        $action = 'deleteProduct';
                    } else {
                        $action = 'deleteCategory';
                    }
                @endphp
                <button class="table-btn {{$isDeleteModalOpen ? 'delete-btn' : 'view-btn'}}" wire:click=" {{$action}} ">
                    {{$isDeleteModalOpen ? 'Delete' : 'Confirm'}}
                </button>
                <button class="table-btn" wire:click="closeModal">Cancel</button>
            </div>
        </div>
    </div>
@endif

</div>
</div>