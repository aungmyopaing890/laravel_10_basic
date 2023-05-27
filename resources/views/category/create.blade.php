<x-master-layout>
    @section('title')
        Create Category
    @endsection
    <h4>Create Category</h4>

    <form action="{{ route('category.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="from-lable" for="title">Title</label>
            <x-input id="title" type="name" name="title" :value="old('title')" class="form-control" placeholder="Title"
                required />
        </div>
        <div class="mb-3">
            <label class="from-lable" for="description">Description</label>
            <x-textarea id="description" rows="7" type="number" name="description" :value="old('description')"
                class="form-control" placeholder="Description" required />
        </div>

        <button class="btn btn-primary">Save Category</button>
    </form>
</x-master-layout>
