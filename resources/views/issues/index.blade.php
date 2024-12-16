<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issues List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
   body {
    color: #566787;
    font-family: 'Varela Round', sans-serif;
    font-size: 13px;
}
h1{
    text-transform: uppercase;
    margin-bottom: 20px;
}
.table {
    min-width: 1000px;
    background: #fff;
    padding: 20px 25px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table thead {        
    padding-bottom: 15px;
    background: #ffcc33;
    color: black;
    padding: 16px 30px;
    margin: -20px -25px 10px;
    border-radius: 3px 3px 0 0;
}
.table tbody .btn-group {
    float: right;
}
.table tbody .btn {
    color: #fff;
    font-weight: bold;
    font-size: 13px;
    border: none;
    min-width: 50px;
    outline: none !important;
}
.table .btn span {
    float: left;
    margin-top: 2px;
}

table.table tr th:first-child {
    width: 60px;
}
table.table tr th:last-child {
    width: 100px;
}	
.pagination {
    float: right;
    margin: 0 0 5px;
}
.pagination li a {
    border: none;
    font-size: 13px;
    min-width: 30px;
    min-height: 30px;
    color: #999;
    margin: 0 2px;
    line-height: 30px;
    border-radius: 2px !important;
    text-align: center;
    padding: 0 6px;
}
.pagination li a:hover {
    color: #666;
}	
.pagination li.active a, .pagination li.active a.page-link {
    background: #03A9F4;
}
.pagination li.active a:hover {        
    background: #0397d6;
}
.pagination li.disabled i {
    color: #ccc;
}
.pagination li i {
    font-size: 16px;
    padding-top: 6px
}
.hint-text {
    float: left;
    margin-top: 10px;
    font-size: 13px;
}   
</style>
<body>
    <div class="container mt-5">
        <h1>List of Issues</h1>
        <a href="{{ route('issues.create') }}" class="btn btn-primary mb-3">Add New Issue</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Computer Name</th>
                    <th>Model</th>
                    <th>Reported By</th>
                    <th>Reported Date</th>
                    <th>Urgency</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($issues as $issue)
                    <tr>
                        <td>{{$issue->id }}</td>
                        <td>{{$issue->computer_name}}</td>
                        <td>{{$issue->model}}</td>
                        <td>{{$issue->reported_by}}</td>
                        <td>{{$issue->reported_date}}</td>
                        <td>{{ $issue->urgency}}</td>
                        <td>{{ $issue->status }}</td>
                        <td class = "btn-group">
                            <a href="{{ route('issues.edit', $issue->id) }}" class="btn btn-success btn-sm">Edit</a>
                            <form action="{{ route('issues.destroy', $issue->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this issue?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="clearfix">
            <div class="hint-text">Showing <b>{{ $issues->count() }}</b> out of <b>{{ $issues->total() }}</b> issues</div>
            <ul class="pagination">
                <li class="page-item {{ $issues->onFirstPage() ? 'disabled' : '' }}">
                    <a href="{{ $issues->previousPageUrl() }}" class="page-link">Previous</a>
                </li>
                @foreach ($issues->links()->elements[0] as $page => $url)
                    <li class="page-item {{ $issues->currentPage() == $page ? 'active' : '' }}">
                        <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                    </li>
                @endforeach

                <li class="page-item {{ $issues->hasMorePages() ? '' : 'disabled' }}">
                    <a href="{{ $issues->nextPageUrl() }}" class="page-link">Next</a>
                </li>
            </ul>
        </div>    
    </div>
</body>
</html>
