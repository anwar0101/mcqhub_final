<!-- Name Form Input -->
<div class="form-group @if ($errors->has('name')) has-error @endif">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
</div>

<!-- Categories Form Input -->
<div class="form-group @if ($errors->has('category_id')) has-error @endif">
    {!! Form::label('category_id', 'Category') !!}
    {!! Form::select('category_id', $category, isset($category) ? $category->pluck('id')->toArray() : null,  ['class' => 'form-control']) !!}
    @if ($errors->has('category_id')) <p class="help-block">{{ $errors->first('category') }}</p> @endif
</div>
