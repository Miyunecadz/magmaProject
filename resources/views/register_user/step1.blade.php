@extends('layouts.app')

@section('content')
  <div class="container">
 

  <form>
  <div class="form-group">
    <label for="exampleInputEmail1" class="bmd-label-floating">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1">
    <span class="bmd-help">We'll never share your email with anyone else.</span>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="bmd-label-floating">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleSelect1" class="bmd-label-floating">Example select</label>
    <select class="form-control" id="exampleSelect1">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleSelect2" class="bmd-label-floating">Example multiple select</label>
    <select multiple class="form-control" id="exampleSelect2">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleTextarea" class="bmd-label-floating">Example textarea</label>
    <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputFile" class="bmd-label-floating">File input</label>
    <input type="file" class="form-control-file" id="exampleInputFile">
    <small class="text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
  </div>
  <div class="radio">
    <label>
      <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
      Option one is this and that&mdash;be sure to include why it's great
    </label>
  </div>
  <div class="radio">
    <label>
      <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
      Option two can be something else and selecting it will deselect option one
    </label>
  </div>
  <div class="radio disabled">
    <label>
      <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3" disabled>
      Option three is disabled
    </label>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox"> Check me out
    </label>
  </div>
  <button class="btn btn-default">Cancel</button>
  <button type="submit" class="btn btn-primary btn-raised">Submit</button>
</form>


  </div>
@endsection
