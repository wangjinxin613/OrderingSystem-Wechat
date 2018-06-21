<?php
require('../config/index_class.php');
$sh_name = $_POST['sh_name'];
$sh_tel = $_POST['sh_tel'];
$sh_city = $_POST['sh_city'];
$sh_address = $_POST['sh_address'];
$id = $_POST['id'];//获取id
cg_address_update('sh_name',$sh_name,$id);
cg_address_update('sh_tel',$sh_tel,$id);
cg_address_update('sh_city',$sh_city,$id);
cg_address_update('sh_address',$sh_address,$id);
exit('<script>alert(\'执行成功\');window.location.href="../cg_address.php"</script>');

?>
