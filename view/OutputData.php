<?php

class OutputData
{

  function __construct()
  {
  }

  function createForm()
  {

  }

  function createSelectBox($data, $selected, $name, $selectedName = '')
  {

    $html = '<select class="form-select" name="' . $name . '">';

    foreach ($data as $row) {
      if ($selectedName !== '') {
        $info = $row[$selectedName];
      } else {
        $info = $row['voornaam'] . ' ' . $row['tussenvoegsel'] . ' ' . $row['achternaam'];
      }
      if ($selected !== '' && $row['id'] === $selected) {
        $html .= '<option value="' . $row['id'] . '" selected>' . $row['id'] . ': ' . $info . '</option>';
      } else {
        $html .= '<option value="' . $row['id'] . '">' . $row['id'] . ': ' . $info . '</option>';
      }

    }
    $html .= '</select>';
    return $html;
  }

  function createSupervisorSelectBox($rows, $selected = '')
  {
    return $this->createSelectBox($rows, $selected, 'supervisorId');
  }

  function createSchoolSupervisorSelectBox($rows, $selected = '')
  {
    return $this->createSelectBox($rows, $selected, 'schoolSupervisorId');
  }

  function createTeacherSelectBox($rows, $selected = '')
  {
    return $this->createSelectBox($rows, $selected, 'teacherId');
  }

  function createStudentSelectBox($rows, $selected = '')
  {
    return $this->createSelectBox($rows, $selected, 'internId');
  }

  function createParentSelectBox($rows, $selected = '')
  {
    return $this->createSelectBox($rows, $selected, 'parentId');
  }

  function createCompanySelectBox($rows, $selected = '')
  {
    return $this->createSelectBox($rows, $selected, 'companyId', 'naam');
  }

  function createSchoolAccountSelectBox($rows, $selected = '')
  {
    return $this->createSelectBox($rows, $selected, 'schoolAccountId');
  }

  function createHumanResourcesSelectBox($rows, $selected = '')
  {
    return $this->createSelectBox($rows, $selected, 'humanResourcesId');
  }

  function createTable($rows, $create = '', $update = '', $read = '', $delete = '')
  {
    $html = "<div><a class='btn btn-primary' href=\"" . SERVER_URL . $create . "\">Add</a></div>";
    $html .= "<br>";
    $html .= '<table class="table table-striped">';
    $html .= '<tr>';
    foreach ($rows[0] as $key => $value) {
      $html .= "<th class='col'>" . $key . "</th>";
    }
    $html .= "</tr>";
    foreach ($rows as $row) {
      $html .= '<tr>';
      foreach ($row as $columns) {
        $html .= "<td>" . $columns . "</td>";
      }
      if ($update !== '') {
        $html .= "<td><a class=\"Button-td btn btn-primary\" href=\"" . SERVER_URL . $update . $row["id"] . "\">Update</a></td>";
      }
      if ($read !== '') {
        $html .= "<td><a class=\"Button-td btn btn-info\" href=\"" . SERVER_URL . $read . $row["id"] . "\">Read</a></td>";
      }
      if ($delete !== '') {
        $html .= "<td><a class=\"Button-td btn btn-danger\" href=\"" . SERVER_URL . $delete . $row["id"] . "\">Delete</a></td>";
      }
    }
    $html .= '</tr>';
    $html .= '</table>';

    return $html;
  }

  function readFile($results)
  {

    foreach ($results as $row) {
      $filename = $row['naam'];
      $file = "http://" . $_SERVER['SERVER_NAME'] . $row['bestand_path'] . $filename;
    }

    $extension = pathinfo($file, PATHINFO_EXTENSION);

    function readPdf($file)
    {

      // Header content type
      header('Content-type: application/pdf');

      header('Content-Disposition: inline; filename="' . $filename . '"');

      header('Content-Transfer-Encoding: binary');

      header('Accept-Ranges: bytes');

      // Read the file
      @readFile($file);

    }

    switch ($extension) {
      case 'pdf':
        readPdf($file);
        break;
      default:
        echo $file."<br>";
        echo "Dit type bestand kan niet worden weergegeven op de browser<br>";
        echo "<a href='$file'>Klik hier</a>"." Om te donwloaden";
        echo "<iframe 
                src=\"http://docs.google.com/gview?url=$file&embedded=true\"
                style=\"width:100%; height:100%;\"
                frameborder=\"0\">
              </iframe>";
        break;
    }

  }

  function createTableUsers($rows)
  {
    return $this->createTable($rows, '/UserController/create/', '/UserController/update/', '');
  }

  function createTableContracts($rows)
  {
    return $this->createTable($rows, '/ContractController/create/', '/ContractController/update/');
  }

  function createTableAdminCompanies($rows)
  {
    return $this->createTable($rows, '/CompanyController/create/', '/CompanyController/update/', '', '/CompanyController/delete/');
  }

  function createTableUploads($rows)
  {
     return $this->createTable($rows, '/UploadsController/uploadForm/', '', '/UploadsController/collectReadFile/', '/UploadsController/collectDeleteFile/');
  }


  function __destruct()
  {
    //todo
  }
}
