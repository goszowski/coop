<ul class="dropdown-menu multi-level">
  @foreach($categories as $category)
    <li class="{{ count($category->children) ? 'dropdown-submenu' : null }}">
	    <a @if(!count($category->children)) href="{{ route('app.categories.show', $category->slug) }}" @endif class="ripple-dark" data-ajax="true">
	      	<span>{{ $category->name }}</span>
	    </a>

		@if(count($category->children))
			@include('partials.menus.dropdown', ['categories'=>$category->children])
		@endif

    </li>
  @endforeach
</ul>