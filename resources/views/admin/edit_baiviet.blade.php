@extends('Admin')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Sửa bài viết 
                        </header>
                        <?php
                            $message = Session::get('message');
	                        if($message){
	                    	echo $message;
	                        	Session::put('message',null);
                            	}
	                            ?>
                        <div class="panel-body">
                                @foreach($edit_baiviet as $key=> $edit)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-baiviet/'.$edit->baiviet_id)}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiêu đề bài viết</label>
                                    <input type="text" value="{{$edit->baiviet_name}}" name="baiviet_name" class="form-control" id="exampleInputEmail1" placeholder="tên bài viết">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung</label>
                                    <textarea style="resize:none"  rows="8" name="baiviet_noidung" class="form-control" id="exampleInputPassword1" >{{$edit->baiviet_noidung}} </textarea>
                                </div>
                                <button type="submit" name="update_baiviet " class="btn btn-info">Cập nhật</button>
                            </form>
                            </div>
                                @endforeach
                        </div>
                    </section>

            </div>
@endsection