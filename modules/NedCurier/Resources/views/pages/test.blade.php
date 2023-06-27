<?php
/*
 * api-ned | test.blade.php
 * https://www.webdirect.ro/
 * Copyright 2023 Eugen Buiac
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 6/27/2023 10:14 AM
*/
?>

{{--@foreach($nodes as $node)--}}
{{--    <li class="{{ (Request::segment(2) == $node->url_seo ? 'category-active' : '') }}">--}}
{{--        @if($node->children->count() > 0)--}}
{{--            <span class="arrow"  data-target="#node-{{ $node->id }}"><i class="fa fa-angle-down"></i></span>--}}
{{--        @endif--}}
{{--        @if($node->children->count() === 0)--}}
{{--            <a href="{{ route("category.show" , ["slug" => $node->url_seo])  }}">{{ $node->name }}--}}
{{--            </a>--}}
{{--        @else--}}
{{--            <a href="#">{{ $node->name }}--}}
{{--            </a>--}}
{{--        @endif--}}

{{--        @if($node->children->count() > 0)--}}
{{--            <ul class="children {{ (Request::segment(2) == $node->url_seo ? '' : 'collapse') }}"--}}
{{--                id="node-{{ $node->id }}">--}}
{{--                @include('fresciastore::shop.shop-category', ['nodes' => $node->children , "is_children" => true])--}}
{{--            </ul>--}}
{{--        @endif--}}
{{--    </li>--}}
{{--@endforeach--}}

