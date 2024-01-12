<?php

include "crud.php";

$crud = new crud();


switch ($_POST['type']) {
    case 'insert':

        $name = $_POST['name'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $hiddenId = $_POST['hiddenId'];


        if (!empty($hiddenId)) {
            $res = $query = "UPDATE modalcrud SET id='$hiddenId', name='$name', age='$age', email='$email' where id='$hiddenId'";
            if ($res) {
                echo "done";
            } else {
                echo "not done";
            }
        } else {
            $query = "INSERT INTO modalcrud(name, age, email)VALUES('$name', '$age', '$email');";
        }

        $result = $crud->dataExecution($query);



        if ($result) {
            echo "Yo!";
            die;
        } else {
            echo "NO!";
        }

        break;

    case 'edit':

        $editId = $_POST['editId'];

        $query = "SELECT * from modalcrud where id='$editId'";

        $result = $crud->dataProvider($query);

        print_r(json_encode($result[0]));

        break;



    case 'delete':
        $deleteId = $_POST['deleteId'];
        $query = $crud->delete('modalcrud', $deleteId);

        break;


    case 'search':
        $search = $_POST['search'];

        $query = "SELECT * FROM modalcrud where name like '%$search%' or id like '%$search%' or email like '%$search%' or age like '%$search%'";


        $result = $crud->dataProvider(($query));


        if ($result) {
            echo "executed!";
        }

        $record = "";

        foreach ($result as $row) {

            $record .= "<tr> 
                    <td>$row[id]</td>
                    <td>$row[name]</td>
                    <td>$row[email]</td>
                    <td>$row[age]</td>
                    <td><a class='btn btn-warning edit' id='$row[id]'>Edit</a> | <a class='btn btn-danger delete' id='$row[id]'>Delete</a>
                    </tr>";
        }
        echo $record;
        break;




    case 'list':
        $htmlarr = [];
        $html = '';
        $pagination = "";
        $sort = $_POST['sort'];


        // pagination
        $limit = 5;
        $page = isset($_POST['page']) ? $_POST['page'] : 1;

        $start_from = ($page - 1) * $limit;


        $total_rows = $crud->dataProvider("SELECT COUNT(id) as total FROM modalcrud");

        foreach ($total_rows as $key => $value) {
            $row_count = $value['total'];
        }

        $total_pages = ceil($row_count / $limit);

        if ($sort) {
            $query = "SELECT * FROM modalcrud ORDER BY id $sort, name $sort, email $sort, age $sort LIMIT $start_from, $limit";
        } else {
            $query = "SELECT * FROM modalcrud LIMIT $start_from, $limit";
        }


        $getData = $crud->dataProvider($query);



        foreach ($getData as $key => $value) {
            $id = $value['id'];
            $html .= "<tr>";
            $html .= "<td class='id'>" . $value['id'] . "</td>";
            $html .= "<td>" . $value['name'] . "</td>";
            $html .= "<td>" . $value['age'] . "</td>";
            $html .= "<td>" . $value['email'] . "</td>";
            $html .= "<td><a class='btn btn-warning edit' id=" . $value['id'] . "> Edit</a> | <a class='btn btn-danger delete'id=" . $value['id'] . ">Delete</a>";
            $html .= "</tr>";
        }

        $htmlArr['tbody'] = $html;


        $pagination .= '<ul class="pagination">';

        if ($page > 1) {
            $previous = $page - 1;
            $pagination .= '<li class="page-item" id="1"><span class="page-link">First Page</span></li>';
        }

        for ($i = 1; $i <= $total_pages; $i++) {
            $active_class = ($i == $page) ? "active" : "";

            $pagination .= '<li class="page-item ' . $active_class . '" id="' . $i . '"><span class="page-link">' . $i . '</span></li>';
        }

        $pagination .= '<li class="page-item" id="' . $total_pages . '"><span class="page-link">Last Page</span></li>';
        $pagination .= '</ul>';
        $htmlArr['pagination'] = $pagination;

        echo json_encode($htmlArr);



        break;


    default:
        # code...
        break;
}


?>