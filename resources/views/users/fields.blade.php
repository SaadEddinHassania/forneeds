<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    {!! Form::number('id', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Mobile Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mobile', 'Mobile:') !!}
    {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
</div>

<!-- Avatar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('avatar', 'Avatar:') !!}
    {!! Form::text('avatar', null, ['class' => 'form-control']) !!}
</div>

<!-- Dob Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dob', 'Dob:') !!}
    {!! Form::date('dob', null, ['class' => 'form-control']) !!}
</div>

<!-- Location Meta Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('location_meta_id', 'Location Meta Id:') !!}
    {!! Form::number('location_meta_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Facebook Token Field -->
<div class="form-group col-sm-6">
    {!! Form::label('facebook_token', 'Facebook Token:') !!}
    {!! Form::text('facebook_token', null, ['class' => 'form-control']) !!}
</div>

<!-- Facebook Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('facebook_id', 'Facebook Id:') !!}
    {!! Form::text('facebook_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Google Token Field -->
<div class="form-group col-sm-6">
    {!! Form::label('google_token', 'Google Token:') !!}
    {!! Form::text('google_token', null, ['class' => 'form-control']) !!}
</div>

<!-- Google Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('google_id', 'Google Id:') !!}
    {!! Form::text('google_id', null, ['class' => 'form-control']) !!}
</div>

<!-- National Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('national_id', 'National Id:') !!}
    {!! Form::text('national_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Verified Field -->
<div class="form-group col-sm-6">
    {!! Form::label('verified', 'Verified:') !!}
    {!! Form::text('verified', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Sp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_sp', 'Is Sp:') !!}
    {!! Form::text('is_sp', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Ready Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_ready', 'Is Ready:') !!}
    {!! Form::text('is_ready', null, ['class' => 'form-control']) !!}
</div>

<!-- Token Field -->
<div class="form-group col-sm-6">
    {!! Form::label('token', 'Token:') !!}
    {!! Form::text('token', null, ['class' => 'form-control']) !!}
</div>

<!-- Api Token Field -->
<div class="form-group col-sm-6">
    {!! Form::label('api_token', 'Api Token:') !!}
    {!! Form::text('api_token', null, ['class' => 'form-control']) !!}
</div>

<!-- Remember Token Field -->
<div class="form-group col-sm-6">
    {!! Form::label('remember_token', 'Remember Token:') !!}
    {!! Form::text('remember_token', null, ['class' => 'form-control']) !!}
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:') !!}
    {!! Form::date('created_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    {!! Form::date('updated_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div class="form-actions">
        <div class="row  col-md-offset-0">
            {!! Form::submit('Save', ['class' => 'btn green']) !!}
            <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</div>
