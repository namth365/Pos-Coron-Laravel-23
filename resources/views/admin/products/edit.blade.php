@extends('layouts.admin')

@section('title')
Sửa sản phẩm
@endsection

@section('content')
<h1>Sửa sản phẩm {{$product->name}}</h1>
@if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <form method="post" action="{{route('products.update',[$product->id])}}" enctype='multipart/form-data'>
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Tên</label>
                    <input type="text" class="form-control" name="name" value="{{$product->name}}">
                    <span style="color:red;">@error("name"){{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                    <label>Tồn</label>
                    <input type="text" class="form-control" name="sold" value="{{ $product->sold}}"
                        placeholder="Tối đa 255 ký tự">
                    <span style="color:red;">@error("sold"){{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <label>Giá</label>
                    <input type="text" class="form-control" name="price" value="{{ $product->price }}"
                        placeholder="Tối đa 255 ký tự">
                    <span style="color:red;">@error("price"){{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Mô tả</label>
                    <input type="text" class="form-control" name="description" value="{{$product->description}}">
                    <span style="color:red;">@error("description"){{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Kích Hoạt Thể Loại</label>
                    <select name="status" class="custom-select">
                        @if($product->status==0)
                        <option selected value="0">Không Kích hoạt</option>
                        <option value="1">Kích hoạt</option>
                        @else
                        <option value="0">Không Kích hoạt</option>
                        <option selected value="1">Kích hoạt</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Hình Ảnh Sản Phẩm</label>

                    <input type="file" class="form-control" id="exampleInputEmail1" name="image"
                        value="{{$product->image}}"> <br>
                    <img src="{{ asset('/storage/app/public/images/' . $product->image) }}" alt="" style="width: 150px">
                    <span style="color:red;">@error("image"){{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Thể Loại Sản Phẩm</label>
                    <select name="category_id" class="form-select" id="inputGroupSelect02">
                        @foreach($category as $danhmuc)
                        <option {{$danhmuc->id==$product->category_id ?'selected' :''}} value="{{$danhmuc->id}}">
                            {{$danhmuc->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div> <button type="submit" class="btn btn-primary">Xác Nhận</button>
                    <a href="{{ route('products.index') }}" class="btn btn-danger">Hủy</a>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

</div>
</div>
</div>
@endsection