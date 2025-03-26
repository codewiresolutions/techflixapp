<div class="cart_box_table">
    <div class="table_section">
        <table class="table" id="example">
            <thead>
            <tr>

                <th>Title</th>
                <th>Description</th>
                <th class="text-center">Status</th>
                <th class="text-center">Expire Date</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($quizzes as $quiz)
                <tr>
                    <td>{{ $quiz->title }}</td>
                    <td>{{ Str::limit($quiz->description, 50) }}</td>
                    <td class="text-center">{{ $quiz->status ? 'Active' : 'Inactive' }}</td>
                    <td class="text-center" >{{ $quiz->expire_date ? \Carbon\Carbon::parse($quiz->expire_date)->format('Y-m-d H:i') : 'N/A' }}</td>

                    <td class="text-right">

                        <a href="{{ route('admin.quiz.questions.create', $quiz) }}" class="btn btn-sm btn-success">Add Questions</a>
                        <a href="{{ route('admin.quizzes.questions.show', $quiz) }}" class="btn btn-sm btn-success">View Questions</a>
                        <a href="{{ route('admin.quizzes.edit', $quiz) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.quizzes.destroy', $quiz) }}" method="POST"
                              style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure?')">Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
