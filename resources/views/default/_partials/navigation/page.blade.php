@if($hasChild)
<li {!! HTML::attributes($attributes) !!}>
    <a href="#" >
        {!! $icon !!}
        <span>{!! $title !!}</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>

    <ul class="treeview-menu">
        @foreach($pages as $page)
           {!! $page->render() !!}
        @endforeach
    </ul>
</li>
@else
<li {!! HTML::attributes($attributes) !!}>
    <a href="{{ $url }}">
        {!! $icon !!}
        <span>{!! $title !!}</span>
        {!! $badge !!}
    </a>
</li>
@endif