<div>
    @if (count(Cart::getContent()))
        @foreach (Cart::getContent() as $item)
            {{$item->name}}
        @endforeach
    @else
        <span>No hay productos agregados:</span>
    @endif
</div>