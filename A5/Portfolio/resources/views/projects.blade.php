<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portfolio</title>
</head>

<body>
    <table border="1" cellspacing = "0">
        <tr>
            <td>
                <a href="/">Home</a>
            </td>
            <td>
                <a href="/workExperience">Work Experience</a>
            </td>
            <td>
                <a href="/projects">Projects</a>
            </td>
        </tr>
    </table>
    <br>
    <table border="1" cellspacing = "0">
        @foreach ($jsonContent as $data)
            <tr>
                <td>Project Number</td>
                <td>{{ $data->id }}</td>
                <td></td>
            </tr>
            <tr>
                <td>Project Name</td>
                <td>
                    {{ $data->title }}
                </td>
                <td>
                    <b><a href="/projects/{{ $data->id }}">Click to see more details</a></b>
                </td>
            </tr>
            <tr>
                <td>Image</td>
                <td>
                    <img src="{{ $data->image }}">
                </td>
                <td></td>
            </tr>
        @endforeach
    </table>


</body>

</html>
