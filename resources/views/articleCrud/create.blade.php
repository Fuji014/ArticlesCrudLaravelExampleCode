@extends('master')

@section('title')
    Create Article
@endsection

@section('content')
<br>
    <form action="/" method="post">
      {{ csrf_field() }}
    <div class="form-group">
      <label for="title">Name: </label> 
      <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="idTitle" aria-describedby="emailHelp" placeholder="Enter Name" name="title">
    </div> 

    <div class="form-group">
      <label for="Description">Lastname: </label>
      <input type="text" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="Description" aria-describedby="Description" placeholder="Enter Lastname" name="description">
    </div>

    <div class="form-group">
    <label>Gender:</label>
    <br>
    <div class="form-check-inline">
      <input class="form-check-input" type="radio" name="radioGender" id="radioOther" value="Male" checked>
      <label class="form-check-label" for="exampleRadios1">
        Male
      </label>
    </div>
    <div class="form-check-inline">
      <input class="form-check-input" type="radio" name="radioGender" id="radioOther" value="Female">
      <label class="form-check-label" for="exampleRadios2">
        Female
      </label>
    </div>
    <div class="form-check-inline">
      <input class="form-check-input" type="radio" name="radioGender" id="radioOther" value="other">
      <label class="form-check-label" for="exampleRadios2">
        Other
      </label>
    </div>
  </div>

  <div class="form-group">
    <label>Status:</label>
    <br>
  <div class="form-check-inline">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" name="ChkboxCivilStatus" value="True" checked>Confirm
  </label>
</div>
</div>
<div class="form-group">
  <label for="sel1">Select School:</label>
  <select class="form-control" name="schoolName">
    <option>FEU</option>
    <option>STI</option>
    <option>UST</option>
    <option>PUP</option>
  </select>
</div>
<br>
    <button type="submit" class="btn btn-primary">Submit</button><a href="/" class="btn btn-success">Back</a>
    @if($errors->any)
      <div class="notification bg-danger">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    </form>
@endsection