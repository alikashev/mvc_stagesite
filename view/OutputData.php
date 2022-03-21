<?php

class OutputData {

    function __construct() {
    }

    function createForm() {

    }

    function createSelectBox() {
        //todo
    }

    function createLogSelectBox($rows) {
        $html = '<select name="logId">';
        foreach ($rows as $row) {
            $html .= '<option value="' . $row['id'] . '">' . $row['id'] . '</option>';
        }
        $html .= '</select>';
        return $html;
    }

    function createSupervisorSelectBox($rows) {
        $html = '<select name="supervisorId">';
        foreach ($rows as $row) {
            $html .= '<option value="' . $row['id'] . '">' . $row['id'] . ': ' . $row['voornaam'] . '</option>';
        }
        $html .= '</select>';
        return $html;
    }

    function createTeacherSelectBox($rows) {
        $html = '<select name="teacherId">';
        foreach ($rows as $row) {
            $html .= '<option value="' . $row['id'] . '">' . $row['id'] . ': ' . $row['voornaam'] . '</option>';
        }
        $html .= '</select>';
        return $html;
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
                        $html .= "<td><a id=\"Button-td\" href=\"index.php?action=update&id=".$row["id"]."\">Download</a></td>";
            		$html .= '</tr>';
            	}
        $html .= '</table>';

        return $html;
    }

    function createTableAdminUsers($rows) {
        $html = "<div><a href=\"" . SERVER_URL . "/Admin/CollectAddUser/\">Create new account</a></div>";
        $html .= "<br>";
        $html .= '<table class="tablerow" border="1">';
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
                        $html .= "<td><a class=\"Button-td\" href=\"" . SERVER_URL . "/Admin/CollectReadOneUser/".$row["id"]. "\">Read</a></td>";
                        $html .= "<td><a class=\"Button-td\" href=\"" . SERVER_URL . "/Admin/CollectUpdateUser/".$row["id"]. "\">Update</a></td>";
            		$html .= '</tr>';
            	}
        $html .= '</table>';

        return $html;
    }

    function createTableAdminContracts($rows) {
        $html = "<div><a href=\"" . SERVER_URL . "/Admin/collectAddContract/\">Create new contract</a></div>";
        $html .= "<br>";
        $html .= '<table class="tablerow" border="1">';
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
                        $html .= "<td><a class=\"Button-td\" href=\"" . SERVER_URL . "/Admin/collectReadOneContract/".$row["id"]. "\">Read</a></td>";
                        $html .= "<td><a class=\"Button-td\" href=\"" . SERVER_URL . "/Admin/collectUpdateContract/".$row["id"]. "\">Update</a></td>";
                        $html .= "<td><a class=\"Button-td\" href=\"" . SERVER_URL . "/Admin/collectDeleteContract/".$row["id"]. "\">Delete</a></td>";
            		$html .= '</tr>';
            	}
        $html .= '</table>';

        return $html;
    }


    function __destruct() {
        //todo
    }
}
