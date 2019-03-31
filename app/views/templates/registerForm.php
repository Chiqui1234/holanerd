<?php
    $this->load->helper('form');
    echo form_open(base_url().'Register/user', 'id="register"');
    echo '<div id="avatar"></div>
        <div id="nickname"></div>';
    echo form_input(array('id' => 'email', 'name' => 'email', 'placeholder' => 'E-mail', 'min_lenght' => 10, 'required' => 'required'));
    echo form_input(array('id' => 'username', 'name' => 'username', 'placeholder' => 'Usuario', 'min_lenght' => 4, 'required' => 'required'));
    echo form_input(array('id' => 'dni', 'name' => 'dni', 'placeholder' => 'Tu DNI', 'min_lenght' => 8, 'required' => 'required'));
    echo form_password(array('id' => 'passwd', 'name' => 'passwd', 'placeholder' => 'Contraseña', 'min_lenght' => 8, 'required' => 'required'));
    echo form_password(array('id' => 'passwdConfirm', 'name' => 'passwdConfirm', 'placeholder' => 'Repetí contraseña', 'min_lenght' => 8, 'required' => 'required'));
    echo form_submit(array('value' => 'Unirme', 'name' => 'submit'));
    echo form_close();
?>
<script>document.getElementById("email").addEventListener("input", changeNickname);
        function changeNickname() {
            var email = document.getElementById("email").value;
            document.getElementById("nickname").innerHTML = email;
            console.log("changeNickname() en acción");
        }
</script> 