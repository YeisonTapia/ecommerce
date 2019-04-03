<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Nombre</label>
            {!!Form::text('name', null, ['class'=>'form-control'])!!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Categoría Principal</label>
            <select class="form-control" name="parent_id">
                <option value="0">-- Categoría principal --</option>
                @foreach($categories as $cat)            
                    @if(isset($category) && $cat->id === $category->parent_id)
                        <option selected value="{{$cat->id}}">{{$cat->name}}</option>
                    @else
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <label>Descripción</label>
            {!!Form::textarea('description', null, ['class'=>'form-control'])!!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!!Form::file('image')!!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!!Form::submit('Guardar', ['class'=>'btn btn-sm btn-success'])!!}
        </div>
    </div>
</div>
