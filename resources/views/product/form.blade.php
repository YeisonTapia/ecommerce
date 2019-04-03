<div class="form-group">
    <label>Nombre</label>
    {!!Form::text('name', null, ['class'=>'form-control'])!!}
</div>
<div class="form-group">
    <label>Descripción</label>
    {!!Form::text('description', null, ['class'=>'form-control'])!!}
</div>
<div class="form-group">
    <label>Precio</label>
    {!!Form::text('price', null, ['class'=>'form-control'])!!}
</div>
<div class="form-group">
    <label>Descripción</label>
     <select class="form-control" name="category_id">
        <option value="0">-- Categoría principal --</option>
        @foreach($categories as $cat)            
            @if(isset($product) && $cat->id === $product->category_id)
                <option selected value="{{$cat->id}}">{{$cat->name}}</option>
            @else
                <option value="{{$cat->id}}">{{$cat->name}}</option>
            @endif
        @endforeach
    </select>
</div>
<div class="form-group">
    {!!Form::file('image')!!}
</div>
<div class="form-group">
    {!!Form::submit('Guardar', ['class'=>'btn btn-sm btn-success'])!!}
</div>