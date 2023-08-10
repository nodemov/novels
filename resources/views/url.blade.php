<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Get all novel url</title>
    <style>
        h1 {
            text-align: center;
            font-family: "Source Sans Pro", sans-serif;
            font-weight: normal;
        }
    </style>
</head>

<body>

    <p id="demo"></p>



    <script>
        const selectElement = document.querySelector('.selectpicker_chapter');
        const optionElements = selectElement.querySelectorAll('option');
        const redirects = [];

        optionElements.forEach(option => {
            redirects.push(option.getAttribute('data-redirect'));
        });

        selectElement.style.display = 'none';
        document.body.innerHTML = redirects.join('","');
    </script>
</body>

</html>
