<?php
/*
 * api-ned | pagination.blade.php
 * https://www.webdirect.ro/
 * Copyright 2023 Eugen Buiac
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 6/28/2023 3:13 PM
*/

?>

@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <a href="javascript:void(0)">&lsaquo;</a>
            </li>
        @else
            <li class="page-item">
                <a class=""
                   href="javascript:void(0)"
                   onclick="NSWD.WDPagination.go('{{ $paginator->previousPageUrl() }}')"
                   rel="prev"
                   aria-label="@lang('pagination.previous')">
                    <i class="fa fa-angle-double-left"></i> Inapoi</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">{{ $element }}</span>
                </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active" aria-current="page">
                            <a href="#">{{ $page }}</a>
                            <span class="sr-only"></span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link"
                               href="javascript:void(0)"
                               onclick="NSWD.WDPagination.go('{{ $url }}')"
                            >{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="javascript:void(0)" rel="next"
                   aria-label="@lang('pagination.next')"
                   onclick="NSWD.WDPagination.go('{{ $paginator->nextPageUrl() }}')">
                    Inainte <i class="fa fa-angle-double-right"></i></a>
            </li>
        @else
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <a href="javascript:void(0)">&rsaquo;</a>
            </li>
        @endif
    </ul>
@endif

