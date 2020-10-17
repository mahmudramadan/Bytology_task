<?php
include './classes/RectangleClass.php';
$rectangle = new RectangleClass();
$data = $rectangle->get_last_elements(5);
if (!$data) {
    echo "there is not data added yet";
} else {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Rectangle Task</title>
        <link rel="stylesheet" type="text/css" href="./assets/css/table.css">
    </head> 

    <body>
        <h1>Last 5 items inserted</h1>

        <table class="table  table-hover">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Width</td>
                    <td>Height</td>
                    <td>Average</td>
                    <td>Area</td>
                    <td>squared value of area.</td>
                    <td>Creation time</td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $key => $value) {
                    echo "<tr>
				 		<td>$value->id</td>
				 		<td>$value->width</td>
				 		<td>$value->height</td>
				 		<td>$value->average</td>
				 		<td>$value->area</td>
				 		<td>$value->square_area</td>
				 		<td>$value->created_at</td>
				 	</tr>";
                }
                ?>
            </tbody>
    </body>

    </html>
<?php
}
?>