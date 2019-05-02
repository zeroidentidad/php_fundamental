<?php
if(isset($_FILES['archivo'])) {
    foreach($_FILES['archivo']['name'] as $k => $archivo) {
        if(!empty($archivo)) {
            move_uploaded_file(
                $_FILES['archivo']['tmp_name'][$k],
                'cargas/' . $archivo
            );
        }
    }
}