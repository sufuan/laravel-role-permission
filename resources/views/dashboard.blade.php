<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>

        <div class="py-12">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

            <a href="{{ route('store_default_post') }}" class="btn btn-primary mb-3" onclick="event.preventDefault(); document.getElementById('store-default-post-form').submit();">
                Apply for volunteer
            </a>

            <form id="store-default-post-form" action="{{ route('store_default_post') }}" method="POST" style="display: none;">
                @csrf
            </form>

            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->description }}</td>
                        <td>{{ $post->post_status }}</td>
                        <td>
                            <form action="{{ route('post.update_status', $post->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <select name="post_status" class="form-control" onchange="this.form.submit()">
                                    <option value="pending" {{ $post->post_status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="published" {{ $post->post_status == 'published' ? 'selected' : '' }}>Published</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-slot>
</x-app-layout>