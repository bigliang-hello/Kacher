@if (count($errors) > 0)
    <div class="alert alert-danger">
        <h5>有错误发生：</h5>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif