@extends('layouts.admin')
@section('content')
<form action="categories/new" method="POST" >


   @csrf
<div class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">New Category</h5>
              </div>
              <div class="card-body">
                <form>
                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>title</label>
                        <input type="text" name="title" class="form-control" placeholder="title" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label>Description</label>
                        <textarea rows="4" cols="80" class="form-control" name="description" placeholder="Here can be your description" value="Mike"> Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.
                        </textarea>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-fill btn-primary">Save</button>
              </div>
            </div>
          </div>
    </div>
</div>
</form>



{{-- tables --}}
<div class="content">
    <div class="row">

      <div class="col-md-12">
        <div class="card  card-plain">
          <div class="card-header">
            <h4 class="card-title">Categories</h4>
            <p class="category"> all categories for users</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table tablesorter " id="">
                <thead class=" text-primary">
                  <tr>
                    <th>
                      Title
                    </th>
                    <th>
                      Description
                    </th>
                    <th>
                      Image
                    </th>
                    <th class="text-center">
                      Icon
                    </th>
                    <th class="text-center">
                        Created at
                      </th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>
                          {{$category->title}}
                        </td>
                        <td>
                         {{$category->description}}
                        </td>
                        <td>
                         {{$category->image}}
                        </td>
                        <td class="text-center">
                          {{$category->icon}}
                        </td>
                        <td class="text-center">
                            {{$category->created_at}}
                          </td>
                      </tr>
                    @endforeach

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
{{-- cierro tables --}}

@endsection
