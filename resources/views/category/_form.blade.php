<!-- Name Form Input -->
<div class="form-group @if ($errors->has('name')) has-error @endif">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
</div>

<!-- status Form Input -->
<div class="form-group @if ($errors->has('status')) has-error @endif">
    {!! Form::label('status', 'Active') !!}
    {!! Form::checkbox('status') !!}
    @if ($errors->has('status')) <p class="help-block">{{ $errors->first('status') }}</p> @endif
</div>
