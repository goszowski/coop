<ul class="dropdown-menu multi-level">
  @foreach($categories as $category)
    <li class="{{ count($category->children) ? 'dropdown-submenu' : null }}">
	    <a href="{{ route('app.categories.show', $category->slug) }}" class="ripple-dark" data-ajax="true">
	      	<span>{{ $category->name }}</span>
	    </a>

		@if(count($category->children))
			@include('partials.menus.dropdown', ['categories'=>$category->children])
		@endif

    </li>
  @endforeach
</ul>