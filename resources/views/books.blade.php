<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My SQLite Library</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">

    <div class="max-w-4xl mx-auto bg-white p-8 rounded shadow">
        <h1 class="text-2xl font-bold mb-5">Library App</h1>

        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" class="bg-gray-50 p-4 rounded mb-8">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                <div>
                    <label class="block text-sm font-medium">Title</label>
                    <input type="text" name="title" class="w-full border p-2 rounded" placeholder="The Great Gatsby" required>
                </div>
                <div>
                    <label class="block text-sm font-medium">Author</label>
                    <input type="text" name="author" class="w-full border p-2 rounded" placeholder="F. Scott Fitzgerald" required>
                </div>
                <div>
                    <label class="block text-sm font-medium">Cover Photo</label>
                    <input type="file" name="photo" class="w-full text-sm">
                </div>
                <button type="submit" class="bg-blue-600 text-white p-2 rounded hover:bg-blue-700">Add Book</button>
            </div>
        </form>

        <hr class="mb-10">

        <h2 class="text-xl font-semibold mb-3">Book List</h2>
        <table class="w-full border-collapse bg-white">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="border p-2 text-left">Photo</th>
                    <th class="border p-2 text-left">Title</th>
                    <th class="border p-2 text-left">Author</th>
                    <th class="border p-2 text-left">Status</th>
                    <th class="border p-2 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                <tr class="hover:bg-gray-50">
                    <td class="border p-2 text-center">
                        @if($book->photo)
                            <img src="{{ asset('storage/' . $book->photo) }}" alt="cover" class="h-16 w-12 object-cover mx-auto rounded shadow-sm">
                        @else
                            <span class="text-xs text-gray-400">No Image</span>
                        @endif
                    </td>
                    <td class="border p-2 font-medium">{{ $book->title }}</td>
                    <td class="border p-2">{{ $book->author }}</td>
                    <td class="border p-2">
                        <span class="px-2 py-1 rounded text-xs {{ $book->is_borrowed ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700' }}">
                            {{ $book->is_borrowed ? 'Borrowed' : 'Available' }}
                        </span>
                    </td>
                    <td class="border p-2 text-center">
                        @if(!$book->is_borrowed)
                            <form action="{{ route('books.borrow', $book->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="w-20 bg-green-500 text-white px-2 py-1 rounded text-sm hover:bg-green-600">Borrow</button>
                            </form>
                        @else
                            <form action="{{ route('books.return', $book->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="w-20 bg-orange-500 text-white px-2 py-1 rounded text-sm hover:bg-orange-600">Return</button>
                            </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>