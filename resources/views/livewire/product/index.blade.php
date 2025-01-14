<div>
    @if($pageStatus === null)
        @include('livewire.product.list')
    @elseif ($pageStatus === 'addProduct')
        @include('livewire.product.add')
    @elseif($pageStatus === 'changeToEditProduct')
        @include('livewire.product.edit')
    @endif
    {{-- {{names('david')}} --}}
</div>

