<div>
    <h1>{{ $count }}</h1>
    
    <button wire:click="increment">+</button>
    
    <button wire:click="decrement">-</button>
    <h1>{{ $string }}</h1>
    <button id="test">open</button>
    <dialog id="modal">
        <h1>{{ $users->email }}</h1>
        <button id="close">close</button>
    </dialog>
</div>
<script>
    const open = document.querySelector('#test');
    const modal = document.querySelector('#modal');
    const close = document.querySelector('#close');
    open.addEventListener('click', ()=>{
        modal.showModal();
    })
    close.addEventListener('click', ()=>{
        modal.close();
    })
    
</script>