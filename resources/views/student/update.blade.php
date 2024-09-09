<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Student Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <h1>Update Student Information</h1>
    <div class="form-container">
        @if($errors->any())
        <div class="errors">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="POST" action="{{ route('student.update', [$student]) }}">
            @csrf
            @method('PUT')
            <div>
                <label for="student_id">Student ID</label>
                <input type="text" id="student_id" name="student_id" value="{{ $student->student_id }}" placeholder="Student ID" disabled />
            </div>
            <div>
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" value="{{ $student->first_name }}" placeholder="First Name" required />
            </div>
            <div>
                <label for="middle_name">Middle Name</label>
                <input type="text" id="middle_name" name="middle_name" value="{{ $student->middle_name }}" placeholder="Middle Name" required />
            </div>
            <div>
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" value="{{ $student->last_name }}" placeholder="Last Name" required />
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ $student->email }}" placeholder="Email" required />
            </div>
            <div>
                <label for="address">Address</label>
                <input type="text" id="address" name="address" value="{{ $student->address }}" placeholder="Address" required />
            </div>
            <div>
                <label for="gender">Gender</label> <h6><i> Male or Female </i></h6>
                <input type="text" id="gender" name="gender" value="{{ $student->gender }}" placeholder="Gender" required />
            </div>
            <div>
                <label for="birthdate">Birthdate</label> Eg: (MM-DD-YYYY) <i>09-08-0000</i></h6>
                <input type="text" id="birthdate" name="birthdate" value="{{ $student->birthdate }}" placeholder="Birthdate" required />
            </div>
            <div>
                <input type="submit" value="Save Student">
            </div>
        </form>        
    </div>
</body>
</html>
