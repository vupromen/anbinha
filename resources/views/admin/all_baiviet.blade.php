@extends('Admin')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Tất cả bài viết 
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
      <p>Tìm bài viết </p>
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
          <button class="btn btn-sm btn-default" type="button">Search</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
    <?php
                            $message = Session::get('message');
	                        if($message){
	                    	echo $message;
	                        	Session::put('message',null);
                            	}
	                            ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tiêu đề</th>
            <th>Nội dung</th>
            <th></th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_baiviet as $key => $baiviet) 
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td><a href="{{URL::to('/all-hinh/'.$baiviet->baiviet_id)}}">{{$baiviet->baiviet_name}}<a></td>
            <td>{{$baiviet->baiviet_noidung}}</td>
           
            <td><span class="text-ellipsis">
            </span></td>
            <td>
              <a href="{{URL::to('/edit-baiviet/'.$baiviet->baiviet_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                <a onclick="return confirm('Chắc chắn muốn xóa?')" href="{{URL::to('/delete-baiviet/'.$baiviet->baiviet_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
          {!!$all_baiviet->links()!!}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection