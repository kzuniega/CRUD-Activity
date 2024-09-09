<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <h1>Create Student</h1>
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
        <form method="POST" action="{{ route('student.save') }}">
            @csrf
            @method('POST')
            <div>
                <label for="student_id">Student ID</label>
                <input type="text" id="student_id" name="student_id" placeholder="Student ID" maxlength="9" required />
            </div>
            <div>
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" placeholder="First Name" required />
            </div>
            <div>
                <label for="middle_name">Middle Name</label>
                <input type="text" id="middle_name" name="middle_name" placeholder="Middle Name" required />
            </div>
            <div>
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" placeholder="Last Name" required />
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Email" required />
            </div>
            <div>
                <label for="address">Address</label>
                <input type="text" id="address" name="address" placeholder="Address" required />
            </div>
            <div>
                <label for="gender">Gender</label>
                <input type="text" id="gender" name="gender" placeholder="Gender" required />
            </div>
            <div>
                <label for="birthdate">Birthdate</label>
                <input type="text" id="birthdate" name="birthdate" placeholder="Birthdate" required />
            </div>
            <div>
                <input type="submit" value="Save new student">
            </div>
        </form>
    </div>
</body>
</html>
