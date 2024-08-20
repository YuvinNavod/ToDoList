<form action="{{ route('todo.update',$task->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-8">
            <div calss ="form-group">
                <input class="form-control" name="title" value="{{ $task->title }}" type="text" placeholder="Enter task" >
            </div>
        </div>
        <div class="col-lg-4 mt-5">
            <button class="btn btn-primary" type="submit">Update</button>
        </div>
    </div>
</form>
