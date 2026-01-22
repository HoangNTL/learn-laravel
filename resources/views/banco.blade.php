<!DOCTYPE html>
<html>
<head>
    <title>Bàn cờ vua {{ $n }} x {{ $n }}</title>
    <style>
        table { border-collapse: collapse; }
        td {
            width: 40px; height: 40px;
            text-align: center;
        }
        .white { background: #fff; }
        .black { background: #333; }
    </style>
</head>
<body>
    <h2>Bàn cờ vua {{ $n }} x {{ $n }}</h2>
    <table border="1">
        @for ($i = 0; $i < $n; $i++)
            <tr>
                @for ($j = 0; $j < $n; $j++)
                    <td class="{{ ($i + $j) % 2 == 0 ? 'white' : 'black' }}"></td>
                @endfor
            </tr>
        @endfor
    </table>
</body>
</html>
