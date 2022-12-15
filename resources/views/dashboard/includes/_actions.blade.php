<td>
    <a href="{{ route('dashboard.' . $model->getTable() . '.show', $id) }}" class="btn btn-primary btn-sm px-4 me-2">
        View
    </a>

    <a href="{{ route('dashboard.' . $model->getTable() . '.edit', $id) }}" class="btn btn-info btn-sm px-4 me-2">
        Edit
    </a>

    <form action="{{ route('dashboard.' . $model->getTable() . '.destroy', $id) }}" method="post"
        style="display: inline-block;">
        @method('DELETE')
        @csrf


        <a href="#" class="btn btn-danger btn-sm px-4 me-2 deleteBtn">
            Delete
        </a>
    </form>

</td>
