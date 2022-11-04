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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(function() {

            // getting the teacher and its classes at the same time to minimize server request limit call
            $('#selectTeacher').change(function() {
                var $options = $('#selectClass').val('').find('option').show();
                if (this.value != '')
                    $options.not('[data-employee-id="' + this.value + '"],[data-employee-id=""]').hide();
            })

            // select teacher class
            $("#selectClass").change(function() {
                showStudentLists(this.value);
            });

        });


        // get student list per teacher's class
        function showStudentLists(className) {
            $.ajax({
                url: "{{ route('wondeStudentList_page') }}",
                method: 'GET',
                data: {
                    className: className
                },
                dataType: 'html',
                success: function(data) {
                    $('#resultsStudentData').empty().html(data);
                }
            })
        }
    </script>
</head>

<body>
    <div class="container-fluid">
        <h1>Task Details</h1>
        <p>As a Teacher I want to be able to see which students are in my class each day of the week so that I can be
            suitably prepared.</p>
        <div class="row" style="margin: 50px;">
            <form>
                <div class="form-group" id="teacherSelect">
                    <label for="selectTeacher">Select a Teacher</label>
                    <select class="form-control" id="selectTeacher">
                        <option value="">--Please choose an teacher--</option>
                        @foreach ($employees as $employee)
                            @if (isset($employee['id']))
                                <option value="{{ $employee['id'] }}">{{ $employee['title'] }}
                                    {{ $employee['forename'] }} {{ $employee['surname'] }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group" id="classSelect">
                    <label for="selectClass">Select a Class</label>
                    <select class="form-control" id="selectClass">
                        <option value="">--Please choose a class--</option>
                        @foreach ($employees as $employee)
                            @foreach ($employee['classes'] as $class)
                                @if (isset($class->name))
                                    <option value="{{ $class->name }}" data-employee-id="{{ $employee['id'] }}">
                                        {{ $class->name }}</option>
                                @endif
                            @endforeach
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Class Name</th>
                        </tr>
                    </thead>
                    <tbody id="resultsStudentData">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
