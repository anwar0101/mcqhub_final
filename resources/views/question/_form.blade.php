<!-- Question Form Input -->
<div class="form-group @if ($errors->has('question')) has-error @endif">
    {!! Form::label('question', 'Question') !!}
    {!! Form::text('question', null, ['class' => 'form-control', 'placeholder' => 'question']) !!}
    @if ($errors->has('question')) <p class="help-block">{{ $errors->first('question') }}</p> @endif
</div>

<div class="row">
  <div class="col-md-4 col-sm-4 col-md-offset-1">
    <!-- Option1 Form Input -->
    <div class="form-group @if ($errors->has('option1')) has-error @endif">
        {!! Form::label('option1', 'Option1') !!}
        {!! Form::text('option1', null, ['class' => 'form-control', 'placeholder' => 'Option1']) !!}
        @if ($errors->has('option1')) <p class="help-block">{{ $errors->first('option1') }}</p> @endif
    </div>
  </div>
  <div class="col-md-4 col-sm-4 col-md-offset-1">
    <!-- Option2 Form Input -->
    <div class="form-group @if ($errors->has('option2')) has-error @endif">
        {!! Form::label('option2', 'Option2') !!}
        {!! Form::text('option2', null, ['class' => 'form-control', 'placeholder' => 'Option2']) !!}
        @if ($errors->has('option2')) <p class="help-block">{{ $errors->first('option2') }}</p> @endif
    </div>
  </div>
</div>

<div class="row">
    <div class="col-md-4 col-sm-4 col-md-offset-1">
        <!-- Option3 Form Input -->
        <div class="form-group @if ($errors->has('option3')) has-error @endif">
            {!! Form::label('option3', 'Option3') !!}
            {!! Form::text('option3', null, ['class' => 'form-control', 'placeholder' => 'Option3']) !!}
            @if ($errors->has('option3')) <p class="help-block">{{ $errors->first('option3') }}</p> @endif
        </div>
    </div>
    <div class="col-md-4 col-sm-4 col-md-offset-1">
        <!-- Option4 Form Input -->
        <div class="form-group @if ($errors->has('option4')) has-error @endif">
            {!! Form::label('option4', 'Option4') !!}
            {!! Form::text('option4', null, ['class' => 'form-control', 'placeholder' => 'Option4']) !!}
            @if ($errors->has('option4')) <p class="help-block">{{ $errors->first('option4') }}</p> @endif
        </div>
    </div>
 </div>

<div class="row">
    <div class="col-md-4 col-sm-4 col-md-offset-1">
        <!-- answer Form Input -->
        <div class="form-group @if ($errors->has('answer')) has-error @endif">
            {!! Form::label('answer', 'Answer') !!}
            {!! Form::select('answer', array('option1','option2','option3','option4'),array('0','1','2','3'),  ['class' => 'form-control']) !!}
            @if ($errors->has('answer')) <p class="help-block">{{ $errors->first('answer') }}</p> @endif
        </div>
    </div>
    <div class="col-md-4 col-sm-4 col-md-offset-1">
        <!-- Categories Form Input -->
        <div class="form-group @if ($errors->has('subject_id')) has-error @endif">
            {!! Form::label('subject_id', 'Subject') !!}
            {!! Form::select('subject_id', $subject, isset($subject) ? $subject->pluck('id')->toArray() : null,  ['class' => 'form-control']) !!}
            @if ($errors->has('subject_id')) <p class="help-block">{{ $errors->first('subject_id') }}</p> @endif
        </div>
    </div>
 </div>
