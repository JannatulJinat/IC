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
        <tr>
            <td>Name</td>
            <td>{{ $jsonContent->name }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{ $jsonContent->email }}</td>
        </tr>
        <tr>
            <td>Programming Language</td>
            <td>{{ $jsonContent->skill->{'Programming Language'} }}</td>
        </tr>
    </table>


</body>

</html>
