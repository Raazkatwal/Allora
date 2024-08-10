<div class="orders_table">
    <dialog class="delete_modal">
        <h1 class="modal-head">Are you sure ?</h1>
        <p class="modal-text">Are you sure you want to delete this record ?</p>
        <div class="flex-btns">
            <button class="table-btn delete-btn" id="modal-delete-btn">Delete</button>
            <button class="table-btn" id="close-btn">Cancel</button>
        </div>
    </dialog>
    <dialog class="edit_modal">
        <h1 class="modal-head">Edit</h1>
        <form action="" class="modal-form">
            <div>
                <label for="id">ID</label>
                <input type="text" name="id" id="id-input" class="modal-form-input" autocomplete="off" value="10" disabled>
            </div>
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" class="modal-form-input" autocomplete="off">
            </div>
            <div>
                <label for="description">Descrition</label>
                <textarea name="" id="modal-textarea" class="modal-form-input"></textarea>
            </div>
            <div>
                <label for="image">Image</label>
                <input type="file" name="image" class="modal-form-input">
            </div>
            <div class="flex-btns">
                <button class="table-btn edit-btn" id="modal-edit-btn">Edit</button>
                <button class="table-btn" id="close-btn">Cancel</button>
            </div>
        </form>
    </dialog>
    <h2 class="table_heading">
        <span>Products</span> 
        <div>
            <input wire:model.live.debounce.300ms = "search" type="text" placeholder="Search...." class="searchbar">
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
                            <button class="table-btn edit-btn" id="edit-btn" data-id="{{ $p->id }}">edit</button>
                        </td>
                        <td>
                            <button class="table-btn delete-btn" id="delete-btn" data-id="{{ $p->id }}">delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@push('scripts')
<script>
const delete_modal = document.querySelector(".delete_modal");
const edit_modal = document.querySelector(".edit_modal");
const table_delete_btn = document.querySelectorAll("#delete-btn");
const table_edit_btn = document.querySelectorAll("#edit-btn");
const modal_close_btn = document.querySelectorAll("#close-btn");
const modal_delete_btn = document.querySelector('#modal-delete-btn')
let productId = null;
table_delete_btn.forEach(e => {
  e.addEventListener('click', ()=>{
    productId = e.getAttribute('data-id');
    delete_modal.showModal();
  })
});
modal_close_btn.forEach(e => {
    e.addEventListener('click', ()=>{
        delete_modal.close();
        edit_modal.close();
    });
});
modal_delete_btn.addEventListener('click', () => {
  if (productId) {
        @this.delete(productId);
      modal.close();
  }
});
table_edit_btn.forEach(e => {
  e.addEventListener('click', ()=>{
    productId = e.getAttribute('data-id');
    edit_modal.showModal();
  })
});
// modal_edit_btn.addEventListener('click', () => {
//   if (productId) {
//         @this.delete(productId);
//       modal.close();
//   }
// });
</script>
@endpush