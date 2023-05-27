<x-master-layout>
    @section('title')
        Category Edit
    @endsection
    <h4>Category Edit</h4>

    <form action="{{ route('category.update', $category->id) }}" method="post">
        @method('put')
        @csrf

        <div class="mb-3">
            <label class="from-lable" for="title">Title</label>
            <x-input id="title" type="name" name="title" :value="$category->title" class="form-control" placeholder="Title"
                required />
        </div>
        <div class="mb-3">
            <label class="from-lable" for="description">Description</label>
            <x-textarea id="description" rows="7" type="number" name="description" :value="$category->description"
                class="form-control" placeholder="Description" required />
        </div>
        <button class="btn btn-primary">Update Category</button>
    </form>
</x-master-layout>
