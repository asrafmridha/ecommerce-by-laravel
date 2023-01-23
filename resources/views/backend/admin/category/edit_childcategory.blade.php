@extends('backend.mastaring.master')
@section('category','active')

@section('content')
        <form action="{{ route('childcategory.update',$childcategory->id) }}" method="POST">
            @method('PUT')
                @csrf
                    <label for="subcategory_name">Category/SubCategory Name</label>
                    <select class="form-control" aria-label="Default select example" name="subcategory_id">

                        @foreach ($category as $category)
                            @php
                                
                                $subcategory = DB::table('sub_categories')->where('category_id', $category->id)->get();
                            
                            @endphp 
                                <option>{{ $category->category_name }}</option>
                        
                       
                            @foreach ($subcategory as $subcat)
                            <option value="{{ $subcat->id }}" @if ($subcat->id==$childcategory->subcategory_id)
                                selected
                            @endif>-----  {{ $subcat->sub_category_name }}  ------</option>

                            @endforeach
                        @endforeach

                    </select>    
                    <label for="sub_category_name">Enter ChildCategory Name</label>
                    <input type="text" name="child_category_name" class="form-control import" value="{{ $childcategory->childcategory_name }}">
                    @error('sub_category_name')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>  
                    @enderror 
                
            </div>

                        <div class="col-12 mt-1">
                            <button type="submit" class="btn btn-primary mr-1">{{ __('Update') }}</button>
                        </div>
        </form>
@endsection