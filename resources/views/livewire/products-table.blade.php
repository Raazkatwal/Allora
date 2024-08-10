<div class="orders_table">
    <dialog class="delete_modal" style="z-index: 500;">
        <h1 class="modal-head">Are you sure ?</h1>
        <p class="modal-text">Are you sure you want to delete this record ?</p>
        <div class="flex-btns">
            <button class="table-btn delete-btn" id="modal-delete-btn">Delete</button>
            <button class="table-btn" id="close-btn">Cancel</button>
        </div>
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
                            <a href="{{ route('product.edit', $p->id)}}"><button class="table-btn edit-btn">edit</button></a>
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
document.addEventListener('livewire:initialized', ()=>{    
const modal = document.querySelector(".delete_modal");
const modal_btn = document.querySelectorAll("#delete-btn");
const modal_close_btn = document.querySelector("#close-btn");
const modal_delete_btn = document.querySelector('#modal-delete-btn')
let productId = null;
modal_btn.forEach(e => {
  e.addEventListener('click', ()=>{
    productId = e.getAttribute('data-id');
    modal.showModal();
  })
});
modal_close_btn.addEventListener('click', ()=>{
  modal.close();
})
modal_delete_btn.addEventListener('click', () => {
  if (productId) {
        @this.delete(productId);
      modal.close();
  }
});
});
</script>
@endpush