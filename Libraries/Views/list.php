<html>
<head>
    <title>Color List</title>
    <meta name="author" content="Siming Mo">

    <style type="text/css">

        h3.title {
            margin-top: 50px;
            text-align: center;
        }

        table {
            margin: 20px auto;
            text-align: center;
        }

        tr.light{
            background-color: #E4EAF1;
        }

        tr.dark{
            background-color: #C6D1E3;
        }

        tr:first-child {
            background-color: #4889F1;
            color: white;
        }

        td {
            min-width: 300px;
        }


    </style>
</head>
<body>

    <h3 class="title">Color List</h3>

    <table cellpadding="10">
        <tr>
            <th>
                Color
            </th>
            <th>
                Votes
            </th>
        </tr>

        <?php

        foreach ($list as $key => $color) {
            echo '<tr class="';
            echo ($key%2 == 1)? 'dark':'light';
            echo '"><td>';
            echo '<a class="color" href="'. route('detail') . '&color=' . $color['id'] .'">' .$color['name']. '</a>';
            echo '</td><td></td></tr>';
        }

        ?>

        <tr class="<?php echo ($key%2 == 1)? 'light':'dark'; ?>" >
            <td><a class="sum" href="#">TOTAL</a></td>
            <td></td>
        </tr>

    </table>

    <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>

    <script type="text/javascript">
        $(function(){

            $('td a.color').click(function(e){
                e.preventDefault();
                var _this = $(this);
                $.ajax({
                    url: _this.attr('href'),
                    method: "GET",
                    complete:function(response){
                        if(response.status == 200){
                            var data = $.parseJSON(response.responseText);
                            return _this.parent().next().text(data.votes);
                        }
                    }
                });
            });

            $('td a.sum').click(function(e){
                e.preventDefault();
                var sum = 0;
                $('tr:not(:last) td:nth-child(2)').each(function(index, color){
                    var value = ($(this).text() == '')? 0 : parseInt($(this).text());
                    sum += value;
                })
                $(this).parent().next().text(sum);
            });

        })
    </script>

</body>
</html>


