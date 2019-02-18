<?php
    $this->load->helper('form');
    echo form_open(base_url().'Register/user', 'id="register"');
    echo '<div id="avatar"></div>
        <div id="nickname"></div>';
    echo form_input(array('id' => 'email', 'name' => 'email', 'placeholder' => 'E-mail', 'required' => 'required'));
    echo form_input(array('id' => 'dni', 'name' => 'dni', 'placeholder' => 'Tu DNI', 'required' => 'required'));
    echo form_password(array('id' => 'passwd', 'name' => 'passwd', 'placeholder' => 'Contraseña', 'required' => 'required'));
    echo form_password(array('id' => 'passwdConfirm', 'name' => 'passwdConfirm', 'placeholder' => 'Repetí contraseña', 'required' => 'required'));
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