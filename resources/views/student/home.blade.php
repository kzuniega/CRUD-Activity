<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ayahtek University</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Student Data</h1>
        <div class="mb-3">
            <a href="{{ route('student.create') }}" class="btn btn-create" style="float:right;">Create New Student</a>
        </div>
        <div style="clear: both; margin-bottom: 20px;"></div>
        <div class="mb-3">
            @if(session()->has('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
            @endif
        </div>
        <div class="mb-3">
            <a href="{{ url('/') }}" class="btn btn-home">Return to Home</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Birthdate</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($student as $student)
                <tr>
                    <td>{{ $student->student_id }}</td>
                    <td>{{ $student->first_name }}</td>
                    <td>{{ $student->middle_name }}</td>
                    <td>{{ $student->last_name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->birthdate }}</td>
                    <td>
                        <a href="{{ route('student.updatePage', [$student]) }}" class="btn btn-edit">Update Student</a>
                        <form method="post" action="{{ route('student.destroy', [$student]) }}" style="display:inline;">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete Student" class="btn btn-delete">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
