@extends('Admin')
@section('admin_content')
    
@if(Session('message'))

<div class="alert alert-danger">
    <ul>
        
            <li>
              {{Session('message')}}
            </li>
       
    </ul>
</div>
@endif
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm Hình
                </header>


                 
                @if(count($errors)>0)
                   <div class="alert alert-danger">
                       <ul>
                           @foreach ($errors->all() as $err)
                               <li>
                                   {!!$err  !!}
                               </li>
                           @endforeach
                       </ul>
                    </div>
                @endif
                <div class="panel-body">
                 
                    <div class="position-center">
                        <form role="form"   method="POST" action="{{ URL::to('/save-img') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
         
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh</label>
                                <img src="" alt="" height="10" width="10" id="image">
                                <input type="file" multiple  name="baiviet_image[]" class="form-control" id="exampleInputEmail1" onchange="chooseFile(this)"
                                accept="image/gif,image/jpg,image/png,image/jpeg">  
                            </div>
                      
                        
                        <div class="form-group">
                            
                            <input type="hidden"  name="id" value={{ $id }} class="form-control form-control-lg" id="exampleInputEmail1">

                        </div>
                      
                     
                       <button type="submit" class="btn btn-info">Submit</button>
                 
                        </form>
                    </div>
        
                </div>
            </section>

    </div>
    
</div>   
<div class="table-agile-info">
    <div class="panel panel-default">
    <div class="panel-heading">
      Chi Tiết Nhà Sản Xuất
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
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="text-danger">
              STT
              </label>
            </th>
            <th ><a class="text-danger">Mã hình</a></th>
            <th><a class="text-danger">Tên hình</a></th>
            <th><a class="text-danger">Hình</a></th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        @php
        $i=1;
            
        @endphp
        @foreach($images as $key => $img)
        <tbody>
          <tr>
            <td><label class="i-checks m-b-none">{{ $i++ }}<i></i></label></td>
            <td>{{ $img->id }}</td>
            <td>{{ $img->hinh }}</td>
            <td> <img width="120px" height="120px" src="{{URL::to('public/upload/baiviet/'.$img->hinh)}}"/></td>
            <td>
            
              <a href="{{URL::to('/edit/')}}" class="active" ui-toggle-class=""><i class="fa fa-pencil text-info text-active"></i></a>
        
              <a onclick="return confirm('Bạn có muốn xóa không?')" href="{{URL::to('/delete-hinh/'.$img->id)}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
        
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
            {{-- {!!$all_brand->links()!!} --}}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
    
</div>
@endsection