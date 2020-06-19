<!DOCTYPE html>
<html>
<head>
<title>Edit User</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="/assets/css/app.css">
</head>
<body>

<div class="container"> 
    <div class="categories"></div>
    <div class="content">
        <h3>Chỉnh sửa thông tin người dùng</h3>
        <hr>
        <form
            action="/index.php?controller=user&action=edit&id=<?php echo $data['id']; ?>"
            method="POST"
            enctype="multipart/form-data"
        >
            <div class="flex-content">
                <div class="label-item">
                    <label for="fullname">Họ và tên</label>
                    <label for="email">Email</label>
                    <label for="birthday">Ngày sinh</label>
                    <label for="phone">Số điện thoại</label>
                    <label for="address">Địa chỉ</label>
                    <label for="gender">Giới tính</label>
                    <label for="avatar">Avatar</label>
                </div>
                <div class="input-item">
                    <input type="text" id="fullname" name="fullname" value="<?php echo $data['display_name']; ?>" required>
                    <input type="text" id="email" name="email" value="<?php echo $data['email']; ?>" required>
                    <input type="date" id="birthday" name="birthday" value="<?php echo $data['birthday']; ?>" required>
                    <input type="tel" id="phone" name="phone" value="<?php echo $data['phone_number']; ?>" required>
                    <input type="text" id="address" name="address" value="<?php echo $data['address']; ?>" required>
                    <div class="gender">
                        <input type="radio" id="male" name="gender" value="male"
                            <?php if ($data['gender'] == 1) : ?>
                                checked="checked"
                            <?php endif; ?>
                        >
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="gender" value="female"
                            <?php if ($data['gender'] != 1) : ?>
                                    checked="checked"
                            <?php endif; ?>
                        >
                        <label for="female">Female</label>
                    </div>
                    <input type="file" id="avatar" name="avatar">
                </div>
            </div>
            <br>
            <input class="add" type="submit" value="Cập nhật">
        </form>
    </div>
    <div class="sidebar"></div>
</div>
</body>
</html>
