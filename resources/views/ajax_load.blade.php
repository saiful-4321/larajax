<option>select sub cat</option>

@foreach($sub_cat as $value)

 <option value="{{ $value->id }}">{{ $value->sub_cat_name }}</option>

@endforeach
