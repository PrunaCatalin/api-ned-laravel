
@foreach($nodes as $node)
    <li>
        @if($node->children->count() > 0)
            <span class="arrow"  data-target="#node-{{ $node->id }}"><i class="fa fa-angle-down"></i></span>
        @endif
        @if($node->children->count() === 0)
            <a href="{{ route("category.show" , ["slug" => $node->url_seo])  }}">{{ $node->name }}
                <span class="count">{{ $node->products_count }}</span>
            </a>
        @else
            <a href="#">{{ $node->name }}
                <span class="count">{{ $node->products_count }}</span>
            </a>
        @endif

        @if($node->children->count() > 0)
            <ul class="children" id="node-{{ $node->id }}">
                @include('fresciastore::shop.shop-category', ['nodes' => $node->children , "is_children" => true])
            </ul>
        @endif
    </li>
@endforeach
