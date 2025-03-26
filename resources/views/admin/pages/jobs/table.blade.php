<div class="cart_box_table">
    <div class="table_section">
        <table class="table" id="example">
            <thead>
            <tr>
                <th >Title</th>
                <th>Type</th>
                <th >Sub Title</th>
                <th >Description</th>
                <th >Experience</th>
                <th class="text-center" >Status</th>
                <th  class="text-center">Expire Date</th>
                <th class="text-center">Added By</th>
                <th  class="text-center">Created at</th>
                <th  class="text-center" >Action</th>
            </tr>
            </thead>
            <tbody>
            @if (!empty($job) && count($job) > 0)
                @foreach ( $job as $key => $jobs )
                    <tr>


                        <td>{{ $jobs->title }}</td>
                        <td>{{ $jobs->type }}</td>
                        <td>{{ $jobs->sub_title }}</td>
                        <td>{{ substr($jobs->description, 0, 50) }}...</td>
                        <td>{{ substr($jobs->experience, 0, 50) }}...</td>
                        <td  class="text-center">
                            @if($jobs->status ===  1)
                                <span class="badge badge-pill badge-success p-2">Active</span>
                            @else
                                <span class="badge badge-pill badge-danger  p-2">Inactive</span>
                            @endif

                        </td>
                        <td  class="text-center">{{ $jobs->expire_date ?? 'N/A' }}</td>
                        <td class="text-center">{{ $jobs->user->name }}</td>
                        <td  class="text-center">{{ $jobs->created_at ?? 'N/A' }}</td>
                        <td class="text-center">
                            <div class="d_flexs_table">
                                <a class="btn btn_secondary" href="{{ route('admin.jobs.edit',($jobs->id)) }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('admin.jobs.destroy', $jobs->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>
