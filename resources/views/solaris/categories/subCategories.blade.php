@php
    $padding=$padding. "&nbsp;&nbsp;&nbsp;";
@endphp
@foreach($childs as $child)

    <option value="{{$child->id}}"
            @if(!empty($cData->data) && ($cData->data->parent_id == $child->id or $cData->data->category_id == $child->id)) selected @endif>{!!$padding!!}{{$child->title}}</option>
    @if(count($child->childs))
            @if(!empty($cData->data))
                @include('solaris.categories.subCategories',['childs' => $child->childs,'padding'=> $padding,'cData'=>$cData])
            @else
                @include('solaris.categories.subCategories',['childs' => $child->childs,'padding'=> $padding])
            @endif
    @endif

@endforeach


