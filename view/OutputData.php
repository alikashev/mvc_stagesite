<?php

class OutputData {

    function __construct() {
    }

    function createForm() {

    }

    function createSelectBox() {
        //todo
        
    }

    function createTable($rows) {
        $html = '<table class="tablerow" border="1">';
            $html .= '<tr>';
            	foreach($rows[0] as $key => $value){
            		$html .= "<th>" . $key . "</th>";
            	}
            $html .= "</tr>";
            	foreach($rows as $row){
            		$html .= '<tr>';
            			foreach($row as $columns) {
            				$html .= "<td>" . $columns . "</td>";
            			}
                        $html .= "<td><a class=\"Button-td\" href=\"index.php?action=readone&contact_id=".$row["contact_id"]."\">Read</a></td>";
                        $html .= "<td><a id=\"Button-td\" href=\"index.php?action=delete&contact_id=".$row["contact_id"]."\">Delete</a></td>";
                        $html .= "<td><a id=\"Button-td\" href=\"index.php?action=update&contact_id=".$row["contact_id"]."\">Update</a></td>";
            		$html .= '</tr>';
            	}
        $html .= '</table>';

        return $html;
    }


    function __destruct() {
        //todo
    }
}

?>