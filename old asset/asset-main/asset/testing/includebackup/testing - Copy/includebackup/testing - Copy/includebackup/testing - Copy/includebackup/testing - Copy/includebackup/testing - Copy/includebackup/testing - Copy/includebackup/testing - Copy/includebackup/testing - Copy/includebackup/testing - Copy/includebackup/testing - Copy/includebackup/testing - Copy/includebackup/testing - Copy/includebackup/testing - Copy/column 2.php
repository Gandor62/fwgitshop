<!DOCTYPE html>
<html>
	<head>
		<title>Column selector example</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	</head>
	<body>
		<body>
    <table>
        <tr>
            <th class="col1">Genus</th>
            <th class="col2">Species</th>
        </tr>

        <tr>
            <td class="col1">
            column1
            </td>

            <td class="col2">
            column2
            </td>
        </tr>
    </table>

    <input type="button" id="hideCol1" value="Hide Column 1" />
    <input type="button" id="hideCol2" value="Hide Column 2" />
    <input type="button" id="hideBoth" value="Hide Both" />
    <input type="button" id="showAll" value="ShowAll" />
    <script>
        var hideCol1 = function () {
            var e = document.getElementsByClassName("col1");
            for (var i = 0; i < e.length; i++) {
                e[i].style.display = "none";
            }
        };

        var hideCol2 = function () {
            var e = document.getElementsByClassName("col2");
            for (var i = 0; i < e.length; i++) {
                e[i].style.display = "none";
            }
        };

        var hideBoth = function () {
            hideCol1();
            hideCol2();
        };

        var showAll = function () {
            var e = document.getElementsByClassName("col1");
            for (var i = 0; i < e.length; i++) {
                e[i].style.display = "table-cell";
            };
            e = document.getElementsByClassName("col2");
            for (var i = 0; i < e.length; i++) {
                e[i].style.display = "table-cell";
            };
        };

        (function () {
            document.getElementById("hideCol1").addEventListener("click", hideCol1);
            document.getElementById("hideCol2").addEventListener("click", hideCol2);
            document.getElementById("hideBoth").addEventListener("click", hideBoth);
            document.getElementById("showAll").addEventListener("click", showAll);
        })();

    </script>
</body>
