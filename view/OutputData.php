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

    function createSupervisorSelectBox($rows, $selected = '') {
        $html = '<select name="supervisorId">';
        foreach ($rows as $row) {
            if ($selected !== '' && $row['id'] === $selected) {
                $html .= '<option value="' . $row['id'] . '" selected>' . $row['id'] . ': ' . $row['voornaam'] . '</option>';
            } else {
                $html .= '<option value="' . $row['id'] . '">' . $row['id'] . ': ' . $row['voornaam'] . '</option>';
            }

        }
        $html .= '</select>';
        return $html;
    }

    function createTeacherSelectBox($rows, $selected = '') {
        $html = '<select name="teacherId">';
        foreach ($rows as $row) {
            if ($selected !== '' && $row['id'] === $selected) {
                $html .= '<option value="' . $row['id'] . '" selected>' . $row['id'] . ': ' . $row['voornaam'] . '</option>';
            } else {
                $html .= '<option value="' . $row['id'] . '">' . $row['id'] . ': ' . $row['voornaam'] . '</option>';
            }
        }
        $html .= '</select>';
        return $html;
    }

    function createStudentSelectBox($rows, $selected = '') {
        $html = '<select name="internId">';
        foreach ($rows as $row) {
            if ($selected !== '' && $row['id'] === $selected) {
                $html .= '<option value="' . $row['id'] . '" selected>' . $row['id'] . ': ' . $row['voornaam'] . '</option>';
            } else {
                $html .= '<option value="' . $row['id'] . '">' . $row['id'] . ': ' . $row['voornaam'] . '</option>';
            }
        }
        $html .= '</select>';
        return $html;
    }

    function createCompanySelectBox($rows, $selected = '') {
        $html = '<select name="companyId">';
        foreach ($rows as $row) {
            if ($selected !== '' && $row['id'] === $selected) {
                $html .= '<option value="' . $row['id'] . '" selected>' . $row['id'] . ': ' . $row['naam'] . '</option>';
            } else {
                $html .= '<option value="' . $row['id'] . '">' . $row['id'] . ': ' . $row['naam'] . '</option>';
            }
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
                        $html .= "<td><a class=\"Button-td\" href=\"./collectReadFile/".$row["id"]."\">Read</a></td>";
                        $html .= "<td><a id=\"Button-td\" href=\"./collectDeleteFile/".$row["id"]."\">Delete</a></td>";
                        $html .= "<td><a id=\"Button-td\" href=\"index.php?action=update&id=".$row["id"]."\">Update</a></td>";
            		$html .= '</tr>';
            	}
        $html .= '</table>';

        return $html;
    }

    function readFile($results) {
            
            foreach($results as $row){
                $filename = $row['naam'];
                $file = "http://".$_SERVER['SERVER_NAME'].$row['bestand_path'].$filename;
                echo $file; 
            }

            // Header content type
            header('Content-type: application/pdf');
            
            header('Content-Disposition: inline; filename="' . $filename . '"');
            
            header('Content-Transfer-Encoding: binary');
            
            header('Accept-Ranges: bytes');
            
            // Read the file
            @readFile($file);
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

    function createTableTeacherUsers($rows) {
        $html = "<div><a href=\"" . SERVER_URL . "/Teacher/CollectAddUser/\">Create new account</a></div>";
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
                        $html .= "<td><a class=\"Button-td\" href=\"" . SERVER_URL . "/Teacher/CollectReadOneUser/".$row["id"]. "\">Read</a></td>";
                        $html .= "<td><a class=\"Button-td\" href=\"" . SERVER_URL . "/Teacher/CollectUpdateUser/".$row["id"]. "\">Update</a></td>";
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

    function createTableTeacherContracts($rows) {
        $html = "<div><a href=\"" . SERVER_URL . "/Teacher/collectAddContract/\">Create new contract</a></div>";
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
                        $html .= "<td><a class=\"Button-td\" href=\"" . SERVER_URL . "/Teacher/collectReadOneContract/".$row["id"]. "\">Read</a></td>";
                        $html .= "<td><a class=\"Button-td\" href=\"" . SERVER_URL . "/Teacher/collectUpdateContract/".$row["id"]. "\">Update</a></td>";
                        $html .= "<td><a class=\"Button-td\" href=\"" . SERVER_URL . "/Teacher/collectDeleteContract/".$row["id"]. "\">Delete</a></td>";
            		$html .= '</tr>';
            	}
        $html .= '</table>';

        return $html;
    }

    function createTableAdminCompanies($rows) {

        $html = "<div><a href=\"" . SERVER_URL . "/Admin/collectAddCompany/\">Create new company</a></div>";
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
            $html .= "<td><a class=\"Button-td\" href=\"" . SERVER_URL . "/Admin/collectReadOneCompany/".$row["id"]. "\">Read</a></td>";
            $html .= "<td><a class=\"Button-td\" href=\"" . SERVER_URL . "/Admin/collectUpdateCompany/".$row["id"]. "\">Update</a></td>";
            $html .= "<td><a class=\"Button-td\" href=\"" . SERVER_URL . "/Admin/collectDeleteCompany/".$row["id"]. "\">Delete</a></td>";
            $html .= '</tr>';
        }
        $html .= '</table>';

        return $html;
    }


    function __destruct() {
        //todo
    }
}
