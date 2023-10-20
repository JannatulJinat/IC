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
            <td>Project Name</td>
            <td>
                {{ $jsonContent->title }}
            </td>
        </tr>
        <tr>
            <td>Project Details</td>
            <td>
                {{ $jsonContent->details }}
            </td>
        </tr>
        <tr>
            <td>Project Github Link</td>
            <td>
                {{ $jsonContent->githubLink }}
            </td>
        </tr>
        <tr>
            <td>Image</td>
            <td>
                <img src="{{ $jsonContent->image }}">
            </td>
        </tr>
    </table>


</body>

</html>
