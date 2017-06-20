<!-- Question Form Input -->
<div class="form-group @if ($errors->has('question')) has-error @endif">
    {!! Form::label('question', 'Question') !!}
    {!! Form::text('question', null, ['class' => 'form-control', 'placeholder' => 'question']) !!}
    @if ($errors->has('question')) <p class="help-block">{{ $errors->first('question') }}</p> @endif
</div>

<!-- Categories Form Input -->
<div class="form-group @if ($errors->has('category_id')) has-error @endif">
    {!! Form::label('category_id', 'Category') !!}
    {!! Form::select('category_id', $categories, isset($categories) ? $categories->pluck('id')->toArray() : null,  ['class' => 'form-control']) !!}
    @if ($errors->has('category_id')) <p class="help-block">{{ $errors->first('category') }}</p> @endif
</div>
