@extends('Admin')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm bài viết 
                        </header>
                      
                        <div class="panel-body">
                        <?php
                            $message = Session::get('message');
	                        if($message){
	                    	echo $message;
	                        	Session::put('message',null);
                            	}
	                            ?>
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-baiviet')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiêu đề bài viết</label>
                                    <input type="text" name="baiviet_name" class="form-control" id="exampleInputEmail1" placeholder="tên bài viết">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label>
                                    <img src="" alt="" height="10" width="10" id="image">
                                    <input type="file" multiple  name="baiviet_image[]" class="form-control" id="exampleInputEmail1" onchange="chooseFile(this)"
                                    accept="image/gif,image/jpg,image/png,image/jpeg">  
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung</label>
                                    <textarea style="resize:none" rows="8" name="baiviet_noidung" class="form-control" id="exampleInputPassword1" placeholder="Nội dung bài viết"> </textarea>
                                </div>
                                <button type="submit" name="add_baiviet " class="btn btn-info">Thêm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection