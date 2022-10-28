<!DOCTYPE html>
<html lang="en">

<head>
    <title>Wonde test</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container-fluid">
        <h1>Task Details</h1>
        <p>As a Teacher I want to be able to see which students are in my class each day of the week so that I can be
            suitably prepared.</p>
        <div class="row">

            <div class="col-4">
                <div class="dropdown">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        Select Class
                    </button>
                    <div class="dropdown-menu">
                        @foreach ($studentClass as $class)
                            <a class="dropdown-item" href="#">{{ $class['className'] }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="dropdown">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        Select Teacher
                    </button>
                    <div class="dropdown-menu">
                        @foreach ($studentClass as $class)
                            @foreach ($class['teacher'] as $teacher)
                                <a class="dropdown-item" href="#">{{ $teacher->forename }}</a>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">MIS ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($studentClass as $class)
                            @foreach ($class['students'] as $student)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $student->forename }}</td>
                                    <td>{{ $student->surname }}</td>
                                    <td>{{ $student->mis_id }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>



    </div>

</body>

</html>
