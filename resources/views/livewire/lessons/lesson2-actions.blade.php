<div>


    {{-- 
        Livewire Model Behavior:
        - wire:model.live
        - wire:model.change 
    --}}


    <form wire:submit='addTodo'>
        <input type="text" wire:model.live='todo'>
        <button type="submit" style="width:100px;background: purple;color:white;padding:10px;">ADD</button>

        <h4>Data Passed : {{ $todo }}</h4>
    </form>


    <ul>
        @foreach ($todos as $todo)
            <li>{{ $todo }}</li>
        @endforeach
    </ul>

</div>
