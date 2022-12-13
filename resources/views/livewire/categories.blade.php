<select class="rounded-xl xl:mt-0 lg:mt-0 md:mt-0 mt-2 md:w-auto w-auto" name="categories" id="categories">
    <option selected>Categories</option>
    @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
</select>