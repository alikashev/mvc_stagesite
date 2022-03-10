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
                        $html .= "<td><a class=\"Button-td\" href=\"index.php?action=readone&id=".$row["id"]."\">Read</a></td>";
                        $html .= "<td><a id=\"Button-td\" href=\"index.php?action=delete&id=".$row["id"]."\">Delete</a></td>";
                        $html .= "<td><a id=\"Button-td\" href=\"index.php?action=update&id=".$row["id"]."\">Update</a></td>";
            		$html .= '</tr>';
            	}
        $html .= '</table>';

        return $html;
    }

    function createTableAdmin($rows) {
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
                        $html .= "<td><a class=\"Button-td\" href=\"CollectReadOneUser/".$row["id"]. "\">Read</a></td>";
                        $html .= "<td><a class=\"Button-td\" href=\"CollectUpdateUser/".$row["id"]. "\">Update</a></td>";
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