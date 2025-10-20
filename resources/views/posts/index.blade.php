@extends('layouts.dashboard')

@section('content')

    <main class="flex-grow-1 p-4">
       <div class="container">
                <h2>My Writings</h2>
            
                @if(isset($posts) && $posts->count())
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Date</th>
                                <th>İmage</th>
                                <th>Transactions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->created_at->format('d.m.Y H:i') }}</td>
                                <td>
                                    @if($post->getFirstMediaUrl('images'))
                                        <img src="{{ $post->getFirstMediaUrl('images') }}" alt="{{ $post->title }}" width="50">
                                    @else
                                        <span>No Image</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $posts->links() }}
                @else
                    <p>You don't have any posts yet.</p>
                @endif
        </div>        
    </main>    
@endsection