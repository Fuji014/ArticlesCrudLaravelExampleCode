@extends('master')

@section('title')
    Welcome
@endsection
@section('meta')
  <meta name="csrf-token" content="{{ csrf_token() }}">    
@endsection

@section('content')
    <br>
    <br>
    <a href="/Article/create" class="btn btn-success float-right">Create Article</a>
    <br>
    <br>
    @if(Session::has('createFlash'))
    <div class="alert alert-dismissible alert-success">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <p> {{ Session::get('createFlash') }}</p>
    </div>
    @elseif(Session::has('updateFlash'))
    <div class="alert alert-dismissible alert-success">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <p> {{ Session::get('updateFlash') }}</p>
    </div>
    @elseif(Session::has('deleteFlash'))
    <div class="alert alert-dismissible alert-success">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <p> {{ Session::get('deleteFlash') }}</p>
    </div>
    @endif 

    <table class="table table-hover" id="ArticleTbl">
     <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Name</th>
          <th scope="col">Lastname</th>
          <th scope="col">Gender</th>
          <th scope="col">Publish</th>
          <th scope="col">School</th>
          <th scope="col">Date</th>
          <th scope="col">Actions</th>
        </tr> 
      </thead>

    <tbody>
    @foreach($results as $results)
    <tr class="table-active">  
      <td>{{ $results->id }}</td>
      <td>{{ $results->title }}</td>
      <td>{{ $results->description }}</td>
      <td>{{ $results->gender }}</td>
      <td>{{ $results->civilStatus }}</td>
      <td>{{ $results->school }}</td>
      <td>{{ $results->created_at->format('d/m/y') }}</td>
      <td><a href="/Article/show/{{ $results->id }}" class="btn btn-success btn-sm">Show  </a> <a href="/Article/{{ $results->id }}/edit" class="btn btn-primary btn-sm">Update</a> <button type="button" class="btn btn-danger btn-sm delete" id="{{ $results->id }}">delete</button> <button type="button" class="btn btn-primary btn-sm edit" id="{{ $results->id }}" >Test Edit</button> </td>
    </tr> 
    @endforeach

    <!-- all modal below -->
    @include('includes.modals.ArticleDeleteModal')
    @include('includes.modals.ArticleUpdateModal')
    <!-- end of modals -->

    </tbody>
    </table>

    <script>
      $(document).ready(function(){

        // ajax global setup
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // global var below
        var article_id;
        // end of declaring global var

        // click events modal
        $('.delete').click(function(){
            article_id = $(this).attr('id');
            
           $('#confirmModal').modal('show');
        });

        $('.edit').click(function(){
          var id = $(this).attr('id');
          var gender;
          var status;
          $('#updateModal').modal('show');
          $.ajax({
            url:"/Article/"+id+"/tryEdit",  
            dataType:'json',
            success:function(html){
              // fill all values
              $('#idHidden').val(html.data.id);
              $('#nameId').val(html.data.title);
              $('#lastnameId').val(html.data.description);
              gender = html.data.gender;
              status = html.data.civilStatus  ;
              $('#schooldId').val(html.data.school);
              
              // gender option
              if(gender == 'Male'){
                $('#radioMaleId').attr('checked',true);
              }else if(gender == 'Female'){
                $('#radioFemaleId').attr('checked',true);
              }
              // status option
              if(status == 'True'){
                $('#statusId').attr('checked',true);
              }

            }
          })
        });
        // end of click events modal

        // click proc
        $('#ok_button').click(function(){
          $.ajax({
           url:"Article/"+article_id,
           beforeSend:function(){
            $('#ok_button').text('Deleting...');
           },
           success:function(data)
           {
            setTimeout(function(){
             $('#confirmModal').modal('hide');
             window.location.href = "/";
            }, 2000);
           }
          })
         });
         
         $('#article_update').click(function(){
          var id = $('#idHidden').val();
          var name = $('#nameId').val();
          var lastname = $('#lastnameId').val();
          var gender = $('.form-check-input').val();
          var status = $('#statusId').val();
          var school = $('#schooldId').val();
          var token = $('#tokenHiddenId').val();
          $('#updateModal').modal('hide');
          $.ajax({
            url:"/Article/"+id+"/tryUpdate",
            type:'POST',
            data: $('#updateArticleForm').serialize(),
            dataType:'json',
            success:function(data){
              console.log(data);
            }
          })
         });
         // end of click proc
      
        });
    </script>
@endsection
