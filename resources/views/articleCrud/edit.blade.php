@extends('master')

@section('title')
    Create Article
@endsection

@section('content')
  <br>
    <form action="/Article/{{ $article->id }}" method="POST">
      {{ method_field('PATCH') }}
      {{ csrf_field() }}
      

    <div class="form-group">
      <label for="title">Name: </label>
      <input type="text" class="form-control" id="idTitle" aria-describedby="emailHelp" placeholder="Enter Name" name="title" value="{{ $article->title }}">
    </div>
    <div class="form-group">
      <label for="Description">Lastname: </label>
      <input type="text" class="form-control" id="Description" aria-describedby="Description" placeholder="Enter Lastname" name="description" value="{{ $article->description }}">
    </div>
    <div class="form-group">
    <label>Gender:</label>
    <br>
    
      <div class="form-check-inline">
      <input class="form-check-input" type="radio" name="radioGender" id="radioOther" value="Male" @if($article->gender == 'Male') checked @endif >
      <label class="form-check-label" for="exampleRadios1">
        Male
      </label>
    </div>
    <div class="form-check-inline">
      <input class="form-check-input" type="radio" name="radioGender" id="radioOther" value="Female" @if($article->gender == 'Female') checked @endif>
      <label class="form-check-label" for="exampleRadios2">
        Female
      </label>
    </div>
    <div class="form-check-inline">
      <input class="form-check-input" type="radio" name="radioGender" id="radioOther" value="other" @if($article->gender == 'other') checked @endif>
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
    <input type="checkbox" class="form-check-input" name="ChkboxCivilStatus" value="True" @if($article->civilStatus == 'True') checked @endif>Confirm
  </label>
</div>
</div>

<div class="form-group">

  <label for="sel1">Select School:</label>
  <select class="form-control" name="schoolName">
    <option @if($article->school == "FEU") selected @endif>FEU</option>
    <option @if($article->school == "STI") selected @endif>STI</option>
    <option @if($article->school == "UST") selected @endif>UST</option>
    <option @if($article->school == "PUP") selected @endif>PUP</option>
  </select>
</div>
<br>
    <button type="submit" class="btn btn-primary">Update Article</button><a href="/" class="btn btn-success">Back</a>
    </form>
@endsection