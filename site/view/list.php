<?php
    require '../controller/UserController.php';
    $users = getUsers();
?>

<!DOCTYPE html>
<html>
<head>
<title>Add User</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="/public/css/app.css">
</head>
<body>
<div class="container">
    <div class="categories"></div>
    <div class="content">
        <h3>Danh sách người dùng</h3>
        <hr>
        <table>
            <tr>
                <th width="3%">ID</th>
                <th width="15%s">Tên</th>
                <th width="15%">Ngày sinh</th>
                <th width="15%">Email</th>
                <th width="15%">Số điện thoại</th>
                <th width="15%">Địa chỉ</th>
                <th width="5%">Giới tính</th>
                <th width="17%">Actions</th>
            </tr>
            <?php foreach ($users as $key => $value) :?>
            <tr>
                <td><?php echo $value['id']; ?></td>
                <td><?php echo $value['display_name']; ?></td>
                <td><?php echo $value['birthday']; ?></td>
                <td><?php echo $value['email']; ?></td>
                <td><?php echo $value['phone_number']; ?></td>
                <td><?php echo $value['address']; ?></td>
                <td><?php echo $value['gender'] == '1' ? 'Male' : 'Female'; ?></td>
                <td>
                    <button type="button">Sửa</button>
                    <button type="button">Xóa</button>
                </td>
            </tr>
            <?php  endforeach; ?>
        </table>
    </div>
    <div class="sidebar"></div>
</div>
</body>
</html>
